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
                    </CardContent>
                </Card>
            </div>
        </AppLayout>
    );
}
