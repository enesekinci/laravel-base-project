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
    integration: {
        id: number;
        name: string;
        type: string;
        provider?: string;
        is_active: boolean;
    };
}

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Dashboard',
        href: '/admin/dashboard',
    },
    {
        title: 'Entegrasyonlar',
        href: '/admin/integrations',
    },
    {
        title: 'Entegrasyon Düzenle',
        href: '#',
    },
];

export default function IntegrationsEdit({ integration }: Props) {
    const { data, setData, put, processing, errors } = useForm({
        name: integration.name,
        type: integration.type,
        provider: integration.provider || '',
        config: {},
        is_active: integration.is_active,
    });

    const handleSubmit = (e: React.FormEvent) => {
        e.preventDefault();
        put(`/admin/integrations/${integration.id}`);
    };

    return (
        <AppLayout breadcrumbs={breadcrumbs}>
            <Head title="Entegrasyon Düzenle" />

            <div className="flex-1 space-y-6 p-6">
                <div className="flex items-center justify-between">
                    <div>
                        <h1 className="text-3xl font-bold tracking-tight">
                            Entegrasyon Düzenle
                        </h1>
                        <p className="mt-1 text-muted-foreground">
                            {integration.name} entegrasyonunu düzenleyin
                        </p>
                    </div>
                    <div className="flex gap-2">
                        <Link href={`/admin/integrations/${integration.id}`}>
                            <Button variant="outline">Görüntüle</Button>
                        </Link>
                        <Link href="/admin/integrations">
                            <Button variant="outline">
                                <ArrowLeft className="mr-2 h-4 w-4" />
                                Geri Dön
                            </Button>
                        </Link>
                    </div>
                </div>

                <Card>
                    <CardHeader>
                        <CardTitle>Entegrasyon Bilgileri</CardTitle>
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
                                    placeholder="Entegrasyon adı"
                                    value={data.name}
                                    onChange={(e) =>
                                        setData('name', e.target.value)
                                    }
                                />
                                <InputError message={errors.name} />
                            </div>

                            <div className="grid gap-2">
                                <Label htmlFor="type">
                                    Tip <span className="text-red-500">*</span>
                                </Label>
                                <Input
                                    id="type"
                                    name="type"
                                    required
                                    placeholder="api, webhook, plugin, vb."
                                    value={data.type}
                                    onChange={(e) =>
                                        setData('type', e.target.value)
                                    }
                                />
                                <InputError message={errors.type} />
                            </div>

                            <div className="grid gap-2">
                                <Label htmlFor="provider">Sağlayıcı</Label>
                                <Input
                                    id="provider"
                                    name="provider"
                                    placeholder="Google, Facebook, Stripe, vb."
                                    value={data.provider}
                                    onChange={(e) =>
                                        setData('provider', e.target.value)
                                    }
                                />
                                <InputError message={errors.provider} />
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
                                <Link href="/admin/integrations">
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

