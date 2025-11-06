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

interface Props {
    emailTemplate: {
        id: number;
        name: string;
        slug: string;
        subject: string;
        body: string;
        is_active: boolean;
    };
}

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Dashboard',
        href: '/admin/dashboard',
    },
    {
        title: 'Mail Taslakları',
        href: '/admin/email-templates',
    },
    {
        title: 'Şablon Düzenle',
        href: '#',
    },
];

export default function EmailTemplatesEdit({ emailTemplate }: Props) {
    const { data, setData, put, processing, errors } = useForm({
        name: emailTemplate.name,
        slug: emailTemplate.slug,
        subject: emailTemplate.subject,
        body: emailTemplate.body,
        is_active: emailTemplate.is_active,
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
        put(`/admin/email-templates/${emailTemplate.id}`);
    };

    return (
        <AppLayout breadcrumbs={breadcrumbs}>
            <Head title="Email Şablonu Düzenle" />

            <div className="flex-1 space-y-6 p-6">
                <div className="flex items-center justify-between">
                    <div>
                        <h1 className="text-3xl font-bold tracking-tight">
                            Email Şablonu Düzenle
                        </h1>
                        <p className="mt-1 text-muted-foreground">
                            {emailTemplate.name} şablonunu düzenleyin
                        </p>
                    </div>
                    <div className="flex gap-2">
                        <Link href={`/admin/email-templates/${emailTemplate.id}`}>
                            <Button variant="outline">Görüntüle</Button>
                        </Link>
                        <Link href="/admin/email-templates">
                            <Button variant="outline">
                                <ArrowLeft className="mr-2 h-4 w-4" />
                                Geri Dön
                            </Button>
                        </Link>
                    </div>
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
                                <Label htmlFor="subject">
                                    Konu <span className="text-red-500">*</span>
                                </Label>
                                <Input
                                    id="subject"
                                    name="subject"
                                    required
                                    placeholder="E-posta konusu"
                                    value={data.subject}
                                    onChange={(e) =>
                                        setData('subject', e.target.value)
                                    }
                                />
                                <InputError message={errors.subject} />
                            </div>

                            <div className="grid gap-2">
                                <Label htmlFor="body">
                                    İçerik <span className="text-red-500">*</span>
                                </Label>
                                <Textarea
                                    id="body"
                                    name="body"
                                    required
                                    rows={12}
                                    placeholder="E-posta içeriği..."
                                    value={data.body}
                                    onChange={(e) =>
                                        setData('body', e.target.value)
                                    }
                                    className="font-mono text-sm"
                                />
                                <InputError message={errors.body} />
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
                                <Link href="/admin/email-templates">
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

