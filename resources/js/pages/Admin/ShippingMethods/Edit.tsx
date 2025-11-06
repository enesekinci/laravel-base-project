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
import { Textarea } from '@/components/ui/textarea';
import AppLayout from '@/layouts/app-layout';
import { type BreadcrumbItem } from '@/types';
import { Head, Link, useForm } from '@inertiajs/react';
import { ArrowLeft } from 'lucide-react';

interface Props {
    shippingMethod: {
        id: number;
        name: string;
        code: string;
        description?: string;
        type: 'fixed' | 'free' | 'weight_based' | 'price_based';
        cost: number;
        is_active: boolean;
        sort_order: number;
    };
}

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Dashboard',
        href: '/admin/dashboard',
    },
    {
        title: 'Kargo Yöntemleri',
        href: '/admin/shipping-methods',
    },
    {
        title: 'Kargo Yöntemi Düzenle',
        href: '#',
    },
];

export default function ShippingMethodsEdit({ shippingMethod }: Props) {
    const { data, setData, put, processing, errors } = useForm({
        name: shippingMethod.name,
        code: shippingMethod.code,
        description: shippingMethod.description || '',
        type: shippingMethod.type,
        cost: shippingMethod.cost,
        config: {},
        is_active: shippingMethod.is_active,
        sort_order: shippingMethod.sort_order,
    });

    const handleSubmit = (e: React.FormEvent) => {
        e.preventDefault();
        put(`/admin/shipping-methods/${shippingMethod.id}`);
    };

    return (
        <AppLayout breadcrumbs={breadcrumbs}>
            <Head title="Kargo Yöntemi Düzenle" />

            <div className="flex-1 space-y-6 p-6">
                <div className="flex items-center justify-between">
                    <div>
                        <h1 className="text-3xl font-bold tracking-tight">
                            Kargo Yöntemi Düzenle
                        </h1>
                        <p className="mt-1 text-muted-foreground">
                            {shippingMethod.name} kargo yöntemini düzenleyin
                        </p>
                    </div>
                    <div className="flex gap-2">
                        <Link
                            href={`/admin/shipping-methods/${shippingMethod.id}`}
                        >
                            <Button variant="outline">Görüntüle</Button>
                        </Link>
                        <Link href="/admin/shipping-methods">
                            <Button variant="outline">
                                <ArrowLeft className="mr-2 h-4 w-4" />
                                Geri Dön
                            </Button>
                        </Link>
                    </div>
                </div>

                <Card>
                    <CardHeader>
                        <CardTitle>Kargo Yöntemi Bilgileri</CardTitle>
                    </CardHeader>
                    <CardContent>
                        <form onSubmit={handleSubmit} className="space-y-6">
                            <div className="grid gap-2">
                                <Label htmlFor="name">
                                    Ad <span className="text-red-500">*</span>
                                </Label>
                                <Input
                                    id="name"
                                    name="name"
                                    required
                                    placeholder="Kargo yöntemi adı"
                                    value={data.name}
                                    onChange={(e) =>
                                        setData('name', e.target.value)
                                    }
                                />
                                <InputError message={errors.name} />
                            </div>

                            <div className="grid gap-2">
                                <Label htmlFor="code">
                                    Kod <span className="text-red-500">*</span>
                                </Label>
                                <Input
                                    id="code"
                                    name="code"
                                    required
                                    placeholder="shipping-method-code"
                                    value={data.code}
                                    onChange={(e) =>
                                        setData('code', e.target.value)
                                    }
                                />
                                <InputError message={errors.code} />
                            </div>

                            <div className="grid gap-2">
                                <Label htmlFor="description">Açıklama</Label>
                                <Textarea
                                    id="description"
                                    name="description"
                                    rows={3}
                                    placeholder="Açıklama..."
                                    value={data.description}
                                    onChange={(e) =>
                                        setData('description', e.target.value)
                                    }
                                />
                                <InputError message={errors.description} />
                            </div>

                            <div className="grid gap-2">
                                <Label htmlFor="type">
                                    Tip <span className="text-red-500">*</span>
                                </Label>
                                <Select
                                    value={data.type}
                                    onValueChange={(value) =>
                                        setData(
                                            'type',
                                            value as
                                                | 'fixed'
                                                | 'free'
                                                | 'weight_based'
                                                | 'price_based',
                                        )
                                    }
                                >
                                    <SelectTrigger>
                                        <SelectValue />
                                    </SelectTrigger>
                                    <SelectContent>
                                        <SelectItem value="fixed">
                                            Sabit
                                        </SelectItem>
                                        <SelectItem value="free">
                                            Ücretsiz
                                        </SelectItem>
                                        <SelectItem value="weight_based">
                                            Ağırlık Bazlı
                                        </SelectItem>
                                        <SelectItem value="price_based">
                                            Fiyat Bazlı
                                        </SelectItem>
                                    </SelectContent>
                                </Select>
                                <InputError message={errors.type} />
                            </div>

                            {data.type !== 'free' && (
                                <div className="grid gap-2">
                                    <Label htmlFor="cost">Maliyet</Label>
                                    <Input
                                        id="cost"
                                        name="cost"
                                        type="number"
                                        step="0.01"
                                        min="0"
                                        placeholder="0.00"
                                        value={data.cost}
                                        onChange={(e) =>
                                            setData(
                                                'cost',
                                                parseFloat(e.target.value) || 0,
                                            )
                                        }
                                    />
                                    <InputError message={errors.cost} />
                                </div>
                            )}

                            <div className="grid gap-2">
                                <Label htmlFor="sort_order">Sıra</Label>
                                <Input
                                    id="sort_order"
                                    name="sort_order"
                                    type="number"
                                    min="0"
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
                                    onCheckedChange={(checked) => {
                                        setData('is_active', checked === true);
                                    }}
                                />
                                <Label
                                    htmlFor="is_active"
                                    className="text-sm leading-none font-normal peer-disabled:cursor-not-allowed peer-disabled:opacity-70"
                                >
                                    Aktif
                                </Label>
                            </div>
                            <InputError message={errors.is_active} />

                            <div className="flex justify-end gap-2">
                                <Link href="/admin/shipping-methods">
                                    <Button type="button" variant="outline">
                                        İptal
                                    </Button>
                                </Link>
                                <Button type="submit" disabled={processing}>
                                    {processing ? 'Kaydediliyor...' : 'Kaydet'}
                                </Button>
                            </div>
                        </form>
                    </CardContent>
                </Card>
            </div>
        </AppLayout>
    );
}
