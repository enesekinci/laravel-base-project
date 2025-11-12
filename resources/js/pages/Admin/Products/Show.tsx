import { Badge } from '@/components/ui/badge';
import { Button } from '@/components/ui/button';
import { Card, CardContent, CardHeader, CardTitle } from '@/components/ui/card';
import {
    Dialog,
    DialogContent,
    DialogDescription,
    DialogFooter,
    DialogHeader,
    DialogTitle,
    DialogTrigger,
} from '@/components/ui/dialog';
import AppLayout from '@/layouts/app-layout';
import { destroy, edit, index } from '@/routes/admin/products';
import { type BreadcrumbItem } from '@/types';
import { Head, Link, router } from '@inertiajs/react';
import { ArrowLeft, Edit, Trash2 } from 'lucide-react';
import { useState } from 'react';

interface Product {
    id: number;
    name: string;
    slug: string;
    sku: string;
    description?: string;
    short_description?: string;
    status: 'draft' | 'published';
    is_virtual: boolean;
    seo_url?: string;
    meta_title?: string;
    meta_description?: string;
    new_from?: string;
    new_to?: string;
    sort_order: number;
    brand?: {
        id: number;
        name: string;
    };
    taxClass?: {
        id: number;
        name: string;
    };
    categories?: Array<{
        id: number;
        name: string;
    }>;
    tags?: Array<{
        id: number;
        name: string;
    }>;
    attributes?: Array<{
        id: number;
        name: string;
        pivot?: {
            value?: string;
            attribute_value_id?: number;
        };
    }>;
    variations?: Array<{
        id: number;
        name: string;
        sku?: string;
        price?: number;
        compare_price?: number;
        stock?: number;
        barcode?: string;
        image?: string;
        is_active?: boolean;
        sort_order?: number;
        values?: Array<{
            id: number;
            label: string;
        }>;
    }>;
    options?: Array<{
        id: number;
        name: string;
        type: string;
        required: boolean;
    }>;
    media?: Array<{
        id: number;
        type: 'image' | 'video';
        path: string;
        alt?: string;
        sort_order?: number;
    }>;
    links?: Array<{
        id: number;
        type: 'up_sell' | 'cross_sell' | 'related';
        linkedProduct?: {
            id: number;
            name: string;
        };
    }>;
}

interface Props {
    product: Product;
}

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
        title: 'Ürün Detayı',
        href: '#',
    },
];

const statusLabels: Record<string, string> = {
    draft: 'Taslak',
    published: 'Yayınlandı',
};

export default function ProductsShow({ product }: Props) {
    const [showDeleteDialog, setShowDeleteDialog] = useState(false);

    const handleDelete = () => {
        router.delete(destroy(product.id).url, {
            onSuccess: () => {
                router.visit(index().url);
            },
        });
        setShowDeleteDialog(false);
    };

    return (
        <AppLayout breadcrumbs={breadcrumbs}>
            <Head title={`${product.name} - Ürün Detayı`} />

            <div className="flex-1 space-y-6 p-6">
                <div className="flex items-center justify-between">
                    <div>
                        <h1 className="text-3xl font-bold tracking-tight">
                            {product.name}
                        </h1>
                        <p className="mt-1 text-muted-foreground">
                            Ürün detay bilgileri
                        </p>
                    </div>
                    <div className="flex gap-2">
                        <Link href={edit(product.id)}>
                            <Button>
                                <Edit className="mr-2 h-4 w-4" />
                                Düzenle
                            </Button>
                        </Link>
                        <Dialog
                            open={showDeleteDialog}
                            onOpenChange={setShowDeleteDialog}
                        >
                            <DialogTrigger asChild>
                                <Button variant="destructive">
                                    <Trash2 className="mr-2 h-4 w-4" />
                                    Sil
                                </Button>
                            </DialogTrigger>
                            <DialogContent>
                                <DialogHeader>
                                    <DialogTitle>Ürünü Sil</DialogTitle>
                                    <DialogDescription>
                                        Bu ürünü silmek istediğinizden emin
                                        misiniz? Bu işlem geri alınamaz.
                                    </DialogDescription>
                                </DialogHeader>
                                <DialogFooter>
                                    <Button
                                        variant="outline"
                                        onClick={() =>
                                            setShowDeleteDialog(false)
                                        }
                                    >
                                        İptal
                                    </Button>
                                    <Button
                                        variant="destructive"
                                        onClick={handleDelete}
                                    >
                                        Sil
                                    </Button>
                                </DialogFooter>
                            </DialogContent>
                        </Dialog>
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
                        <CardTitle>Ürün Bilgileri</CardTitle>
                    </CardHeader>
                    <CardContent className="space-y-4">
                        <div>
                            <p className="text-sm font-medium text-muted-foreground">
                                Ürün Adı
                            </p>
                            <p className="mt-1 text-lg">{product.name}</p>
                        </div>
                        <div>
                            <p className="text-sm font-medium text-muted-foreground">
                                SKU
                            </p>
                            <p className="mt-1 font-mono text-lg">
                                {product.sku}
                            </p>
                        </div>
                        <div>
                            <p className="text-sm font-medium text-muted-foreground">
                                Slug
                            </p>
                            <p className="mt-1 font-mono text-lg">
                                {product.slug}
                            </p>
                        </div>
                        {product.description && (
                            <div>
                                <p className="text-sm font-medium text-muted-foreground">
                                    Açıklama
                                </p>
                                <p className="mt-1">{product.description}</p>
                            </div>
                        )}
                        {product.short_description && (
                            <div>
                                <p className="text-sm font-medium text-muted-foreground">
                                    Kısa Açıklama
                                </p>
                                <p className="mt-1">
                                    {product.short_description}
                                </p>
                            </div>
                        )}
                        <div>
                            <p className="text-sm font-medium text-muted-foreground">
                                Durum
                            </p>
                            <div className="mt-1">
                                <Badge
                                    variant={
                                        product.status === 'published'
                                            ? 'default'
                                            : 'secondary'
                                    }
                                >
                                    {statusLabels[product.status]}
                                </Badge>
                            </div>
                        </div>
                        {product.brand && (
                            <div>
                                <p className="text-sm font-medium text-muted-foreground">
                                    Marka
                                </p>
                                <p className="mt-1">{product.brand.name}</p>
                            </div>
                        )}
                        {product.taxClass && (
                            <div>
                                <p className="text-sm font-medium text-muted-foreground">
                                    Vergi Sınıfı
                                </p>
                                <p className="mt-1">{product.taxClass.name}</p>
                            </div>
                        )}
                        {product.categories &&
                            product.categories.length > 0 && (
                                <div>
                                    <p className="text-sm font-medium text-muted-foreground">
                                        Kategoriler
                                    </p>
                                    <div className="mt-1 flex flex-wrap gap-2">
                                        {product.categories.map((category) => (
                                            <Badge
                                                key={category.id}
                                                variant="outline"
                                            >
                                                {category.name}
                                            </Badge>
                                        ))}
                                    </div>
                                </div>
                            )}
                        {product.tags && product.tags.length > 0 && (
                            <div>
                                <p className="text-sm font-medium text-muted-foreground">
                                    Etiketler
                                </p>
                                <div className="mt-1 flex flex-wrap gap-2">
                                    {product.tags.map((tag) => (
                                        <Badge key={tag.id} variant="outline">
                                            {tag.name}
                                        </Badge>
                                    ))}
                                </div>
                            </div>
                        )}
                        <div>
                            <p className="text-sm font-medium text-muted-foreground">
                                Sanal Ürün
                            </p>
                            <div className="mt-1">
                                <Badge
                                    variant={
                                        product.is_virtual
                                            ? 'default'
                                            : 'secondary'
                                    }
                                >
                                    {product.is_virtual ? 'Evet' : 'Hayır'}
                                </Badge>
                            </div>
                        </div>
                        {product.sort_order !== undefined && (
                            <div>
                                <p className="text-sm font-medium text-muted-foreground">
                                    Sıralama
                                </p>
                                <p className="mt-1">{product.sort_order}</p>
                            </div>
                        )}
                    </CardContent>
                </Card>

                {/* SEO Bilgileri */}
                {(product.seo_url ||
                    product.meta_title ||
                    product.meta_description) && (
                    <Card>
                        <CardHeader>
                            <CardTitle>SEO Bilgileri</CardTitle>
                        </CardHeader>
                        <CardContent className="space-y-4">
                            {product.seo_url && (
                                <div>
                                    <p className="text-sm font-medium text-muted-foreground">
                                        SEO URL
                                    </p>
                                    <p className="mt-1 font-mono">
                                        {product.seo_url}
                                    </p>
                                </div>
                            )}
                            {product.meta_title && (
                                <div>
                                    <p className="text-sm font-medium text-muted-foreground">
                                        Meta Başlık
                                    </p>
                                    <p className="mt-1">{product.meta_title}</p>
                                </div>
                            )}
                            {product.meta_description && (
                                <div>
                                    <p className="text-sm font-medium text-muted-foreground">
                                        Meta Açıklama
                                    </p>
                                    <p className="mt-1">
                                        {product.meta_description}
                                    </p>
                                </div>
                            )}
                        </CardContent>
                    </Card>
                )}

                {/* Ek Bilgiler */}
                {(product.new_from || product.new_to) && (
                    <Card>
                        <CardHeader>
                            <CardTitle>Ek Bilgiler</CardTitle>
                        </CardHeader>
                        <CardContent className="space-y-4">
                            {product.new_from && (
                                <div>
                                    <p className="text-sm font-medium text-muted-foreground">
                                        Yeni Başlangıç Tarihi
                                    </p>
                                    <p className="mt-1">{product.new_from}</p>
                                </div>
                            )}
                            {product.new_to && (
                                <div>
                                    <p className="text-sm font-medium text-muted-foreground">
                                        Yeni Bitiş Tarihi
                                    </p>
                                    <p className="mt-1">{product.new_to}</p>
                                </div>
                            )}
                        </CardContent>
                    </Card>
                )}

                {/* Özellikler */}
                {product.attributes && product.attributes.length > 0 && (
                    <Card>
                        <CardHeader>
                            <CardTitle>Özellikler</CardTitle>
                        </CardHeader>
                        <CardContent>
                            <div className="space-y-3">
                                {product.attributes.map((attr) => (
                                    <div
                                        key={attr.id}
                                        className="border-b pb-3 last:border-0"
                                    >
                                        <p className="text-sm font-medium text-muted-foreground">
                                            {attr.name}
                                        </p>
                                        <p className="mt-1">
                                            {attr.pivot?.value || 'Değer yok'}
                                        </p>
                                    </div>
                                ))}
                            </div>
                        </CardContent>
                    </Card>
                )}

                {/* Varyasyonlar */}
                {product.variations && product.variations.length > 0 && (
                    <Card>
                        <CardHeader>
                            <CardTitle>Varyasyonlar</CardTitle>
                        </CardHeader>
                        <CardContent>
                            <div className="space-y-4">
                                {product.variations.map((variation) => (
                                    <div
                                        key={variation.id}
                                        className="rounded-lg border p-4"
                                    >
                                        <div className="flex items-center justify-between">
                                            <div>
                                                <p className="font-medium">
                                                    {variation.name}
                                                </p>
                                                {variation.sku && (
                                                    <p className="mt-1 text-sm text-muted-foreground">
                                                        SKU: {variation.sku}
                                                    </p>
                                                )}
                                            </div>
                                            <div className="text-right">
                                                {variation.price !==
                                                    undefined &&
                                                    variation.price !== null && (
                                                    <p className="font-medium">
                                                        {Number(variation.price).toFixed(
                                                            2,
                                                        )}{' '}
                                                        ₺
                                                    </p>
                                                )}
                                                {variation.stock !==
                                                    undefined &&
                                                    variation.stock !== null && (
                                                    <p className="mt-1 text-sm text-muted-foreground">
                                                        Stok: {variation.stock}
                                                    </p>
                                                )}
                                            </div>
                                        </div>
                                        {variation.values &&
                                            variation.values.length > 0 && (
                                                <div className="mt-3 flex flex-wrap gap-2">
                                                    {variation.values.map(
                                                        (value) => (
                                                            <Badge
                                                                key={value.id}
                                                                variant="outline"
                                                            >
                                                                {value.label}
                                                            </Badge>
                                                        ),
                                                    )}
                                                </div>
                                            )}
                                    </div>
                                ))}
                            </div>
                        </CardContent>
                    </Card>
                )}

                {/* Seçenekler */}
                {product.options && product.options.length > 0 && (
                    <Card>
                        <CardHeader>
                            <CardTitle>Seçenekler</CardTitle>
                        </CardHeader>
                        <CardContent>
                            <div className="space-y-2">
                                {product.options.map((option, index) => (
                                    <div
                                        key={option.id ? `option-${option.id}-${index}` : `option-${index}`}
                                        className="flex items-center gap-2"
                                    >
                                        <Badge variant="outline">
                                            {option.name}
                                        </Badge>
                                        {option.required && (
                                            <Badge
                                                variant="secondary"
                                                className="text-xs"
                                            >
                                                Zorunlu
                                            </Badge>
                                        )}
                                    </div>
                                ))}
                            </div>
                        </CardContent>
                    </Card>
                )}

                {/* Medya */}
                {product.media && product.media.length > 0 && (
                    <Card>
                        <CardHeader>
                            <CardTitle>Medya</CardTitle>
                        </CardHeader>
                        <CardContent>
                            <div className="grid grid-cols-2 gap-4 md:grid-cols-4">
                                {product.media.map((item) => (
                                    <div
                                        key={item.id}
                                        className="relative aspect-square overflow-hidden rounded-lg border"
                                    >
                                        {item.type === 'image' ? (
                                            <img
                                                src={item.path}
                                                alt={item.alt || ''}
                                                className="h-full w-full object-cover"
                                            />
                                        ) : (
                                            <div className="flex h-full items-center justify-center bg-muted">
                                                <span className="text-sm text-muted-foreground">
                                                    Video
                                                </span>
                                            </div>
                                        )}
                                    </div>
                                ))}
                            </div>
                        </CardContent>
                    </Card>
                )}

                {/* Bağlantılı Ürünler */}
                {product.links && product.links.length > 0 && (
                    <Card>
                        <CardHeader>
                            <CardTitle>Bağlantılı Ürünler</CardTitle>
                        </CardHeader>
                        <CardContent className="space-y-4">
                            {['up_sell', 'cross_sell', 'related'].map(
                                (type) => {
                                    const typeLinks = product.links?.filter(
                                        (l) => l.type === type,
                                    );
                                    if (!typeLinks || typeLinks.length === 0)
                                        return null;

                                    const typeLabels: Record<string, string> = {
                                        up_sell: 'Up-Sell',
                                        cross_sell: 'Cross-Sell',
                                        related: 'İlişkili Ürünler',
                                    };

                                    return (
                                        <div key={type}>
                                            <p className="text-sm font-medium text-muted-foreground">
                                                {typeLabels[type]}
                                            </p>
                                            <div className="mt-2 flex flex-wrap gap-2">
                                                {typeLinks.map((link) => (
                                                    <Badge
                                                        key={link.id}
                                                        variant="outline"
                                                    >
                                                        {link.linkedProduct
                                                            ?.name ||
                                                            'Bilinmeyen Ürün'}
                                                    </Badge>
                                                ))}
                                            </div>
                                        </div>
                                    );
                                },
                            )}
                        </CardContent>
                    </Card>
                )}
            </div>
        </AppLayout>
    );
}
