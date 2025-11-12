import { Combobox } from '@/components/combobox';
import InputError from '@/components/input-error';
import { MultiSelect } from '@/components/multi-select';
import { Card, CardContent, CardHeader, CardTitle } from '@/components/ui/card';
import { Checkbox } from '@/components/ui/checkbox';
import { Input } from '@/components/ui/input';
import { Label } from '@/components/ui/label';
import {
    Select,
    SelectContent,
    SelectItem,
    SelectTrigger,
    SelectValue,
} from '@/components/ui/select';
import { Textarea } from '@/components/ui/textarea';
import { RichTextEditor } from '@/components/ui/rich-text-editor';
import { useAutoSlug } from '@/hooks/use-auto-slug';

type Brand = { id: number; name: string };
type Tag = { id: number; name: string };
type TaxClass = { id: number; name: string; rate: number };
type Category = {
    id: number;
    name: string;
    children?: Category[];
};

interface ProductGeneralFormProps {
    // Form data
    name: string;
    slug: string;
    sku: string;
    description: string;
    short_description: string;
    brand_id: number | null;
    tax_class_id: number | null;
    status: 'draft' | 'published';
    is_virtual: boolean;
    sort_order: number;

    // Options
    brands: Brand[];
    categories: Category[];
    tags: Tag[];
    taxClasses: TaxClass[];

    // Selected values
    selectedCategories: number[];
    selectedTags: number[];

    // Handlers
    onNameChange: (value: string) => void;
    onSlugChange: (value: string) => void;
    onFieldChange: (
        field: string,
        value: string | number | boolean | null,
    ) => void;
    onCategoriesChange: (ids: number[]) => void;
    onTagsChange: (ids: number[]) => void;

    // Errors
    errors: Record<string, string | string[] | undefined>;
}

export function ProductGeneralForm({
    name,
    slug,
    sku,
    description,
    short_description,
    brand_id,
    tax_class_id,
    status,
    is_virtual,
    sort_order,
    brands,
    categories,
    tags,
    taxClasses,
    selectedCategories,
    selectedTags,
    onNameChange,
    onSlugChange,
    onFieldChange,
    onCategoriesChange,
    onTagsChange,
    errors,
}: ProductGeneralFormProps) {
    // Auto slug hook
    const { handleNameChange, handleSlugChange, handleSlugBlur } = useAutoSlug(
        name,
        slug,
        onSlugChange,
    );

    // Flatten categories tree for MultiSelect
    const flattenCategories = (
        cats: Category[],
        level = 0,
    ): Array<{ value: string; label: string; searchKey: string }> => {
        const result: Array<{
            value: string;
            label: string;
            searchKey: string;
        }> = [];

        cats.forEach((category) => {
            const prefix = '  '.repeat(level);
            result.push({
                value: category.id.toString(),
                label: `${prefix}${category.name}`,
                searchKey: category.name.toLowerCase(),
            });
            if (category.children && category.children.length > 0) {
                result.push(...flattenCategories(category.children, level + 1));
            }
        });
        return result;
    };

    const categoryOptions = flattenCategories(categories);

    return (
        <Card>
            <CardHeader>
                <CardTitle>General</CardTitle>
            </CardHeader>
            <CardContent className="space-y-4">
                <div className="space-y-2">
                    <Label htmlFor="name">
                        Name <span className="text-red-500">*</span>
                    </Label>
                    <Input
                        id="name"
                        value={name}
                        onChange={(e) => {
                            const value = e.target.value;
                            onNameChange(value);
                            handleNameChange(value);
                        }}
                        placeholder="Ürün adı"
                    />
                    <InputError
                        message={
                            Array.isArray(errors.name)
                                ? errors.name[0]
                                : errors.name
                        }
                    />
                </div>

                <div className="space-y-2">
                    <Label htmlFor="slug">
                        Slug <span className="text-red-500">*</span>
                    </Label>
                    <Input
                        id="slug"
                        value={slug}
                        onChange={(e) => {
                            handleSlugChange(e.target.value);
                        }}
                        onBlur={handleSlugBlur}
                        placeholder="urun-adi"
                    />
                    <InputError
                        message={
                            Array.isArray(errors.slug)
                                ? errors.slug[0]
                                : errors.slug
                        }
                    />
                </div>

                <div className="space-y-2">
                    <Label htmlFor="description">
                        Description <span className="text-red-500">*</span>
                    </Label>
                    <RichTextEditor
                        value={description}
                        onChange={(value) =>
                            onFieldChange('description', value)
                        }
                        placeholder="Ürün açıklaması"
                        error={
                            Array.isArray(errors.description)
                                ? errors.description[0]
                                : errors.description
                        }
                    />
                </div>

                <div className="grid grid-cols-2 gap-4">
                    <div className="space-y-2">
                        <Label htmlFor="brand_id">
                            Brand <span className="text-red-500">*</span>
                        </Label>
                        <Combobox
                            options={
                                brands && brands.length > 0
                                    ? brands
                                          .filter((brand) => brand.id != null)
                                          .map((brand) => ({
                                              value: brand.id.toString(),
                                              label: brand.name,
                                          }))
                                    : []
                            }
                            value={brand_id?.toString() || ''}
                            onValueChange={(value) =>
                                onFieldChange(
                                    'brand_id',
                                    value ? parseInt(value) : null,
                                )
                            }
                            placeholder="Select brand..."
                            searchPlaceholder="Search brands..."
                            emptyMessage="No brands found."
                        />
                        <InputError
                            message={
                                Array.isArray(errors.brand_id)
                                    ? errors.brand_id[0]
                                    : errors.brand_id
                            }
                        />
                    </div>

                    <div className="space-y-2">
                        <Label htmlFor="tax_class_id">
                            Tax Class <span className="text-red-500">*</span>
                        </Label>
                        <Combobox
                            options={
                                taxClasses && taxClasses.length > 0
                                    ? taxClasses
                                          .filter(
                                              (taxClass) => taxClass.id != null,
                                          )
                                          .map((taxClass) => ({
                                              value: taxClass.id.toString(),
                                              label: taxClass.name,
                                          }))
                                    : []
                            }
                            value={tax_class_id?.toString() || ''}
                            onValueChange={(value) =>
                                onFieldChange(
                                    'tax_class_id',
                                    value ? parseInt(value) : null,
                                )
                            }
                            placeholder="Select tax class..."
                            searchPlaceholder="Search tax classes..."
                            emptyMessage="No tax classes found."
                        />
                        <InputError
                            message={
                                Array.isArray(errors.tax_class_id)
                                    ? errors.tax_class_id[0]
                                    : errors.tax_class_id
                            }
                        />
                    </div>
                </div>

                <div className="space-y-2">
                    <Label htmlFor="sku">
                        SKU <span className="text-red-500">*</span>
                    </Label>
                    <Input
                        id="sku"
                        value={sku}
                        onChange={(e) => onFieldChange('sku', e.target.value)}
                        placeholder="SKU-001"
                    />
                    <InputError
                        message={
                            Array.isArray(errors.sku)
                                ? errors.sku[0]
                                : errors.sku
                        }
                    />
                </div>

                <div className="space-y-2">
                    <Label htmlFor="short_description">
                        Short Description{' '}
                        <span className="text-red-500">*</span>
                    </Label>
                    <Textarea
                        id="short_description"
                        value={short_description}
                        onChange={(e) =>
                            onFieldChange('short_description', e.target.value)
                        }
                        placeholder="Kısa açıklama"
                        rows={3}
                    />
                    <InputError
                        message={
                            Array.isArray(errors.short_description)
                                ? errors.short_description[0]
                                : errors.short_description
                        }
                    />
                </div>

                <div className="grid grid-cols-2 gap-4">
                    <div className="space-y-2">
                        <Label htmlFor="status">Status</Label>
                        <Select
                            value={status}
                            onValueChange={(value) =>
                                onFieldChange('status', value)
                            }
                        >
                            <SelectTrigger>
                                <SelectValue />
                            </SelectTrigger>
                            <SelectContent>
                                <SelectItem value="draft">Draft</SelectItem>
                                <SelectItem value="published">
                                    Published
                                </SelectItem>
                            </SelectContent>
                        </Select>
                        <InputError
                            message={
                                Array.isArray(errors.status)
                                    ? errors.status[0]
                                    : errors.status
                            }
                        />
                    </div>

                    <div className="space-y-2">
                        <Label htmlFor="sort_order">Sort Order</Label>
                        <Input
                            id="sort_order"
                            type="number"
                            value={sort_order}
                            onChange={(e) =>
                                onFieldChange(
                                    'sort_order',
                                    parseInt(e.target.value) || 0,
                                )
                            }
                        />
                        <InputError
                            message={
                                Array.isArray(errors.sort_order)
                                    ? errors.sort_order[0]
                                    : errors.sort_order
                            }
                        />
                    </div>
                </div>

                <div className="flex items-center space-x-2">
                    <Checkbox
                        id="is_virtual"
                        checked={is_virtual}
                        onCheckedChange={(checked) =>
                            onFieldChange('is_virtual', checked === true)
                        }
                    />
                    <Label htmlFor="is_virtual">Virtual Product</Label>
                </div>

                <div className="space-y-2">
                    <Label>
                        Categories <span className="text-red-500">*</span>{' '}
                        (min 1)
                    </Label>
                    <MultiSelect
                        options={categoryOptions}
                        selected={selectedCategories.map((id) => id.toString())}
                        onSelectionChange={(newCategories) => {
                            onCategoriesChange(
                                newCategories.map((c) => parseInt(c)),
                            );
                        }}
                        placeholder="Select categories..."
                        searchPlaceholder="Search categories..."
                        emptyMessage="No categories found."
                        maxDisplay={3}
                    />
                    <InputError
                        message={
                            Array.isArray(errors.category_ids)
                                ? errors.category_ids[0]
                                : errors.category_ids
                        }
                    />
                </div>

                <div className="space-y-2">
                    <Label>Tags</Label>
                    <MultiSelect
                        options={
                            tags && tags.length > 0
                                ? tags
                                      .filter((tag) => tag.id != null)
                                      .map((tag) => ({
                                          value: tag.id.toString(),
                                          label: tag.name,
                                      }))
                                : []
                        }
                        selected={selectedTags.map((id) => id.toString())}
                        onSelectionChange={(newTags) => {
                            onTagsChange(newTags.map((t) => parseInt(t)));
                        }}
                        placeholder="Select tags..."
                        searchPlaceholder="Search tags..."
                        emptyMessage="No tags found."
                        maxDisplay={3}
                    />
                    <InputError
                        message={
                            Array.isArray(errors.tag_ids)
                                ? errors.tag_ids[0]
                                : errors.tag_ids
                        }
                    />
                </div>
            </CardContent>
        </Card>
    );
}
