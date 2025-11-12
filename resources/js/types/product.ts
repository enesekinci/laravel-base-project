/**
 * Product ile ilgili tüm TypeScript tipleri
 */

export interface Attribute {
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

export interface Variation {
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

export interface ProductOption {
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

export interface Category {
    id: number;
    name: string;
    parent_id: number | null;
    children?: Category[];
}

export interface ProductFormData {
    name: string;
    slug: string;
    sku: string;
    description: string;
    short_description: string;
    brand_id: number | null;
    tax_class_id: number | null;
    status: 'draft' | 'published';
    is_virtual: boolean;
    seo_url: string;
    meta_title: string;
    meta_description: string;
    new_from: string;
    new_to: string;
    sort_order: number;
    category_ids: number[];
    tag_ids: number[];
    attributes: Array<{
        attribute_id: number;
        attribute_value_ids: number[];
    }>;
    variation_ids: Array<{
        variation_id: number;
        variation_value_ids: number[];
    }>;
    variants: Array<{
        name: string;
        sku?: string;
        price?: number;
        stock?: number;
        variation_values: Array<{
            variation_id: number;
            variation_value_id: number;
        }>;
    }>;
    option_ids: number[];
    options: number[];
    media: Array<{
        file?: File;
        preview?: string;
        url?: string;
        type?: 'image' | 'video';
        path?: string;
        alt?: string;
        sort_order?: number;
    }>;
    downloads: Array<{
        file: string;
        sort_order?: number;
    }>;
    links: Array<{
        linked_product_id: number;
        type: 'up_sell' | 'cross_sell' | 'related';
    }>;
    redirect?: string;
}

export interface ProductVariationLocalValue {
    label: string;
    value?: string;
    color?: string;
    image?: string;
    sort_order: number;
    tempId?: string;
}

export interface ProductVariation {
    variation_id: number;
    name: string;
    type: 'text' | 'color' | 'image';
    variation_value_ids: number[];
    localValues?: ProductVariationLocalValue[];
    tempId?: string;
}

export interface ProductVariant {
    name: string;
    sku?: string;
    barcode?: string;
    price?: number;
    stock?: number;
    image?: string | File;
    imagePreview?: string;
    is_active?: boolean;
    variation_values: Array<{
        variation_id: number;
        variation_value_id: number;
    }>;
    tempId?: string;
}

export interface ProductAttribute {
    attribute_id: number;
    attribute_value_ids: number[];
    tempId?: string;
}

export interface ProductOptionValueLocal {
    label: string;
    value?: string;
    price_adjustment: number;
    price_type: 'fixed' | 'percentage';
    sort_order: number;
    tempId?: string;
}

export interface ProductOptionSelection {
    option_id: number;
    localValues?: ProductOptionValueLocal[];
    tempId?: string;
}

export interface DownloadItem {
    file: string;
    tempId?: string;
}

export interface ProductCreateProps {
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
