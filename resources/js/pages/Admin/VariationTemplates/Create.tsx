import InputError from '@/components/input-error';
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
import AppLayout from '@/layouts/app-layout';
import { index, store } from '@/routes/admin/variation-templates';
import { type BreadcrumbItem } from '@/types';
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
        sort_order: 0,
        is_active: true,
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

        // Local values'ı form data'ya aktar
        const values = localValues.map((v) => ({
            label: v.label,
            value: v.value || '',
            color: v.color || '',
            image: v.image || '',
            sort_order: v.sort_order,
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

                            <div className="space-y-2">
                                <Label htmlFor="sort_order">Sıralama</Label>
                                <Input
                                    id="sort_order"
                                    type="number"
                                    value={data.sort_order}
                                    onChange={(e) =>
                                        setData(
                                            'sort_order',
                                            parseInt(e.target.value) || 0,
                                        )
                                    }
                                />
                                <InputError message={errors.sort_order} />
                            </div>

                            <div className="flex items-center space-x-2">
                                <Checkbox
                                    id="is_active"
                                    checked={data.is_active}
                                    onCheckedChange={(checked) =>
                                        setData('is_active', checked === true)
                                    }
                                />
                                <Label htmlFor="is_active">Aktif</Label>
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
                                    <Table>
                                        <TableHeader>
                                            <TableRow>
                                                <TableHead className="w-12"></TableHead>
                                                <TableHead>
                                                    Etiket{' '}
                                                    <span className="text-red-500">
                                                        *
                                                    </span>
                                                </TableHead>
                                                {data.type === 'color' && (
                                                    <TableHead>Renk</TableHead>
                                                )}
                                                {data.type === 'image' && (
                                                    <TableHead>Resim</TableHead>
                                                )}
                                                <TableHead className="w-12"></TableHead>
                                            </TableRow>
                                        </TableHeader>
                                        <TableBody>
                                            {localValues.map((value, index) => (
                                                <TableRow
                                                    key={value.tempId || index}
                                                >
                                                    <TableCell className="text-center">
                                                        <div className="flex cursor-grab items-center justify-center text-muted-foreground">
                                                            <GripVertical className="h-4 w-4" />
                                                        </div>
                                                    </TableCell>
                                                    <TableCell>
                                                        <Input
                                                            value={value.label}
                                                            onChange={(e) =>
                                                                updateValue(
                                                                    index,
                                                                    'label',
                                                                    e.target
                                                                        .value,
                                                                )
                                                            }
                                                            placeholder="Örn: Kırmızı, M"
                                                            className="w-full"
                                                        />
                                                    </TableCell>
                                                    {data.type === 'color' && (
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
                                                    {data.type === 'image' && (
                                                        <TableCell>
                                                            <Input
                                                                value={
                                                                    value.image ||
                                                                    ''
                                                                }
                                                                onChange={(e) =>
                                                                    updateValue(
                                                                        index,
                                                                        'image',
                                                                        e.target
                                                                            .value,
                                                                    )
                                                                }
                                                                placeholder="Resim URL'si"
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
                                                </TableRow>
                                            ))}
                                        </TableBody>
                                    </Table>
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
