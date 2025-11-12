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
import { useToastErrors } from '@/hooks/use-toast-errors';
import AppLayout from '@/layouts/app-layout';
import { index, store } from '@/routes/admin/options';
import { type BreadcrumbItem } from '@/types';
import { Head, Link, router, useForm } from '@inertiajs/react';
import { ArrowLeft, Plus, Trash2 } from 'lucide-react';
import { useState } from 'react';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Dashboard',
        href: '/admin/dashboard',
    },
    {
        title: 'Ürün Seçenekleri',
        href: '/admin/options',
    },
    {
        title: 'Yeni Seçenek',
        href: '/admin/options/create',
    },
];

interface ProductOptionValue {
    label: string;
    value?: string;
    price_adjustment: number;
    price_type: 'fixed' | 'percentage';
    sort_order: number;
}

// Type grupları
const TEXT_TYPES = ['field', 'textarea'] as const;
const DATE_TYPES = ['date', 'date_time', 'time'] as const;

type TextType = (typeof TEXT_TYPES)[number];
type DateType = (typeof DATE_TYPES)[number];
type OptionType =
    | TextType
    | 'dropdown'
    | 'checkbox'
    | 'checkbox_custom'
    | 'radio'
    | 'radio_custom'
    | 'multiple_select'
    | DateType;

// Tekil value gerektiren tipler
const SINGLE_VALUE_TYPES = [...TEXT_TYPES, ...DATE_TYPES] as const;

export default function ProductOptionsCreate() {
    const { data, setData, post, processing, errors } = useForm({
        name: '',
        description: '',
        type: 'dropdown' as OptionType,
        required: false,
        sort_order: 0,
        is_active: true,
        values: [] as ProductOptionValue[],
    });

    // Toast errors hook'unu kullan
    useToastErrors(errors);

    const [localValues, setLocalValues] = useState<
        (ProductOptionValue & { tempId?: string })[]
    >([]);

    // Seçilen tip tekil value gerektiriyor mu?
    const isSingleValueType = (
        SINGLE_VALUE_TYPES as readonly string[]
    ).includes(data.type);

    // Type değiştiğinde values'ı sıfırla veya tek value oluştur
    const handleTypeChange = (newType: string) => {
        setData('type', newType as OptionType);

        // Tekil value gerektiren tipler için tek value oluştur
        if ((SINGLE_VALUE_TYPES as readonly string[]).includes(newType)) {
            if (localValues.length === 0) {
                setLocalValues([
                    {
                        label: '',
                        value: '',
                        price_adjustment: 0,
                        price_type: 'fixed' as const,
                        sort_order: 0,
                        tempId: `temp-${Date.now()}-${Math.random()}`,
                    },
                ]);
            } else {
                // Sadece ilk value'yu tut
                setLocalValues([localValues[0]]);
            }
        }
        // Çoğul seçimler için mevcut values korunur
    };

    const addValue = () => {
        // Tekil value gerektiren tipler için sadece 1 value olabilir
        if (isSingleValueType && localValues.length > 0) {
            return;
        }

        const newValue: ProductOptionValue & { tempId?: string } = {
            label: '',
            value: '',
            price_adjustment: 0,
            price_type: 'fixed',
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
        field: keyof ProductOptionValue,
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
            price_adjustment: v.price_adjustment,
            price_type: v.price_type || 'fixed',
            sort_order: v.sort_order,
        }));

        // Form data'yı hazırla ve values'ı ekle
        const formData = {
            ...data,
            values: values,
        };

        // router.post kullanarak direkt data gönder
        router.post(store().url, formData);
    };

    return (
        <AppLayout breadcrumbs={breadcrumbs}>
            <Head title="Yeni Ürün Seçeneği" />

            <div className="flex-1 space-y-6 p-6">
                <div className="flex items-center justify-between">
                    <div>
                        <h1 className="text-3xl font-bold tracking-tight">
                            Yeni Ürün Seçeneği
                        </h1>
                        <p className="mt-1 text-muted-foreground">
                            Yeni bir ürün seçeneği oluşturun
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
                                    placeholder="Örn: RAM, Depolama"
                                />
                                <InputError message={errors.name} />
                            </div>

                            <div className="space-y-2">
                                <Label htmlFor="description">Açıklama</Label>
                                <Input
                                    id="description"
                                    value={data.description}
                                    onChange={(e) =>
                                        setData('description', e.target.value)
                                    }
                                    placeholder="Seçenek açıklaması"
                                />
                                <InputError message={errors.description} />
                            </div>

                            <div className="space-y-2">
                                <Label htmlFor="type">
                                    Tip <span className="text-red-500">*</span>
                                </Label>
                                <Select
                                    value={data.type}
                                    onValueChange={handleTypeChange}
                                >
                                    <SelectTrigger>
                                        <SelectValue placeholder="Tip seçin" />
                                    </SelectTrigger>
                                    <SelectContent>
                                        <SelectItem value="dropdown">
                                            Dropdown
                                        </SelectItem>
                                        <SelectItem value="radio">
                                            Radio
                                        </SelectItem>
                                        <SelectItem value="checkbox">
                                            Checkbox
                                        </SelectItem>
                                        <SelectItem value="multiple_select">
                                            Multiple Select
                                        </SelectItem>
                                        <SelectItem value="field">
                                            Text Field
                                        </SelectItem>
                                        <SelectItem value="textarea">
                                            Textarea
                                        </SelectItem>
                                        <SelectItem value="date">
                                            Date
                                        </SelectItem>
                                        <SelectItem value="date_time">
                                            Date Time
                                        </SelectItem>
                                        <SelectItem value="time">
                                            Time
                                        </SelectItem>
                                    </SelectContent>
                                </Select>
                                <InputError message={errors.type} />
                            </div>

                            <div className="flex items-center space-x-2">
                                <Checkbox
                                    id="required"
                                    checked={data.required}
                                    onCheckedChange={(checked) =>
                                        setData('required', checked === true)
                                    }
                                />
                                <Label htmlFor="required">
                                    Bu seçenek zorunludur
                                </Label>
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
                                {!isSingleValueType && (
                                    <Button
                                        type="button"
                                        variant="outline"
                                        size="sm"
                                        onClick={addValue}
                                    >
                                        <Plus className="mr-2 h-4 w-4" />
                                        Değer Ekle
                                    </Button>
                                )}
                            </div>
                        </CardHeader>
                        <CardContent className="space-y-4">
                            {localValues.length > 0 ? (
                                localValues.map((value, index) => (
                                    <div
                                        key={value.tempId || index}
                                        className="rounded-lg border p-4"
                                    >
                                        <div className="flex items-start justify-between">
                                            <div className="flex-1 space-y-4">
                                                {!isSingleValueType && (
                                                    <div className="grid grid-cols-2 gap-4">
                                                        <div className="space-y-2">
                                                            <Label>
                                                                Etiket{' '}
                                                                <span className="text-red-500">
                                                                    *
                                                                </span>
                                                            </Label>
                                                            <Input
                                                                value={
                                                                    value.label
                                                                }
                                                                onChange={(e) =>
                                                                    updateValue(
                                                                        index,
                                                                        'label',
                                                                        e.target
                                                                            .value,
                                                                    )
                                                                }
                                                                placeholder="Örn: 8GB, 256GB"
                                                            />
                                                        </div>
                                                        <div className="space-y-2">
                                                            <Label>Değer</Label>
                                                            <Input
                                                                value={
                                                                    value.value ||
                                                                    ''
                                                                }
                                                                onChange={(e) =>
                                                                    updateValue(
                                                                        index,
                                                                        'value',
                                                                        e.target
                                                                            .value,
                                                                    )
                                                                }
                                                                placeholder="Opsiyonel değer"
                                                            />
                                                        </div>
                                                    </div>
                                                )}

                                                <div className="grid grid-cols-3 gap-4">
                                                    <div className="space-y-2">
                                                        <Label>Fiyat</Label>
                                                        <Input
                                                            type="number"
                                                            step="0.01"
                                                            value={
                                                                value.price_adjustment
                                                            }
                                                            onChange={(e) =>
                                                                updateValue(
                                                                    index,
                                                                    'price_adjustment',
                                                                    parseFloat(
                                                                        e.target
                                                                            .value,
                                                                    ) || 0,
                                                                )
                                                            }
                                                            placeholder="0.00"
                                                        />
                                                    </div>
                                                    <div className="space-y-2">
                                                        <Label>
                                                            Fiyat Tipi
                                                        </Label>
                                                        <Select
                                                            value={
                                                                value.price_type ||
                                                                'fixed'
                                                            }
                                                            onValueChange={(
                                                                val,
                                                            ) =>
                                                                updateValue(
                                                                    index,
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
                                                    </div>
                                                    <div className="space-y-2">
                                                        <Label>Sıralama</Label>
                                                        <Input
                                                            type="number"
                                                            value={
                                                                value.sort_order
                                                            }
                                                            onChange={(e) =>
                                                                updateValue(
                                                                    index,
                                                                    'sort_order',
                                                                    parseInt(
                                                                        e.target
                                                                            .value,
                                                                    ) || 0,
                                                                )
                                                            }
                                                        />
                                                    </div>
                                                </div>
                                            </div>
                                            {!isSingleValueType && (
                                                <Button
                                                    type="button"
                                                    variant="destructive"
                                                    size="sm"
                                                    className="ml-4"
                                                    onClick={() =>
                                                        removeValue(index)
                                                    }
                                                >
                                                    <Trash2 className="h-4 w-4" />
                                                </Button>
                                            )}
                                        </div>
                                    </div>
                                ))
                            ) : (
                                <div className="py-8 text-center text-muted-foreground">
                                    {isSingleValueType
                                        ? 'Bu tip için tek bir değer oluşturulacak (Price ve Price Type).'
                                        : 'Henüz değer eklenmemiş. Değer eklemek için yukarıdaki butonu kullanın.'}
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
