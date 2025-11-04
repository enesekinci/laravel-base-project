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
import { slugify } from '@/lib/slugify';
import { index, store } from '@/routes/admin/products';
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
        title: 'Ürünler',
        href: '/admin/products',
    },
    {
        title: 'Yeni Ürün',
        href: '/admin/products/create',
    },
];

export default function ProductsCreate() {
    const { data, setData, post, processing, errors } = useForm({
        name: '',
        slug: '',
        sku: '',
        description: '',
        short_description: '',
        brand_id: null as number | null,
        tax_class_id: null as number | null,
        status: 'draft' as 'draft' | 'published',
        is_virtual: false,
        seo_url: '',
        meta_title: '',
        meta_description: '',
        new_from: '',
        new_to: '',
        sort_order: 0,
        categories: [] as number[],
        tags: [] as number[],
        attributes: [] as Array<{
            attribute_id: number;
            value?: string;
            attribute_value_id?: number;
        }>,
        options: [] as number[],
        variations: [] as Array<{
            name: string;
            sku?: string;
            price: number;
            compare_price?: number;
            stock?: number;
            barcode?: string;
            image?: string;
            is_active?: boolean;
            sort_order?: number;
            values?: number[];
        }>,
        media: [] as Array<{
            type: 'image' | 'video';
            path: string;
            alt?: string;
            sort_order?: number;
        }>,
        links: [] as Array<{
            linked_product_id: number;
            type: 'up_sell' | 'cross_sell' | 'related';
        }>,
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
        post(store().url);
    };

    return (
        <AppLayout breadcrumbs={breadcrumbs}>
            <Head title="Yeni Ürün" />

            <div className="flex-1 space-y-6 p-6">
                <div className="flex items-center justify-between">
                    <div>
                        <h1 className="text-3xl font-bold tracking-tight">
                            Yeni Ürün
                        </h1>
                        <p className="mt-1 text-muted-foreground">
                            Yeni bir ürün oluşturun
                        </p>
                    </div>
                    <Link href={index()}>
                        <Button variant="outline">
                            <ArrowLeft className="mr-2 h-4 w-4" />
                            Geri Dön
                        </Button>
                    </Link>
                </div>

                <form onSubmit={handleSubmit} className="space-y-6">
                    <Card>
                        <CardHeader>
                            <CardTitle>Temel Bilgiler</CardTitle>
                        </CardHeader>
                        <CardContent className="space-y-4">
                            <div className="space-y-2">
                                <Label htmlFor="name">
                                    Ürün Adı{' '}
                                    <span className="text-red-500">*</span>
                                </Label>
                                <Input
                                    id="name"
                                    value={data.name}
                                    onChange={handleNameChange}
                                    placeholder="Ürün adı"
                                />
                                <InputError message={errors.name} />
                            </div>

                            <div className="space-y-2">
                                <Label htmlFor="slug">
                                    Slug <span className="text-red-500">*</span>
                                </Label>
                                <Input
                                    id="slug"
                                    value={data.slug}
                                    onChange={handleSlugChange}
                                    onBlur={handleSlugBlur}
                                    placeholder="urun-adi"
                                />
                                <InputError message={errors.slug} />
                            </div>

                            <div className="space-y-2">
                                <Label htmlFor="sku">
                                    SKU <span className="text-red-500">*</span>
                                </Label>
                                <Input
                                    id="sku"
                                    value={data.sku}
                                    onChange={(e) =>
                                        setData('sku', e.target.value)
                                    }
                                    placeholder="SKU-001"
                                />
                                <InputError message={errors.sku} />
                            </div>

                            <div className="space-y-2">
                                <Label htmlFor="description">Açıklama</Label>
                                <Input
                                    id="description"
                                    value={data.description}
                                    onChange={(e) =>
                                        setData('description', e.target.value)
                                    }
                                    placeholder="Ürün açıklaması"
                                />
                                <InputError message={errors.description} />
                            </div>

                            <div className="space-y-2">
                                <Label htmlFor="short_description">
                                    Kısa Açıklama
                                </Label>
                                <Input
                                    id="short_description"
                                    value={data.short_description}
                                    onChange={(e) =>
                                        setData(
                                            'short_description',
                                            e.target.value,
                                        )
                                    }
                                    placeholder="Kısa açıklama"
                                />
                                <InputError message={errors.short_description} />
                            </div>

                            <div className="grid grid-cols-2 gap-4">
                                <div className="space-y-2">
                                    <Label htmlFor="brand_id">Marka</Label>
                                    <Select
                                        value={
                                            data.brand_id
                                                ? String(data.brand_id)
                                                : ''
                                        }
                                        onValueChange={(value) =>
                                            setData(
                                                'brand_id',
                                                value ? Number(value) : null,
                                            )
                                        }
                                    >
                                        <SelectTrigger>
                                            <SelectValue placeholder="Marka seçin" />
                                        </SelectTrigger>
                                        <SelectContent>
                                            <SelectItem value="">Seçiniz</SelectItem>
                                        </SelectContent>
                                    </Select>
                                    <InputError message={errors.brand_id} />
                                </div>

                                <div className="space-y-2">
                                    <Label htmlFor="tax_class_id">
                                        Vergi Sınıfı
                                    </Label>
                                    <Select
                                        value={
                                            data.tax_class_id
                                                ? String(data.tax_class_id)
                                                : ''
                                        }
                                        onValueChange={(value) =>
                                            setData(
                                                'tax_class_id',
                                                value ? Number(value) : null,
                                            )
                                        }
                                    >
                                        <SelectTrigger>
                                            <SelectValue placeholder="Vergi sınıfı seçin" />
                                        </SelectTrigger>
                                        <SelectContent>
                                            <SelectItem value="">Seçiniz</SelectItem>
                                        </SelectContent>
                                    </Select>
                                    <InputError message={errors.tax_class_id} />
                                </div>
                            </div>

                            <div className="grid grid-cols-2 gap-4">
                                <div className="space-y-2">
                                    <Label htmlFor="status">
                                        Durum{' '}
                                        <span className="text-red-500">*</span>
                                    </Label>
                                    <Select
                                        value={data.status}
                                        onValueChange={(value) =>
                                            setData(
                                                'status',
                                                value as 'draft' | 'published',
                                            )
                                        }
                                    >
                                        <SelectTrigger>
                                            <SelectValue />
                                        </SelectTrigger>
                                        <SelectContent>
                                            <SelectItem value="draft">
                                                Taslak
                                            </SelectItem>
                                            <SelectItem value="published">
                                                Yayınlandı
                                            </SelectItem>
                                        </SelectContent>
                                    </Select>
                                    <InputError message={errors.status} />
                                </div>

                                <div className="space-y-2">
                                    <Label htmlFor="sort_order">Sıralama</Label>
                                    <Input
                                        id="sort_order"
                                        type="number"
                                        value={data.sort_order}
                                        onChange={(e) =>
                                            setData(
                                                'sort_order',
                                                parseInt(e.target.value) || 0,
                                            )
                                        }
                                    />
                                    <InputError message={errors.sort_order} />
                                </div>
                            </div>

                            <div className="flex items-center space-x-2">
                                <Checkbox
                                    id="is_virtual"
                                    checked={data.is_virtual}
                                    onCheckedChange={(checked) =>
                                        setData('is_virtual', checked === true)
                                    }
                                />
                                <Label htmlFor="is_virtual">Sanal Ürün</Label>
                            </div>
                        </CardContent>
                    </Card>

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
            </div>
        </AppLayout>
    );
}

