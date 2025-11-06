import { Combobox } from '@/components/combobox';
import InputError from '@/components/input-error';
import { Button } from '@/components/ui/button';
import { Card, CardContent, CardHeader, CardTitle } from '@/components/ui/card';
import { Checkbox } from '@/components/ui/checkbox';
import { Input } from '@/components/ui/input';
import { Label } from '@/components/ui/label';
import { Textarea } from '@/components/ui/textarea';
import AppLayout from '@/layouts/app-layout';
import { type BreadcrumbItem } from '@/types';
import { Head, Link, useForm } from '@inertiajs/react';
import { ArrowLeft } from 'lucide-react';
import { useState } from 'react';

interface Customer {
    id: number;
    name: string;
    email: string;
}

interface Props {
    representative: {
        id: number;
        customer_id: number;
        name: string;
        email?: string;
        phone?: string;
        notes?: string;
        is_active: boolean;
        customer?: Customer;
    };
    customers?: Customer[];
}

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Dashboard',
        href: '/admin/dashboard',
    },
    {
        title: 'Temsilciler',
        href: '/admin/customer-representatives',
    },
    {
        title: 'Temsilci Düzenle',
        href: '#',
    },
];

export default function CustomerRepresentativesEdit({
    representative,
    customers = [],
}: Props) {
    const [selectedCustomer, setSelectedCustomer] = useState<Customer | null>(
        representative.customer || null,
    );

    const { data, setData, put, processing, errors } = useForm({
        customer_id: representative.customer_id.toString(),
        name: representative.name,
        email: representative.email || '',
        phone: representative.phone || '',
        notes: representative.notes || '',
        is_active: representative.is_active,
    });

    const handleSubmit = (e: React.FormEvent) => {
        e.preventDefault();
        put(`/admin/customer-representatives/${representative.id}`);
    };

    const handleCustomerSelect = (customer: Customer | null) => {
        setSelectedCustomer(customer);
        setData('customer_id', customer?.id.toString() || '');
    };

    return (
        <AppLayout breadcrumbs={breadcrumbs}>
            <Head title="Temsilci Düzenle" />

            <div className="flex-1 space-y-6 p-6">
                <div className="flex items-center justify-between">
                    <div>
                        <h1 className="text-3xl font-bold tracking-tight">
                            Temsilci Düzenle
                        </h1>
                        <p className="mt-1 text-muted-foreground">
                            {representative.name} temsilcisini düzenleyin
                        </p>
                    </div>
                    <div className="flex gap-2">
                        <Link href={`/admin/customer-representatives/${representative.id}`}>
                            <Button variant="outline">Görüntüle</Button>
                        </Link>
                        <Link href="/admin/customer-representatives">
                            <Button variant="outline">
                                <ArrowLeft className="mr-2 h-4 w-4" />
                                Geri Dön
                            </Button>
                        </Link>
                    </div>
                </div>

                <Card>
                    <CardHeader>
                        <CardTitle>Temsilci Bilgileri</CardTitle>
                    </CardHeader>
                    <CardContent>
                        <form onSubmit={handleSubmit} className="space-y-6">
                            <div className="grid gap-2">
                                <Label htmlFor="customer_id">
                                    Müşteri <span className="text-red-500">*</span>
                                </Label>
                                <Combobox
                                    options={customers.map((c) => ({
                                        value: c.id.toString(),
                                        label: `${c.name} (${c.email})`,
                                    }))}
                                    value={selectedCustomer?.id.toString() || ''}
                                    onValueChange={(value) => {
                                        const customer = customers.find(
                                            (c) => c.id.toString() === value,
                                        );
                                        handleCustomerSelect(customer || null);
                                    }}
                                    placeholder="Müşteri seçin..."
                                />
                                <InputError message={errors.customer_id} />
                            </div>

                            <div className="grid gap-2">
                                <Label htmlFor="name">
                                    Ad Soyad <span className="text-red-500">*</span>
                                </Label>
                                <Input
                                    id="name"
                                    name="name"
                                    required
                                    placeholder="Ad Soyad"
                                    value={data.name}
                                    onChange={(e) =>
                                        setData('name', e.target.value)
                                    }
                                />
                                <InputError message={errors.name} />
                            </div>

                            <div className="grid gap-2">
                                <Label htmlFor="email">E-posta</Label>
                                <Input
                                    id="email"
                                    name="email"
                                    type="email"
                                    placeholder="email@example.com"
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
                                    type="tel"
                                    placeholder="0555 555 55 55"
                                    value={data.phone}
                                    onChange={(e) =>
                                        setData('phone', e.target.value)
                                    }
                                />
                                <InputError message={errors.phone} />
                            </div>

                            <div className="grid gap-2">
                                <Label htmlFor="notes">Notlar</Label>
                                <Textarea
                                    id="notes"
                                    name="notes"
                                    rows={4}
                                    placeholder="Ek notlar..."
                                    value={data.notes}
                                    onChange={(e) =>
                                        setData('notes', e.target.value)
                                    }
                                />
                                <InputError message={errors.notes} />
                            </div>

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
                                <Link href="/admin/customer-representatives">
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

