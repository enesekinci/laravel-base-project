import InputError from '@/components/input-error';
import { Button } from '@/components/ui/button';
import { Card, CardContent, CardHeader, CardTitle } from '@/components/ui/card';
import { Checkbox } from '@/components/ui/checkbox';
import { Input } from '@/components/ui/input';
import { Label } from '@/components/ui/label';
import AppLayout from '@/layouts/app-layout';
import { index, update } from '@/routes/admin/tax-classes';
import { type BreadcrumbItem } from '@/types';
import { Head, Link, useForm } from '@inertiajs/react';
import { ArrowLeft } from 'lucide-react';

interface Props {
    taxClass: {
        id: number;
        name: string;
        rate: number;
        is_active: boolean;
    };
}

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Dashboard',
        href: '/admin/dashboard',
    },
    {
        title: 'Vergi Sınıfları',
        href: '/admin/tax-classes',
    },
    {
        title: 'Vergi Sınıfı Düzenle',
        href: '#',
    },
];

export default function TaxClassesEdit({ taxClass }: Props) {
    const { data, setData, put, processing, errors } = useForm({
        name: taxClass.name,
        rate: taxClass.rate,
        is_active: taxClass.is_active,
    });

    const handleSubmit = (e: React.FormEvent) => {
        e.preventDefault();
        put(update.form(taxClass.id).url);
    };

    return (
        <AppLayout breadcrumbs={breadcrumbs}>
            <Head title="Vergi Sınıfı Düzenle" />

            <div className="flex-1 space-y-6 p-6">
                <div className="flex items-center justify-between">
                    <div>
                        <h1 className="text-3xl font-bold tracking-tight">
                            Vergi Sınıfı Düzenle
                        </h1>
                        <p className="mt-1 text-muted-foreground">
                            Vergi sınıfını düzenleyin
                        </p>
                    </div>
                    <Link href={index()}>
                        <Button variant="outline">
                            <ArrowLeft className="mr-2 h-4 w-4" />
                            Geri Dön
                        </Button>
                    </Link>
                </div>

                <Card>
                    <CardHeader>
                        <CardTitle>Vergi Sınıfı Bilgileri</CardTitle>
                    </CardHeader>
                    <CardContent>
                        <form onSubmit={handleSubmit} className="space-y-6">
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
                                    placeholder="Örn: KDV %20"
                                />
                                <InputError message={errors.name} />
                            </div>

                            <div className="space-y-2">
                                <Label htmlFor="rate">
                                    Oran (%){' '}
                                    <span className="text-red-500">*</span>
                                </Label>
                                <Input
                                    id="rate"
                                    type="number"
                                    step="0.01"
                                    min="0"
                                    max="100"
                                    value={data.rate}
                                    onChange={(e) =>
                                        setData(
                                            'rate',
                                            parseFloat(e.target.value) || 0,
                                        )
                                    }
                                    placeholder="0.00"
                                />
                                <InputError message={errors.rate} />
                            </div>

                            <div className="flex items-center space-x-2">
                                <Checkbox
                                    id="is_active"
                                    checked={
                                        data.is_active ?? taxClass.is_active
                                    }
                                    onCheckedChange={(checked) =>
                                        setData('is_active', checked === true)
                                    }
                                />
                                <Label htmlFor="is_active">Aktif</Label>
                            </div>

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
                    </CardContent>
                </Card>
            </div>
        </AppLayout>
    );
}
