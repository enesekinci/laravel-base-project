import InputError from '@/components/input-error';
import { SortableTableRow } from '@/components/SortableTableRow';
import { Button } from '@/components/ui/button';
import { Card, CardContent, CardHeader, CardTitle } from '@/components/ui/card';
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
import { index, store } from '@/routes/admin/variation-templates';
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
import { ArrowLeft, Plus, Trash2 } from 'lucide-react';
import { useState } from 'react';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Dashboard',
        href: '/admin/dashboard',
    },
    {
        title: 'Varyasyon Şablonları',
        href: '/admin/variation-templates',
    },
    {
        title: 'Yeni Şablon',
        href: '/admin/variation-templates/create',
    },
];

interface VariationTemplateValue {
    label: string;
    value?: string;
    color?: string;
    image?: string;
    sort_order: number;
}

export default function VariationTemplatesCreate() {
    const { data, setData, post, processing, errors } = useForm({
        name: '',
        type: 'text' as 'text' | 'color' | 'image',
        values: [] as VariationTemplateValue[],
    });

    const [localValues, setLocalValues] = useState<
        (VariationTemplateValue & { tempId?: string })[]
    >([]);

    const addValue = () => {
        const newValue: VariationTemplateValue & { tempId?: string } = {
            label: '',
            value: '',
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
        field: keyof VariationTemplateValue,
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
            label: v.label,
            value: v.value || '',
            color: v.color || '',
            image: v.image || '',
            sort_order: index,
        }));

        setData('values', values);
        post(store().url);
    };

    return (
        <AppLayout breadcrumbs={breadcrumbs}>
            <Head title="Yeni Varyasyon Şablonu" />

            <div className="flex-1 space-y-6 p-6">
                <div className="flex items-center justify-between">
                    <div>
                        <h1 className="text-3xl font-bold tracking-tight">
                            Yeni Varyasyon Şablonu
                        </h1>
                        <p className="mt-1 text-muted-foreground">
                            Yeni bir varyasyon şablonu oluşturun
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
                    <Card>
                        <CardHeader>
                            <CardTitle>Temel Bilgiler</CardTitle>
                        </CardHeader>
                        <CardContent className="space-y-4">
                            <div className="space-y-2">
                                <Label htmlFor="name">
                                    Ad <span className="text-red-500">*</span>
                                </Label>
                                <Input
                                    id="name"
                                    value={data.name}
                                    onChange={(e) =>
                                        setData('name', e.target.value)
                                    }
                                    placeholder="Örn: Renk, Beden"
                                />
                                <InputError message={errors.name} />
                            </div>

                            <div className="space-y-2">
                                <Label htmlFor="type">
                                    Tip <span className="text-red-500">*</span>
                                </Label>
                                <Select
                                    value={data.type}
                                    onValueChange={(value) =>
                                        setData(
                                            'type',
                                            value as 'text' | 'color' | 'image',
                                        )
                                    }
                                >
                                    <SelectTrigger>
                                        <SelectValue placeholder="Tip seçin" />
                                    </SelectTrigger>
                                    <SelectContent>
                                        <SelectItem value="text">
                                            Metin
                                        </SelectItem>
                                        <SelectItem value="color">
                                            Renk
                                        </SelectItem>
                                        <SelectItem value="image">
                                            Resim
                                        </SelectItem>
                                    </SelectContent>
                                </Select>
                                <InputError message={errors.type} />
                            </div>
                        </CardContent>
                    </Card>

                    <Card>
                        <CardHeader>
                            <div className="flex items-center justify-between">
                                <CardTitle>Değerler</CardTitle>
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
                                <div className="overflow-x-auto">
                                    <DndContext
                                        sensors={sensors}
                                        collisionDetection={closestCenter}
                                        onDragEnd={handleDragEnd}
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
                                                    {data.type === 'color' && (
                                                        <TableHead>
                                                            Renk
                                                        </TableHead>
                                                    )}
                                                    {data.type === 'image' && (
                                                        <TableHead>
                                                            Resim
                                                        </TableHead>
                                                    )}
                                                    <TableHead className="w-12"></TableHead>
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
                                                                    index
                                                                }
                                                                id={
                                                                    value.tempId ||
                                                                    String(
                                                                        index,
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
                                                                            updateValue(
                                                                                index,
                                                                                'label',
                                                                                e
                                                                                    .target
                                                                                    .value,
                                                                            )
                                                                        }
                                                                        placeholder={
                                                                            data.type ===
                                                                            'color'
                                                                                ? 'Örn: Mavi'
                                                                                : data.type ===
                                                                                    'image'
                                                                                  ? 'Örn: Kırmızı'
                                                                                  : 'Örn: XS, S, M, L, XL'
                                                                        }
                                                                        className="w-full"
                                                                    />
                                                                </TableCell>
                                                                {data.type ===
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
                                                                                    updateValue(
                                                                                        index,
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
                                                                                    updateValue(
                                                                                        index,
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
                                                                {data.type ===
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
                                                                                    // TODO: File upload implementation
                                                                                    // For now, just store the filename
                                                                                    updateValue(
                                                                                        index,
                                                                                        'image',
                                                                                        file.name,
                                                                                    );
                                                                                }
                                                                            }}
                                                                            className="w-full"
                                                                        />
                                                                    </TableCell>
                                                                )}
                                                                <TableCell className="text-center">
                                                                    <Button
                                                                        type="button"
                                                                        variant="ghost"
                                                                        size="sm"
                                                                        onClick={() =>
                                                                            removeValue(
                                                                                index,
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

                    <div className="flex justify-end gap-4">
                        <Link href={index()}>
                            <Button type="button" variant="outline">
                                İptal
                            </Button>
                        </Link>
                        <Button type="submit" disabled={processing}>
                            {processing ? 'Kaydediliyor...' : 'Kaydet'}
                        </Button>
                    </div>
                </form>
            </div>
        </AppLayout>
    );
}
