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
import { destroy, show } from '@/routes/admin/products';
import { type BreadcrumbItem, type PaginatedResponse } from '@/types';
import { Head, Link, router } from '@inertiajs/react';
import { Eye, Plus, Trash2 } from 'lucide-react';
import { useState } from 'react';

interface Product {
    id: number;
    name: string;
    slug: string;
    sku: string;
    status: 'draft' | 'published';
    brand?: {
        id: number;
        name: string;
    };
    categories?: Array<{
        id: number;
        name: string;
    }>;
}

interface Props {
    products: PaginatedResponse<Product>;
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
];

const statusLabels: Record<string, string> = {
    draft: 'Taslak',
    published: 'Yayınlandı',
};

export default function ProductsIndex({ products }: Props) {
    const [deleteProductId, setDeleteProductId] = useState<number | null>(
        null,
    );

    const handleDelete = (productId: number) => {
        router.delete(destroy(productId).url, {
            onSuccess: () => {
                setDeleteProductId(null);
            },
        });
    };

    return (
        <AppLayout breadcrumbs={breadcrumbs}>
            <Head title="Ürünler" />

            <div className="flex-1 space-y-6 p-6">
                <div className="flex items-center justify-between">
                    <div>
                        <h1 className="text-3xl font-bold tracking-tight">
                            Ürünler
                        </h1>
                        <p className="mt-1 text-muted-foreground">
                            Ürünleri yönetin
                        </p>
                    </div>
                    <Link href="/admin/products/create">
                        <Button>
                            <Plus className="mr-2 h-4 w-4" />
                            Yeni Ürün
                        </Button>
                    </Link>
                </div>

                <Card>
                    <CardHeader>
                        <CardTitle>Ürün Listesi</CardTitle>
                    </CardHeader>
                    <CardContent>
                        <div className="space-y-4">
                            {products.data.length > 0 ? (
                                <div className="space-y-2">
                                    {products.data.map((product) => (
                                        <div
                                            key={product.id}
                                            className="flex items-center justify-between rounded-lg border p-4"
                                        >
                                            <div className="flex-1">
                                                <div className="flex items-center gap-2">
                                                    <h3 className="font-semibold">
                                                        {product.name}
                                                    </h3>
                                                    <span className="rounded-full bg-muted px-2 py-1 text-xs">
                                                        {product.sku}
                                                    </span>
                                                    <span
                                                        className={`rounded-full px-2 py-1 text-xs ${
                                                            product.status ===
                                                            'published'
                                                                ? 'bg-green-100 text-green-600'
                                                                : 'bg-gray-100 text-gray-600'
                                                        }`}
                                                    >
                                                        {
                                                            statusLabels[
                                                                product.status
                                                            ]
                                                        }
                                                    </span>
                                                </div>
                                                {product.brand && (
                                                    <p className="mt-1 text-sm text-muted-foreground">
                                                        Marka: {product.brand.name}
                                                    </p>
                                                )}
                                                {product.categories &&
                                                    product.categories.length >
                                                        0 && (
                                                        <p className="mt-1 text-sm text-muted-foreground">
                                                            Kategoriler:{' '}
                                                            {product.categories
                                                                .map((c) => c.name)
                                                                .join(', ')}
                                                        </p>
                                                    )}
                                            </div>
                                            <div className="flex items-center gap-2">
                                                <Link href={show(product.id)}>
                                                    <Button
                                                        variant="outline"
                                                        size="sm"
                                                    >
                                                        <Eye className="mr-2 h-4 w-4" />
                                                        Görüntüle
                                                    </Button>
                                                </Link>
                                                <Link
                                                    href={`/admin/products/${product.id}/edit`}
                                                >
                                                    <Button
                                                        variant="outline"
                                                        size="sm"
                                                    >
                                                        Düzenle
                                                    </Button>
                                                </Link>
                                                <Dialog
                                                    open={
                                                        deleteProductId ===
                                                        product.id
                                                    }
                                                    onOpenChange={(open) =>
                                                        setDeleteProductId(
                                                            open
                                                                ? product.id
                                                                : null,
                                                        )
                                                    }
                                                >
                                                    <DialogTrigger asChild>
                                                        <Button
                                                            variant="destructive"
                                                            size="sm"
                                                        >
                                                            <Trash2 className="mr-2 h-4 w-4" />
                                                            Sil
                                                        </Button>
                                                    </DialogTrigger>
                                                    <DialogContent>
                                                        <DialogHeader>
                                                            <DialogTitle>
                                                                Ürünü Sil
                                                            </DialogTitle>
                                                            <DialogDescription>
                                                                Bu ürünü silmek
                                                                istediğinizden emin
                                                                misiniz? Bu işlem
                                                                geri alınamaz.
                                                            </DialogDescription>
                                                        </DialogHeader>
                                                        <DialogFooter>
                                                            <Button
                                                                variant="outline"
                                                                onClick={() =>
                                                                    setDeleteProductId(
                                                                        null,
                                                                    )
                                                                }
                                                            >
                                                                İptal
                                                            </Button>
                                                            <Button
                                                                variant="destructive"
                                                                onClick={() =>
                                                                    handleDelete(
                                                                        product.id,
                                                                    )
                                                                }
                                                            >
                                                                Sil
                                                            </Button>
                                                        </DialogFooter>
                                                    </DialogContent>
                                                </Dialog>
                                            </div>
                                        </div>
                                    ))}
                                </div>
                            ) : (
                                <div className="py-8 text-center text-muted-foreground">
                                    Henüz ürün eklenmemiş.
                                </div>
                            )}
                        </div>
                    </CardContent>
                </Card>
            </div>
        </AppLayout>
    );
}

