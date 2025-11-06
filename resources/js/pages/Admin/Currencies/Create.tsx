import InputError from '@/components/input-error';
import { Button } from '@/components/ui/button';
import { Card, CardContent, CardHeader, CardTitle } from '@/components/ui/card';
import { Checkbox } from '@/components/ui/checkbox';
import { Input } from '@/components/ui/input';
import { Label } from '@/components/ui/label';
import AppLayout from '@/layouts/app-layout';
import { type BreadcrumbItem } from '@/types';
import { Head, Link, useForm } from '@inertiajs/react';
import { ArrowLeft } from 'lucide-react';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Dashboard',
        href: '/admin/dashboard',
    },
    {
        title: 'Para Birimleri',
        href: '/admin/currencies',
    },
    {
        title: 'Yeni Para Birimi',
        href: '/admin/currencies/create',
    },
];

export default function CurrenciesCreate() {
    const { data, setData, post, processing, errors } = useForm({
        name: '',
        code: '',
        symbol: '',
        exchange_rate: 1,
        is_default: false,
        is_active: true,
        sort_order: 0,
    });

    const handleSubmit = (e: React.FormEvent) => {
        e.preventDefault();
        post('/admin/currencies');
    };

    return (
        <AppLayout breadcrumbs={breadcrumbs}>
            <Head title="Yeni Para Birimi" />

            <div className="flex-1 space-y-6 p-6">
                <div className="flex items-center justify-between">
                    <div>
                        <h1 className="text-3xl font-bold tracking-tight">
                            Yeni Para Birimi
                        </h1>
                        <p className="mt-1 text-muted-foreground">
                            Yeni bir para birimi oluşturun
                        </p>
                    </div>
                    <Link href="/admin/currencies">
                        <Button variant="outline">
                            <ArrowLeft className="mr-2 h-4 w-4" />
                            Geri Dön
                        </Button>
                    </Link>
                </div>

                <Card>
                    <CardHeader>
                        <CardTitle>Para Birimi Bilgileri</CardTitle>
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
                                    placeholder="Türk Lirası"
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
                                    maxLength={3}
                                    placeholder="TRY"
                                    value={data.code}
                                    onChange={(e) =>
                                        setData(
                                            'code',
                                            e.target.value.toUpperCase(),
                                        )
                                    }
                                />
                                <InputError message={errors.code} />
                                <p className="text-xs text-muted-foreground">
                                    3 karakter (örn: TRY, USD, EUR)
                                </p>
                            </div>

                            <div className="grid gap-2">
                                <Label htmlFor="symbol">
                                    Sembol <span className="text-red-500">*</span>
                                </Label>
                                <Input
                                    id="symbol"
                                    name="symbol"
                                    required
                                    placeholder="₺"
                                    value={data.symbol}
                                    onChange={(e) =>
                                        setData('symbol', e.target.value)
                                    }
                                />
                                <InputError message={errors.symbol} />
                            </div>

                            <div className="grid gap-2">
                                <Label htmlFor="exchange_rate">
                                    Kur <span className="text-red-500">*</span>
                                </Label>
                                <Input
                                    id="exchange_rate"
                                    name="exchange_rate"
                                    type="number"
                                    step="0.0001"
                                    min="0"
                                    required
                                    placeholder="1.0000"
                                    value={data.exchange_rate}
                                    onChange={(e) =>
                                        setData(
                                            'exchange_rate',
                                            parseFloat(e.target.value) || 0,
                                        )
                                    }
                                />
                                <InputError message={errors.exchange_rate} />
                            </div>

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
                                    id="is_default"
                                    checked={data.is_default}
                                    onCheckedChange={(checked) => {
                                        setData(
                                            'is_default',
                                            checked === true,
                                        );
                                    }}
                                />
                                <Label
                                    htmlFor="is_default"
                                    className="text-sm leading-none font-normal peer-disabled:cursor-not-allowed peer-disabled:opacity-70"
                                >
                                    Varsayılan
                                </Label>
                            </div>
                            <InputError message={errors.is_default} />

                            <div className="flex items-center space-x-2">
                                <Checkbox
                                    id="is_active"
                                    checked={data.is_active}
                                    onCheckedChange={(checked) => {
                                        setData(
                                            'is_active',
                                            checked === true,
                                        );
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
                                <Link href="/admin/currencies">
                                    <Button type="button" variant="outline">
                                        İptal
                                    </Button>
                                </Link>
                                <Button type="submit" disabled={processing}>
                                    {processing
                                        ? 'Kaydediliyor...'
                                        : 'Kaydet'}
                                </Button>
                            </div>
                        </form>
                    </CardContent>
                </Card>
            </div>
        </AppLayout>
    );
}

