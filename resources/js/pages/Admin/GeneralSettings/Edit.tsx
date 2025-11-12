import InputError from '@/components/input-error';
import { MultiSelect } from '@/components/multi-select';
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
import { type BreadcrumbItem } from '@/types';
import { Head, useForm } from '@inertiajs/react';
import { Plus, Trash2 } from 'lucide-react';

interface Currency {
    id: number;
    name: string;
    code: string;
    symbol: string;
}

interface CurrencyShippingFee {
    currency_id: number;
    fee: number;
}

interface Props {
    settings: {
        default_currency_id: number;
        product_price_includes_tax: boolean;
        stock_status_enabled: boolean;
        stock_quantity_enabled: boolean;
        sms_package_enabled: boolean;
        cart_reminder_enabled: boolean;
        production_request_enabled: boolean;
        product_customization_enabled: boolean;
        similar_products_type: string;
        excluded_countries: string[];
        currency_shipping_fees: CurrencyShippingFee[];
        auto_currency_update_enabled: boolean;
    };
    currencies: Currency[];
    countries: Record<string, string>;
}

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Dashboard',
        href: '/admin/dashboard',
    },
    {
        title: 'Genel Ayarlar',
        href: '/admin/general-settings/edit',
    },
];

export default function GeneralSettingsEdit({
    settings,
    currencies,
    countries,
}: Props) {
    const { data, setData, put, processing, errors } = useForm({
        default_currency_id: settings.default_currency_id,
        product_price_includes_tax: settings.product_price_includes_tax ?? true,
        stock_status_enabled: settings.stock_status_enabled ?? true,
        stock_quantity_enabled: settings.stock_quantity_enabled ?? false,
        sms_package_enabled: settings.sms_package_enabled ?? false,
        cart_reminder_enabled: settings.cart_reminder_enabled ?? true,
        production_request_enabled:
            settings.production_request_enabled ?? false,
        product_customization_enabled:
            settings.product_customization_enabled ?? false,
        similar_products_type: settings.similar_products_type || 'category',
        excluded_countries: settings.excluded_countries || [],
        currency_shipping_fees: settings.currency_shipping_fees || [],
        auto_currency_update_enabled:
            settings.auto_currency_update_enabled ?? false,
    });

    const handleSubmit = (e: React.FormEvent) => {
        e.preventDefault();
        put('/admin/general-settings');
    };

    const addShippingFee = () => {
        setData('currency_shipping_fees', [
            ...data.currency_shipping_fees,
            { currency_id: currencies[0]?.id || 0, fee: 0 },
        ]);
    };

    const removeShippingFee = (index: number) => {
        setData(
            'currency_shipping_fees',
            data.currency_shipping_fees.filter((_, i) => i !== index),
        );
    };

    const updateShippingFee = (
        index: number,
        field: 'currency_id' | 'fee',
        value: number,
    ) => {
        const updated = [...data.currency_shipping_fees];
        updated[index] = {
            ...updated[index],
            [field]: value,
        };
        setData('currency_shipping_fees', updated);
    };

    const countryOptions = Object.entries(countries).map(([code, name]) => ({
        value: code,
        label: name,
    }));

    return (
        <AppLayout breadcrumbs={breadcrumbs}>
            <Head title="Genel Ayarlar" />

            <div className="flex-1 space-y-6 p-6">
                <div className="flex items-center justify-between">
                    <div>
                        <h1 className="text-3xl font-bold tracking-tight">
                            Genel Ayarlar
                        </h1>
                        <p className="mt-1 text-muted-foreground">
                            Mağaza genel ayarlarını yönetin
                        </p>
                    </div>
                </div>

                <form onSubmit={handleSubmit} className="space-y-6">
                    {/* İlk Satır: Para Birimi ve Benzer Ürünler */}
                    <div className="grid grid-cols-1 gap-6 md:grid-cols-2">
                        {/* Para Birimi */}
                        <Card>
                            <CardHeader>
                                <CardTitle>Para Birimi</CardTitle>
                            </CardHeader>
                            <CardContent className="space-y-6">
                                <div className="grid gap-2">
                                    <Label htmlFor="default_currency_id">
                                        Varsayılan Para Birimi{' '}
                                        <span className="text-red-500">*</span>
                                    </Label>
                                    <Select
                                        value={data.default_currency_id.toString()}
                                        onValueChange={(value) =>
                                            setData(
                                                'default_currency_id',
                                                parseInt(value),
                                            )
                                        }
                                    >
                                        <SelectTrigger>
                                            <SelectValue />
                                        </SelectTrigger>
                                        <SelectContent>
                                            {currencies.map((currency) => (
                                                <SelectItem
                                                    key={currency.id}
                                                    value={currency.id.toString()}
                                                >
                                                    {currency.name} (
                                                    {currency.code})
                                                </SelectItem>
                                            ))}
                                        </SelectContent>
                                    </Select>
                                    <InputError
                                        message={errors.default_currency_id}
                                    />
                                </div>
                            </CardContent>
                        </Card>

                        {/* Benzer Ürünler */}
                        <Card>
                            <CardHeader>
                                <CardTitle>Benzer Ürünler</CardTitle>
                            </CardHeader>
                            <CardContent className="space-y-6">
                                <div className="grid gap-2">
                                    <Label htmlFor="similar_products_type">
                                        Benzer Ürün Türü{' '}
                                        <span className="text-red-500">*</span>
                                    </Label>
                                    <Select
                                        value={data.similar_products_type}
                                        onValueChange={(value) =>
                                            setData(
                                                'similar_products_type',
                                                value,
                                            )
                                        }
                                    >
                                        <SelectTrigger>
                                            <SelectValue />
                                        </SelectTrigger>
                                        <SelectContent>
                                            <SelectItem value="category">
                                                Kategoriden Getir
                                            </SelectItem>
                                            <SelectItem value="manual">
                                                Manuel Seçim
                                            </SelectItem>
                                        </SelectContent>
                                    </Select>
                                    <InputError
                                        message={errors.similar_products_type}
                                    />
                                </div>
                            </CardContent>
                        </Card>
                    </div>

                    {/* İkinci Satır: Ürün Ayarları ve Özellikler */}
                    <div className="grid grid-cols-1 gap-6 md:grid-cols-2">
                        {/* Ürün Ayarları */}
                        <Card>
                            <CardHeader>
                                <CardTitle>Ürün Ayarları</CardTitle>
                            </CardHeader>
                            <CardContent className="space-y-4">
                                <div className="flex items-center space-x-2">
                                    <Checkbox
                                        id="product_price_includes_tax"
                                        checked={Boolean(
                                            data.product_price_includes_tax,
                                        )}
                                        onCheckedChange={(checked) => {
                                            setData(
                                                'product_price_includes_tax',
                                                checked === true,
                                            );
                                        }}
                                    />
                                    <Label
                                        htmlFor="product_price_includes_tax"
                                        className="cursor-pointer text-sm font-normal"
                                    >
                                        Ürün Fiyatında KDV Dâhil
                                    </Label>
                                </div>
                                <InputError
                                    message={errors.product_price_includes_tax}
                                />

                                <div className="flex items-center space-x-2">
                                    <Checkbox
                                        id="stock_status_enabled"
                                        checked={Boolean(
                                            data.stock_status_enabled,
                                        )}
                                        onCheckedChange={(checked) => {
                                            setData(
                                                'stock_status_enabled',
                                                checked === true,
                                            );
                                        }}
                                    />
                                    <Label
                                        htmlFor="stock_status_enabled"
                                        className="cursor-pointer text-sm font-normal"
                                    >
                                        Stok Durumu Aktif
                                    </Label>
                                </div>
                                <InputError
                                    message={errors.stock_status_enabled}
                                />

                                <div className="flex items-center space-x-2">
                                    <Checkbox
                                        id="stock_quantity_enabled"
                                        checked={Boolean(
                                            data.stock_quantity_enabled,
                                        )}
                                        onCheckedChange={(checked) => {
                                            setData(
                                                'stock_quantity_enabled',
                                                checked === true,
                                            );
                                        }}
                                    />
                                    <Label
                                        htmlFor="stock_quantity_enabled"
                                        className="cursor-pointer text-sm font-normal"
                                    >
                                        Stok Miktarı Aktif
                                    </Label>
                                </div>
                                <InputError
                                    message={errors.stock_quantity_enabled}
                                />
                            </CardContent>
                        </Card>

                        {/* Özellikler */}
                        <Card>
                            <CardHeader>
                                <CardTitle>Özellikler</CardTitle>
                            </CardHeader>
                            <CardContent className="space-y-4">
                                <div className="flex items-center space-x-2">
                                    <Checkbox
                                        id="sms_package_enabled"
                                        checked={Boolean(
                                            data.sms_package_enabled,
                                        )}
                                        onCheckedChange={(checked) => {
                                            setData(
                                                'sms_package_enabled',
                                                checked === true,
                                            );
                                        }}
                                    />
                                    <Label
                                        htmlFor="sms_package_enabled"
                                        className="cursor-pointer text-sm font-normal"
                                    >
                                        SMS Paketi Aktif
                                    </Label>
                                </div>
                                <InputError
                                    message={errors.sms_package_enabled}
                                />

                                <div className="flex items-center space-x-2">
                                    <Checkbox
                                        id="cart_reminder_enabled"
                                        checked={Boolean(
                                            data.cart_reminder_enabled,
                                        )}
                                        onCheckedChange={(checked) => {
                                            setData(
                                                'cart_reminder_enabled',
                                                checked === true,
                                            );
                                        }}
                                    />
                                    <Label
                                        htmlFor="cart_reminder_enabled"
                                        className="cursor-pointer text-sm font-normal"
                                    >
                                        Otomatik Sepet Hatırlatma Aktif
                                    </Label>
                                </div>
                                <InputError
                                    message={errors.cart_reminder_enabled}
                                />

                                <div className="flex items-center space-x-2">
                                    <Checkbox
                                        id="production_request_enabled"
                                        checked={Boolean(
                                            data.production_request_enabled,
                                        )}
                                        onCheckedChange={(checked) => {
                                            setData(
                                                'production_request_enabled',
                                                checked === true,
                                            );
                                        }}
                                    />
                                    <Label
                                        htmlFor="production_request_enabled"
                                        className="cursor-pointer text-sm font-normal"
                                    >
                                        Üretim Talebi Aktif
                                    </Label>
                                </div>
                                <InputError
                                    message={errors.production_request_enabled}
                                />

                                <div className="flex items-center space-x-2">
                                    <Checkbox
                                        id="product_customization_enabled"
                                        checked={Boolean(
                                            data.product_customization_enabled,
                                        )}
                                        onCheckedChange={(checked) => {
                                            setData(
                                                'product_customization_enabled',
                                                checked === true,
                                            );
                                        }}
                                    />
                                    <Label
                                        htmlFor="product_customization_enabled"
                                        className="cursor-pointer text-sm font-normal"
                                    >
                                        Ürün Özelleştirme Aktif
                                    </Label>
                                </div>
                                <InputError
                                    message={
                                        errors.product_customization_enabled
                                    }
                                />
                            </CardContent>
                        </Card>
                    </div>

                    {/* Satış Yapılmayan Ülkeler */}
                    <Card>
                        <CardHeader>
                            <CardTitle>Satış Yapılmayan Ülkeler</CardTitle>
                        </CardHeader>
                        <CardContent className="space-y-6">
                            <div className="grid gap-2">
                                <Label>Satış Yapılmayan Ülkeler</Label>
                                <MultiSelect
                                    options={countryOptions}
                                    selected={data.excluded_countries}
                                    onSelectionChange={(selected) => {
                                        setData('excluded_countries', selected);
                                    }}
                                    placeholder="Ülke seçin..."
                                    searchPlaceholder="Ülke ara..."
                                    emptyMessage="Ülke bulunamadı."
                                    maxDisplay={9999}
                                />
                                <InputError
                                    message={errors.excluded_countries}
                                />
                            </div>
                        </CardContent>
                    </Card>

                    {/* Para Birimlerine Göre Kargo Ücretleri */}
                    <Card>
                        <CardHeader>
                            <div className="flex items-center justify-between">
                                <CardTitle>
                                    Para Birimlerine Göre Kargo Ücretleri
                                </CardTitle>
                                <Button
                                    type="button"
                                    variant="outline"
                                    size="sm"
                                    onClick={addShippingFee}
                                >
                                    <Plus className="mr-2 h-4 w-4" />
                                    Ekle
                                </Button>
                            </div>
                        </CardHeader>
                        <CardContent>
                            {data.currency_shipping_fees.length === 0 ? (
                                <p className="text-sm text-muted-foreground">
                                    Henüz kargo ücreti eklenmemiş
                                </p>
                            ) : (
                                <Table>
                                    <TableHeader>
                                        <TableRow>
                                            <TableHead>Para Birimi</TableHead>
                                            <TableHead>Kargo Ücreti</TableHead>
                                            <TableHead className="w-[100px]">
                                                İşlem
                                            </TableHead>
                                        </TableRow>
                                    </TableHeader>
                                    <TableBody>
                                        {data.currency_shipping_fees.map(
                                            (fee, index) => (
                                                <TableRow key={index}>
                                                    <TableCell>
                                                        <Select
                                                            value={fee.currency_id.toString()}
                                                            onValueChange={(
                                                                value,
                                                            ) =>
                                                                updateShippingFee(
                                                                    index,
                                                                    'currency_id',
                                                                    parseInt(
                                                                        value,
                                                                    ),
                                                                )
                                                            }
                                                        >
                                                            <SelectTrigger>
                                                                <SelectValue />
                                                            </SelectTrigger>
                                                            <SelectContent>
                                                                {currencies.map(
                                                                    (
                                                                        currency,
                                                                    ) => (
                                                                        <SelectItem
                                                                            key={
                                                                                currency.id
                                                                            }
                                                                            value={currency.id.toString()}
                                                                        >
                                                                            {
                                                                                currency.name
                                                                            }{' '}
                                                                            (
                                                                            {
                                                                                currency.code
                                                                            }
                                                                            )
                                                                        </SelectItem>
                                                                    ),
                                                                )}
                                                            </SelectContent>
                                                        </Select>
                                                    </TableCell>
                                                    <TableCell>
                                                        <Input
                                                            type="number"
                                                            min="0"
                                                            step="0.01"
                                                            value={fee.fee}
                                                            onChange={(e) =>
                                                                updateShippingFee(
                                                                    index,
                                                                    'fee',
                                                                    parseFloat(
                                                                        e.target
                                                                            .value,
                                                                    ) || 0,
                                                                )
                                                            }
                                                        />
                                                    </TableCell>
                                                    <TableCell>
                                                        <Button
                                                            type="button"
                                                            variant="outline"
                                                            size="icon"
                                                            onClick={() =>
                                                                removeShippingFee(
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
                            )}
                            <InputError
                                message={errors.currency_shipping_fees}
                            />
                        </CardContent>
                    </Card>

                    {/* Otomatik Kur Güncelleme */}
                    <Card>
                        <CardHeader>
                            <CardTitle>Otomatik Kur Güncelleme</CardTitle>
                        </CardHeader>
                        <CardContent className="space-y-4">
                            <div className="flex items-center space-x-2">
                                <Checkbox
                                    id="auto_currency_update_enabled"
                                    checked={Boolean(
                                        data.auto_currency_update_enabled,
                                    )}
                                    onCheckedChange={(checked) => {
                                        setData(
                                            'auto_currency_update_enabled',
                                            checked === true,
                                        );
                                    }}
                                />
                                <Label
                                    htmlFor="auto_currency_update_enabled"
                                    className="cursor-pointer text-sm font-normal"
                                >
                                    TCMB'den otomatik kur güncelleme (Her
                                    dakika)
                                </Label>
                            </div>
                            <p className="text-sm text-muted-foreground">
                                Bu özellik açık olduğunda, sistem her dakika
                                TCMB'den güncel kurları çeker ve veritabanını
                                günceller.
                            </p>
                            <InputError
                                message={errors.auto_currency_update_enabled}
                            />
                        </CardContent>
                    </Card>

                    <div className="flex justify-end gap-2">
                        <Button type="submit" disabled={processing}>
                            {processing ? 'Kaydediliyor...' : 'Kaydet'}
                        </Button>
                    </div>
                </form>
            </div>
        </AppLayout>
    );
}
