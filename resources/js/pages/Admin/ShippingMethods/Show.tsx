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
} from '@/components/ui/dialog';
import AppLayout from '@/layouts/app-layout';
import { type BreadcrumbItem } from '@/types';
import { Head, Link, router } from '@inertiajs/react';
import { ArrowLeft, Edit, Trash2 } from 'lucide-react';
import { useState } from 'react';

interface Props {
    shippingMethod: {
        id: number;
        name: string;
        code: string;
        description?: string;
        type: 'fixed' | 'free' | 'weight_based' | 'price_based';
        cost: number;
        is_active: boolean;
        sort_order: number;
        created_at: string;
        updated_at: string;
    };
}

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Dashboard',
        href: '/admin/dashboard',
    },
    {
        title: 'Kargo Yöntemleri',
        href: '/admin/shipping-methods',
    },
    {
        title: 'Kargo Yöntemi Detayı',
        href: '#',
    },
];

const typeLabels: Record<string, string> = {
    fixed: 'Sabit',
    free: 'Ücretsiz',
    weight_based: 'Ağırlık Bazlı',
    price_based: 'Fiyat Bazlı',
};

export default function ShippingMethodsShow({ shippingMethod }: Props) {
    const [showDeleteDialog, setShowDeleteDialog] = useState(false);

    const handleDelete = () => {
        router.delete(`/admin/shipping-methods/${shippingMethod.id}`, {
            onSuccess: () => {
                router.visit('/admin/shipping-methods');
            },
        });
        setShowDeleteDialog(false);
    };

    return (
        <AppLayout breadcrumbs={breadcrumbs}>
            <Head title={`${shippingMethod.name} - Kargo Yöntemi Detayı`} />

            <div className="flex-1 space-y-6 p-6">
                <div className="flex items-center justify-between">
                    <div>
                        <h1 className="text-3xl font-bold tracking-tight">
                            {shippingMethod.name}
                        </h1>
                        <p className="mt-1 text-muted-foreground">
                            Kargo yöntemi detay bilgileri
                        </p>
                    </div>
                    <div className="flex gap-2">
                        <Link
                            href={`/admin/shipping-methods/${shippingMethod.id}/edit`}
                        >
                            <Button>
                                <Edit className="mr-2 h-4 w-4" />
                                Düzenle
                            </Button>
                        </Link>
                        <Button
                            variant="destructive"
                            onClick={() => setShowDeleteDialog(true)}
                        >
                            <Trash2 className="mr-2 h-4 w-4" />
                            Sil
                        </Button>
                        <Link href="/admin/shipping-methods">
                            <Button variant="outline">
                                <ArrowLeft className="mr-2 h-4 w-4" />
                                Geri Dön
                            </Button>
                        </Link>
                    </div>
                </div>

                <div className="grid gap-6">
                    <Card>
                        <CardHeader>
                            <CardTitle>Kargo Yöntemi Bilgileri</CardTitle>
                        </CardHeader>
                        <CardContent className="space-y-4">
                            <div>
                                <label className="text-sm font-medium text-muted-foreground">
                                    Ad
                                </label>
                                <p className="text-sm font-medium">
                                    {shippingMethod.name}
                                </p>
                            </div>
                            <div>
                                <label className="text-sm font-medium text-muted-foreground">
                                    Kod
                                </label>
                                <p className="font-mono text-sm">
                                    {shippingMethod.code}
                                </p>
                            </div>
                            {shippingMethod.description && (
                                <div>
                                    <label className="text-sm font-medium text-muted-foreground">
                                        Açıklama
                                    </label>
                                    <p className="text-sm">
                                        {shippingMethod.description}
                                    </p>
                                </div>
                            )}
                            <div>
                                <label className="text-sm font-medium text-muted-foreground">
                                    Tip
                                </label>
                                <div className="mt-2">
                                    <Badge variant="outline">
                                        {typeLabels[shippingMethod.type] ||
                                            shippingMethod.type}
                                    </Badge>
                                </div>
                            </div>
                            {shippingMethod.type !== 'free' && (
                                <div>
                                    <label className="text-sm font-medium text-muted-foreground">
                                        Maliyet
                                    </label>
                                    <p className="text-sm font-medium">
                                        {shippingMethod.cost.toFixed(2)} ₺
                                    </p>
                                </div>
                            )}
                            <div>
                                <label className="text-sm font-medium text-muted-foreground">
                                    Durum
                                </label>
                                <div className="mt-2">
                                    {shippingMethod.is_active ? (
                                        <Badge variant="default">Aktif</Badge>
                                    ) : (
                                        <Badge variant="secondary">Pasif</Badge>
                                    )}
                                </div>
                            </div>
                            <div>
                                <label className="text-sm font-medium text-muted-foreground">
                                    Sıra
                                </label>
                                <p className="text-sm font-medium">
                                    {shippingMethod.sort_order}
                                </p>
                            </div>
                            <div>
                                <label className="text-sm font-medium text-muted-foreground">
                                    Oluşturulma Tarihi
                                </label>
                                <p className="text-sm font-medium">
                                    {new Date(
                                        shippingMethod.created_at,
                                    ).toLocaleString('tr-TR')}
                                </p>
                            </div>
                            <div>
                                <label className="text-sm font-medium text-muted-foreground">
                                    Güncellenme Tarihi
                                </label>
                                <p className="text-sm font-medium">
                                    {new Date(
                                        shippingMethod.updated_at,
                                    ).toLocaleString('tr-TR')}
                                </p>
                            </div>
                        </CardContent>
                    </Card>
                </div>

                <Dialog
                    open={showDeleteDialog}
                    onOpenChange={setShowDeleteDialog}
                >
                    <DialogContent>
                        <DialogHeader>
                            <DialogTitle>Kargo Yöntemini Sil</DialogTitle>
                            <DialogDescription>
                                Bu kargo yöntemini silmek istediğinizden emin
                                misiniz? Bu işlem geri alınamaz.
                            </DialogDescription>
                        </DialogHeader>
                        <DialogFooter>
                            <Button
                                variant="outline"
                                onClick={() => setShowDeleteDialog(false)}
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
            </div>
        </AppLayout>
    );
}
