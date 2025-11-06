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
import AppLayout from '@/layouts/app-layout';
import { type BreadcrumbItem } from '@/types';
import { Head, Link, useForm } from '@inertiajs/react';
import { ArrowLeft } from 'lucide-react';

interface Props {
    redirect: {
        id: number;
        from: string;
        to: string;
        type: '301' | '302';
        is_active: boolean;
    };
}

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Dashboard',
        href: '/admin/dashboard',
    },
    {
        title: 'Yönlendirmeler',
        href: '/admin/redirects',
    },
    {
        title: 'Yönlendirme Düzenle',
        href: '#',
    },
];

export default function RedirectsEdit({ redirect }: Props) {
    const { data, setData, put, processing, errors } = useForm({
        from: redirect.from,
        to: redirect.to,
        type: redirect.type,
        is_active: redirect.is_active,
    });

    const handleSubmit = (e: React.FormEvent) => {
        e.preventDefault();
        put(`/admin/redirects/${redirect.id}`);
    };

    return (
        <AppLayout breadcrumbs={breadcrumbs}>
            <Head title="Yönlendirme Düzenle" />

            <div className="flex-1 space-y-6 p-6">
                <div className="flex items-center justify-between">
                    <div>
                        <h1 className="text-3xl font-bold tracking-tight">
                            Yönlendirme Düzenle
                        </h1>
                        <p className="mt-1 text-muted-foreground">
                            Yönlendirmeyi düzenleyin
                        </p>
                    </div>
                    <div className="flex gap-2">
                        <Link href={`/admin/redirects/${redirect.id}`}>
                            <Button variant="outline">Görüntüle</Button>
                        </Link>
                        <Link href="/admin/redirects">
                            <Button variant="outline">
                                <ArrowLeft className="mr-2 h-4 w-4" />
                                Geri Dön
                            </Button>
                        </Link>
                    </div>
                </div>

                <Card>
                    <CardHeader>
                        <CardTitle>Yönlendirme Bilgileri</CardTitle>
                    </CardHeader>
                    <CardContent>
                        <form onSubmit={handleSubmit} className="space-y-6">
                            <div className="grid gap-2">
                                <Label htmlFor="from">
                                    Kaynak URL{' '}
                                    <span className="text-red-500">*</span>
                                </Label>
                                <Input
                                    id="from"
                                    name="from"
                                    required
                                    placeholder="/eski-url"
                                    value={data.from}
                                    onChange={(e) =>
                                        setData('from', e.target.value)
                                    }
                                />
                                <InputError message={errors.from} />
                            </div>

                            <div className="grid gap-2">
                                <Label htmlFor="to">
                                    Hedef URL{' '}
                                    <span className="text-red-500">*</span>
                                </Label>
                                <Input
                                    id="to"
                                    name="to"
                                    required
                                    placeholder="/yeni-url"
                                    value={data.to}
                                    onChange={(e) =>
                                        setData('to', e.target.value)
                                    }
                                />
                                <InputError message={errors.to} />
                            </div>

                            <div className="grid gap-2">
                                <Label htmlFor="type">
                                    Tip <span className="text-red-500">*</span>
                                </Label>
                                <Select
                                    value={data.type}
                                    onValueChange={(value) =>
                                        setData('type', value as '301' | '302')
                                    }
                                >
                                    <SelectTrigger>
                                        <SelectValue />
                                    </SelectTrigger>
                                    <SelectContent>
                                        <SelectItem value="301">
                                            301 - Kalıcı Yönlendirme
                                        </SelectItem>
                                        <SelectItem value="302">
                                            302 - Geçici Yönlendirme
                                        </SelectItem>
                                    </SelectContent>
                                </Select>
                                <InputError message={errors.type} />
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
                                <Link href="/admin/redirects">
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
