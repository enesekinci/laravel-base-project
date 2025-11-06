import InputError from '@/components/input-error';
import { Button } from '@/components/ui/button';
import { Card, CardContent, CardHeader, CardTitle } from '@/components/ui/card';
import { Checkbox } from '@/components/ui/checkbox';
import { Input } from '@/components/ui/input';
import { Label } from '@/components/ui/label';
import { Textarea } from '@/components/ui/textarea';
import AppLayout from '@/layouts/app-layout';
import { slugify } from '@/lib/slugify';
import { type BreadcrumbItem } from '@/types';
import { Head, Link, useForm } from '@inertiajs/react';
import { ArrowLeft } from 'lucide-react';
import { useRef } from 'react';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Dashboard',
        href: '/admin/dashboard',
    },
    {
        title: 'SMS Taslakları',
        href: '/admin/sms-templates',
    },
    {
        title: 'Yeni Şablon',
        href: '/admin/sms-templates/create',
    },
];

export default function SmsTemplatesCreate() {
    const { data, setData, post, processing, errors } = useForm({
        name: '',
        slug: '',
        message: '',
        is_active: true,
    });

    const isSlugManuallyEdited = useRef(false);

    const handleNameChange = (e: React.ChangeEvent<HTMLInputElement>) => {
        const value = e.target.value;
        setData('name', value);

        if (!isSlugManuallyEdited.current) {
            const autoSlug = slugify(value);
            setData('slug', autoSlug);
        }
    };

    const handleSlugChange = (e: React.ChangeEvent<HTMLInputElement>) => {
        const value = e.target.value;
        setData('slug', value);
        isSlugManuallyEdited.current = true;
    };

    const handleSlugBlur = () => {
        if (data.slug) {
            const formattedSlug = slugify(data.slug);
            setData('slug', formattedSlug);
        }
    };

    const handleSubmit = (e: React.FormEvent) => {
        e.preventDefault();
        post('/admin/sms-templates');
    };

    return (
        <AppLayout breadcrumbs={breadcrumbs}>
            <Head title="Yeni SMS Şablonu" />

            <div className="flex-1 space-y-6 p-6">
                <div className="flex items-center justify-between">
                    <div>
                        <h1 className="text-3xl font-bold tracking-tight">
                            Yeni SMS Şablonu
                        </h1>
                        <p className="mt-1 text-muted-foreground">
                            Yeni bir SMS şablonu oluşturun
                        </p>
                    </div>
                    <Link href="/admin/sms-templates">
                        <Button variant="outline">
                            <ArrowLeft className="mr-2 h-4 w-4" />
                            Geri Dön
                        </Button>
                    </Link>
                </div>

                <Card>
                    <CardHeader>
                        <CardTitle>Şablon Bilgileri</CardTitle>
                    </CardHeader>
                    <CardContent>
                        <form onSubmit={handleSubmit} className="space-y-6">
                            <div className="grid gap-2">
                                <Label htmlFor="name">
                                    Şablon Adı <span className="text-red-500">*</span>
                                </Label>
                                <Input
                                    id="name"
                                    name="name"
                                    required
                                    placeholder="Şablon adı"
                                    value={data.name}
                                    onChange={handleNameChange}
                                />
                                <InputError message={errors.name} />
                            </div>

                            <div className="grid gap-2">
                                <Label htmlFor="slug">Slug</Label>
                                <Input
                                    id="slug"
                                    name="slug"
                                    placeholder="sablon-slug"
                                    value={data.slug}
                                    onChange={handleSlugChange}
                                    onBlur={handleSlugBlur}
                                />
                                <InputError message={errors.slug} />
                            </div>

                            <div className="grid gap-2">
                                <Label htmlFor="message">
                                    Mesaj <span className="text-red-500">*</span>
                                </Label>
                                <Textarea
                                    id="message"
                                    name="message"
                                    required
                                    rows={6}
                                    placeholder="SMS mesajı..."
                                    value={data.message}
                                    onChange={(e) =>
                                        setData('message', e.target.value)
                                    }
                                    maxLength={160}
                                />
                                <InputError message={errors.message} />
                                <p className="text-xs text-muted-foreground">
                                    {data.message.length}/160 karakter
                                </p>
                                <p className="text-xs text-muted-foreground">
                                    Değişkenler için {`{`}değişken_adı{`}`} formatını
                                    kullanabilirsiniz
                                </p>
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
                                <Link href="/admin/sms-templates">
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

