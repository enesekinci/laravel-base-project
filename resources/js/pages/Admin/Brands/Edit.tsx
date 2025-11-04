import InputError from '@/components/input-error';
import { Button } from '@/components/ui/button';
import { Card, CardContent, CardHeader, CardTitle } from '@/components/ui/card';
import { Checkbox } from '@/components/ui/checkbox';
import { Input } from '@/components/ui/input';
import { Label } from '@/components/ui/label';
import AppLayout from '@/layouts/app-layout';
import { slugify } from '@/lib/slugify';
import { index, show, update } from '@/routes/admin/brands';
import { type BreadcrumbItem } from '@/types';
import { Head, Link, useForm } from '@inertiajs/react';
import { ArrowLeft } from 'lucide-react';
import { useRef } from 'react';

interface Props {
    brand: {
        id: number;
        name: string;
        slug: string;
        description?: string;
        website?: string;
        is_active: boolean;
        sort_order: number;
    };
}

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Dashboard',
        href: '/admin/dashboard',
    },
    {
        title: 'Markalar',
        href: '/admin/brands',
    },
    {
        title: 'Marka Düzenle',
        href: '#',
    },
];

export default function BrandsEdit({ brand }: Props) {
    const { data, setData, put, processing, errors } = useForm({
        name: brand.name,
        slug: brand.slug,
        description: brand.description || '',
        website: brand.website || '',
        sort_order: brand.sort_order,
        is_active: brand.is_active,
    });

    const isSlugManuallyEdited = useRef(false);

    const handleNameChange = (e: React.ChangeEvent<HTMLInputElement>) => {
        const value = e.target.value;
        setData('name', value);

        // Eğer slug manuel olarak düzenlenmemişse, otomatik oluştur
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
        // Slug yazma bitince otomatik formatla
        if (data.slug) {
            const formattedSlug = slugify(data.slug);
            setData('slug', formattedSlug);
        }
    };

    const handleSubmit = (e: React.FormEvent) => {
        e.preventDefault();
        put(update(brand.id).url);
    };

    return (
        <AppLayout breadcrumbs={breadcrumbs}>
            <Head title="Marka Düzenle" />

            <div className="flex-1 space-y-6 p-6">
                <div className="flex items-center justify-between">
                    <div>
                        <h1 className="text-3xl font-bold tracking-tight">
                            Marka Düzenle
                        </h1>
                        <p className="mt-1 text-muted-foreground">
                            {brand.name} markasını düzenleyin
                        </p>
                    </div>
                    <div className="flex gap-2">
                        <Link href={show(brand.id)}>
                            <Button variant="outline">Görüntüle</Button>
                        </Link>
                        <Link href={index()}>
                            <Button variant="outline">
                                <ArrowLeft className="mr-2 h-4 w-4" />
                                Geri Dön
                            </Button>
                        </Link>
                    </div>
                </div>

                <Card>
                    <CardHeader>
                        <CardTitle>Marka Bilgileri</CardTitle>
                    </CardHeader>
                    <CardContent>
                        <form onSubmit={handleSubmit} className="space-y-6">
                            <>
                                <div className="grid gap-2">
                                    <Label htmlFor="name">
                                        Marka Adı{' '}
                                        <span className="text-red-500">*</span>
                                    </Label>
                                    <Input
                                        id="name"
                                        name="name"
                                        required
                                        value={data.name}
                                        onChange={handleNameChange}
                                    />
                                    <InputError message={errors.name} />
                                </div>

                                <div className="grid gap-2">
                                    <Label htmlFor="slug">
                                        Slug{' '}
                                        <span className="text-red-500">*</span>
                                    </Label>
                                    <Input
                                        id="slug"
                                        name="slug"
                                        required
                                        value={data.slug}
                                        onChange={handleSlugChange}
                                        onBlur={handleSlugBlur}
                                    />
                                    <InputError message={errors.slug} />
                                </div>

                                <div className="grid gap-2">
                                    <Label htmlFor="description">
                                        Açıklama
                                    </Label>
                                    <textarea
                                        id="description"
                                        name="description"
                                        rows={4}
                                        value={data.description}
                                        onChange={(e) =>
                                            setData(
                                                'description',
                                                e.target.value,
                                            )
                                        }
                                        className="flex min-h-[80px] w-full rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background placeholder:text-muted-foreground focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 focus-visible:outline-none disabled:cursor-not-allowed disabled:opacity-50"
                                    />
                                    <InputError message={errors.description} />
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
                                    <Label htmlFor="sort_order">Sıra</Label>
                                    <Input
                                        id="sort_order"
                                        name="sort_order"
                                        type="number"
                                        value={data.sort_order}
                                        onChange={(e) =>
                                            setData(
                                                'sort_order',
                                                parseInt(e.target.value) || 0,
                                            )
                                        }
                                        min={0}
                                    />
                                    <InputError message={errors.sort_order} />
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
