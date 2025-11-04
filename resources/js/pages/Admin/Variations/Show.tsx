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
import { destroy, edit, index } from '@/routes/admin/variations';
import { type BreadcrumbItem } from '@/types';
import { Head, Link, router } from '@inertiajs/react';
import { ArrowLeft, Edit, Trash2 } from 'lucide-react';
import { useState } from 'react';

interface Props {
    variation: {
        id: number;
        name: string;
        slug: string;
        description?: string;
        sku?: string;
        price: number;
        compare_price?: number;
        stock: number;
        is_active: boolean;
        sort_order: number;
        created_at: string;
        updated_at: string;
    };
}

const breadcrumbs: BreadcrumbItem[] = [
    { title: 'Dashboard', href: '/admin/dashboard' },
    { title: 'Varyasyonlar', href: '/admin/variations' },
    { title: 'Varyasyon Detayı', href: '#' },
];

export default function VariationsShow({ variation }: Props) {
    const [showDeleteDialog, setShowDeleteDialog] = useState(false);
    const handleDelete = () => {
        router.delete(destroy(variation.id).url, {
            onSuccess: () => router.visit(index().url),
        });
        setShowDeleteDialog(false);
    };
    return (
        <AppLayout breadcrumbs={breadcrumbs}>
            <Head title={`${variation.name} - Varyasyon Detayı`} />
            <div className="flex-1 space-y-6 p-6">
                <div className="flex items-center justify-between">
                    <div>
                        <h1 className="text-3xl font-bold tracking-tight">
                            {variation.name}
                        </h1>
                        <p className="mt-1 text-muted-foreground">
                            Varyasyon detay bilgileri
                        </p>
                    </div>
                    <div className="flex gap-2">
                        <Link href={edit(variation.id)}>
                            <Button>
                                <Edit className="mr-2 h-4 w-4" /> Düzenle
                            </Button>
                        </Link>
                        <Dialog
                            open={showDeleteDialog}
                            onOpenChange={setShowDeleteDialog}
                        >
                            <DialogTrigger asChild>
                                <Button variant="destructive">
                                    <Trash2 className="mr-2 h-4 w-4" /> Sil
                                </Button>
                            </DialogTrigger>
                            <DialogContent>
                                <DialogHeader>
                                    <DialogTitle>Varyasyonu Sil</DialogTitle>
                                    <DialogDescription>
                                        Bu varyasyonu silmek istediğinizden emin
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
                                <ArrowLeft className="mr-2 h-4 w-4" /> Geri Dön
                            </Button>
                        </Link>
                    </div>
                </div>
                <Card>
                    <CardHeader>
                        <CardTitle>Varyasyon Bilgileri</CardTitle>
                    </CardHeader>
                    <CardContent className="space-y-4">
                        <div>
                            <p className="text-sm font-medium text-muted-foreground">
                                Varyasyon Adı
                            </p>
                            <p className="mt-1 text-lg">{variation.name}</p>
                        </div>
                        <div>
                            <p className="text-sm font-medium text-muted-foreground">
                                Slug
                            </p>
                            <p className="mt-1 font-mono text-lg text-sm">
                                {variation.slug}
                            </p>
                        </div>
                        {variation.description && (
                            <div>
                                <p className="text-sm font-medium text-muted-foreground">
                                    Açıklama
                                </p>
                                <p className="mt-1">{variation.description}</p>
                            </div>
                        )}
                        {variation.sku && (
                            <div>
                                <p className="text-sm font-medium text-muted-foreground">
                                    SKU
                                </p>
                                <p className="mt-1 font-mono text-lg text-sm">
                                    {variation.sku}
                                </p>
                            </div>
                        )}
                        <div className="grid grid-cols-2 gap-4">
                            <div>
                                <p className="text-sm font-medium text-muted-foreground">
                                    Fiyat
                                </p>
                                <p className="mt-1 text-lg font-semibold">
                                    ₺{variation.price.toFixed(2)}
                                </p>
                            </div>
                            {variation.compare_price && (
                                <div>
                                    <p className="text-sm font-medium text-muted-foreground">
                                        Karşılaştırma Fiyatı
                                    </p>
                                    <p className="mt-1 text-lg text-muted-foreground line-through">
                                        ₺{variation.compare_price.toFixed(2)}
                                    </p>
                                </div>
                            )}
                        </div>
                        <div>
                            <p className="text-sm font-medium text-muted-foreground">
                                Stok
                            </p>
                            <p className="mt-1 text-lg">{variation.stock}</p>
                        </div>
                        <div>
                            <p className="text-sm font-medium text-muted-foreground">
                                Sıra
                            </p>
                            <p className="mt-1 text-lg">
                                {variation.sort_order}
                            </p>
                        </div>
                        <div>
                            <p className="text-sm font-medium text-muted-foreground">
                                Durum
                            </p>
                            <div className="mt-1">
                                <Badge
                                    variant={
                                        variation.is_active
                                            ? 'default'
                                            : 'secondary'
                                    }
                                >
                                    {variation.is_active ? 'Aktif' : 'Pasif'}
                                </Badge>
                            </div>
                        </div>
                    </CardContent>
                </Card>
            </div>
        </AppLayout>
    );
}
