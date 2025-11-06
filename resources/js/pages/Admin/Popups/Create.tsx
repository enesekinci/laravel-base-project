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
        title: 'Popuplar',
        href: '/admin/popups',
    },
    {
        title: 'Yeni Popup',
        href: '/admin/popups/create',
    },
];

export default function PopupsCreate() {
    const { data, setData, post, processing, errors } = useForm({
        title: '',
        content: '',
        image: '',
        link: '',
        display_delay: 0,
        display_duration: null as number | null,
        is_active: true,
    });

    const handleSubmit = (e: React.FormEvent) => {
        e.preventDefault();
        post('/admin/popups');
    };

    return (
        <AppLayout breadcrumbs={breadcrumbs}>
            <Head title="Yeni Popup" />

            <div className="flex-1 space-y-6 p-6">
                <div className="flex items-center justify-between">
                    <div>
                        <h1 className="text-3xl font-bold tracking-tight">
                            Yeni Popup
                        </h1>
                        <p className="mt-1 text-muted-foreground">
                            Yeni bir popup oluşturun
                        </p>
                    </div>
                    <Link href="/admin/popups">
                        <Button variant="outline">
                            <ArrowLeft className="mr-2 h-4 w-4" />
                            Geri Dön
                        </Button>
                    </Link>
                </div>

                <Card>
                    <CardHeader>
                        <CardTitle>Popup Bilgileri</CardTitle>
                    </CardHeader>
                    <CardContent>
                        <form onSubmit={handleSubmit} className="space-y-6">
                            <div className="grid gap-2">
                                <Label htmlFor="title">
                                    Başlık <span className="text-red-500">*</span>
                                </Label>
                                <Input
                                    id="title"
                                    name="title"
                                    required
                                    placeholder="Popup başlığı"
                                    value={data.title}
                                    onChange={(e) =>
                                        setData('title', e.target.value)
                                    }
                                />
                                <InputError message={errors.title} />
                            </div>

                            <div className="grid gap-2">
                                <Label htmlFor="content">
                                    İçerik <span className="text-red-500">*</span>
                                </Label>
                                <Textarea
                                    id="content"
                                    name="content"
                                    required
                                    rows={6}
                                    placeholder="Popup içeriği..."
                                    value={data.content}
                                    onChange={(e) =>
                                        setData('content', e.target.value)
                                    }
                                />
                                <InputError message={errors.content} />
                            </div>

                            <div className="grid gap-2">
                                <Label htmlFor="image">Görsel</Label>
                                <Input
                                    id="image"
                                    name="image"
                                    placeholder="/images/popup.jpg"
                                    value={data.image}
                                    onChange={(e) =>
                                        setData('image', e.target.value)
                                    }
                                />
                                <InputError message={errors.image} />
                            </div>

                            <div className="grid gap-2">
                                <Label htmlFor="link">Link</Label>
                                <Input
                                    id="link"
                                    name="link"
                                    placeholder="/urun/example"
                                    value={data.link}
                                    onChange={(e) =>
                                        setData('link', e.target.value)
                                    }
                                />
                                <InputError message={errors.link} />
                            </div>

                            <div className="grid gap-2">
                                <Label htmlFor="display_delay">
                                    Görüntülenme Gecikmesi (Saniye)
                                </Label>
                                <Input
                                    id="display_delay"
                                    name="display_delay"
                                    type="number"
                                    min="0"
                                    value={data.display_delay}
                                    onChange={(e) =>
                                        setData(
                                            'display_delay',
                                            parseInt(e.target.value) || 0,
                                        )
                                    }
                                />
                                <InputError message={errors.display_delay} />
                            </div>

                            <div className="grid gap-2">
                                <Label htmlFor="display_duration">
                                    Görüntülenme Süresi (Saniye)
                                </Label>
                                <Input
                                    id="display_duration"
                                    name="display_duration"
                                    type="number"
                                    min="0"
                                    placeholder="Boş bırakılabilir"
                                    value={data.display_duration || ''}
                                    onChange={(e) =>
                                        setData(
                                            'display_duration',
                                            e.target.value
                                                ? parseInt(e.target.value)
                                                : null,
                                        )
                                    }
                                />
                                <InputError message={errors.display_duration} />
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
                                <Link href="/admin/popups">
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

