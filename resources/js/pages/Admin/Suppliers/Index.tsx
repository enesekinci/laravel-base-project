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
import { destroy, show } from '@/routes/admin/suppliers';
import { type BreadcrumbItem, type PaginatedResponse } from '@/types';
import { Head, Link, router } from '@inertiajs/react';
import { Eye, Plus, Trash2 } from 'lucide-react';
import { useState } from 'react';

interface Supplier {
    id: number;
    name: string;
    code: string;
    contact_person?: string;
    email?: string;
    phone?: string;
    city?: string;
    country?: string;
    is_active: boolean;
}

interface Props {
    suppliers: PaginatedResponse<Supplier>;
}

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Dashboard',
        href: '/admin/dashboard',
    },
    {
        title: 'Tedarikçiler',
        href: '/admin/suppliers',
    },
];

export default function SuppliersIndex({ suppliers }: Props) {
    const [deleteSupplierId, setDeleteSupplierId] = useState<number | null>(null);

    const handleDelete = (supplierId: number) => {
        router.delete(destroy(supplierId).url, {
            onSuccess: () => {
                setDeleteSupplierId(null);
            },
        });
    };

    return (
        <AppLayout breadcrumbs={breadcrumbs}>
            <Head title="Tedarikçiler" />

            <div className="flex-1 space-y-6 p-6">
                <div className="flex items-center justify-between">
                    <div>
                        <h1 className="text-3xl font-bold tracking-tight">
                            Tedarikçiler
                        </h1>
                        <p className="mt-1 text-muted-foreground">
                            Tedarikçi bilgilerini yönetin
                        </p>
                    </div>
                    <Link href="/admin/suppliers/create">
                        <Button>
                            <Plus className="mr-2 h-4 w-4" />
                            Yeni Tedarikçi
                        </Button>
                    </Link>
                </div>

                <Card>
                    <CardHeader>
                        <CardTitle>Tedarikçi Listesi</CardTitle>
                    </CardHeader>
                    <CardContent>
                        <div className="space-y-4">
                            {suppliers.data.length > 0 ? (
                                <div className="space-y-2">
                                    {suppliers.data.map((supplier) => (
                                        <div
                                            key={supplier.id}
                                            className="flex items-center justify-between rounded-lg border p-4"
                                        >
                                            <div className="flex-1">
                                                <div className="flex items-center gap-2">
                                                    <h3 className="font-semibold">
                                                        {supplier.name}
                                                    </h3>
                                                    <span className="text-sm text-muted-foreground">
                                                        ({supplier.code})
                                                    </span>
                                                </div>
                                                {supplier.contact_person && (
                                                    <p className="mt-1 text-sm text-muted-foreground">
                                                        İletişim: {supplier.contact_person}
                                                        {supplier.email &&
                                                            ` - ${supplier.email}`}
                                                    </p>
                                                )}
                                            </div>
                                            <div className="flex items-center gap-2">
                                                <Link href={show(supplier.id)}>
                                                    <Button variant="outline" size="sm">
                                                        <Eye className="mr-2 h-4 w-4" />
                                                        Görüntüle
                                                    </Button>
                                                </Link>
                                                <Link
                                                    href={`/admin/suppliers/${supplier.id}/edit`}
                                                >
                                                    <Button variant="outline" size="sm">
                                                        Düzenle
                                                    </Button>
                                                </Link>
                                                <Dialog
                                                    open={deleteSupplierId === supplier.id}
                                                    onOpenChange={(open) =>
                                                        setDeleteSupplierId(
                                                            open ? supplier.id : null,
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
                                                                Tedarikçiyi Sil
                                                            </DialogTitle>
                                                            <DialogDescription>
                                                                Bu tedarikçiyi silmek
                                                                istediğinizden emin
                                                                misiniz? Bu işlem
                                                                geri alınamaz.
                                                            </DialogDescription>
                                                        </DialogHeader>
                                                        <DialogFooter>
                                                            <Button
                                                                variant="outline"
                                                                onClick={() =>
                                                                    setDeleteSupplierId(
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
                                                                        supplier.id,
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
                                    Henüz tedarikçi eklenmemiş.
                                </div>
                            )}
                        </div>
                    </CardContent>
                </Card>
            </div>
        </AppLayout>
    );
}

