import { ProductAttributesForm } from '@/components/products/ProductAttributesForm';
import { ProductGeneralForm } from '@/components/products/ProductGeneralForm';
import { ProductMediaUploader } from '@/components/products/ProductMediaUploader';
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
import { useToast } from '@/components/ui/use-toast';
import { useProductVariants } from '@/hooks/use-product-variants';
import { useProductVariations } from '@/hooks/use-product-variations';
import { useToastErrors } from '@/hooks/use-toast-errors';
import AppLayout from '@/layouts/app-layout';
import { index, store } from '@/routes/admin/products';
import type { BreadcrumbItem } from '@/types';
import type {
    ProductCreateProps,
    ProductFormData,
    ProductOptionSelection,
    ProductOptionValueLocal,
} from '@/types/product';
import {
    DndContext,
    KeyboardSensor,
    PointerSensor,
    closestCenter,
    useSensor,
    useSensors,
    type DragEndEvent,
} from '@dnd-kit/core';
import {
    SortableContext,
    arrayMove,
    sortableKeyboardCoordinates,
    verticalListSortingStrategy,
} from '@dnd-kit/sortable';
import { Head, Link, router, useForm } from '@inertiajs/react';
import {
    ArrowLeft,
    ChevronDown,
    GripVertical,
    Plus,
    Sparkles,
    Trash2,
} from 'lucide-react';
import { useEffect, useRef, useState } from 'react';

const breadcrumbs: BreadcrumbItem[] = [
    { title: 'Dashboard', href: '/admin/dashboard' },
    { title: 'Ürünler', href: '/admin/products' },
    { title: 'Yeni Ürün', href: '/admin/products/create' },
];

export default function ProductsCreate({
    brands = [],
    categories = [],
    tags = [],
    taxClasses = [],
    attributes = [],
    variations = [],
    productOptions = [],
}: ProductCreateProps) {
    const { data, setData, processing, errors } = useForm<ProductFormData>({
        name: '',
        slug: '',
        sku: '',
        description: '',
        short_description: '',
        brand_id: null,
        tax_class_id: null,
        status: 'draft',
        is_virtual: false,
        seo_url: '',
        meta_title: '',
        meta_description: '',
        new_from: '',
        new_to: '',
        sort_order: 0,
        category_ids: [],
        tag_ids: [],
        attributes: [],
        variation_ids: [],
        variants: [],
        option_ids: [],
        options: [],
        media: [],
        downloads: [],
        links: [],
        redirect: undefined,
    });

    useToastErrors(errors);
    const { toast } = useToast();

    const [selectedCategories, setSelectedCategories] = useState<number[]>([]);
    const [selectedTags, setSelectedTags] = useState<number[]>([]);
    const [productAttributes, setProductAttributes] = useState<
        Array<{
            attribute_id: number;
            attribute_value_ids: number[];
            tempId?: string;
        }>
    >([]);
    const [selectedTemplateId, setSelectedTemplateId] = useState<
        string | undefined
    >(undefined);
    const [selectedOptions, setSelectedOptions] = useState<
        ProductOptionSelection[]
    >([]);
    const [downloads, setDownloads] = useState<
        Array<{
            file: string;
            tempId?: string;
        }>
    >([]);

    const tempIdCounter = useRef(0);
    const shouldFillBarcodes = useRef(false);
    const formSubmitButtonRef = useRef<HTMLButtonElement>(null);

    // Product variations hook
    const {
        productVariations,
        addVariation,
        removeVariation,
        updateVariation,
        addVariationValue,
        removeVariationValue,
    } = useProductVariations({ variations });

    // Product variants hook - variations değiştiğinde otomatik güncellenir
    const { productVariants, updateVariant, removeVariant } =
        useProductVariants({
            productVariations,
            variations,
            baseSku: data.sku,
        });

    // Downloads için başlangıçta bir boş item ekle
    useEffect(() => {
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

    // Fill barcodes when variants are generated after fillFakeData
    useEffect(() => {
        if (shouldFillBarcodes.current && productVariants.length > 0) {
            productVariants.forEach((variant, index) => {
                if (!variant.barcode || variant.barcode === '') {
                    updateVariant(
                        index,
                        'barcode',
                        'BC-' +
                            Math.floor(Math.random() * 1000000)
                                .toString()
                                .padStart(8, '0'),
                    );
                }
            });
            shouldFillBarcodes.current = false;
        }
    }, [productVariants, updateVariant]);

    const sensors = useSensors(
        useSensor(PointerSensor),
        useSensor(KeyboardSensor, {
            coordinateGetter: sortableKeyboardCoordinates,
        }),
    );

    // Attribute handlers
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

    // Variation handlers
    const handleVariationDragEnd = (event: DragEndEvent) => {
        const { active, over } = event;
        if (over && active.id !== over.id) {
            // Bu işlevi useProductVariations hook'una taşımalıyız
            // Şimdilik boş bırakıyoruz
        }
    };

    const handleVariationValueDragEnd = (
        variationIndex: number,
        event: DragEndEvent,
    ) => {
        const { active, over } = event;
        if (over && active.id !== over.id) {
            // Bu işlevi useProductVariations hook'una taşımalıyız
            // Şimdilik boş bırakıyoruz
        }
    };

    // Option handlers
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

        const newValue: ProductOptionValueLocal = {
            label: '',
            value: '',
            price_adjustment: 0,
            price_type: 'fixed',
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

    // Download handlers
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

    // Fill form with fake data for testing
    const fillFakeData = () => {
        // Flatten categories to get IDs
        const flattenCategories = (
            cats: typeof categories,
            result: number[] = [],
        ): number[] => {
            cats.forEach((cat) => {
                result.push(cat.id);
                if (cat.children && cat.children.length > 0) {
                    flattenCategories(cat.children, result);
                }
            });
            return result;
        };

        const categoryIds = flattenCategories(categories).slice(0, 2);
        const firstBrand = brands.length > 0 ? brands[0].id : null;
        const firstTaxClass = taxClasses.length > 0 ? taxClasses[0].id : null;
        const firstVariations = variations.slice(0, 2);
        const firstTags = tags.slice(0, 2).map((tag) => tag.id);
        const firstAttribute = attributes.length > 0 ? attributes[0] : null;
        const firstOption =
            productOptions.length > 0 ? productOptions[0] : null;

        // Set form data
        setData({
            name: 'Test Ürün ' + Math.floor(Math.random() * 1000),
            slug: 'test-urun-' + Math.floor(Math.random() * 1000),
            sku: 'TEST-' + Math.floor(Math.random() * 10000),
            description:
                '<h2>Ürün Açıklaması</h2><p>Bu bir <strong>test ürünü</strong> açıklamasıdır.</p><ul><li>Özellik 1</li><li>Özellik 2</li><li>Özellik 3</li></ul>',
            short_description:
                'Bu ürün test amaçlı oluşturulmuştur. Hızlı test için kullanılabilir.',
            brand_id: firstBrand,
            tax_class_id: firstTaxClass,
            status: 'draft',
            is_virtual: false,
            seo_url: 'test-urun',
            meta_title: 'Test Ürün - Meta Başlık',
            meta_description: 'Test ürün meta açıklaması',
            new_from: '',
            new_to: '',
            sort_order: 0,
            category_ids: [],
            tag_ids: [],
            attributes: [],
            variation_ids: [],
            variants: [],
            option_ids: [],
            options: [],
            media: [],
            downloads: [],
            links: [],
            redirect: undefined,
        });

        // Set categories
        setSelectedCategories(categoryIds);

        // Set tags
        if (firstTags.length > 0) {
            setSelectedTags(firstTags);
        }

        // Set attributes
        if (firstAttribute) {
            const attributeValueIds =
                firstAttribute.values && firstAttribute.values.length > 0
                    ? [firstAttribute.values[0].id]
                    : [];
            // Direkt attribute ekle
            const newAttribute = {
                attribute_id: firstAttribute.id,
                attribute_value_ids: attributeValueIds,
                tempId: `temp-${Date.now()}-${Math.random()}`,
            };
            setProductAttributes([newAttribute]);
        }

        // Set options
        if (firstOption) {
            addOption(firstOption.id);
        }

        // Set variations and generate variants
        if (firstVariations.length > 0) {
            firstVariations.forEach((variation) => {
                addVariation(variation.id);
            });

            // Flag to fill barcodes when variants are generated
            shouldFillBarcodes.current = true;
        }
    };

    // Form submit
    const handleSubmit = (e: React.FormEvent, redirectToIndex = false) => {
        e.preventDefault();

        // Client-side validation
        const validationErrors: string[] = [];

        if (!data.name || data.name.trim() === '') {
            validationErrors.push('Ürün adı gereklidir');
        }

        if (!data.slug || data.slug.trim() === '') {
            validationErrors.push('Slug gereklidir');
        }

        if (!data.sku || data.sku.trim() === '') {
            validationErrors.push('SKU gereklidir');
        }

        if (!data.description || data.description.trim() === '') {
            validationErrors.push('Açıklama gereklidir');
        }

        if (!data.short_description || data.short_description.trim() === '') {
            validationErrors.push('Kısa açıklama gereklidir');
        }

        if (!data.brand_id) {
            validationErrors.push('Marka seçimi gereklidir');
        }

        if (!data.tax_class_id) {
            validationErrors.push('Vergi sınıfı seçimi gereklidir');
        }

        if (selectedCategories.length === 0) {
            validationErrors.push('En az bir kategori seçilmelidir');
        }

        if (productVariations.length === 0) {
            validationErrors.push('En az bir varyasyon seçilmelidir');
        }

        if (productVariants.length === 0) {
            validationErrors.push('En az bir varyant oluşturulmalıdır');
        }

        // Validation hataları varsa toast göster ve submit etme
        if (validationErrors.length > 0) {
            toast({
                title: 'Form Hataları',
                description: validationErrors
                    .map((err) => `• ${err}`)
                    .join('\n'),
                variant: 'destructive',
            });
            return;
        }

        try {
            // Attributes - backend her attribute_value_id için ayrı kayıt bekliyor
            const attributesArray: Array<{
                attribute_id: number;
                attribute_value_id: number | null;
            }> = [];
            productAttributes.forEach((attr) => {
                if (attr.attribute_value_ids.length > 0) {
                    attr.attribute_value_ids.forEach((valueId) => {
                        attributesArray.push({
                            attribute_id: attr.attribute_id,
                            attribute_value_id: valueId,
                        });
                    });
                } else {
                    attributesArray.push({
                        attribute_id: attr.attribute_id,
                        attribute_value_id: null,
                    });
                }
            });

            // Variants - product_variations tablosuna kaydedilir
            const variantsData = productVariants.map((variant) => ({
                name: variant.name,
                sku: variant.sku || '',
                barcode: variant.barcode || '',
                price: variant.price || 0,
                stock: variant.stock || 0,
                image:
                    variant.image instanceof File
                        ? variant.image
                        : variant.image || null,
                variation_values: variant.variation_values,
            }));

            // Media - sort_order ekle
            const mediaData = data.media.map((item, index) => ({
                ...item,
                sort_order: item.sort_order ?? index,
            }));

            // Variations - product_variation_templates tablosuna kaydedilir
            const variationsData = productVariations.map(
                (variation, index) => ({
                    variation_id: variation.variation_id,
                    sort_order: index,
                }),
            );

            // Form data'yı hazırla
            const formData = {
                ...data,
                categories: selectedCategories,
                tags: selectedTags,
                attributes: attributesArray,
                variations: variationsData,
                variants: variantsData,
                options: selectedOptions.map((opt) => ({
                    option_id: opt.option_id,
                    values: (opt.localValues || []).map((val) => ({
                        label: val.label,
                        value: val.value || null,
                        price_adjustment: val.price_adjustment || 0,
                        price_type: val.price_type || 'fixed',
                        sort_order: val.sort_order || 0,
                    })),
                })),
                downloads: downloads.map((dl) => ({ file: dl.file })),
                media: mediaData,
                redirect: redirectToIndex ? 'index' : data.redirect,
            };

            // Submit et - formData'yı doğrudan router.post ile gönder
            // setData asenkron olduğu için ilk submit'te state güncellenmeden post çağrılıyordu
            // router.post kullanarak hazırlanan formData'yı direkt gönderiyoruz
            router.post(store().url, formData, {
                onError: (errors) => {
                    // Hatalar zaten useToastErrors hook'u tarafından gösterilecek
                    console.error('Form submission errors:', errors);
                },
                onSuccess: () => {
                    // Başarılı submit - flash message zaten useToastErrors hook'u tarafından gösterilecek
                },
            });
        } catch (error) {
            console.error('Form submission error:', error);
            toast({
                title: 'Hata',
                description:
                    error instanceof Error
                        ? error.message
                        : 'Ürün kaydedilirken bir hata oluştu',
                variant: 'destructive',
            });
        }
    };

    return (
        <AppLayout breadcrumbs={breadcrumbs}>
            <Head title="Yeni Ürün" />

            <div className="flex flex-1 flex-col">
                <div className="flex-1 space-y-6 p-6 pb-24">
                    <div className="flex items-center justify-between">
                        <div>
                            <h1 className="text-3xl font-bold tracking-tight">
                                Yeni Ürün
                            </h1>
                            <p className="mt-1 text-muted-foreground">
                                Yeni bir ürün oluşturun
                            </p>
                        </div>
                        <div className="flex items-center gap-2">
                            <Button
                                type="button"
                                variant="outline"
                                onClick={fillFakeData}
                                className="border-yellow-300 bg-yellow-50 text-yellow-800 hover:bg-yellow-100"
                            >
                                <Sparkles className="mr-2 h-4 w-4" />
                                Fill (Test)
                            </Button>
                            <Link href={index()}>
                                <Button variant="outline">
                                    <ArrowLeft className="mr-2 h-4 w-4" />
                                    Geri Dön
                                </Button>
                            </Link>
                        </div>
                    </div>

                    <form
                        onSubmit={handleSubmit}
                        id="product-form"
                        className="space-y-6"
                    >
                        {/* Hidden submit button for footer button */}
                        <button
                            type="submit"
                            ref={formSubmitButtonRef}
                            className="hidden"
                            aria-hidden="true"
                        />
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
                                    onNameChange={(value) =>
                                        setData('name', value)
                                    }
                                    onSlugChange={(value) =>
                                        setData('slug', value)
                                    }
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
                                    onAddVariation={addVariation}
                                    onRemoveVariation={removeVariation}
                                    onUpdateVariation={updateVariation}
                                    onRemoveVariationValue={
                                        removeVariationValue
                                    }
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
                                                                            ] =
                                                                                {
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
                                <ProductMediaUploader
                                    media={data.media}
                                    onAdd={(files) => {
                                        setData('media', [
                                            ...data.media,
                                            ...files.map((file, index) => ({
                                                file,
                                                preview:
                                                    URL.createObjectURL(file),
                                                sort_order:
                                                    data.media.length + index,
                                                type: (file.type.startsWith(
                                                    'image',
                                                )
                                                    ? 'image'
                                                    : 'video') as
                                                    | 'image'
                                                    | 'video',
                                            })),
                                        ]);
                                    }}
                                    onRemove={(index) => {
                                        const updated = [...data.media];
                                        updated.splice(index, 1);
                                        setData('media', updated);
                                    }}
                                />

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
                                                    setData(
                                                        'sku',
                                                        e.target.value,
                                                    )
                                                }
                                                placeholder="SKU-001"
                                            />
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
                    </form>
                </div>

                {/* Fixed Footer - Always visible at bottom */}
                <div
                    className="fixed right-0 bottom-0 z-50 border-t bg-background px-6 py-4 shadow-lg transition-[left] duration-200 ease-linear"
                    style={
                        {
                            left: 'var(--sidebar-width, 256px)',
                        } as React.CSSProperties
                    }
                >
                    <div className="flex justify-end gap-4">
                        <Link href={index()}>
                            <Button type="button" variant="outline">
                                İptal
                            </Button>
                        </Link>
                        <Button
                            type="button"
                            disabled={processing}
                            onClick={() => {
                                // Click the hidden submit button in the form
                                if (formSubmitButtonRef.current) {
                                    formSubmitButtonRef.current.click();
                                }
                            }}
                        >
                            {processing ? 'Kaydediliyor...' : 'Kaydet'}
                        </Button>
                        <Button
                            type="button"
                            variant="outline"
                            disabled={processing}
                            onClick={(e) => {
                                handleSubmit(e, true);
                            }}
                        >
                            {processing ? 'Kaydediliyor...' : 'Kaydet & Çık'}
                        </Button>
                    </div>
                </div>
            </div>
        </AppLayout>
    );
}
