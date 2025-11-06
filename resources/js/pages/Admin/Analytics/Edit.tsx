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

interface Props {
    analytic: {
        id: number;
        provider?: string;
        tracking_id?: string;
        is_active: boolean;
    };
}

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Dashboard',
        href: '/admin/dashboard',
    },
    {
        title: 'Analitik',
        href: '/admin/analytics',
    },
    {
        title: 'Analitik Düzenle',
        href: '#',
    },
];

export default function AnalyticsEdit({ analytic }: Props) {
    const { data, setData, put, processing, errors } = useForm({
        provider: analytic.provider || '',
        tracking_id: analytic.tracking_id || '',
        config: {},
        is_active: analytic.is_active,
    });

    const handleSubmit = (e: React.FormEvent) => {
        e.preventDefault();
        put(`/admin/analytics/${analytic.id}`);
    };

    return (
        <AppLayout breadcrumbs={breadcrumbs}>
            <Head title="Analitik Düzenle" />

            <div className="flex-1 space-y-6 p-6">
                <div className="flex items-center justify-between">
                    <div>
                        <h1 className="text-3xl font-bold tracking-tight">
                            Analitik Düzenle
                        </h1>
                        <p className="mt-1 text-muted-foreground">
                            Analitik entegrasyonunu düzenleyin
                        </p>
                    </div>
                    <div className="flex gap-2">
                        <Link href={`/admin/analytics/${analytic.id}`}>
                            <Button variant="outline">Görüntüle</Button>
                        </Link>
                        <Link href="/admin/analytics">
                            <Button variant="outline">
                                <ArrowLeft className="mr-2 h-4 w-4" />
                                Geri Dön
                            </Button>
                        </Link>
                    </div>
                </div>

                <Card>
                    <CardHeader>
                        <CardTitle>Analitik Bilgileri</CardTitle>
                    </CardHeader>
                    <CardContent>
                        <form onSubmit={handleSubmit} className="space-y-6">
                            <div className="grid gap-2">
                                <Label htmlFor="provider">Sağlayıcı</Label>
                                <Input
                                    id="provider"
                                    name="provider"
                                    placeholder="Google, Facebook, vb."
                                    value={data.provider}
                                    onChange={(e) =>
                                        setData('provider', e.target.value)
                                    }
                                />
                                <InputError message={errors.provider} />
                            </div>

                            <div className="grid gap-2">
                                <Label htmlFor="tracking_id">Takip ID</Label>
                                <Input
                                    id="tracking_id"
                                    name="tracking_id"
                                    placeholder="GA-XXXXXXXXX, vb."
                                    value={data.tracking_id}
                                    onChange={(e) =>
                                        setData('tracking_id', e.target.value)
                                    }
                                />
                                <InputError message={errors.tracking_id} />
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
                                <Link href="/admin/analytics">
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
