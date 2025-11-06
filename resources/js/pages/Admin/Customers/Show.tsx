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
    customer: {
        id: number;
        name: string;
        email: string;
        phone?: string;
        address?: string;
        city?: string;
        country?: string;
        postal_code?: string;
        is_active: boolean;
        groups?: Array<{
            id: number;
            name: string;
        }>;
        representatives?: Array<{
            id: number;
            name: string;
            email?: string;
            phone?: string;
        }>;
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
        title: 'Üyeler',
        href: '/admin/customers',
    },
    {
        title: 'Üye Detayı',
        href: '#',
    },
];

export default function CustomersShow({ customer }: Props) {
    const [showDeleteDialog, setShowDeleteDialog] = useState(false);

    const handleDelete = () => {
        router.delete(`/admin/customers/${customer.id}`, {
            onSuccess: () => {
                router.visit('/admin/customers');
            },
        });
        setShowDeleteDialog(false);
    };

    return (
        <AppLayout breadcrumbs={breadcrumbs}>
            <Head title={`${customer.name} - Üye Detayı`} />

            <div className="flex-1 space-y-6 p-6">
                <div className="flex items-center justify-between">
                    <div>
                        <h1 className="text-3xl font-bold tracking-tight">
                            {customer.name}
                        </h1>
                        <p className="mt-1 text-muted-foreground">
                            Üye detay bilgileri
                        </p>
                    </div>
                    <div className="flex gap-2">
                        <Link href={`/admin/customers/${customer.id}/edit`}>
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
                        <Link href="/admin/customers">
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
                            <CardTitle>Üye Bilgileri</CardTitle>
                        </CardHeader>
                        <CardContent className="space-y-4">
                            <div>
                                <label className="text-sm font-medium text-muted-foreground">
                                    Ad Soyad
                                </label>
                                <p className="text-sm font-medium">
                                    {customer.name}
                                </p>
                            </div>
                            <div>
                                <label className="text-sm font-medium text-muted-foreground">
                                    E-posta
                                </label>
                                <p className="text-sm font-medium">
                                    {customer.email}
                                </p>
                            </div>
                            {customer.phone && (
                                <div>
                                    <label className="text-sm font-medium text-muted-foreground">
                                        Telefon
                                    </label>
                                    <p className="text-sm font-medium">
                                        {customer.phone}
                                    </p>
                                </div>
                            )}
                            {customer.address && (
                                <div>
                                    <label className="text-sm font-medium text-muted-foreground">
                                        Adres
                                    </label>
                                    <p className="text-sm">{customer.address}</p>
                                </div>
                            )}
                            {(customer.city || customer.country) && (
                                <div>
                                    <label className="text-sm font-medium text-muted-foreground">
                                        Şehir / Ülke
                                    </label>
                                    <p className="text-sm font-medium">
                                        {customer.city || ''}
                                        {customer.city && customer.country
                                            ? ' / '
                                            : ''}
                                        {customer.country || ''}
                                    </p>
                                </div>
                            )}
                            {customer.postal_code && (
                                <div>
                                    <label className="text-sm font-medium text-muted-foreground">
                                        Posta Kodu
                                    </label>
                                    <p className="text-sm font-medium">
                                        {customer.postal_code}
                                    </p>
                                </div>
                            )}
                            <div>
                                <label className="text-sm font-medium text-muted-foreground">
                                    Gruplar
                                </label>
                                <div className="flex flex-wrap gap-2 mt-2">
                                    {customer.groups &&
                                    customer.groups.length > 0 ? (
                                        customer.groups.map((group) => (
                                            <Badge
                                                key={group.id}
                                                variant="secondary"
                                            >
                                                {group.name}
                                            </Badge>
                                        ))
                                    ) : (
                                        <span className="text-sm text-muted-foreground">
                                            Grup yok
                                        </span>
                                    )}
                                </div>
                            </div>
                            <div>
                                <label className="text-sm font-medium text-muted-foreground">
                                    Durum
                                </label>
                                <div className="mt-2">
                                    {customer.is_active ? (
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
                                        customer.created_at,
                                    ).toLocaleString('tr-TR')}
                                </p>
                            </div>
                            <div>
                                <label className="text-sm font-medium text-muted-foreground">
                                    Güncellenme Tarihi
                                </label>
                                <p className="text-sm font-medium">
                                    {new Date(
                                        customer.updated_at,
                                    ).toLocaleString('tr-TR')}
                                </p>
                            </div>
                        </CardContent>
                    </Card>

                    {customer.representatives &&
                        customer.representatives.length > 0 && (
                            <Card>
                                <CardHeader>
                                    <CardTitle>Temsilciler</CardTitle>
                                </CardHeader>
                                <CardContent>
                                    <div className="space-y-4">
                                        {customer.representatives.map(
                                            (rep) => (
                                                <div
                                                    key={rep.id}
                                                    className="p-4 border rounded-lg"
                                                >
                                                    <div className="font-medium">
                                                        {rep.name}
                                                    </div>
                                                    {rep.email && (
                                                        <div className="text-sm text-muted-foreground">
                                                            {rep.email}
                                                        </div>
                                                    )}
                                                    {rep.phone && (
                                                        <div className="text-sm text-muted-foreground">
                                                            {rep.phone}
                                                        </div>
                                                    )}
                                                </div>
                                            ),
                                        )}
                                    </div>
                                </CardContent>
                            </Card>
                        )}
                </div>

                <Dialog
                    open={showDeleteDialog}
                    onOpenChange={setShowDeleteDialog}
                >
                    <DialogContent>
                        <DialogHeader>
                            <DialogTitle>Üyeyi Sil</DialogTitle>
                            <DialogDescription>
                                Bu üyeyi silmek istediğinizden emin misiniz? Bu
                                işlem geri alınamaz.
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

