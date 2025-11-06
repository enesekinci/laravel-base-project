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
    representative: {
        id: number;
        name: string;
        email?: string;
        phone?: string;
        notes?: string;
        is_active: boolean;
        customer?: {
            id: number;
            name: string;
            email: string;
        };
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
        title: 'Temsilciler',
        href: '/admin/customer-representatives',
    },
    {
        title: 'Temsilci Detayı',
        href: '#',
    },
];

export default function CustomerRepresentativesShow({
    representative,
}: Props) {
    const [showDeleteDialog, setShowDeleteDialog] = useState(false);

    const handleDelete = () => {
        router.delete(`/admin/customer-representatives/${representative.id}`, {
            onSuccess: () => {
                router.visit('/admin/customer-representatives');
            },
        });
        setShowDeleteDialog(false);
    };

    return (
        <AppLayout breadcrumbs={breadcrumbs}>
            <Head title={`${representative.name} - Temsilci Detayı`} />

            <div className="flex-1 space-y-6 p-6">
                <div className="flex items-center justify-between">
                    <div>
                        <h1 className="text-3xl font-bold tracking-tight">
                            {representative.name}
                        </h1>
                        <p className="mt-1 text-muted-foreground">
                            Temsilci detay bilgileri
                        </p>
                    </div>
                    <div className="flex gap-2">
                        <Link
                            href={`/admin/customer-representatives/${representative.id}/edit`}
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
                        <Link href="/admin/customer-representatives">
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
                            <CardTitle>Temsilci Bilgileri</CardTitle>
                        </CardHeader>
                        <CardContent className="space-y-4">
                            <div>
                                <label className="text-sm font-medium text-muted-foreground">
                                    Ad Soyad
                                </label>
                                <p className="text-sm font-medium">
                                    {representative.name}
                                </p>
                            </div>
                            {representative.customer && (
                                <div>
                                    <label className="text-sm font-medium text-muted-foreground">
                                        Müşteri
                                    </label>
                                    <div className="mt-1">
                                        <Link
                                            href={`/admin/customers/${representative.customer.id}`}
                                        >
                                            <Button variant="link" className="p-0 h-auto">
                                                <p className="text-sm font-medium">
                                                    {representative.customer.name}
                                                </p>
                                            </Button>
                                        </Link>
                                        <p className="text-xs text-muted-foreground">
                                            {representative.customer.email}
                                        </p>
                                    </div>
                                </div>
                            )}
                            {representative.email && (
                                <div>
                                    <label className="text-sm font-medium text-muted-foreground">
                                        E-posta
                                    </label>
                                    <p className="text-sm font-medium">
                                        {representative.email}
                                    </p>
                                </div>
                            )}
                            {representative.phone && (
                                <div>
                                    <label className="text-sm font-medium text-muted-foreground">
                                        Telefon
                                    </label>
                                    <p className="text-sm font-medium">
                                        {representative.phone}
                                    </p>
                                </div>
                            )}
                            {representative.notes && (
                                <div>
                                    <label className="text-sm font-medium text-muted-foreground">
                                        Notlar
                                    </label>
                                    <p className="text-sm">{representative.notes}</p>
                                </div>
                            )}
                            <div>
                                <label className="text-sm font-medium text-muted-foreground">
                                    Durum
                                </label>
                                <div className="mt-2">
                                    {representative.is_active ? (
                                        <Badge variant="default">Aktif</Badge>
                                    ) : (
                                        <Badge variant="secondary">Pasif</Badge>
                                    )}
                                </div>
                            </div>
                            <div>
                                <label className="text-sm font-medium text-muted-foreground">
                                    Oluşturulma Tarihi
                                </label>
                                <p className="text-sm font-medium">
                                    {new Date(
                                        representative.created_at,
                                    ).toLocaleString('tr-TR')}
                                </p>
                            </div>
                            <div>
                                <label className="text-sm font-medium text-muted-foreground">
                                    Güncellenme Tarihi
                                </label>
                                <p className="text-sm font-medium">
                                    {new Date(
                                        representative.updated_at,
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
                            <DialogTitle>Temsilciyi Sil</DialogTitle>
                            <DialogDescription>
                                Bu temsilciyi silmek istediğinizden emin misiniz?
                                Bu işlem geri alınamaz.
                            </DialogDescription>
                        </DialogHeader>
                        <DialogFooter>
                            <Button
                                variant="outline"
                                onClick={() => setShowDeleteDialog(false)}
                            >
                                İptal
                            </Button>
                            <Button variant="destructive" onClick={handleDelete}>
                                Sil
                            </Button>
                        </DialogFooter>
                    </DialogContent>
                </Dialog>
            </div>
        </AppLayout>
    );
}

