import InputError from '@/components/input-error';
import { Button } from '@/components/ui/button';
import { Card, CardContent, CardHeader, CardTitle } from '@/components/ui/card';
import { Checkbox } from '@/components/ui/checkbox';
import { Input } from '@/components/ui/input';
import { Label } from '@/components/ui/label';
import AppLayout from '@/layouts/app-layout';
import { index, show, update } from '@/routes/admin/suppliers';
import { type BreadcrumbItem } from '@/types';
import { Head, Link, useForm } from '@inertiajs/react';
import { ArrowLeft } from 'lucide-react';

interface Props {
    supplier: {
        id: number;
        name: string;
        code: string;
        contact_person?: string;
        email?: string;
        phone?: string;
        address?: string;
        city?: string;
        country?: string;
        tax_number?: string;
        website?: string;
        notes?: string;
        is_active: boolean;
    };
}

const breadcrumbs: BreadcrumbItem[] = [
    { title: 'Dashboard', href: '/admin/dashboard' },
    { title: 'Tedarikçiler', href: '/admin/suppliers' },
    { title: 'Tedarikçi Düzenle', href: '#' },
];

export default function SuppliersEdit({ supplier }: Props) {
    const { data, setData, put, processing, errors } = useForm({
        name: supplier.name,
        code: supplier.code,
        contact_person: supplier.contact_person || '',
        email: supplier.email || '',
        phone: supplier.phone || '',
        address: supplier.address || '',
        city: supplier.city || '',
        country: supplier.country || '',
        tax_number: supplier.tax_number || '',
        website: supplier.website || '',
        notes: supplier.notes || '',
        is_active: supplier.is_active,
    });

    const handleSubmit = (e: React.FormEvent) => {
        e.preventDefault();
        put(update(supplier.id).url);
    };

    return (
        <AppLayout breadcrumbs={breadcrumbs}>
            <Head title="Tedarikçi Düzenle" />
            <div className="flex-1 space-y-6 p-6">
                <div className="flex items-center justify-between">
                    <div>
                        <h1 className="text-3xl font-bold tracking-tight">
                            Tedarikçi Düzenle
                        </h1>
                        <p className="mt-1 text-muted-foreground">
                            {supplier.name} tedarikçisini düzenleyin
                        </p>
                    </div>
                    <div className="flex gap-2">
                        <Link href={show(supplier.id)}>
                            <Button variant="outline">Görüntüle</Button>
                        </Link>
                        <Link href={index()}>
                            <Button variant="outline">
                                <ArrowLeft className="mr-2 h-4 w-4" /> Geri Dön
                            </Button>
                        </Link>
                    </div>
                </div>
                <Card>
                    <CardHeader>
                        <CardTitle>Tedarikçi Bilgileri</CardTitle>
                    </CardHeader>
                    <CardContent>
                        <form onSubmit={handleSubmit} className="space-y-6">
                            <>
                                <div className="grid gap-2">
                                    <Label htmlFor="name">
                                        Tedarikçi Adı{' '}
                                        <span className="text-red-500">*</span>
                                    </Label>
                                    <Input
                                        id="name"
                                        name="name"
                                        required
                                        value={data.name}
                                        onChange={(e) =>
                                            setData('name', e.target.value)
                                        }
                                    />
                                    <InputError message={errors.name} />
                                </div>
                                <div className="grid gap-2">
                                    <Label htmlFor="code">
                                        Kod{' '}
                                        <span className="text-red-500">*</span>
                                    </Label>
                                    <Input
                                        id="code"
                                        name="code"
                                        required
                                        value={data.code}
                                        onChange={(e) =>
                                            setData('code', e.target.value)
                                        }
                                    />
                                    <InputError message={errors.code} />
                                </div>
                                <div className="grid gap-2">
                                    <Label htmlFor="contact_person">
                                        İletişim Kişisi
                                    </Label>
                                    <Input
                                        id="contact_person"
                                        name="contact_person"
                                        value={data.contact_person}
                                        onChange={(e) =>
                                            setData(
                                                'contact_person',
                                                e.target.value,
                                            )
                                        }
                                    />
                                    <InputError
                                        message={errors.contact_person}
                                    />
                                </div>
                                <div className="grid gap-2">
                                    <Label htmlFor="email">E-posta</Label>
                                    <Input
                                        id="email"
                                        name="email"
                                        type="email"
                                        value={data.email}
                                        onChange={(e) =>
                                            setData('email', e.target.value)
                                        }
                                    />
                                    <InputError message={errors.email} />
                                </div>
                                <div className="grid gap-2">
                                    <Label htmlFor="phone">Telefon</Label>
                                    <Input
                                        id="phone"
                                        name="phone"
                                        value={data.phone}
                                        onChange={(e) =>
                                            setData('phone', e.target.value)
                                        }
                                    />
                                    <InputError message={errors.phone} />
                                </div>
                                <div className="grid gap-2">
                                    <Label htmlFor="address">Adres</Label>
                                    <textarea
                                        id="address"
                                        name="address"
                                        rows={3}
                                        value={data.address}
                                        onChange={(e) =>
                                            setData('address', e.target.value)
                                        }
                                        className="flex min-h-[80px] w-full rounded-md border border-input bg-background px-3 py-2 text-sm"
                                    />
                                    <InputError message={errors.address} />
                                </div>
                                <div className="grid grid-cols-2 gap-4">
                                    <div className="grid gap-2">
                                        <Label htmlFor="city">Şehir</Label>
                                        <Input
                                            id="city"
                                            name="city"
                                            value={data.city}
                                            onChange={(e) =>
                                                setData('city', e.target.value)
                                            }
                                        />
                                        <InputError message={errors.city} />
                                    </div>
                                    <div className="grid gap-2">
                                        <Label htmlFor="country">Ülke</Label>
                                        <Input
                                            id="country"
                                            name="country"
                                            value={data.country}
                                            onChange={(e) =>
                                                setData(
                                                    'country',
                                                    e.target.value,
                                                )
                                            }
                                        />
                                        <InputError message={errors.country} />
                                    </div>
                                </div>
                                <div className="grid gap-2">
                                    <Label htmlFor="tax_number">
                                        Vergi Numarası
                                    </Label>
                                    <Input
                                        id="tax_number"
                                        name="tax_number"
                                        value={data.tax_number}
                                        onChange={(e) =>
                                            setData(
                                                'tax_number',
                                                e.target.value,
                                            )
                                        }
                                    />
                                    <InputError message={errors.tax_number} />
                                </div>
                                <div className="grid gap-2">
                                    <Label htmlFor="website">Web Sitesi</Label>
                                    <Input
                                        id="website"
                                        name="website"
                                        type="url"
                                        value={data.website}
                                        onChange={(e) =>
                                            setData('website', e.target.value)
                                        }
                                    />
                                    <InputError message={errors.website} />
                                </div>
                                <div className="grid gap-2">
                                    <Label htmlFor="notes">Notlar</Label>
                                    <textarea
                                        id="notes"
                                        name="notes"
                                        rows={3}
                                        value={data.notes}
                                        onChange={(e) =>
                                            setData('notes', e.target.value)
                                        }
                                        className="flex min-h-[80px] w-full rounded-md border border-input bg-background px-3 py-2 text-sm"
                                    />
                                    <InputError message={errors.notes} />
                                </div>
                                <div className="flex items-center space-x-2">
                                    <Checkbox
                                        id="is_active"
                                        checked={data.is_active}
                                        onCheckedChange={(checked) =>
                                            setData(
                                                'is_active',
                                                checked === true,
                                            )
                                        }
                                    />
                                    <Label
                                        htmlFor="is_active"
                                        className="text-sm leading-none font-normal"
                                    >
                                        Aktif
                                    </Label>
                                </div>
                                <InputError message={errors.is_active} />
                                <div className="flex justify-end gap-2">
                                    <Link href={index()}>
                                        <Button type="button" variant="outline">
                                            İptal
                                        </Button>
                                    </Link>
                                    <Button type="submit" disabled={processing}>
                                        {processing
                                            ? 'Güncelleniyor...'
                                            : 'Güncelle'}
                                    </Button>
                                </div>
                            </>
                        </form>
                    </CardContent>
                </Card>
            </div>
        </AppLayout>
    );
}
