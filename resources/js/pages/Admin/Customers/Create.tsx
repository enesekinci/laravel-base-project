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

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Dashboard',
        href: '/admin/dashboard',
    },
    {
        title: 'Üyeler',
        href: '/admin/customers',
    },
    {
        title: 'Yeni Üye',
        href: '/admin/customers/create',
    },
];

interface CustomerGroup {
    id: number;
    name: string;
}

interface Props {
    customerGroups: CustomerGroup[];
}

export default function CustomersCreate({ customerGroups }: Props) {
    const { data, setData, post, processing, errors } = useForm({
        name: '',
        email: '',
        phone: '',
        address: '',
        city: '',
        country: '',
        postal_code: '',
        is_active: true,
        group_ids: [] as number[],
    });

    const handleSubmit = (e: React.FormEvent) => {
        e.preventDefault();
        post('/admin/customers');
    };

    const handleGroupToggle = (groupId: number) => {
        const currentGroups = data.group_ids || [];
        if (currentGroups.includes(groupId)) {
            setData(
                'group_ids',
                currentGroups.filter((id) => id !== groupId),
            );
        } else {
            setData('group_ids', [...currentGroups, groupId]);
        }
    };

    return (
        <AppLayout breadcrumbs={breadcrumbs}>
            <Head title="Yeni Üye" />

            <div className="flex-1 space-y-6 p-6">
                <div className="flex items-center justify-between">
                    <div>
                        <h1 className="text-3xl font-bold tracking-tight">
                            Yeni Üye
                        </h1>
                        <p className="mt-1 text-muted-foreground">
                            Yeni bir müşteri oluşturun
                        </p>
                    </div>
                    <Link href="/admin/customers">
                        <Button variant="outline">
                            <ArrowLeft className="mr-2 h-4 w-4" />
                            Geri Dön
                        </Button>
                    </Link>
                </div>

                <Card>
                    <CardHeader>
                        <CardTitle>Üye Bilgileri</CardTitle>
                    </CardHeader>
                    <CardContent>
                        <form onSubmit={handleSubmit} className="space-y-6">
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
                                <Label htmlFor="email">
                                    E-posta <span className="text-red-500">*</span>
                                </Label>
                                <Input
                                    id="email"
                                    name="email"
                                    type="email"
                                    required
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
                                <Label htmlFor="address">Adres</Label>
                                <Textarea
                                    id="address"
                                    name="address"
                                    rows={3}
                                    placeholder="Adres bilgisi"
                                    value={data.address}
                                    onChange={(e) =>
                                        setData('address', e.target.value)
                                    }
                                />
                                <InputError message={errors.address} />
                            </div>

                            <div className="grid grid-cols-2 gap-4">
                                <div className="grid gap-2">
                                    <Label htmlFor="city">Şehir</Label>
                                    <Input
                                        id="city"
                                        name="city"
                                        placeholder="Şehir"
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
                                        placeholder="Ülke"
                                        value={data.country}
                                        onChange={(e) =>
                                            setData('country', e.target.value)
                                        }
                                    />
                                    <InputError message={errors.country} />
                                </div>
                            </div>

                            <div className="grid gap-2">
                                <Label htmlFor="postal_code">Posta Kodu</Label>
                                <Input
                                    id="postal_code"
                                    name="postal_code"
                                    placeholder="34000"
                                    value={data.postal_code}
                                    onChange={(e) =>
                                        setData('postal_code', e.target.value)
                                    }
                                />
                                <InputError message={errors.postal_code} />
                            </div>

                            <div className="grid gap-2">
                                <Label>Gruplar</Label>
                                <div className="space-y-2">
                                    {customerGroups.map((group) => (
                                        <div
                                            key={group.id}
                                            className="flex items-center space-x-2"
                                        >
                                            <Checkbox
                                                id={`group-${group.id}`}
                                                checked={data.group_ids?.includes(
                                                    group.id,
                                                )}
                                                onCheckedChange={() =>
                                                    handleGroupToggle(group.id)
                                                }
                                            />
                                            <Label
                                                htmlFor={`group-${group.id}`}
                                                className="text-sm font-normal cursor-pointer"
                                            >
                                                {group.name}
                                            </Label>
                                        </div>
                                    ))}
                                </div>
                                <InputError message={errors.group_ids} />
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
                                <Link href="/admin/customers">
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

