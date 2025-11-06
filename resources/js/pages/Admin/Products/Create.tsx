import { Combobox } from '@/components/combobox';
import InputError from '@/components/input-error';
import { MultiSelect } from '@/components/multi-select';
import { SortableTableRow } from '@/components/SortableTableRow';
import { Button } from '@/components/ui/button';
import { Card, CardContent, CardHeader, CardTitle } from '@/components/ui/card';
import { Checkbox } from '@/components/ui/checkbox';
import {
    Collapsible,
    CollapsibleContent,
    CollapsibleTrigger,
} from '@/components/ui/collapsible';
import { Input } from '@/components/ui/input';
import { Label } from '@/components/ui/label';
import {
    Popover,
    PopoverContent,
    PopoverTrigger,
} from '@/components/ui/popover';
import {
    Select,
    SelectContent,
    SelectItem,
    SelectTrigger,
    SelectValue,
} from '@/components/ui/select';
import {
    Table,
    TableBody,
    TableCell,
    TableHead,
    TableHeader,
    TableRow,
} from '@/components/ui/table';
import { Textarea } from '@/components/ui/textarea';
import AppLayout from '@/layouts/app-layout';
import { slugify } from '@/lib/slugify';
import { index, store } from '@/routes/admin/products';
import { type BreadcrumbItem } from '@/types';
import {
    closestCenter,
    DndContext,
    KeyboardSensor,
    PointerSensor,
    useSensor,
    useSensors,
    type DragEndEvent,
} from '@dnd-kit/core';
import {
    arrayMove,
    SortableContext,
    sortableKeyboardCoordinates,
    verticalListSortingStrategy,
} from '@dnd-kit/sortable';
import { Head, Link, useForm } from '@inertiajs/react';
import {
    ArrowLeft,
    ChevronDown,
    GripVertical,
    Plus,
    Trash2,
} from 'lucide-react';
import React, { useRef, useState } from 'react';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Dashboard',
        href: '/admin/dashboard',
    },
    {
        title: 'Ürünler',
        href: '/admin/products',
    },
    {
        title: 'Yeni Ürün',
        href: '/admin/products/create',
    },
];

interface Attribute {
    id: number;
    name: string;
    attribute_set_id: number | null;
    attributeSet?: {
        id: number;
        name: string;
    } | null;
    values: Array<{
        id: number;
        value: string;
        slug?: string;
        color?: string;
        image?: string;
        sort_order: number;
    }>;
}

interface Variation {
    id: number;
    name: string;
    type: 'text' | 'color' | 'image';
    values: Array<{
        id: number;
        label: string;
        value?: string;
        color?: string;
        image?: string;
        sort_order: number;
    }>;
}

interface ProductOption {
    id: number;
    name: string;
    type: string;
    required: boolean;
    values: Array<{
        id: number;
        label: string;
        value?: string;
        price_adjustment: number;
        price_type: 'fixed' | 'percentage';
        sort_order: number;
    }>;
}

interface Category {
    id: number;
    name: string;
    parent_id: number | null;
    children?: Category[];
}

interface Props {
    brands?: Array<{ id: number; name: string }>;
    categories?: Category[];
    tags?: Array<{ id: number; name: string }>;
    taxClasses?: Array<{ id: number; name: string; rate: number }>;
    attributes?: Attribute[];
    variations?: Variation[];
    productOptions?: ProductOption[];
    variationTemplates?: Array<{
        id: number;
        name: string;
        type: string;
        values?: Array<{
            id: number;
            label: string;
            value?: string;
            image?: string;
            sort_order?: number;
        }>;
    }>;
}

export default function ProductsCreate({
    brands = [],
    categories = [],
    tags = [],
    taxClasses = [],
    attributes = [],
    variations = [],
    productOptions = [],
    variationTemplates = [],
}: Props) {
    const { data, setData, post, processing, errors } = useForm({
        name: '',
        slug: '',
        sku: '',
        description: '',
        short_description: '',
        brand_id: null as number | null,
        tax_class_id: null as number | null,
        status: 'draft' as 'draft' | 'published',
        is_virtual: false,
        seo_url: '',
        meta_title: '',
        meta_description: '',
        new_from: '',
        new_to: '',
        sort_order: 0,
        category_ids: [] as number[],
        tag_ids: [] as number[],
        attributes: [] as Array<{
            attribute_id: number;
            attribute_value_ids: number[];
        }>,
        variation_ids: [] as Array<{
            variation_id: number;
            variation_value_ids: number[];
        }>,
        variants: [] as Array<{
            name: string;
            sku?: string;
            price?: number;
            stock?: number;
            variation_values: Array<{
                variation_id: number;
                variation_value_id: number;
            }>;
        }>,
        option_ids: [] as number[],
        media: [] as Array<{
            file?: File;
            preview?: string;
            url?: string;
            type?: 'image' | 'video';
            path?: string;
            alt?: string;
            sort_order?: number;
        }>,
        downloads: [] as Array<{
            file: string;
            sort_order?: number;
        }>,
        links: [] as Array<{
            linked_product_id: number;
            type: 'up_sell' | 'cross_sell' | 'related';
        }>,
    });

    const isSlugManuallyEdited = useRef(false);
    const tempIdCounter = useRef(0);
    const [selectedCategories, setSelectedCategories] = useState<number[]>([]);
    const [selectedTags, setSelectedTags] = useState<number[]>([]);
    const [productAttributes, setProductAttributes] = useState<
        Array<{
            attribute_id: number;
            attribute_value_ids: number[];
            tempId?: string;
        }>
    >([]);
    const [productVariations, setProductVariations] = useState<
        Array<{
            variation_id: number;
            name: string;
            type: 'text' | 'color' | 'image';
            variation_value_ids: number[];
            localValues?: Array<{
                label: string;
                value?: string;
                color?: string;
                image?: string;
                sort_order: number;
                tempId?: string;
            }>;
            tempId?: string;
        }>
    >([]);
    const [selectedTemplateId, setSelectedTemplateId] = useState<
        string | undefined
    >(undefined);
    const [productVariants, setProductVariants] = useState<
        Array<{
            name: string;
            sku?: string;
            price?: number;
            stock?: number;
            variation_values: Array<{
                variation_id: number;
                variation_value_id: number;
            }>;
            tempId?: string;
        }>
    >([]);
    const [selectedOptions, setSelectedOptions] = useState<
        Array<{
            option_id: number;
            tempId?: string;
        }>
    >([]);
    const [downloads, setDownloads] = useState<
        Array<{
            file: string;
            tempId?: string;
        }>
    >([]);

    // Downloads için başlangıçta bir boş item ekle
    React.useEffect(() => {
        if (downloads.length === 0) {
            tempIdCounter.current += 1;
            setDownloads([
                {
                    file: '',
                    tempId: `download-${tempIdCounter.current}`,
                },
            ]);
        }
    }, []);

    const sensors = useSensors(
        useSensor(PointerSensor),
        useSensor(KeyboardSensor, {
            coordinateGetter: sortableKeyboardCoordinates,
        }),
    );

    const handleNameChange = (e: React.ChangeEvent<HTMLInputElement>) => {
        const value = e.target.value;
        setData('name', value);

        if (!isSlugManuallyEdited.current) {
            const autoSlug = slugify(value);
            setData('slug', autoSlug);
        }
    };

    // Flatten categories tree for MultiSelect
    const flattenCategories = (
        categories: Category[],
        level = 0,
    ): Array<{ value: string; label: string; searchKey: string }> => {
        const result: Array<{
            value: string;
            label: string;
            searchKey: string;
        }> = [];
        categories.forEach((category) => {
            const prefix = '--'.repeat(level);
            result.push({
                value: String(category.id),
                label: `${prefix}${prefix ? ' ' : ''}${category.name}`,
                searchKey: category.name.toLowerCase(), // Search için temiz değer (prefix olmadan)
            });
            if (category.children && category.children.length > 0) {
                result.push(...flattenCategories(category.children, level + 1));
            }
        });
        return result;
    };

    const categoryOptions = flattenCategories(categories);

    const addAttribute = () => {
        const newAttribute = {
            attribute_id: 0,
            attribute_value_ids: [] as number[],
            tempId: `temp-${Date.now()}-${Math.random()}`,
        };
        setProductAttributes([...productAttributes, newAttribute]);
    };

    const removeAttribute = (index: number) => {
        setProductAttributes(productAttributes.filter((_, i) => i !== index));
    };

    const updateAttribute = (
        index: number,
        field: 'attribute_id' | 'attribute_value_ids',
        value: number | number[],
    ) => {
        const updated = [...productAttributes];
        updated[index] = {
            ...updated[index],
            [field]: value,
            // Eğer attribute_id değiştiyse, attribute_value_ids'i sıfırla
            ...(field === 'attribute_id' && {
                attribute_value_ids: [] as number[],
            }),
        };
        setProductAttributes(updated);
    };

    const handleAttributeDragEnd = (event: DragEndEvent) => {
        const { active, over } = event;

        if (over && active.id !== over.id) {
            setProductAttributes((items) => {
                const oldIndex = items.findIndex(
                    (item) => item.tempId === active.id,
                );
                const newIndex = items.findIndex(
                    (item) => item.tempId === over.id,
                );
                return arrayMove(items, oldIndex, newIndex);
            });
        }
    };

    // Kartezien çarpım - tüm kombinasyonları oluştur
    const generateCombinations = (
        arrays: Array<
            Array<{
                variation_id: number;
                value_id: number;
                label: string;
                template_value_id: number | null;
            }>
        >,
    ): Array<
        Array<{
            variation_id: number;
            value_id: number;
            label: string;
            template_value_id: number | null;
        }>
    > => {
        if (arrays.length === 0) return [];
        if (arrays.length === 1) {
            return arrays[0].map((item) => [item]);
        }

        const [first, ...rest] = arrays;
        const restCombinations = generateCombinations(rest);

        const result: Array<
            Array<{
                variation_id: number;
                value_id: number;
                label: string;
                template_value_id: number | null;
            }>
        > = [];

        for (const item of first) {
            for (const combination of restCombinations) {
                result.push([item, ...combination]);
            }
        }

        return result;
    };

    // Variation değişikliklerinde variant kombinasyonlarını güncelle
    const updateVariantsFromVariations = (
        variationsList: Array<{
            variation_id: number;
            name: string;
            type: 'text' | 'color' | 'image';
            variation_value_ids: number[];
            tempId?: string;
        }>,
    ) => {
        if (variationsList.length === 0) {
            setProductVariants([]);
            return;
        }

        // Her variation için seçilen value'ları hazırla
        // Template'den gelen value'ları kullan (VariationTemplateValue)
        const variationArrays = variationsList
            .filter(
                (v) => v.variation_id > 0 && v.variation_value_ids.length > 0,
            )
            .map((variation) => {
                // Önce variation'ı bul
                const variationData = variations.find(
                    (v) => v.id === variation.variation_id,
                );
                if (!variationData) {
                    return [];
                }

                // Template'i bul (variation name ve type'a göre)
                const template = variationTemplates.find(
                    (t) =>
                        t.name === variationData.name &&
                        t.type === variationData.type,
                );
                if (!template || !template.values) {
                    return [];
                }

                // Template value'larını kullan (VariationTemplateValue)
                return variation.variation_value_ids
                    .map((valueId) => {
                        // Önce variation value'da ara, sonra template value'da ara
                        const variationValue = variationData.values?.find(
                            (v) => v.id === valueId,
                        );
                        const templateValue = template.values?.find(
                            (v) => v.id === valueId,
                        );

                        // Template value'yu tercih et, yoksa variation value'yu kullan
                        const value = templateValue || variationValue;
                        if (!value) return null;

                        return {
                            variation_id: variation.variation_id,
                            value_id: value.id,
                            label: value.label || `Value ${value.id}`,
                            template_value_id: templateValue?.id || null,
                        };
                    })
                    .filter(
                        (
                            item,
                        ): item is {
                            variation_id: number;
                            value_id: number;
                            label: string;
                            template_value_id: number | null;
                        } => item !== null,
                    );
            })
            .filter((arr) => arr.length > 0);

        // Kombinasyonları oluştur
        const combinations = generateCombinations(variationArrays);

        // Her kombinasyon için bir variant oluştur
        const newVariants = combinations.map((combination, idx) => {
            tempIdCounter.current += 1;
            const name = combination.map((c) => c.label).join(' / ');
            const sku = `${data.sku || 'PROD'}-${combination
                .map((c) => c.value_id)
                .join('-')}`;

            return {
                name,
                sku,
                price: 0,
                stock: 0,
                variation_values: combination.map((c) => ({
                    variation_id: c.variation_id,
                    variation_value_id: c.template_value_id || c.value_id,
                    variation_template_id: null, // Template ID'yi bulmak için ek logic gerekebilir
                })),
                tempId: `variant-${tempIdCounter.current}-${idx}`,
            };
        });

        setProductVariants(newVariants);
    };

    const addVariation = (variationId?: number) => {
        tempIdCounter.current += 1;

        if (!variationId || variationId === 0) {
            // Boş variation ekle
            const newVariation = {
                variation_id: 0,
                name: '',
                type: 'text' as 'text' | 'color' | 'image',
                variation_value_ids: [],
                localValues: [],
                tempId: `temp-${tempIdCounter.current}`,
            };
            setProductVariations([...productVariations, newVariation]);
            return;
        }

        // Variation'ı bul
        const variation = variations.find((v) => v.id === variationId);
        if (!variation) {
            return;
        }

        // Variation'dan values'ları al
        const valueIds = variation.values?.map((v) => v.id) || [];

        // Variation'dan values'ları localValues formatına çevir
        const localValues =
            variation.values?.map((v, idx) => {
                tempIdCounter.current += 1;
                return {
                    label: v.label || '',
                    value: v.value || '',
                    color: v.color || '',
                    image: v.image || '',
                    sort_order: idx,
                    tempId: `value-${tempIdCounter.current}`,
                };
            }) || [];

        const newVariation = {
            variation_id: variationId,
            name: variation.name,
            type: variation.type as 'text' | 'color' | 'image',
            variation_value_ids: valueIds,
            localValues: localValues,
            tempId: `temp-${tempIdCounter.current}`,
        };
        const updatedVariations = [...productVariations, newVariation];
        setProductVariations(updatedVariations);

        // Variant kombinasyonlarını güncelle
        updateVariantsFromVariations(updatedVariations);

        // Template seçimini sıfırla
        setSelectedTemplateId(undefined);
    };

    const removeVariation = (index: number) => {
        const updatedVariations = productVariations.filter(
            (_, i) => i !== index,
        );
        setProductVariations(updatedVariations);

        // Variant kombinasyonlarını güncelle
        updateVariantsFromVariations(updatedVariations);
    };

    const addVariationValue = (variationIndex: number) => {
        const updated = [...productVariations];
        const localValues = updated[variationIndex].localValues || [];
        tempIdCounter.current += 1;

        const newValue = {
            label: '',
            value: '',
            color: '',
            image: '',
            sort_order: localValues.length,
            tempId: `value-${tempIdCounter.current}`,
        };

        updated[variationIndex] = {
            ...updated[variationIndex],
            localValues: [...localValues, newValue],
        };

        setProductVariations(updated);
    };

    const removeVariationValue = (
        variationIndex: number,
        valueIndex: number,
    ) => {
        const updated = [...productVariations];
        const localValues = updated[variationIndex].localValues || [];

        updated[variationIndex] = {
            ...updated[variationIndex],
            localValues: localValues.filter((_, i) => i !== valueIndex),
        };

        setProductVariations(updated);
    };

    const updateVariationValue = (
        variationIndex: number,
        valueIndex: number,
        field: 'label' | 'value' | 'color' | 'image',
        value: string,
    ) => {
        const updated = [...productVariations];
        const localValues = [...(updated[variationIndex].localValues || [])];

        localValues[valueIndex] = {
            ...localValues[valueIndex],
            [field]: value,
        };

        updated[variationIndex] = {
            ...updated[variationIndex],
            localValues,
        };

        setProductVariations(updated);
    };

    const handleVariationValueDragEnd = (
        variationIndex: number,
        event: DragEndEvent,
    ) => {
        const { active, over } = event;

        if (over && active.id !== over.id) {
            const updated = [...productVariations];
            const localValues = [
                ...(updated[variationIndex].localValues || []),
            ];

            const oldIndex = localValues.findIndex(
                (item) => item.tempId === active.id,
            );
            const newIndex = localValues.findIndex(
                (item) => item.tempId === over.id,
            );

            updated[variationIndex] = {
                ...updated[variationIndex],
                localValues: arrayMove(localValues, oldIndex, newIndex).map(
                    (v, idx) => ({
                        ...v,
                        sort_order: idx,
                    }),
                ),
            };

            setProductVariations(updated);
        }
    };

    const updateVariation = (
        index: number,
        field: 'variation_id' | 'variation_value_ids' | 'name' | 'type',
        value: number | number[] | string,
    ) => {
        const updated = [...productVariations];

        if (field === 'variation_id') {
            const variationData = variations.find(
                (v) => v.id === (value as number),
            );
            // Variation değişince name ve type'ı güncelle, ama sadece boşsa
            const newName = variationData?.name || updated[index].name || '';
            const newType =
                (variationData?.type as 'text' | 'color' | 'image') ||
                updated[index].type ||
                'text';

            updated[index] = {
                ...updated[index],
                variation_id: value as number,
                name: updated[index].name || newName,
                type: updated[index].type || newType,
                variation_value_ids:
                    variationData?.values?.map((v) => v.id) || [], // Variation'dan values'ları al
            };
        } else {
            updated[index] = {
                ...updated[index],
                [field]: value,
            };
        }

        setProductVariations(updated);

        // Variant kombinasyonlarını güncelle
        updateVariantsFromVariations(updated);
    };

    const handleVariationDragEnd = (event: DragEndEvent) => {
        const { active, over } = event;

        if (over && active.id !== over.id) {
            setProductVariations((items) => {
                const oldIndex = items.findIndex(
                    (item) => item.tempId === active.id,
                );
                const newIndex = items.findIndex(
                    (item) => item.tempId === over.id,
                );
                return arrayMove(items, oldIndex, newIndex);
            });
        }
    };

    const addOption = () => {
        const newOption = {
            option_id: 0,
            tempId: `temp-${Date.now()}-${Math.random()}`,
        };
        setSelectedOptions([...selectedOptions, newOption]);
    };

    const removeOption = (index: number) => {
        setSelectedOptions(selectedOptions.filter((_, i) => i !== index));
    };

    const addDownload = () => {
        const newDownload = {
            file: '',
            tempId: `temp-${Date.now()}-${Math.random()}`,
        };
        setDownloads([...downloads, newDownload]);
    };

    const removeDownload = (index: number) => {
        setDownloads(downloads.filter((_, i) => i !== index));
    };

    const handleSubmit = (e: React.FormEvent) => {
        e.preventDefault();

        // Form data'yı setData ile güncelle
        setData(
            'attributes',
            productAttributes.map((attr) => ({
                attribute_id: attr.attribute_id,
                attribute_value_ids: attr.attribute_value_ids,
            })),
        );
        setData(
            'variation_ids',
            productVariations.map((variation) => ({
                variation_id: variation.variation_id,
                variation_value_ids: variation.variation_value_ids,
            })),
        );
        setData(
            'variants',
            productVariants.map((variant) => ({
                name: variant.name,
                sku: variant.sku,
                price: variant.price,
                stock: variant.stock,
                variation_values: variant.variation_values,
            })),
        );
        setData(
            'option_ids',
            selectedOptions.map((opt) => opt.option_id),
        );
        setData(
            'downloads',
            downloads.map((dl) => ({
                file: dl.file,
            })),
        );

        // Form submit'i tetikle
        post(store().url);
    };

    return (
        <AppLayout breadcrumbs={breadcrumbs}>
            <Head title="Yeni Ürün" />

            <div className="flex-1 space-y-6 p-6">
                <div className="flex items-center justify-between">
                    <div>
                        <h1 className="text-3xl font-bold tracking-tight">
                            Yeni Ürün
                        </h1>
                        <p className="mt-1 text-muted-foreground">
                            Yeni bir ürün oluşturun
                        </p>
                    </div>
                    <Link href={index()}>
                        <Button variant="outline">
                            <ArrowLeft className="mr-2 h-4 w-4" />
                            Geri Dön
                        </Button>
                    </Link>
                </div>

                <form onSubmit={handleSubmit} className="space-y-6">
                    <div className="grid grid-cols-12 gap-6">
                        {/* Sol Sütun - 8 kolon */}
                        <div className="col-span-12 space-y-6 lg:col-span-8">
                            {/* General */}
                            <Card>
                                <CardHeader>
                                    <CardTitle>General</CardTitle>
                                </CardHeader>
                                <CardContent className="space-y-4">
                                    <div className="space-y-2">
                                        <Label htmlFor="name">
                                            Name{' '}
                                            <span className="text-red-500">
                                                *
                                            </span>
                                        </Label>
                                        <Input
                                            id="name"
                                            value={data.name}
                                            onChange={handleNameChange}
                                            placeholder="Ürün adı"
                                        />
                                        <InputError message={errors.name} />
                                    </div>

                                    <div className="space-y-2">
                                        <Label htmlFor="description">
                                            Description{' '}
                                            <span className="text-red-500">
                                                *
                                            </span>
                                        </Label>
                                        <Textarea
                                            id="description"
                                            value={data.description}
                                            onChange={(e) =>
                                                setData(
                                                    'description',
                                                    e.target.value,
                                                )
                                            }
                                            placeholder="Ürün açıklaması"
                                            rows={10}
                                        />
                                        <InputError
                                            message={errors.description}
                                        />
                                    </div>

                                    <div className="grid grid-cols-2 gap-4">
                                        <div className="space-y-2">
                                            <Label htmlFor="brand_id">
                                                Brand
                                            </Label>
                                            <Combobox
                                                options={
                                                    brands && brands.length > 0
                                                        ? brands
                                                              .filter(
                                                                  (brand) =>
                                                                      brand.id !=
                                                                          null &&
                                                                      brand.id !==
                                                                          undefined,
                                                              )
                                                              .map((brand) => ({
                                                                  value: String(
                                                                      brand.id,
                                                                  ),
                                                                  label: brand.name,
                                                              }))
                                                              .filter(
                                                                  (opt) =>
                                                                      opt.value &&
                                                                      opt.value.trim() !==
                                                                          '',
                                                              )
                                                        : []
                                                }
                                                value={
                                                    data.brand_id
                                                        ? String(data.brand_id)
                                                        : undefined
                                                }
                                                onValueChange={(value) =>
                                                    setData(
                                                        'brand_id',
                                                        value && value !== ''
                                                            ? Number(value)
                                                            : null,
                                                    )
                                                }
                                                placeholder="Please Select"
                                                searchPlaceholder="Search brands..."
                                                emptyMessage="No brands found."
                                            />
                                            <InputError
                                                message={errors.brand_id}
                                            />
                                        </div>

                                        <div className="space-y-2">
                                            <Label htmlFor="tax_class_id">
                                                Tax Class
                                            </Label>
                                            <Combobox
                                                options={
                                                    taxClasses &&
                                                    taxClasses.length > 0
                                                        ? taxClasses
                                                              .filter(
                                                                  (taxClass) =>
                                                                      taxClass.id !=
                                                                          null &&
                                                                      taxClass.id !==
                                                                          undefined,
                                                              )
                                                              .map(
                                                                  (
                                                                      taxClass,
                                                                  ) => ({
                                                                      value: String(
                                                                          taxClass.id,
                                                                      ),
                                                                      label: taxClass.name,
                                                                  }),
                                                              )
                                                              .filter(
                                                                  (opt) =>
                                                                      opt.value &&
                                                                      opt.value.trim() !==
                                                                          '',
                                                              )
                                                        : []
                                                }
                                                value={
                                                    data.tax_class_id
                                                        ? String(
                                                              data.tax_class_id,
                                                          )
                                                        : undefined
                                                }
                                                onValueChange={(value) =>
                                                    setData(
                                                        'tax_class_id',
                                                        value && value !== ''
                                                            ? Number(value)
                                                            : null,
                                                    )
                                                }
                                                placeholder="Please Select"
                                                searchPlaceholder="Search tax classes..."
                                                emptyMessage="No tax classes found."
                                            />
                                            <InputError
                                                message={errors.tax_class_id}
                                            />
                                        </div>
                                    </div>

                                    <div className="space-y-2">
                                        <Label htmlFor="categories">
                                            Categories
                                        </Label>
                                        <MultiSelect
                                            options={categoryOptions}
                                            selected={selectedCategories.map(
                                                (id) => String(id),
                                            )}
                                            onSelectionChange={(selected) =>
                                                setSelectedCategories(
                                                    selected.map((id) =>
                                                        Number(id),
                                                    ),
                                                )
                                            }
                                            placeholder="Select categories..."
                                            searchPlaceholder="Search categories..."
                                            emptyMessage="No categories found."
                                            maxDisplay={3}
                                        />
                                        <InputError
                                            message={errors.category_ids}
                                        />
                                    </div>

                                    <div className="space-y-2">
                                        <Label htmlFor="tags">Tags</Label>
                                        <MultiSelect
                                            options={tags.map((tag) => ({
                                                value: String(tag.id),
                                                label: tag.name,
                                            }))}
                                            selected={selectedTags.map((id) =>
                                                String(id),
                                            )}
                                            onSelectionChange={(selected) => {
                                                const newTags = selected.map(
                                                    (id) => Number(id),
                                                );
                                                setSelectedTags(newTags);
                                                setData('tag_ids', newTags);
                                            }}
                                            placeholder="Select tags..."
                                            searchPlaceholder="Search tags..."
                                            emptyMessage="No tags found."
                                            maxDisplay={3}
                                        />
                                        <InputError message={errors.tag_ids} />
                                    </div>

                                    <div className="flex items-center space-x-2">
                                        <Checkbox
                                            id="is_virtual"
                                            checked={data.is_virtual}
                                            onCheckedChange={(checked) =>
                                                setData(
                                                    'is_virtual',
                                                    checked === true,
                                                )
                                            }
                                        />
                                        <Label htmlFor="is_virtual">
                                            Virtual
                                        </Label>
                                        <span className="ml-2 text-sm text-muted-foreground">
                                            The product won't be shipped
                                        </span>
                                    </div>

                                    <div className="flex items-center space-x-2">
                                        <Checkbox
                                            id="is_active"
                                            checked={
                                                data.status === 'published'
                                            }
                                            onCheckedChange={(checked) =>
                                                setData(
                                                    'status',
                                                    checked
                                                        ? 'published'
                                                        : 'draft',
                                                )
                                            }
                                        />
                                        <Label htmlFor="is_active">
                                            Status
                                        </Label>
                                        <span className="ml-2 text-sm text-muted-foreground">
                                            Enable the product
                                        </span>
                                    </div>
                                </CardContent>
                            </Card>

                            {/* Attributes */}
                            <Card>
                                <CardHeader>
                                    <CardTitle>Attributes</CardTitle>
                                </CardHeader>
                                <CardContent className="space-y-4">
                                    <DndContext
                                        sensors={sensors}
                                        collisionDetection={closestCenter}
                                        onDragEnd={handleAttributeDragEnd}
                                    >
                                        <SortableContext
                                            items={productAttributes
                                                .map((attr) => attr.tempId)
                                                .filter((id): id is string =>
                                                    Boolean(id && id !== ''),
                                                )}
                                            strategy={
                                                verticalListSortingStrategy
                                            }
                                        >
                                            <Table>
                                                <TableHeader>
                                                    <TableRow>
                                                        <TableHead className="w-12"></TableHead>
                                                        <TableHead>
                                                            Attribute
                                                        </TableHead>
                                                        <TableHead>
                                                            Values
                                                        </TableHead>
                                                        <TableHead className="w-12"></TableHead>
                                                    </TableRow>
                                                </TableHeader>
                                                <TableBody>
                                                    {productAttributes.map(
                                                        (attr, index) => (
                                                            <SortableTableRow
                                                                key={
                                                                    attr.tempId ||
                                                                    `attr-${index}`
                                                                }
                                                                id={
                                                                    attr.tempId ||
                                                                    `attr-${index}`
                                                                }
                                                            >
                                                                <TableCell>
                                                                    <Combobox
                                                                        options={
                                                                            attributes &&
                                                                            attributes.length >
                                                                                0
                                                                                ? attributes
                                                                                      .filter(
                                                                                          (
                                                                                              attribute,
                                                                                          ) =>
                                                                                              attribute.id !=
                                                                                                  null &&
                                                                                              attribute.id !==
                                                                                                  undefined,
                                                                                      )
                                                                                      .map(
                                                                                          (
                                                                                              attribute,
                                                                                          ) => ({
                                                                                              value: String(
                                                                                                  attribute.id,
                                                                                              ),
                                                                                              label: attribute.name,
                                                                                              group:
                                                                                                  attribute
                                                                                                      .attributeSet
                                                                                                      ?.name ||
                                                                                                  'Other',
                                                                                          }),
                                                                                      )
                                                                                      .filter(
                                                                                          (
                                                                                              opt,
                                                                                          ) =>
                                                                                              opt.value &&
                                                                                              opt.value.trim() !==
                                                                                                  '',
                                                                                      )
                                                                                : []
                                                                        }
                                                                        value={
                                                                            attr.attribute_id &&
                                                                            attr.attribute_id >
                                                                                0
                                                                                ? String(
                                                                                      attr.attribute_id,
                                                                                  )
                                                                                : undefined
                                                                        }
                                                                        onValueChange={(
                                                                            value,
                                                                        ) =>
                                                                            updateAttribute(
                                                                                index,
                                                                                'attribute_id',
                                                                                value &&
                                                                                    value !==
                                                                                        ''
                                                                                    ? Number(
                                                                                          value,
                                                                                      )
                                                                                    : 0,
                                                                            )
                                                                        }
                                                                        placeholder="Please Select"
                                                                        searchPlaceholder="Search attributes..."
                                                                        emptyMessage="No attributes found."
                                                                    />
                                                                </TableCell>
                                                                <TableCell>
                                                                    {(() => {
                                                                        const selectedAttribute =
                                                                            attributes.find(
                                                                                (
                                                                                    a,
                                                                                ) =>
                                                                                    a.id ===
                                                                                    attr.attribute_id,
                                                                            );
                                                                        if (
                                                                            !selectedAttribute
                                                                        ) {
                                                                            return (
                                                                                <span className="text-sm text-muted-foreground">
                                                                                    Select
                                                                                    an
                                                                                    attribute
                                                                                    first
                                                                                </span>
                                                                            );
                                                                        }
                                                                        const selectedValues =
                                                                            selectedAttribute.values.filter(
                                                                                (
                                                                                    v,
                                                                                ) =>
                                                                                    attr.attribute_value_ids.includes(
                                                                                        v.id,
                                                                                    ),
                                                                            );
                                                                        return (
                                                                            <Popover>
                                                                                <PopoverTrigger
                                                                                    asChild
                                                                                >
                                                                                    <Button
                                                                                        variant="outline"
                                                                                        className="w-full justify-start text-left font-normal"
                                                                                    >
                                                                                        {selectedValues.length >
                                                                                        0
                                                                                            ? `${selectedValues.length} selected`
                                                                                            : 'Select values'}
                                                                                    </Button>
                                                                                </PopoverTrigger>
                                                                                <PopoverContent
                                                                                    className="w-[300px] p-0"
                                                                                    align="start"
                                                                                >
                                                                                    <div className="max-h-64 overflow-y-auto p-2">
                                                                                        {selectedAttribute.values.map(
                                                                                            (
                                                                                                value,
                                                                                            ) => (
                                                                                                <div
                                                                                                    key={
                                                                                                        value.id
                                                                                                    }
                                                                                                    className="flex items-center space-x-2 rounded-sm px-2 py-1.5 hover:bg-accent"
                                                                                                >
                                                                                                    <Checkbox
                                                                                                        id={`attr-value-${index}-${value.id}`}
                                                                                                        checked={attr.attribute_value_ids.includes(
                                                                                                            value.id,
                                                                                                        )}
                                                                                                        onCheckedChange={(
                                                                                                            checked,
                                                                                                        ) => {
                                                                                                            const currentIds =
                                                                                                                attr.attribute_value_ids;
                                                                                                            const newIds =
                                                                                                                checked
                                                                                                                    ? [
                                                                                                                          ...currentIds,
                                                                                                                          value.id,
                                                                                                                      ]
                                                                                                                    : currentIds.filter(
                                                                                                                          (
                                                                                                                              id,
                                                                                                                          ) =>
                                                                                                                              id !==
                                                                                                                              value.id,
                                                                                                                      );
                                                                                                            updateAttribute(
                                                                                                                index,
                                                                                                                'attribute_value_ids',
                                                                                                                newIds,
                                                                                                            );
                                                                                                        }}
                                                                                                    />
                                                                                                    <Label
                                                                                                        htmlFor={`attr-value-${index}-${value.id}`}
                                                                                                        className="flex-1 cursor-pointer text-sm font-normal"
                                                                                                    >
                                                                                                        {value.value ||
                                                                                                            `Value ${value.id}`}
                                                                                                    </Label>
                                                                                                </div>
                                                                                            ),
                                                                                        )}
                                                                                    </div>
                                                                                </PopoverContent>
                                                                            </Popover>
                                                                        );
                                                                    })()}
                                                                </TableCell>
                                                                <TableCell>
                                                                    <Button
                                                                        type="button"
                                                                        variant="ghost"
                                                                        size="icon"
                                                                        onClick={() =>
                                                                            removeAttribute(
                                                                                index,
                                                                            )
                                                                        }
                                                                    >
                                                                        <Trash2 className="h-4 w-4" />
                                                                    </Button>
                                                                </TableCell>
                                                            </SortableTableRow>
                                                        ),
                                                    )}
                                                </TableBody>
                                            </Table>
                                        </SortableContext>
                                    </DndContext>
                                    <Button
                                        type="button"
                                        variant="outline"
                                        onClick={addAttribute}
                                    >
                                        <Plus className="mr-2 h-4 w-4" />
                                        Add Attribute
                                    </Button>
                                </CardContent>
                            </Card>

                            {/* Variations */}
                            <Card>
                                <CardHeader>
                                    <CardTitle>Variations</CardTitle>
                                </CardHeader>
                                <CardContent className="space-y-4">
                                    <DndContext
                                        sensors={sensors}
                                        collisionDetection={closestCenter}
                                        onDragEnd={handleVariationDragEnd}
                                    >
                                        <SortableContext
                                            items={productVariations
                                                .map(
                                                    (variation) =>
                                                        variation.tempId,
                                                )
                                                .filter((id): id is string =>
                                                    Boolean(id && id !== ''),
                                                )}
                                            strategy={
                                                verticalListSortingStrategy
                                            }
                                        >
                                            {productVariations.map(
                                                (variation, index) => {
                                                    const variationData =
                                                        variations.find(
                                                            (v) =>
                                                                v.id ===
                                                                variation.variation_id,
                                                        );

                                                    return (
                                                        <Collapsible
                                                            key={
                                                                variation.tempId ||
                                                                index
                                                            }
                                                            defaultOpen
                                                            className="mb-4"
                                                        >
                                                            <Card>
                                                                <CardHeader>
                                                                    <div className="flex items-center justify-between">
                                                                        <CollapsibleTrigger
                                                                            asChild
                                                                        >
                                                                            <Button
                                                                                variant="ghost"
                                                                                className="flex items-center space-x-2"
                                                                            >
                                                                                <GripVertical className="h-4 w-4 text-muted-foreground" />
                                                                                <span>
                                                                                    {variation.name ||
                                                                                        variationData?.name ||
                                                                                        'New Variation'}
                                                                                </span>
                                                                                <ChevronDown className="h-4 w-4" />
                                                                            </Button>
                                                                        </CollapsibleTrigger>
                                                                        <Button
                                                                            type="button"
                                                                            variant="ghost"
                                                                            size="icon"
                                                                            onClick={() =>
                                                                                removeVariation(
                                                                                    index,
                                                                                )
                                                                            }
                                                                        >
                                                                            <Trash2 className="h-4 w-4" />
                                                                        </Button>
                                                                    </div>
                                                                </CardHeader>
                                                                <CollapsibleContent>
                                                                    <CardContent className="space-y-4">
                                                                        <div className="grid grid-cols-2 gap-4">
                                                                            <div className="space-y-2">
                                                                                <Label>
                                                                                    Name{' '}
                                                                                    <span className="text-red-500">
                                                                                        *
                                                                                    </span>
                                                                                </Label>
                                                                                <Input
                                                                                    value={
                                                                                        variation.name ||
                                                                                        ''
                                                                                    }
                                                                                    onChange={(
                                                                                        e,
                                                                                    ) =>
                                                                                        updateVariation(
                                                                                            index,
                                                                                            'name',
                                                                                            e
                                                                                                .target
                                                                                                .value,
                                                                                        )
                                                                                    }
                                                                                    placeholder="Variation name"
                                                                                />
                                                                            </div>
                                                                            <div className="space-y-2">
                                                                                <Label>
                                                                                    Type{' '}
                                                                                    <span className="text-red-500">
                                                                                        *
                                                                                    </span>
                                                                                </Label>
                                                                                <Select
                                                                                    value={
                                                                                        variation.type ||
                                                                                        'text'
                                                                                    }
                                                                                    onValueChange={(
                                                                                        value,
                                                                                    ) =>
                                                                                        updateVariation(
                                                                                            index,
                                                                                            'type',
                                                                                            value as
                                                                                                | 'text'
                                                                                                | 'color'
                                                                                                | 'image',
                                                                                        )
                                                                                    }
                                                                                >
                                                                                    <SelectTrigger>
                                                                                        <SelectValue placeholder="Select type" />
                                                                                    </SelectTrigger>
                                                                                    <SelectContent>
                                                                                        <SelectItem value="text">
                                                                                            Text
                                                                                        </SelectItem>
                                                                                        <SelectItem value="color">
                                                                                            Color
                                                                                        </SelectItem>
                                                                                        <SelectItem value="image">
                                                                                            Image
                                                                                        </SelectItem>
                                                                                    </SelectContent>
                                                                                </Select>
                                                                            </div>
                                                                        </div>
                                                                        <div className="space-y-2">
                                                                            <div className="flex items-center justify-between">
                                                                                <Label>
                                                                                    Values
                                                                                </Label>
                                                                                <Button
                                                                                    type="button"
                                                                                    variant="outline"
                                                                                    size="sm"
                                                                                    onClick={() =>
                                                                                        addVariationValue(
                                                                                            index,
                                                                                        )
                                                                                    }
                                                                                >
                                                                                    <Plus className="mr-2 h-4 w-4" />
                                                                                    Satır
                                                                                    Ekle
                                                                                </Button>
                                                                            </div>
                                                                            {variation.localValues &&
                                                                            variation
                                                                                .localValues
                                                                                .length >
                                                                                0 ? (
                                                                                <div className="overflow-x-auto">
                                                                                    <DndContext
                                                                                        sensors={
                                                                                            sensors
                                                                                        }
                                                                                        collisionDetection={
                                                                                            closestCenter
                                                                                        }
                                                                                        onDragEnd={(
                                                                                            e,
                                                                                        ) =>
                                                                                            handleVariationValueDragEnd(
                                                                                                index,
                                                                                                e,
                                                                                            )
                                                                                        }
                                                                                    >
                                                                                        <Table>
                                                                                            <TableHeader>
                                                                                                <TableRow>
                                                                                                    <TableHead className="w-12"></TableHead>
                                                                                                    <TableHead>
                                                                                                        Label{' '}
                                                                                                        <span className="text-red-500">
                                                                                                            *
                                                                                                        </span>
                                                                                                    </TableHead>
                                                                                                    {variation.type ===
                                                                                                        'color' && (
                                                                                                        <TableHead>
                                                                                                            Color
                                                                                                        </TableHead>
                                                                                                    )}
                                                                                                    {variation.type ===
                                                                                                        'image' && (
                                                                                                        <TableHead>
                                                                                                            Image
                                                                                                        </TableHead>
                                                                                                    )}
                                                                                                    <TableHead className="w-12"></TableHead>
                                                                                                </TableRow>
                                                                                            </TableHeader>
                                                                                            <TableBody>
                                                                                                <SortableContext
                                                                                                    items={variation.localValues.map(
                                                                                                        (
                                                                                                            v,
                                                                                                        ) =>
                                                                                                            v.tempId ||
                                                                                                            '',
                                                                                                    )}
                                                                                                    strategy={
                                                                                                        verticalListSortingStrategy
                                                                                                    }
                                                                                                >
                                                                                                    {variation.localValues.map(
                                                                                                        (
                                                                                                            value,
                                                                                                            valueIndex,
                                                                                                        ) => (
                                                                                                            <SortableTableRow
                                                                                                                key={
                                                                                                                    value.tempId ||
                                                                                                                    valueIndex
                                                                                                                }
                                                                                                                id={
                                                                                                                    value.tempId ||
                                                                                                                    String(
                                                                                                                        valueIndex,
                                                                                                                    )
                                                                                                                }
                                                                                                            >
                                                                                                                <TableCell>
                                                                                                                    <Input
                                                                                                                        value={
                                                                                                                            value.label
                                                                                                                        }
                                                                                                                        onChange={(
                                                                                                                            e,
                                                                                                                        ) =>
                                                                                                                            updateVariationValue(
                                                                                                                                index,
                                                                                                                                valueIndex,
                                                                                                                                'label',
                                                                                                                                e
                                                                                                                                    .target
                                                                                                                                    .value,
                                                                                                                            )
                                                                                                                        }
                                                                                                                        placeholder={
                                                                                                                            variation.type ===
                                                                                                                            'color'
                                                                                                                                ? 'Örn: Mavi'
                                                                                                                                : variation.type ===
                                                                                                                                    'image'
                                                                                                                                  ? 'Örn: Kırmızı'
                                                                                                                                  : 'Örn: XS, S, M, L, XL'
                                                                                                                        }
                                                                                                                        className="w-full"
                                                                                                                    />
                                                                                                                </TableCell>
                                                                                                                {variation.type ===
                                                                                                                    'color' && (
                                                                                                                    <TableCell>
                                                                                                                        <div className="flex gap-2">
                                                                                                                            <Input
                                                                                                                                type="color"
                                                                                                                                value={
                                                                                                                                    value.color ||
                                                                                                                                    '#000000'
                                                                                                                                }
                                                                                                                                onChange={(
                                                                                                                                    e,
                                                                                                                                ) =>
                                                                                                                                    updateVariationValue(
                                                                                                                                        index,
                                                                                                                                        valueIndex,
                                                                                                                                        'color',
                                                                                                                                        e
                                                                                                                                            .target
                                                                                                                                            .value,
                                                                                                                                    )
                                                                                                                                }
                                                                                                                                className="h-10 w-20"
                                                                                                                            />
                                                                                                                            <Input
                                                                                                                                value={
                                                                                                                                    value.color ||
                                                                                                                                    ''
                                                                                                                                }
                                                                                                                                onChange={(
                                                                                                                                    e,
                                                                                                                                ) =>
                                                                                                                                    updateVariationValue(
                                                                                                                                        index,
                                                                                                                                        valueIndex,
                                                                                                                                        'color',
                                                                                                                                        e
                                                                                                                                            .target
                                                                                                                                            .value,
                                                                                                                                    )
                                                                                                                                }
                                                                                                                                placeholder="#000000"
                                                                                                                                maxLength={
                                                                                                                                    7
                                                                                                                                }
                                                                                                                                className="flex-1"
                                                                                                                            />
                                                                                                                        </div>
                                                                                                                    </TableCell>
                                                                                                                )}
                                                                                                                {variation.type ===
                                                                                                                    'image' && (
                                                                                                                    <TableCell>
                                                                                                                        <Input
                                                                                                                            type="file"
                                                                                                                            accept="image/*"
                                                                                                                            onChange={(
                                                                                                                                e,
                                                                                                                            ) => {
                                                                                                                                const file =
                                                                                                                                    e
                                                                                                                                        .target
                                                                                                                                        .files?.[0];
                                                                                                                                if (
                                                                                                                                    file
                                                                                                                                ) {
                                                                                                                                    const formData =
                                                                                                                                        new FormData();
                                                                                                                                    formData.append(
                                                                                                                                        'image',
                                                                                                                                        file,
                                                                                                                                    );

                                                                                                                                    fetch(
                                                                                                                                        '/admin/variations/upload-image',
                                                                                                                                        {
                                                                                                                                            method: 'POST',
                                                                                                                                            headers:
                                                                                                                                                {
                                                                                                                                                    'X-CSRF-TOKEN':
                                                                                                                                                        document
                                                                                                                                                            .querySelector(
                                                                                                                                                                'meta[name="csrf-token"]',
                                                                                                                                                            )
                                                                                                                                                            ?.getAttribute(
                                                                                                                                                                'content',
                                                                                                                                                            ) ||
                                                                                                                                                        '',
                                                                                                                                                },
                                                                                                                                            body: formData,
                                                                                                                                        },
                                                                                                                                    )
                                                                                                                                        .then(
                                                                                                                                            (
                                                                                                                                                response,
                                                                                                                                            ) =>
                                                                                                                                                response.json(),
                                                                                                                                        )
                                                                                                                                        .then(
                                                                                                                                            (
                                                                                                                                                data,
                                                                                                                                            ) => {
                                                                                                                                                if (
                                                                                                                                                    data.path
                                                                                                                                                ) {
                                                                                                                                                    updateVariationValue(
                                                                                                                                                        index,
                                                                                                                                                        valueIndex,
                                                                                                                                                        'image',
                                                                                                                                                        data.path,
                                                                                                                                                    );
                                                                                                                                                }
                                                                                                                                            },
                                                                                                                                        )
                                                                                                                                        .catch(
                                                                                                                                            (
                                                                                                                                                error,
                                                                                                                                            ) => {
                                                                                                                                                console.error(
                                                                                                                                                    'Upload error:',
                                                                                                                                                    error,
                                                                                                                                                );
                                                                                                                                            },
                                                                                                                                        );
                                                                                                                                }
                                                                                                                            }}
                                                                                                                            className="w-full"
                                                                                                                        />
                                                                                                                        {value.image && (
                                                                                                                            <div className="mt-2">
                                                                                                                                <img
                                                                                                                                    src={
                                                                                                                                        value.image.startsWith(
                                                                                                                                            'http',
                                                                                                                                        ) ||
                                                                                                                                        value.image.startsWith(
                                                                                                                                            '/',
                                                                                                                                        )
                                                                                                                                            ? value.image
                                                                                                                                            : `/storage/variations/${value.image}`
                                                                                                                                    }
                                                                                                                                    alt="Preview"
                                                                                                                                    className="h-16 w-16 rounded border object-cover"
                                                                                                                                />
                                                                                                                            </div>
                                                                                                                        )}
                                                                                                                    </TableCell>
                                                                                                                )}
                                                                                                                <TableCell className="text-center">
                                                                                                                    <Button
                                                                                                                        type="button"
                                                                                                                        variant="ghost"
                                                                                                                        size="sm"
                                                                                                                        onClick={() =>
                                                                                                                            removeVariationValue(
                                                                                                                                index,
                                                                                                                                valueIndex,
                                                                                                                            )
                                                                                                                        }
                                                                                                                    >
                                                                                                                        <Trash2 className="h-4 w-4 text-destructive" />
                                                                                                                    </Button>
                                                                                                                </TableCell>
                                                                                                            </SortableTableRow>
                                                                                                        ),
                                                                                                    )}
                                                                                                </SortableContext>
                                                                                            </TableBody>
                                                                                        </Table>
                                                                                    </DndContext>
                                                                                </div>
                                                                            ) : (
                                                                                <div className="py-8 text-center text-sm text-muted-foreground">
                                                                                    Henüz
                                                                                    değer
                                                                                    eklenmemiş.
                                                                                    Değer
                                                                                    eklemek
                                                                                    için
                                                                                    yukarıdaki
                                                                                    butonu
                                                                                    kullanın.
                                                                                </div>
                                                                            )}
                                                                        </div>
                                                                    </CardContent>
                                                                </CollapsibleContent>
                                                            </Card>
                                                        </Collapsible>
                                                    );
                                                },
                                            )}
                                        </SortableContext>
                                    </DndContext>
                                    <div className="flex items-center gap-2">
                                        <Button
                                            type="button"
                                            variant="outline"
                                            onClick={() => addVariation()}
                                        >
                                            <Plus className="mr-2 h-4 w-4" />
                                            Add Variation
                                        </Button>
                                        <Combobox
                                            options={
                                                variations &&
                                                variations.length > 0
                                                    ? variations
                                                          .filter(
                                                              (v) =>
                                                                  v.id !=
                                                                      null &&
                                                                  v.id !==
                                                                      undefined,
                                                          )
                                                          .map((variation) => ({
                                                              value: String(
                                                                  variation.id,
                                                              ),
                                                              label: variation.name,
                                                          }))
                                                          .filter(
                                                              (opt) =>
                                                                  opt.value &&
                                                                  opt.value.trim() !==
                                                                      '',
                                                          )
                                                    : []
                                            }
                                            value={selectedTemplateId}
                                            onValueChange={(value) => {
                                                setSelectedTemplateId(
                                                    value && value !== ''
                                                        ? value
                                                        : undefined,
                                                );
                                            }}
                                            placeholder="Select Variation"
                                            searchPlaceholder="Search variations..."
                                            emptyMessage="No variations found."
                                        />
                                        <Button
                                            type="button"
                                            variant="outline"
                                            onClick={() => {
                                                if (
                                                    selectedTemplateId &&
                                                    selectedTemplateId !== ''
                                                ) {
                                                    addVariation(
                                                        Number(
                                                            selectedTemplateId,
                                                        ),
                                                    );
                                                } else {
                                                    addVariation();
                                                }
                                            }}
                                        >
                                            Insert
                                        </Button>
                                    </div>
                                </CardContent>
                            </Card>

                            {/* Variants */}
                            <Card>
                                <CardHeader>
                                    <CardTitle>Variants</CardTitle>
                                </CardHeader>
                                <CardContent>
                                    {productVariants.length > 0 ? (
                                        <div className="space-y-4">
                                            <div className="text-sm text-muted-foreground">
                                                {productVariants.length} variant
                                                oluşturuldu
                                            </div>
                                            <Table>
                                                <TableHeader>
                                                    <TableRow>
                                                        <TableHead>
                                                            Name
                                                        </TableHead>
                                                        <TableHead>
                                                            SKU
                                                        </TableHead>
                                                        <TableHead>
                                                            Price
                                                        </TableHead>
                                                        <TableHead>
                                                            Stock
                                                        </TableHead>
                                                        <TableHead className="w-12"></TableHead>
                                                    </TableRow>
                                                </TableHeader>
                                                <TableBody>
                                                    {productVariants.map(
                                                        (variant, index) => (
                                                            <TableRow
                                                                key={
                                                                    variant.tempId ||
                                                                    `variant-${index}`
                                                                }
                                                            >
                                                                <TableCell>
                                                                    {
                                                                        variant.name
                                                                    }
                                                                </TableCell>
                                                                <TableCell>
                                                                    <Input
                                                                        value={
                                                                            variant.sku ||
                                                                            ''
                                                                        }
                                                                        onChange={(
                                                                            e,
                                                                        ) => {
                                                                            const updated =
                                                                                [
                                                                                    ...productVariants,
                                                                                ];
                                                                            updated[
                                                                                index
                                                                            ] =
                                                                                {
                                                                                    ...updated[
                                                                                        index
                                                                                    ],
                                                                                    sku: e
                                                                                        .target
                                                                                        .value,
                                                                                };
                                                                            setProductVariants(
                                                                                updated,
                                                                            );
                                                                        }}
                                                                        placeholder="SKU"
                                                                    />
                                                                </TableCell>
                                                                <TableCell>
                                                                    <Input
                                                                        type="number"
                                                                        step="0.01"
                                                                        value={
                                                                            variant.price ||
                                                                            0
                                                                        }
                                                                        onChange={(
                                                                            e,
                                                                        ) => {
                                                                            const updated =
                                                                                [
                                                                                    ...productVariants,
                                                                                ];
                                                                            updated[
                                                                                index
                                                                            ] =
                                                                                {
                                                                                    ...updated[
                                                                                        index
                                                                                    ],
                                                                                    price:
                                                                                        parseFloat(
                                                                                            e
                                                                                                .target
                                                                                                .value,
                                                                                        ) ||
                                                                                        0,
                                                                                };
                                                                            setProductVariants(
                                                                                updated,
                                                                            );
                                                                        }}
                                                                        placeholder="Price"
                                                                    />
                                                                </TableCell>
                                                                <TableCell>
                                                                    <Input
                                                                        type="number"
                                                                        value={
                                                                            variant.stock ||
                                                                            0
                                                                        }
                                                                        onChange={(
                                                                            e,
                                                                        ) => {
                                                                            const updated =
                                                                                [
                                                                                    ...productVariants,
                                                                                ];
                                                                            updated[
                                                                                index
                                                                            ] =
                                                                                {
                                                                                    ...updated[
                                                                                        index
                                                                                    ],
                                                                                    stock:
                                                                                        parseInt(
                                                                                            e
                                                                                                .target
                                                                                                .value,
                                                                                            10,
                                                                                        ) ||
                                                                                        0,
                                                                                };
                                                                            setProductVariants(
                                                                                updated,
                                                                            );
                                                                        }}
                                                                        placeholder="Stock"
                                                                    />
                                                                </TableCell>
                                                                <TableCell>
                                                                    <Button
                                                                        type="button"
                                                                        variant="ghost"
                                                                        size="icon"
                                                                        onClick={() => {
                                                                            setProductVariants(
                                                                                productVariants.filter(
                                                                                    (
                                                                                        _,
                                                                                        i,
                                                                                    ) =>
                                                                                        i !==
                                                                                        index,
                                                                                ),
                                                                            );
                                                                        }}
                                                                    >
                                                                        <Trash2 className="h-4 w-4" />
                                                                    </Button>
                                                                </TableCell>
                                                            </TableRow>
                                                        ),
                                                    )}
                                                </TableBody>
                                            </Table>
                                        </div>
                                    ) : (
                                        <div className="rounded-md bg-blue-50 p-4 text-sm text-blue-800">
                                            Varyasyon seçerek variant
                                            kombinasyonlarını otomatik oluşturun
                                        </div>
                                    )}
                                </CardContent>
                            </Card>

                            {/* Options */}
                            <Card>
                                <CardHeader>
                                    <CardTitle>Options</CardTitle>
                                </CardHeader>
                                <CardContent className="space-y-4">
                                    {selectedOptions.map((option, index) => {
                                        const optionData = productOptions.find(
                                            (o) => o.id === option.option_id,
                                        );

                                        return (
                                            <Collapsible
                                                key={option.tempId || index}
                                                defaultOpen
                                                className="mb-4"
                                            >
                                                <Card>
                                                    <CardHeader>
                                                        <div className="flex items-center justify-between">
                                                            <CollapsibleTrigger
                                                                asChild
                                                            >
                                                                <Button
                                                                    variant="ghost"
                                                                    className="flex items-center space-x-2"
                                                                >
                                                                    <span>
                                                                        {optionData?.name ||
                                                                            'New Option'}
                                                                    </span>
                                                                    <ChevronDown className="h-4 w-4" />
                                                                </Button>
                                                            </CollapsibleTrigger>
                                                            <Button
                                                                type="button"
                                                                variant="ghost"
                                                                size="icon"
                                                                onClick={() =>
                                                                    removeOption(
                                                                        index,
                                                                    )
                                                                }
                                                            >
                                                                <Trash2 className="h-4 w-4" />
                                                            </Button>
                                                        </div>
                                                    </CardHeader>
                                                    <CollapsibleContent>
                                                        <CardContent className="space-y-4">
                                                            <div className="space-y-2">
                                                                <Label>
                                                                    Option
                                                                </Label>
                                                                <Select
                                                                    value={
                                                                        option.option_id &&
                                                                        option.option_id >
                                                                            0
                                                                            ? String(
                                                                                  option.option_id,
                                                                              )
                                                                            : undefined
                                                                    }
                                                                    onValueChange={(
                                                                        value,
                                                                    ) => {
                                                                        const updated =
                                                                            [
                                                                                ...selectedOptions,
                                                                            ];
                                                                        updated[
                                                                            index
                                                                        ] = {
                                                                            ...updated[
                                                                                index
                                                                            ],
                                                                            option_id:
                                                                                value &&
                                                                                value !==
                                                                                    ''
                                                                                    ? Number(
                                                                                          value,
                                                                                      )
                                                                                    : 0,
                                                                        };
                                                                        setSelectedOptions(
                                                                            updated,
                                                                        );
                                                                    }}
                                                                >
                                                                    <SelectTrigger>
                                                                        <SelectValue placeholder="Please Select" />
                                                                    </SelectTrigger>
                                                                    <SelectContent>
                                                                        {(() => {
                                                                            if (
                                                                                !productOptions ||
                                                                                productOptions.length ===
                                                                                    0
                                                                            ) {
                                                                                return (
                                                                                    <SelectItem
                                                                                        value="no-options"
                                                                                        disabled
                                                                                    >
                                                                                        No
                                                                                        options
                                                                                        available
                                                                                    </SelectItem>
                                                                                );
                                                                            }
                                                                            const validOptions =
                                                                                productOptions
                                                                                    .filter(
                                                                                        (
                                                                                            opt,
                                                                                        ) =>
                                                                                            opt.id !=
                                                                                                null &&
                                                                                            opt.id !==
                                                                                                undefined,
                                                                                    )
                                                                                    .map(
                                                                                        (
                                                                                            opt,
                                                                                        ) => {
                                                                                            if (
                                                                                                !opt.id ||
                                                                                                opt.id ===
                                                                                                    null ||
                                                                                                opt.id ===
                                                                                                    undefined
                                                                                            ) {
                                                                                                return null;
                                                                                            }
                                                                                            const value =
                                                                                                String(
                                                                                                    opt.id,
                                                                                                );
                                                                                            if (
                                                                                                !value ||
                                                                                                value.trim() ===
                                                                                                    ''
                                                                                            ) {
                                                                                                return null;
                                                                                            }
                                                                                            return {
                                                                                                id: opt.id,
                                                                                                name: opt.name,
                                                                                                value,
                                                                                            };
                                                                                        },
                                                                                    )
                                                                                    .filter(
                                                                                        (
                                                                                            item,
                                                                                        ) =>
                                                                                            item !==
                                                                                            null,
                                                                                    );
                                                                            if (
                                                                                validOptions.length ===
                                                                                0
                                                                            ) {
                                                                                return (
                                                                                    <SelectItem
                                                                                        value="no-options"
                                                                                        disabled
                                                                                    >
                                                                                        No
                                                                                        options
                                                                                        available
                                                                                    </SelectItem>
                                                                                );
                                                                            }
                                                                            return validOptions
                                                                                .filter(
                                                                                    (
                                                                                        opt,
                                                                                    ) =>
                                                                                        opt.value &&
                                                                                        opt.value.trim() !==
                                                                                            '',
                                                                                )
                                                                                .map(
                                                                                    (
                                                                                        opt,
                                                                                    ) => (
                                                                                        <SelectItem
                                                                                            key={
                                                                                                opt.id
                                                                                            }
                                                                                            value={
                                                                                                opt.value
                                                                                            }
                                                                                        >
                                                                                            {
                                                                                                opt.name
                                                                                            }
                                                                                        </SelectItem>
                                                                                    ),
                                                                                );
                                                                        })()}
                                                                    </SelectContent>
                                                                </Select>
                                                            </div>
                                                        </CardContent>
                                                    </CollapsibleContent>
                                                </Card>
                                            </Collapsible>
                                        );
                                    })}
                                    <Button
                                        type="button"
                                        variant="outline"
                                        onClick={addOption}
                                    >
                                        <Plus className="mr-2 h-4 w-4" />
                                        Add Option
                                    </Button>
                                </CardContent>
                            </Card>

                            {/* Downloads */}
                            <Card>
                                <CardHeader>
                                    <CardTitle>Downloads</CardTitle>
                                </CardHeader>
                                <CardContent className="space-y-4">
                                    <Table>
                                        <TableHeader>
                                            <TableRow>
                                                <TableHead></TableHead>
                                                <TableHead>File</TableHead>
                                                <TableHead className="w-12"></TableHead>
                                            </TableRow>
                                        </TableHeader>
                                        <TableBody>
                                            {downloads.map(
                                                (download, index) => (
                                                    <TableRow
                                                        key={
                                                            download.tempId ||
                                                            index
                                                        }
                                                    >
                                                        <TableCell>
                                                            <div className="flex items-center justify-center">
                                                                <GripVertical className="h-4 w-4 text-muted-foreground" />
                                                            </div>
                                                        </TableCell>
                                                        <TableCell>
                                                            <div className="flex items-center space-x-2">
                                                                <Input
                                                                    value={
                                                                        download.file
                                                                    }
                                                                    onChange={(
                                                                        e,
                                                                    ) => {
                                                                        const updated =
                                                                            [
                                                                                ...downloads,
                                                                            ];
                                                                        updated[
                                                                            index
                                                                        ] = {
                                                                            ...updated[
                                                                                index
                                                                            ],
                                                                            file: e
                                                                                .target
                                                                                .value,
                                                                        };
                                                                        setDownloads(
                                                                            updated,
                                                                        );
                                                                    }}
                                                                    placeholder="File name"
                                                                    readOnly
                                                                />
                                                                <Button
                                                                    type="button"
                                                                    variant="outline"
                                                                >
                                                                    Choose
                                                                </Button>
                                                            </div>
                                                        </TableCell>
                                                        <TableCell>
                                                            <Button
                                                                type="button"
                                                                variant="ghost"
                                                                size="icon"
                                                                onClick={() =>
                                                                    removeDownload(
                                                                        index,
                                                                    )
                                                                }
                                                            >
                                                                <Trash2 className="h-4 w-4" />
                                                            </Button>
                                                        </TableCell>
                                                    </TableRow>
                                                ),
                                            )}
                                        </TableBody>
                                    </Table>
                                    <Button
                                        type="button"
                                        variant="outline"
                                        onClick={addDownload}
                                    >
                                        <Plus className="mr-2 h-4 w-4" />
                                        Add File
                                    </Button>
                                </CardContent>
                            </Card>
                        </div>

                        {/* Sağ Sütun - 4 kolon */}
                        <div className="col-span-12 space-y-6 lg:col-span-4">
                            {/* Media */}
                            <Card>
                                <CardHeader>
                                    <CardTitle>Media</CardTitle>
                                </CardHeader>
                                <CardContent>
                                    <div className="space-y-4">
                                        <input
                                            type="file"
                                            id="media-upload"
                                            multiple
                                            accept="image/*"
                                            className="hidden"
                                            onChange={(e) => {
                                                const files = Array.from(
                                                    e.target.files || [],
                                                );
                                                if (files.length > 0) {
                                                    setData('media', [
                                                        ...data.media,
                                                        ...files.map(
                                                            (file) => ({
                                                                file,
                                                                preview:
                                                                    URL.createObjectURL(
                                                                        file,
                                                                    ),
                                                            }),
                                                        ),
                                                    ]);
                                                }
                                            }}
                                        />
                                        <label
                                            htmlFor="media-upload"
                                            className="flex h-48 cursor-pointer items-center justify-center rounded-md border-2 border-dashed hover:bg-accent"
                                        >
                                            <div className="text-center">
                                                <div className="mb-2 text-4xl">
                                                    📷
                                                </div>
                                                <p className="text-sm text-muted-foreground">
                                                    Click to upload
                                                </p>
                                            </div>
                                        </label>
                                        {data.media &&
                                            data.media.length > 0 && (
                                                <div className="grid grid-cols-4 gap-4">
                                                    {data.media.map(
                                                        (item, index) => (
                                                            <div
                                                                key={index}
                                                                className="relative"
                                                            >
                                                                <img
                                                                    src={
                                                                        item.preview ||
                                                                        item.url
                                                                    }
                                                                    alt={`Media ${index + 1}`}
                                                                    className="h-24 w-full rounded-md object-cover"
                                                                />
                                                                <button
                                                                    type="button"
                                                                    onClick={() => {
                                                                        const updated =
                                                                            [
                                                                                ...data.media,
                                                                            ];
                                                                        updated.splice(
                                                                            index,
                                                                            1,
                                                                        );
                                                                        setData(
                                                                            'media',
                                                                            updated,
                                                                        );
                                                                    }}
                                                                    className="absolute top-1 right-1 rounded-full bg-red-500 p-1 text-white hover:bg-red-600"
                                                                >
                                                                    <Trash2 className="h-3 w-3" />
                                                                </button>
                                                            </div>
                                                        ),
                                                    )}
                                                </div>
                                            )}
                                    </div>
                                </CardContent>
                            </Card>

                            {/* Pricing */}
                            <Card>
                                <CardHeader>
                                    <CardTitle>Pricing</CardTitle>
                                </CardHeader>
                                <CardContent>
                                    <div className="rounded-md bg-blue-50 p-4 text-sm text-blue-800">
                                        Managed from individual variants
                                    </div>
                                </CardContent>
                            </Card>

                            {/* SKU */}
                            <Card>
                                <CardHeader>
                                    <CardTitle>SKU</CardTitle>
                                </CardHeader>
                                <CardContent className="space-y-4">
                                    <div className="space-y-2">
                                        <Label htmlFor="sku">
                                            SKU{' '}
                                            <span className="text-red-500">
                                                *
                                            </span>
                                        </Label>
                                        <Input
                                            id="sku"
                                            value={data.sku}
                                            onChange={(e) =>
                                                setData('sku', e.target.value)
                                            }
                                            placeholder="SKU-001"
                                        />
                                        <InputError message={errors.sku} />
                                    </div>
                                    <div className="space-y-2">
                                        <Label>Inventory Management</Label>
                                        <Select defaultValue="dont_track">
                                            <SelectTrigger>
                                                <SelectValue />
                                            </SelectTrigger>
                                            <SelectContent>
                                                <SelectItem value="dont_track">
                                                    Don't Track Inventory
                                                </SelectItem>
                                                <SelectItem value="track">
                                                    Track Inventory
                                                </SelectItem>
                                            </SelectContent>
                                        </Select>
                                    </div>
                                    <div className="space-y-2">
                                        <Label>Stock Availability</Label>
                                        <Select defaultValue="in_stock">
                                            <SelectTrigger>
                                                <SelectValue />
                                            </SelectTrigger>
                                            <SelectContent>
                                                <SelectItem value="out_of_stock">
                                                    Out of Stock
                                                </SelectItem>
                                                <SelectItem value="in_stock">
                                                    In Stock
                                                </SelectItem>
                                            </SelectContent>
                                        </Select>
                                    </div>
                                </CardContent>
                            </Card>

                            {/* SEO */}
                            <Card>
                                <CardHeader>
                                    <CardTitle>SEO</CardTitle>
                                </CardHeader>
                                <CardContent className="space-y-4">
                                    <div className="space-y-2">
                                        <Label htmlFor="seo_url">URL</Label>
                                        <Input
                                            id="seo_url"
                                            value={data.seo_url}
                                            onChange={(e) =>
                                                setData(
                                                    'seo_url',
                                                    e.target.value,
                                                )
                                            }
                                            placeholder="urun-adi"
                                        />
                                        <InputError message={errors.seo_url} />
                                    </div>
                                    <div className="space-y-2">
                                        <Label htmlFor="meta_title">
                                            Meta Title
                                        </Label>
                                        <Input
                                            id="meta_title"
                                            value={data.meta_title}
                                            onChange={(e) =>
                                                setData(
                                                    'meta_title',
                                                    e.target.value,
                                                )
                                            }
                                            placeholder="Meta title"
                                        />
                                        <InputError
                                            message={errors.meta_title}
                                        />
                                    </div>
                                    <div className="space-y-2">
                                        <Label htmlFor="meta_description">
                                            Meta Description
                                        </Label>
                                        <Textarea
                                            id="meta_description"
                                            value={data.meta_description}
                                            onChange={(e) =>
                                                setData(
                                                    'meta_description',
                                                    e.target.value,
                                                )
                                            }
                                            placeholder="Meta description"
                                            rows={4}
                                        />
                                        <InputError
                                            message={errors.meta_description}
                                        />
                                    </div>
                                </CardContent>
                            </Card>

                            {/* Additional */}
                            <Card>
                                <CardHeader>
                                    <CardTitle>Additional</CardTitle>
                                </CardHeader>
                                <CardContent className="space-y-4">
                                    <div className="space-y-2">
                                        <Label htmlFor="short_description">
                                            Short Description
                                        </Label>
                                        <Textarea
                                            id="short_description"
                                            value={data.short_description}
                                            onChange={(e) =>
                                                setData(
                                                    'short_description',
                                                    e.target.value,
                                                )
                                            }
                                            placeholder="Short description"
                                            rows={4}
                                        />
                                        <InputError
                                            message={errors.short_description}
                                        />
                                    </div>
                                    <div className="grid grid-cols-2 gap-4">
                                        <div className="space-y-2">
                                            <Label htmlFor="new_from">
                                                New From
                                            </Label>
                                            <Input
                                                id="new_from"
                                                type="date"
                                                value={data.new_from}
                                                onChange={(e) =>
                                                    setData(
                                                        'new_from',
                                                        e.target.value,
                                                    )
                                                }
                                            />
                                            <InputError
                                                message={errors.new_from}
                                            />
                                        </div>
                                        <div className="space-y-2">
                                            <Label htmlFor="new_to">
                                                New To
                                            </Label>
                                            <Input
                                                id="new_to"
                                                type="date"
                                                value={data.new_to}
                                                onChange={(e) =>
                                                    setData(
                                                        'new_to',
                                                        e.target.value,
                                                    )
                                                }
                                            />
                                            <InputError
                                                message={errors.new_to}
                                            />
                                        </div>
                                    </div>
                                </CardContent>
                            </Card>

                            {/* Linked Products */}
                            <Card>
                                <CardHeader>
                                    <CardTitle>Linked Products</CardTitle>
                                </CardHeader>
                                <CardContent className="space-y-4">
                                    <div className="space-y-2">
                                        <Label>Up-Sells</Label>
                                        <div className="max-h-32 overflow-y-auto rounded-md border p-2">
                                            <span className="text-sm text-muted-foreground">
                                                No products available
                                            </span>
                                        </div>
                                    </div>
                                    <div className="space-y-2">
                                        <Label>Cross-Sells</Label>
                                        <div className="max-h-32 overflow-y-auto rounded-md border p-2">
                                            <span className="text-sm text-muted-foreground">
                                                No products available
                                            </span>
                                        </div>
                                    </div>
                                    <div className="space-y-2">
                                        <Label>Related Products</Label>
                                        <div className="max-h-32 overflow-y-auto rounded-md border p-2">
                                            <span className="text-sm text-muted-foreground">
                                                No products available
                                            </span>
                                        </div>
                                    </div>
                                </CardContent>
                            </Card>
                        </div>
                    </div>

                    <div className="flex justify-end gap-4">
                        <Link href={index()}>
                            <Button type="button" variant="outline">
                                İptal
                            </Button>
                        </Link>
                        <Button type="submit" disabled={processing}>
                            {processing ? 'Kaydediliyor...' : 'Kaydet'}
                        </Button>
                        <Button type="submit" disabled={processing}>
                            {processing ? 'Kaydediliyor...' : 'Kaydet & Çık'}
                        </Button>
                    </div>
                </form>
            </div>
        </AppLayout>
    );
}
