import InputError from '@/components/input-error';
import { ProductAttributesForm } from '@/components/products/ProductAttributesForm';
import { ProductGeneralForm } from '@/components/products/ProductGeneralForm';
import { ProductVariantsSection } from '@/components/products/ProductVariantsSection';
import { ProductVariationsSection } from '@/components/products/ProductVariationsSection';
import { SortableTableRow } from '@/components/SortableTableRow';
import { Button } from '@/components/ui/button';
import { Card, CardContent, CardHeader, CardTitle } from '@/components/ui/card';
import {
    Collapsible,
    CollapsibleContent,
    CollapsibleTrigger,
} from '@/components/ui/collapsible';
import { Input } from '@/components/ui/input';
import { Label } from '@/components/ui/label';
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
import { useProductVariants } from '@/hooks/use-product-variants';
import { useProductVariations } from '@/hooks/use-product-variations';
import { useToastErrors } from '@/hooks/use-toast-errors';
import AppLayout from '@/layouts/app-layout';
import { slugify } from '@/lib/slugify';
import { index, update } from '@/routes/admin/products';
import { type BreadcrumbItem } from '@/types';
import type { ProductOptionSelection, ProductVariation } from '@/types/product';
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
import { Head, Link, router, useForm } from '@inertiajs/react';
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
        title: 'Ürün Düzenle',
        href: '#',
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
    product?: {
        id: number;
        name: string;
        slug: string;
        sku: string;
        description?: string;
        short_description?: string;
        brand_id?: number | null;
        tax_class_id?: number | null;
        status: 'draft' | 'published';
        is_virtual: boolean;
        seo_url?: string;
        meta_title?: string;
        meta_description?: string;
        new_from?: string;
        new_to?: string;
        sort_order: number;
        brand?: { id: number; name: string };
        taxClass?: { id: number; name: string };
        categories?: Array<{ id: number; name: string }>;
        tags?: Array<{ id: number; name: string }>;
        attributes?: Array<{
            id: number;
            attribute_id: number;
            attribute_value_ids: number[];
        }>;
        attributes_formatted?: Array<{
            attribute_id: number;
            attribute_value_ids: number[];
        }>;
        variations?: Array<{
            id: number;
            name: string;
            sku?: string;
            price?: number;
            compare_price?: number;
            stock?: number;
            barcode?: string;
            image?: string;
            is_active?: boolean;
            sort_order?: number;
            variation_template_id?: number;
            variation_values_formatted?: Array<{
                variation_id: number;
                variation_value_id: number;
            }>;
            values?: Array<{
                id: number;
                label: string;
                variation_template_id?: number;
                variation_template_value_id?: number;
            }>;
        }>;
        options?: Array<{ id: number; product_option_id: number }>;
        options_formatted?: Array<{
            option_id: number;
            values: Array<{
                label: string;
                value?: string;
                price_adjustment: number;
                price_type: string;
                sort_order: number;
            }>;
        }>;
        variation_templates_formatted?: Array<{
            variation_id: number;
            name: string;
            type: string;
            variation_value_ids: number[];
            sort_order: number;
        }>;
        media?: Array<{
            id: number;
            type: 'image' | 'video';
            path: string;
            alt?: string;
            sort_order?: number;
        }>;
        links?: Array<{
            id: number;
            linked_product_id: number;
            type: 'up_sell' | 'cross_sell' | 'related';
        }>;
    };
    brands?: Array<{ id: number; name: string }>;
    categories?: Category[];
    tags?: Array<{ id: number; name: string }>;
    taxClasses?: Array<{ id: number; name: string; rate: number }>;
    attributes?: Attribute[];
    variations?: Variation[];
    productOptions?: ProductOption[];
}

export default function ProductsEdit({
    product,
    brands = [],
    categories = [],
    tags = [],
    taxClasses = [],
    attributes = [],
    variations = [],
    productOptions = [],
}: Props) {
    const { data, setData, processing, errors } = useForm({
        name: product?.name || '',
        slug: product?.slug || '',
        sku: product?.sku || '',
        description: product?.description || '',
        short_description: product?.short_description || '',
        brand_id: product?.brand_id,
        tax_class_id: product?.tax_class_id,
        status: product?.status || 'draft',
        is_virtual: product?.is_virtual || false,
        seo_url: product?.seo_url || '',
        meta_title: product?.meta_title || '',
        meta_description: product?.meta_description || '',
        new_from: product?.new_from || '',
        new_to: product?.new_to || '',
        sort_order: product?.sort_order || 0,
        category_ids: product?.categories?.map((c) => c.id) || [],
        tag_ids: product?.tags?.map((t) => t.id) || [],
        attributes:
            (product?.attributes_formatted as Array<{
                attribute_id: number;
                attribute_value_ids: number[];
            }>) || [],
        variation_ids: [], // ProductVariation yapısı farklı, sonra düzeltilecek
        variants:
            product?.variations?.map((v, idx) => ({
                name: v.name || '',
                sku: v.sku || '',
                barcode: v.barcode || '',
                price: v.price || 0,
                stock: v.stock || 0,
                image: v.image || null,
                variation_values:
                    (v.variation_values_formatted as Array<{
                        variation_id: number;
                        variation_value_id: number;
                    }>) ||
                    v.values?.map((val: any) => ({
                        variation_id: val.variation_template_id || 0,
                        variation_value_id:
                            val.variation_template_value_id || 0,
                    })) ||
                    [],
                tempId: `variant-${idx}`,
            })) || [],
        option_ids:
            (
                product?.options_formatted as Array<{
                    option_id: number;
                    values: Array<{
                        label: string;
                        value?: string;
                        price_adjustment: number;
                        price_type: string;
                        sort_order: number;
                    }>;
                }>
            )?.map((o) => o.option_id) || [],
        options:
            (product?.options_formatted as Array<{
                option_id: number;
                values: Array<{
                    label: string;
                    value?: string;
                    price_adjustment: number;
                    price_type: string;
                    sort_order: number;
                }>;
            }>) || [],
        media:
            product?.media?.map((m) => ({
                type: m.type,
                path: m.path,
                url:
                    m.path?.startsWith('http') || m.path?.startsWith('/')
                        ? m.path
                        : `/storage/${m.path}`,
                alt: m.alt,
                sort_order: m.sort_order,
            })) || [],
        downloads: [] as Array<{
            file: string;
            sort_order?: number;
        }>,
        links:
            product?.links?.map((l) => ({
                linked_product_id: l.linked_product_id,
                type: l.type,
            })) || [],
    });

    const isSlugManuallyEdited = useRef(false);
    const tempIdCounter = useRef(0);

    // Toast errors hook'unu kullan
    useToastErrors(errors);
    const [selectedCategories, setSelectedCategories] = useState<number[]>(
        product?.categories?.map((c) => c.id) || [],
    );
    const [selectedTags, setSelectedTags] = useState<number[]>(
        product?.tags?.map((t) => t.id) || [],
    );
    const [productAttributes, setProductAttributes] = useState<
        Array<{
            attribute_id: number;
            attribute_value_ids: number[];
            tempId?: string;
        }>
    >(
        (
            product?.attributes_formatted as Array<{
                attribute_id: number;
                attribute_value_ids: number[];
            }>
        )?.map((a, idx) => ({
            attribute_id: a.attribute_id,
            attribute_value_ids: a.attribute_value_ids || [],
            tempId: `attr-${idx}`,
        })) || [],
    );
    const [selectedTemplateId, setSelectedTemplateId] = useState<
        string | undefined
    >(undefined);

    // product.variation_templates_formatted'dan initialProductVariations oluştur
    const initialProductVariations = React.useMemo(() => {
        if (
            !product?.variation_templates_formatted ||
            product.variation_templates_formatted.length === 0
        ) {
            return [];
        }

        if (!variations || variations.length === 0) {
            return [];
        }

        // Backend'den gelen variation_templates_formatted'ı kullan
        return (
            product.variation_templates_formatted as Array<{
                variation_id: number;
                name: string;
                type: string;
                variation_value_ids: number[];
                sort_order: number;
            }>
        )
            .map((vt) => {
                const variationData = variations.find(
                    (v) => v.id === vt.variation_id,
                );
                if (!variationData) {
                    return null;
                }

                // Seçili value ID'lerine göre localValues'ı oluştur
                const localValues =
                    variationData.values
                        ?.filter((v) => vt.variation_value_ids.includes(v.id))
                        .map((v, idx) => ({
                            label: v.label || '',
                            value: v.value || '',
                            color: v.color || '',
                            image: v.image || '',
                            sort_order: idx,
                            tempId: `temp-${vt.variation_id}-${v.id}`,
                        })) || [];

                return {
                    variation_id: vt.variation_id,
                    name: vt.name,
                    type: vt.type as 'text' | 'color' | 'image',
                    variation_value_ids: vt.variation_value_ids,
                    localValues: localValues,
                    tempId: `temp-${vt.variation_id}`,
                } as ProductVariation;
            })
            .filter((v): v is ProductVariation => v !== null);
    }, [product?.variation_templates_formatted, variations]); // variations değiştiğinde de güncelle

    // Product variations hook
    const {
        productVariations,
        addVariation,
        removeVariation,
        updateVariation,
        addVariationValue,
        removeVariationValue,
        updateVariationValue,
    } = useProductVariations({
        variations,
        initialVariations: initialProductVariations,
    });

    // Debug: productVariations kontrolü (sadece gerekirse aç)
    // React.useEffect(() => {
    //     console.log('=== Edit.tsx Debug ===');
    //     console.log(
    //         'product.variation_templates_formatted:',
    //         product?.variation_templates_formatted,
    //     );
    //     console.log('variations:', variations);
    //     console.log('initialProductVariations:', initialProductVariations);
    //     console.log('productVariations:', productVariations);
    //     console.log('productVariations.length:', productVariations.length);
    // }, [productVariations, initialProductVariations, variations]);

    // Initial variants'ı memoize et - sonsuz render döngüsünü önlemek için
    const initialVariants = React.useMemo(
        () =>
            product?.variations?.map((v, idx) => ({
                name: v.name || '',
                sku: v.sku || '',
                barcode: v.barcode || '',
                price: v.price || 0,
                stock: v.stock || 0,
                image: v.image || undefined,
                is_active: v.is_active !== false, // Varsayılan olarak aktif
                variation_values:
                    (v.variation_values_formatted as Array<{
                        variation_id: number;
                        variation_value_id: number;
                    }>) ||
                    v.values?.map((val: any) => ({
                        variation_id: val.variation_template_id || 0,
                        variation_value_id:
                            val.variation_template_value_id || 0,
                    })) ||
                    [],
                tempId: `variant-${idx}`,
            })) || [],
        // eslint-disable-next-line react-hooks/exhaustive-deps
        [], // Sadece ilk render'da çalışsın
    );

    // Product variants hook - variations değiştiğinde otomatik güncellenir
    const { productVariants, updateVariant, removeVariant } =
        useProductVariants({
            productVariations,
            variations,
            baseSku: data.sku,
            initialVariants,
        });

    // initialProductVariations hook'a geçirildi, initialVariants ile variant'lar zaten yüklendi

    // productVariations değiştiğinde variant kombinasyonları useProductVariants hook'u tarafından otomatik güncellenir

    const [selectedOptions, setSelectedOptions] = useState<
        ProductOptionSelection[]
    >(
        (
            product?.options_formatted as Array<{
                option_id: number;
                values: Array<{
                    label: string;
                    value?: string;
                    price_adjustment: number;
                    price_type: string;
                    sort_order: number;
                }>;
            }>
        )?.map((o, idx) => ({
            option_id: o.option_id,
            tempId: `option-${idx}`,
            localValues: o.values.map((val, valIdx) => ({
                label: val.label,
                value: val.value || '',
                price_adjustment: val.price_adjustment,
                price_type: val.price_type as 'fixed' | 'percentage',
                sort_order: val.sort_order ?? valIdx,
                tempId: `value-${idx}-${valIdx}`,
            })),
        })) || [],
    );
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
        // eslint-disable-next-line react-hooks/exhaustive-deps
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

    // generateCombinations ve updateVariantsFromVariations fonksiyonları kaldırıldı
    // useProductVariants hook'u productVariations değiştiğinde otomatik olarak variant kombinasyonlarını güncelliyor

    // Hook'tan gelen addVariation'ı wrapper ile sarmalayıp ek işlemleri yapıyoruz
    const handleAddVariation = (variationId?: number) => {
        addVariation(variationId);
        // Template seçimini sıfırla
        setSelectedTemplateId(undefined);
    };

    // Hook'tan gelen removeVariation'ı wrapper ile sarmalayıp ek işlemleri yapıyoruz
    const handleRemoveVariation = (index: number) => {
        removeVariation(index);
    };

    // Hook'tan gelen fonksiyonlar kullanılıyor, yerel tanımlar kaldırıldı
    // updateVariantsFromVariations useEffect ile otomatik çağrılıyor

    const handleVariationValueDragEnd = (
        variationIndex: number,
        event: DragEndEvent,
    ) => {
        // Bu işlevi useProductVariations hook'una taşımalıyız
        // Şimdilik boş bırakıyoruz (Create.tsx'teki gibi)
        // Hook'un state'ini doğrudan güncelleyemeyiz
    };

    // Hook'tan gelen updateVariation kullanılıyor, yerel tanım kaldırıldı
    // updateVariantsFromVariations useEffect ile otomatik çağrılıyor

    const handleVariationDragEnd = (event: DragEndEvent) => {
        const { active, over } = event;
        if (over && active.id !== over.id) {
            const oldIndex = productVariations.findIndex(
                (item) => item.tempId === active.id,
            );
            const newIndex = productVariations.findIndex(
                (item) => item.tempId === over.id,
            );
            if (oldIndex >= 0 && newIndex >= 0) {
                const reordered = arrayMove(
                    productVariations,
                    oldIndex,
                    newIndex,
                );
                // Hook'tan gelen handler'ı kullanabiliriz ama arrayMove yapmak için state'i manuel güncellemeliyiz
                // Şimdilik hook'un kendi state'ini kullanıyor, bu yüzden bu handler sadece UI için
            }
        }
    };

    const addOption = (optionId?: number) => {
        tempIdCounter.current += 1;
        const newOption: ProductOptionSelection = {
            option_id: optionId || 0,
            tempId: `option-${tempIdCounter.current}`,
            localValues: [],
        };

        // Eğer option seçildiyse, values'lerini yükle
        if (optionId) {
            const optionData = productOptions.find((o) => o.id === optionId);
            if (optionData?.values) {
                newOption.localValues = optionData.values.map(
                    (value, index) => ({
                        label: value.label,
                        value: value.value || '',
                        price_adjustment: value.price_adjustment,
                        price_type: value.price_type,
                        sort_order: value.sort_order ?? index,
                        tempId: `value-${tempIdCounter.current}-${index}`,
                    }),
                );
            }
        }

        setSelectedOptions([...selectedOptions, newOption]);
    };

    const removeOption = (index: number) => {
        setSelectedOptions(selectedOptions.filter((_, i) => i !== index));
    };

    const updateOption = (index: number, field: 'option_id', value: number) => {
        const updated = [...selectedOptions];
        const optionData = productOptions.find((o) => o.id === value);

        updated[index] = {
            ...updated[index],
            [field]: value,
        };

        // Option seçildiyse, values'lerini yükle
        if (value && optionData?.values) {
            updated[index].localValues = optionData.values.map((val, idx) => ({
                label: val.label,
                value: val.value || '',
                price_adjustment: val.price_adjustment,
                price_type: val.price_type,
                sort_order: val.sort_order ?? idx,
                tempId: `value-${Date.now()}-${idx}`,
            }));
        } else {
            updated[index].localValues = [];
        }

        setSelectedOptions(updated);
    };

    const addOptionValue = (optionIndex: number) => {
        const updated = [...selectedOptions];
        const localValues = updated[optionIndex].localValues || [];
        tempIdCounter.current += 1;

        const newValue = {
            label: '',
            value: '',
            price_adjustment: 0,
            price_type: 'fixed' as const,
            sort_order: localValues.length,
            tempId: `value-${tempIdCounter.current}`,
        };

        updated[optionIndex] = {
            ...updated[optionIndex],
            localValues: [...localValues, newValue],
        };

        setSelectedOptions(updated);
    };

    const removeOptionValue = (optionIndex: number, valueIndex: number) => {
        const updated = [...selectedOptions];
        const localValues = updated[optionIndex].localValues || [];

        updated[optionIndex] = {
            ...updated[optionIndex],
            localValues: localValues.filter((_, i) => i !== valueIndex),
        };

        setSelectedOptions(updated);
    };

    const updateOptionValue = (
        optionIndex: number,
        valueIndex: number,
        field: 'label' | 'value' | 'price_adjustment' | 'price_type',
        value: string | number,
    ) => {
        const updated = [...selectedOptions];
        const localValues = [...(updated[optionIndex].localValues || [])];

        localValues[valueIndex] = {
            ...localValues[valueIndex],
            [field]: value,
        };

        updated[optionIndex] = {
            ...updated[optionIndex],
            localValues,
        };

        setSelectedOptions(updated);
    };

    const handleOptionDragEnd = (optionIndex: number, event: DragEndEvent) => {
        const { active, over } = event;
        if (over && active.id !== over.id) {
            const updated = [...selectedOptions];
            const localValues = [...(updated[optionIndex].localValues || [])];

            const oldIndex = localValues.findIndex(
                (item) => item.tempId === active.id,
            );
            const newIndex = localValues.findIndex(
                (item) => item.tempId === over.id,
            );

            if (oldIndex !== -1 && newIndex !== -1) {
                const reordered = arrayMove(localValues, oldIndex, newIndex);
                updated[optionIndex] = {
                    ...updated[optionIndex],
                    localValues: reordered.map((item, idx) => ({
                        ...item,
                        sort_order: idx,
                    })),
                };
                setSelectedOptions(updated);
            }
        }
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

        // Özellikler - backend her attribute_value_id için ayrı kayıt bekliyor
        const attributesArray: Array<{
            attribute_id: number;
            attribute_value_id: number | null;
        }> = [];
        productAttributes.forEach((attr) => {
            if (attr.attribute_value_ids.length > 0) {
                // Her attribute_value_id için ayrı attribute kaydı oluştur
                attr.attribute_value_ids.forEach((valueId) => {
                    attributesArray.push({
                        attribute_id: attr.attribute_id,
                        attribute_value_id: valueId,
                    });
                });
            } else {
                // Eğer value seçilmemişse, sadece attribute_id ile kaydet
                attributesArray.push({
                    attribute_id: attr.attribute_id,
                    attribute_value_id: null,
                });
            }
        });

        // Variations - product_variation_templates tablosuna kaydedilir
        const variationsData = productVariations
            .filter((v) => v.variation_id > 0) // variation_id 0'dan büyük olanları filtrele
            .map((variation, index) => ({
                variation_id: variation.variation_id,
                sort_order: index,
            }));

        // Debug: variationsData kontrolü
        console.log('Edit.tsx - variationsData before submit:', variationsData);
        console.log('Edit.tsx - productVariations:', productVariations);

        // Variantlar - product_variations tablosuna kaydedilir
        const variantsData = productVariants.map((variant) => ({
            name: variant.name,
            sku: variant.sku || '',
            barcode: variant.barcode ?? '',
            price: variant.price || 0,
            stock: variant.stock || 0,
            is_active: variant.is_active !== false, // Varsayılan olarak aktif
            image:
                variant.image instanceof File
                    ? variant.image
                    : variant.image || null,
            variation_values: variant.variation_values.map((vv) => ({
                variation_id: vv.variation_id,
                variation_value_id: vv.variation_value_id,
            })),
            tempId: variant.tempId || `variant-${Date.now()}`,
        }));

        // Medya - sort_order ekle
        const mediaData =
            data.media && data.media.length > 0
                ? data.media.map((item, index) => ({
                      ...item,
                      sort_order: item.sort_order ?? index,
                  }))
                : [];

        // Form data'yı hazırla - setData asenkron olduğu için router.put kullanıyoruz
        const formData = {
            ...data,
            categories: selectedCategories,
            tags: selectedTags,
            attributes: attributesArray,
            variations: variationsData,
            variants: variantsData,
            options: selectedOptions.map((opt) => ({
                option_id: opt.option_id,
                values:
                    opt.localValues?.map((val) => ({
                        label: val.label,
                        value: val.value || undefined,
                        price_adjustment: val.price_adjustment || 0,
                        price_type: val.price_type || 'fixed',
                        sort_order: val.sort_order ?? 0,
                    })) || [],
            })),
            downloads: downloads.map((dl) => ({ file: dl.file })),
            media: mediaData,
        };

        // Submit et - formData'yı doğrudan router.put ile gönder
        // setData asenkron olduğu için ilk submit'te state güncellenmeden put çağrılıyordu
        // router.put kullanarak hazırlanan formData'yı direkt gönderiyoruz
        if (product?.id) {
            router.put(update(product.id).url, formData);
        }
    };

    return (
        <AppLayout breadcrumbs={breadcrumbs}>
            <Head title="Ürün Düzenle" />

            <div className="flex-1 space-y-6 p-6">
                <div className="flex items-center justify-between">
                    <div>
                        <h1 className="text-3xl font-bold tracking-tight">
                            Ürün Düzenle
                        </h1>
                        <p className="mt-1 text-muted-foreground">
                            Ürünü düzenleyin
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
                            <ProductGeneralForm
                                name={data.name}
                                slug={data.slug}
                                sku={data.sku}
                                description={data.description}
                                short_description={data.short_description}
                                brand_id={data.brand_id}
                                tax_class_id={data.tax_class_id}
                                status={data.status}
                                is_virtual={data.is_virtual}
                                sort_order={data.sort_order}
                                brands={brands}
                                categories={categories}
                                tags={tags}
                                taxClasses={taxClasses}
                                selectedCategories={selectedCategories}
                                selectedTags={selectedTags}
                                onNameChange={(value) => {
                                    setData('name', value);
                                    if (!isSlugManuallyEdited.current) {
                                        const autoSlug = slugify(value);
                                        setData('slug', autoSlug);
                                    }
                                }}
                                onSlugChange={(value) => {
                                    setData('slug', value);
                                    isSlugManuallyEdited.current = true;
                                }}
                                onFieldChange={(field, value) => {
                                    // @ts-expect-error - Dynamic field name
                                    setData(field, value);
                                }}
                                onCategoriesChange={setSelectedCategories}
                                onTagsChange={setSelectedTags}
                                errors={errors}
                            />

                            {/* Attributes */}
                            <ProductAttributesForm
                                attributes={attributes}
                                productAttributes={productAttributes}
                                onAdd={addAttribute}
                                onRemove={removeAttribute}
                                onUpdate={updateAttribute}
                                onDragEnd={handleAttributeDragEnd}
                            />

                            {/* Variations */}
                            <ProductVariationsSection
                                productVariations={productVariations}
                                variations={variations}
                                selectedTemplateId={selectedTemplateId}
                                onAddVariation={handleAddVariation}
                                onRemoveVariation={handleRemoveVariation}
                                onUpdateVariation={updateVariation}
                                onRemoveVariationValue={removeVariationValue}
                                onAddVariationValue={addVariationValue}
                                onVariationDragEnd={handleVariationDragEnd}
                                onVariationValueDragEnd={
                                    handleVariationValueDragEnd
                                }
                                onTemplateIdChange={setSelectedTemplateId}
                                sensors={sensors}
                            />

                            {/* Variants */}
                            <ProductVariantsSection
                                variants={productVariants}
                                onUpdateVariant={updateVariant}
                                onRemoveVariant={removeVariant}
                                showSkuProtectionInfo={true}
                            />

                            {/* Options */}
                            <Card>
                                <CardHeader>
                                    <CardTitle>Options</CardTitle>
                                </CardHeader>
                                <CardContent className="space-y-4">
                                    <DndContext
                                        sensors={sensors}
                                        collisionDetection={closestCenter}
                                        onDragEnd={() => {
                                            // Options için drag & drop şimdilik yok
                                        }}
                                    >
                                        {selectedOptions.map(
                                            (option, index) => {
                                                const optionData =
                                                    productOptions.find(
                                                        (o) =>
                                                            o.id ===
                                                            option.option_id,
                                                    );

                                                return (
                                                    <Collapsible
                                                        key={
                                                            option.tempId ||
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
                                                                            Option{' '}
                                                                            <span className="text-red-500">
                                                                                *
                                                                            </span>
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
                                                                                updateOption(
                                                                                    index,
                                                                                    'option_id',
                                                                                    Number(
                                                                                        value,
                                                                                    ),
                                                                                );
                                                                            }}
                                                                        >
                                                                            <SelectTrigger>
                                                                                <SelectValue placeholder="Please Select" />
                                                                            </SelectTrigger>
                                                                            <SelectContent>
                                                                                {productOptions.length ===
                                                                                0 ? (
                                                                                    <SelectItem
                                                                                        value="no-options"
                                                                                        disabled
                                                                                    >
                                                                                        No
                                                                                        options
                                                                                        available
                                                                                    </SelectItem>
                                                                                ) : (
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
                                                                                            ) => (
                                                                                                <SelectItem
                                                                                                    key={
                                                                                                        opt.id
                                                                                                    }
                                                                                                    value={String(
                                                                                                        opt.id,
                                                                                                    )}
                                                                                                >
                                                                                                    {
                                                                                                        opt.name
                                                                                                    }
                                                                                                </SelectItem>
                                                                                            ),
                                                                                        )
                                                                                )}
                                                                            </SelectContent>
                                                                        </Select>
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
                                                                                    addOptionValue(
                                                                                        index,
                                                                                    )
                                                                                }
                                                                            >
                                                                                <Plus className="mr-2 h-4 w-4" />
                                                                                Satır
                                                                                Ekle
                                                                            </Button>
                                                                        </div>
                                                                        {option.localValues &&
                                                                        option
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
                                                                                        handleOptionDragEnd(
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
                                                                                                <TableHead>
                                                                                                    Value
                                                                                                </TableHead>
                                                                                                <TableHead>
                                                                                                    Price
                                                                                                    Adjustment
                                                                                                </TableHead>
                                                                                                <TableHead>
                                                                                                    Price
                                                                                                    Type
                                                                                                </TableHead>
                                                                                                <TableHead className="w-12"></TableHead>
                                                                                            </TableRow>
                                                                                        </TableHeader>
                                                                                        <TableBody>
                                                                                            <SortableContext
                                                                                                items={option.localValues.map(
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
                                                                                                {option.localValues.map(
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
                                                                                                                        updateOptionValue(
                                                                                                                            index,
                                                                                                                            valueIndex,
                                                                                                                            'label',
                                                                                                                            e
                                                                                                                                .target
                                                                                                                                .value,
                                                                                                                        )
                                                                                                                    }
                                                                                                                    placeholder="Örn: Small, Medium, Large"
                                                                                                                    className="w-full"
                                                                                                                />
                                                                                                            </TableCell>
                                                                                                            <TableCell>
                                                                                                                <Input
                                                                                                                    value={
                                                                                                                        value.value ||
                                                                                                                        ''
                                                                                                                    }
                                                                                                                    onChange={(
                                                                                                                        e,
                                                                                                                    ) =>
                                                                                                                        updateOptionValue(
                                                                                                                            index,
                                                                                                                            valueIndex,
                                                                                                                            'value',
                                                                                                                            e
                                                                                                                                .target
                                                                                                                                .value,
                                                                                                                        )
                                                                                                                    }
                                                                                                                    placeholder="Value"
                                                                                                                    className="w-full"
                                                                                                                />
                                                                                                            </TableCell>
                                                                                                            <TableCell>
                                                                                                                <Input
                                                                                                                    type="number"
                                                                                                                    step="0.01"
                                                                                                                    value={
                                                                                                                        value.price_adjustment
                                                                                                                    }
                                                                                                                    onChange={(
                                                                                                                        e,
                                                                                                                    ) =>
                                                                                                                        updateOptionValue(
                                                                                                                            index,
                                                                                                                            valueIndex,
                                                                                                                            'price_adjustment',
                                                                                                                            Number(
                                                                                                                                e
                                                                                                                                    .target
                                                                                                                                    .value,
                                                                                                                            ),
                                                                                                                        )
                                                                                                                    }
                                                                                                                    placeholder="0.00"
                                                                                                                    className="w-full"
                                                                                                                />
                                                                                                            </TableCell>
                                                                                                            <TableCell>
                                                                                                                <Select
                                                                                                                    value={
                                                                                                                        value.price_type
                                                                                                                    }
                                                                                                                    onValueChange={(
                                                                                                                        val,
                                                                                                                    ) =>
                                                                                                                        updateOptionValue(
                                                                                                                            index,
                                                                                                                            valueIndex,
                                                                                                                            'price_type',
                                                                                                                            val as
                                                                                                                                | 'fixed'
                                                                                                                                | 'percentage',
                                                                                                                        )
                                                                                                                    }
                                                                                                                >
                                                                                                                    <SelectTrigger>
                                                                                                                        <SelectValue />
                                                                                                                    </SelectTrigger>
                                                                                                                    <SelectContent>
                                                                                                                        <SelectItem value="fixed">
                                                                                                                            Fixed
                                                                                                                        </SelectItem>
                                                                                                                        <SelectItem value="percentage">
                                                                                                                            Percentage
                                                                                                                        </SelectItem>
                                                                                                                    </SelectContent>
                                                                                                                </Select>
                                                                                                            </TableCell>
                                                                                                            <TableCell className="text-center">
                                                                                                                <Button
                                                                                                                    type="button"
                                                                                                                    variant="ghost"
                                                                                                                    size="sm"
                                                                                                                    onClick={() =>
                                                                                                                        removeOptionValue(
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
                                    </DndContext>
                                    <Button
                                        type="button"
                                        variant="outline"
                                        onClick={() => addOption()}
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
                                                                <input
                                                                    type="file"
                                                                    id={`download-file-${index}`}
                                                                    className="hidden"
                                                                    accept="*/*"
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
                                                                            const updated =
                                                                                [
                                                                                    ...downloads,
                                                                                ];
                                                                            updated[
                                                                                index
                                                                            ] =
                                                                                {
                                                                                    ...updated[
                                                                                        index
                                                                                    ],
                                                                                    file: file.name,
                                                                                };
                                                                            setDownloads(
                                                                                updated,
                                                                            );
                                                                        }
                                                                        // Reset input so same file can be selected again
                                                                        e.target.value =
                                                                            '';
                                                                    }}
                                                                />
                                                                <Button
                                                                    type="button"
                                                                    variant="outline"
                                                                    onClick={() => {
                                                                        const input =
                                                                            document.getElementById(
                                                                                `download-file-${index}`,
                                                                            ) as HTMLInputElement;
                                                                        input?.click();
                                                                    }}
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
                                                    // @ts-expect-error - Media array can contain both File objects and existing media
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
                                                        (item, index) => {
                                                            // Type guard: File mi yoksa mevcut media mı?
                                                            const isFile =
                                                                item &&
                                                                typeof item ===
                                                                    'object' &&
                                                                'file' in
                                                                    item &&
                                                                'preview' in
                                                                    item;
                                                            const fileItem =
                                                                item as
                                                                    | {
                                                                          file: File;
                                                                          preview: string;
                                                                      }
                                                                    | {
                                                                          type:
                                                                              | 'image'
                                                                              | 'video';
                                                                          path: string;
                                                                          alt?: string;
                                                                      };
                                                            const mediaItem =
                                                                isFile
                                                                    ? {
                                                                          type: 'image' as const,
                                                                          path: (
                                                                              fileItem as {
                                                                                  preview: string;
                                                                              }
                                                                          )
                                                                              .preview,
                                                                          alt: '',
                                                                      }
                                                                    : (fileItem as {
                                                                          type:
                                                                              | 'image'
                                                                              | 'video';
                                                                          path: string;
                                                                          alt?: string;
                                                                      });

                                                            return (
                                                                <div
                                                                    key={index}
                                                                    className="relative"
                                                                >
                                                                    <img
                                                                        src={
                                                                            isFile
                                                                                ? (
                                                                                      item as {
                                                                                          preview: string;
                                                                                      }
                                                                                  )
                                                                                      .preview
                                                                                : mediaItem.path
                                                                        }
                                                                        alt={
                                                                            mediaItem.alt ||
                                                                            `Media ${index + 1}`
                                                                        }
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
                                                            );
                                                        },
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
