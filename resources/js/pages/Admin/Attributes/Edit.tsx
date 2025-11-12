import InputError from '@/components/input-error';
import { SortableTableRow } from '@/components/SortableTableRow';
import { Button } from '@/components/ui/button';
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
import {
    Table,
    TableBody,
    TableCell,
    TableHead,
    TableHeader,
    TableRow,
} from '@/components/ui/table';
import AppLayout from '@/layouts/app-layout';
import { index, show, update } from '@/routes/admin/attributes';
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
import { Head, Link, router, useForm } from '@inertiajs/react';
import { ArrowLeft, Plus, Trash2, X } from 'lucide-react';
import React, { useState } from 'react';

const breadcrumbs: BreadcrumbItem[] = [
    { title: 'Dashboard', href: '/admin/dashboard' },
    { title: 'Özellikler', href: '/admin/attributes' },
    { title: 'Özellik Düzenle', href: '#' },
];

interface AttributeValue {
    id?: number;
    value: string;
    slug?: string;
    color?: string;
    image?: string;
    sort_order: number;
}

interface Category {
    id: number;
    name: string;
    parent_id: number | null;
    children?: Category[];
}

interface AttributeSet {
    id: number;
    name: string;
}

interface Props {
    attribute: {
        id: number;
        name: string;
        attribute_set_id?: number | null;
        is_filterable: boolean;
        values?: AttributeValue[];
        categories?: Category[];
    };
    attributeSets?: AttributeSet[];
    categories?: Category[];
}

export default function AttributesEdit({
    attribute,
    attributeSets = [],
    categories = [],
}: Props) {
    const { data, setData, processing, errors } = useForm({
        name: attribute.name,
        attribute_set_id: attribute.attribute_set_id || null,
        category_ids: [] as number[],
        is_filterable: attribute.is_filterable,
        values: [] as AttributeValue[],
    });

    const [localValues, setLocalValues] = useState<
        (AttributeValue & { tempId?: string })[]
    >(
        attribute.values && attribute.values.length > 0
            ? attribute.values.map((v) => ({
                  ...v,
                  tempId: v.id ? `existing-${v.id}` : undefined,
              }))
            : [],
    );
    const [selectedCategories, setSelectedCategories] = useState<number[]>(
        attribute.categories?.map((c) => c.id) || [],
    );

    const addValue = () => {
        const newValue: AttributeValue & { tempId?: string } = {
            value: '',
            slug: '',
            color: '',
            image: '',
            sort_order: localValues.length,
            tempId: `temp-${Date.now()}-${Math.random()}`,
        };
        setLocalValues([...localValues, newValue]);
    };

    const sensors = useSensors(
        useSensor(PointerSensor),
        useSensor(KeyboardSensor, {
            coordinateGetter: sortableKeyboardCoordinates,
        }),
    );

    const handleDragEnd = (event: DragEndEvent) => {
        const { active, over } = event;

        if (over && active.id !== over.id) {
            setLocalValues((items) => {
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

    const removeValue = (index: number) => {
        setLocalValues(localValues.filter((_, i) => i !== index));
    };

    const updateValue = (
        index: number,
        field: keyof AttributeValue,
        value: string | number,
    ) => {
        const updated = [...localValues];
        updated[index] = {
            ...updated[index],
            [field]: value,
        };
        setLocalValues(updated);
    };

    const handleSubmit = (e: React.FormEvent) => {
        e.preventDefault();

        // Local values'ı form data'ya aktar ve sort_order'ı index'e göre ayarla
        const values = localValues.map((v, index) => ({
            value: v.value,
            slug: v.slug || '',
            color: v.color || '',
            image: v.image || '',
            sort_order: index,
        }));

        const formData = {
            ...data,
            values: values,
            category_ids: selectedCategories,
        };

        router.put(update(attribute.id).url, formData);
    };

    // Tree görünümü için kategorileri hazırla
    const buildTree = (
        items: Category[],
        parentId: number | null = null,
        level = 0,
    ): Category[] => {
        return items
            .filter((item) => item.parent_id === parentId)
            .map((item) => ({
                ...item,
                level,
                children: buildTree(items, item.id, level + 1),
            }));
    };

    const treeCategories = buildTree(categories);

    const toggleCategory = (categoryId: number) => {
        setSelectedCategories((prev) =>
            prev.includes(categoryId)
                ? prev.filter((id) => id !== categoryId)
                : [...prev, categoryId],
        );
    };

    const renderCategoryTree = (
        category: Category & { level?: number },
        level = 0,
    ): React.ReactNode => {
        const isSelected = selectedCategories.includes(category.id);
        const prefix = '--'.repeat(level);

        return (
            <React.Fragment key={category.id}>
                <div className="flex items-center space-x-2 py-1">
                    <Checkbox
                        id={`category-${category.id}`}
                        checked={isSelected}
                        onCheckedChange={() => toggleCategory(category.id)}
                    />
                    <Label
                        htmlFor={`category-${category.id}`}
                        className="cursor-pointer text-sm font-normal"
                    >
                        {prefix}
                        {prefix && ' '}
                        {category.name}
                    </Label>
                </div>
                {category.children &&
                    category.children.map((child) =>
                        renderCategoryTree(child, level + 1),
                    )}
            </React.Fragment>
        );
    };

    return (
        <AppLayout breadcrumbs={breadcrumbs}>
            <Head title="Özellik Düzenle" />
            <div className="flex-1 space-y-6 p-6">
                <div className="flex items-center justify-between">
                    <div>
                        <h1 className="text-3xl font-bold tracking-tight">
                            Özellik Düzenle
                        </h1>
                        <p className="mt-1 text-muted-foreground">
                            {attribute.name} özelliğini düzenleyin
                        </p>
                    </div>
                    <div className="flex gap-2">
                        <Link href={show(attribute.id)}>
                            <Button variant="outline">Görüntüle</Button>
                        </Link>
                        <Link href={index()}>
                            <Button variant="outline">
                                <ArrowLeft className="mr-2 h-4 w-4" /> Geri Dön
                            </Button>
                        </Link>
                    </div>
                </div>
                <form onSubmit={handleSubmit} className="space-y-6">
                    <Card>
                        <CardHeader>
                            <CardTitle>Attribute Information</CardTitle>
                        </CardHeader>
                        <CardContent className="space-y-6">
                            <div className="space-y-4">
                                <div>
                                    <h3 className="mb-3 text-sm font-medium">
                                        General
                                    </h3>
                                    <div className="space-y-4">
                                        <div className="space-y-2">
                                            <Label htmlFor="attribute_set_id">
                                                Attribute Set
                                            </Label>
                                            <Select
                                                value={
                                                    data.attribute_set_id
                                                        ? String(
                                                              data.attribute_set_id,
                                                          )
                                                        : undefined
                                                }
                                                onValueChange={(value) =>
                                                    setData(
                                                        'attribute_set_id',
                                                        value
                                                            ? parseInt(value)
                                                            : null,
                                                    )
                                                }
                                            >
                                                <SelectTrigger>
                                                    <SelectValue placeholder="Please Select" />
                                                </SelectTrigger>
                                                <SelectContent>
                                                    {attributeSets.map(
                                                        (set) => (
                                                            <SelectItem
                                                                key={set.id}
                                                                value={String(
                                                                    set.id,
                                                                )}
                                                            >
                                                                {set.name}
                                                            </SelectItem>
                                                        ),
                                                    )}
                                                </SelectContent>
                                            </Select>
                                            <InputError
                                                message={
                                                    errors.attribute_set_id
                                                }
                                            />
                                        </div>

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
                                                onChange={(e) =>
                                                    setData(
                                                        'name',
                                                        e.target.value,
                                                    )
                                                }
                                                placeholder="Attribute name"
                                            />
                                            <InputError message={errors.name} />
                                        </div>
                                    </div>
                                </div>

                                <div>
                                    <h3 className="mb-3 text-sm font-medium">
                                        Categories
                                    </h3>
                                    <div className="max-h-60 overflow-y-auto rounded-md border p-4">
                                        {treeCategories.length > 0 ? (
                                            treeCategories.map((category) =>
                                                renderCategoryTree(category),
                                            )
                                        ) : (
                                            <p className="text-sm text-muted-foreground">
                                                Henüz kategori eklenmemiş
                                            </p>
                                        )}
                                    </div>
                                    {selectedCategories.length > 0 && (
                                        <div className="mt-2 flex flex-wrap gap-2">
                                            {selectedCategories.map((catId) => {
                                                const findCategory = (
                                                    cats: Category[],
                                                    id: number,
                                                ): Category | null => {
                                                    for (const cat of cats) {
                                                        if (cat.id === id)
                                                            return cat;
                                                        if (cat.children) {
                                                            const found =
                                                                findCategory(
                                                                    cat.children,
                                                                    id,
                                                                );
                                                            if (found)
                                                                return found;
                                                        }
                                                    }
                                                    return null;
                                                };
                                                const category = findCategory(
                                                    categories,
                                                    catId,
                                                );
                                                if (!category) return null;
                                                return (
                                                    <span
                                                        key={catId}
                                                        className="inline-flex items-center gap-1 rounded-md bg-muted px-2 py-1 text-xs"
                                                    >
                                                        {category.name}
                                                        <button
                                                            type="button"
                                                            onClick={() =>
                                                                toggleCategory(
                                                                    catId,
                                                                )
                                                            }
                                                            className="ml-1 hover:text-destructive"
                                                        >
                                                            <X className="h-3 w-3" />
                                                        </button>
                                                    </span>
                                                );
                                            })}
                                        </div>
                                    )}
                                    <InputError message={errors.category_ids} />
                                </div>

                                <div>
                                    <div className="flex items-center space-x-2">
                                        <Checkbox
                                            id="is_filterable"
                                            checked={data.is_filterable}
                                            onCheckedChange={(checked) =>
                                                setData(
                                                    'is_filterable',
                                                    checked === true,
                                                )
                                            }
                                        />
                                        <Label
                                            htmlFor="is_filterable"
                                            className="text-sm leading-none font-normal"
                                        >
                                            Filterable
                                        </Label>
                                    </div>
                                    <p className="mt-1 text-xs text-muted-foreground">
                                        Use this attribute for filtering
                                        products
                                    </p>
                                    <InputError
                                        message={errors.is_filterable}
                                    />
                                </div>
                            </div>
                        </CardContent>
                    </Card>

                    <Card>
                        <CardHeader>
                            <div className="flex items-center justify-between">
                                <CardTitle>Values</CardTitle>
                                <Button
                                    type="button"
                                    variant="outline"
                                    size="sm"
                                    onClick={addValue}
                                >
                                    <Plus className="mr-2 h-4 w-4" />
                                    Satır Ekle
                                </Button>
                            </div>
                        </CardHeader>
                        <CardContent>
                            {localValues.length > 0 ? (
                                <DndContext
                                    sensors={sensors}
                                    collisionDetection={closestCenter}
                                    onDragEnd={handleDragEnd}
                                >
                                    <div className="rounded-md border">
                                        <Table>
                                            <TableHeader>
                                                <TableRow>
                                                    <TableHead className="w-12"></TableHead>
                                                    <TableHead>
                                                        Value{' '}
                                                        <span className="text-red-500">
                                                            *
                                                        </span>
                                                    </TableHead>
                                                    <TableHead className="w-24"></TableHead>
                                                </TableRow>
                                            </TableHeader>
                                            <TableBody>
                                                <SortableContext
                                                    items={localValues.map(
                                                        (v) => v.tempId || '',
                                                    )}
                                                    strategy={
                                                        verticalListSortingStrategy
                                                    }
                                                >
                                                    {localValues.map(
                                                        (value, index) => (
                                                            <SortableTableRow
                                                                key={
                                                                    value.tempId ||
                                                                    value.id ||
                                                                    index
                                                                }
                                                                id={
                                                                    value.tempId ||
                                                                    String(
                                                                        value.id ||
                                                                            index,
                                                                    )
                                                                }
                                                            >
                                                                <TableCell className="w-full">
                                                                    <Input
                                                                        value={
                                                                            value.value
                                                                        }
                                                                        onChange={(
                                                                            e,
                                                                        ) =>
                                                                            updateValue(
                                                                                index,
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
                                                                <TableCell className="text-right">
                                                                    <Button
                                                                        type="button"
                                                                        variant="ghost"
                                                                        size="sm"
                                                                        onClick={() =>
                                                                            removeValue(
                                                                                index,
                                                                            )
                                                                        }
                                                                        className="h-8 w-8 p-0"
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
                                    </div>
                                </DndContext>
                            ) : (
                                <div className="py-8 text-center text-muted-foreground">
                                    Henüz değer eklenmemiş. Değer eklemek için
                                    yukarıdaki butonu kullanın.
                                </div>
                            )}
                            {errors.values && (
                                <InputError message={errors.values} />
                            )}
                        </CardContent>
                    </Card>

                    <div className="flex justify-end gap-2">
                        <Link href={index()}>
                            <Button type="button" variant="outline">
                                İptal
                            </Button>
                        </Link>
                        <Button type="submit" disabled={processing}>
                            {processing ? 'Güncelleniyor...' : 'Güncelle'}
                        </Button>
                    </div>
                </form>
            </div>
        </AppLayout>
    );
}
