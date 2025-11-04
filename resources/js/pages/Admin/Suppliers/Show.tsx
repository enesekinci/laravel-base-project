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
import { destroy, edit, index } from '@/routes/admin/suppliers';
import { type BreadcrumbItem } from '@/types';
import { Head, Link, router } from '@inertiajs/react';
import { ArrowLeft, Edit, Trash2 } from 'lucide-react';
import { useState } from 'react';

interface Props {
    supplier: {
        id: number;
        name: string;
        code: string;
        contact_person?: string;
        email?: string;
        phone?: string;
        address?: string;
        city?: string;
        country?: string;
        tax_number?: string;
        website?: string;
        notes?: string;
        is_active: boolean;
        created_at: string;
        updated_at: string;
    };
}

const breadcrumbs: BreadcrumbItem[] = [
    { title: 'Dashboard', href: '/admin/dashboard' },
    { title: 'Tedarikçiler', href: '/admin/suppliers' },
    { title: 'Tedarikçi Detayı', href: '#' },
];

export default function SuppliersShow({ supplier }: Props) {
    const [showDeleteDialog, setShowDeleteDialog] = useState(false);
    const handleDelete = () => {
        router.delete(destroy(supplier.id).url, {
            onSuccess: () => router.visit(index().url),
        });
        setShowDeleteDialog(false);
    };
    return (
        <AppLayout breadcrumbs={breadcrumbs}>
            <Head title={`${supplier.name} - Tedarikçi Detayı`} />
            <div className="flex-1 space-y-6 p-6">
                <div className="flex items-center justify-between">
                    <div>
                        <h1 className="text-3xl font-bold tracking-tight">
                            {supplier.name}
                        </h1>
                        <p className="mt-1 text-muted-foreground">
                            Tedarikçi detay bilgileri
                        </p>
                    </div>
                    <div className="flex gap-2">
                        <Link href={edit(supplier.id)}>
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
                                    <DialogTitle>Tedarikçiyi Sil</DialogTitle>
                                    <DialogDescription>
                                        Bu tedarikçiyi silmek istediğinizden
                                        emin misiniz? Bu işlem geri alınamaz.
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
                <div className="grid gap-6 md:grid-cols-2">
                    <Card>
                        <CardHeader>
                            <CardTitle>Genel Bilgiler</CardTitle>
                        </CardHeader>
                        <CardContent className="space-y-4">
                            <div>
                                <p className="text-sm font-medium text-muted-foreground">
                                    Tedarikçi Adı
                                </p>
                                <p className="mt-1 text-lg">{supplier.name}</p>
                            </div>
                            <div>
                                <p className="text-sm font-medium text-muted-foreground">
                                    Kod
                                </p>
                                <p className="mt-1 font-mono text-lg text-sm">
                                    {supplier.code}
                                </p>
                            </div>
                            {supplier.contact_person && (
                                <div>
                                    <p className="text-sm font-medium text-muted-foreground">
                                        İletişim Kişisi
                                    </p>
                                    <p className="mt-1">
                                        {supplier.contact_person}
                                    </p>
                                </div>
                            )}
                            {supplier.email && (
                                <div>
                                    <p className="text-sm font-medium text-muted-foreground">
                                        E-posta
                                    </p>
                                    <p className="mt-1">{supplier.email}</p>
                                </div>
                            )}
                            {supplier.phone && (
                                <div>
                                    <p className="text-sm font-medium text-muted-foreground">
                                        Telefon
                                    </p>
                                    <p className="mt-1">{supplier.phone}</p>
                                </div>
                            )}
                            <div>
                                <p className="text-sm font-medium text-muted-foreground">
                                    Durum
                                </p>
                                <div className="mt-1">
                                    <Badge
                                        variant={
                                            supplier.is_active
                                                ? 'default'
                                                : 'secondary'
                                        }
                                    >
                                        {supplier.is_active ? 'Aktif' : 'Pasif'}
                                    </Badge>
                                </div>
                            </div>
                        </CardContent>
                    </Card>
                    <Card>
                        <CardHeader>
                            <CardTitle>İletişim Bilgileri</CardTitle>
                        </CardHeader>
                        <CardContent className="space-y-4">
                            {supplier.address && (
                                <div>
                                    <p className="text-sm font-medium text-muted-foreground">
                                        Adres
                                    </p>
                                    <p className="mt-1">{supplier.address}</p>
                                </div>
                            )}
                            {supplier.city && (
                                <div>
                                    <p className="text-sm font-medium text-muted-foreground">
                                        Şehir
                                    </p>
                                    <p className="mt-1">{supplier.city}</p>
                                </div>
                            )}
                            {supplier.country && (
                                <div>
                                    <p className="text-sm font-medium text-muted-foreground">
                                        Ülke
                                    </p>
                                    <p className="mt-1">{supplier.country}</p>
                                </div>
                            )}
                            {supplier.tax_number && (
                                <div>
                                    <p className="text-sm font-medium text-muted-foreground">
                                        Vergi Numarası
                                    </p>
                                    <p className="mt-1">
                                        {supplier.tax_number}
                                    </p>
                                </div>
                            )}
                            {supplier.website && (
                                <div>
                                    <p className="text-sm font-medium text-muted-foreground">
                                        Web Sitesi
                                    </p>
                                    <a
                                        href={supplier.website}
                                        target="_blank"
                                        rel="noopener noreferrer"
                                        className="mt-1 text-blue-600 hover:underline"
                                    >
                                        {supplier.website}
                                    </a>
                                </div>
                            )}
                            {supplier.notes && (
                                <div>
                                    <p className="text-sm font-medium text-muted-foreground">
                                        Notlar
                                    </p>
                                    <p className="mt-1">{supplier.notes}</p>
                                </div>
                            )}
                        </CardContent>
                    </Card>
                </div>
            </div>
        </AppLayout>
    );
}
