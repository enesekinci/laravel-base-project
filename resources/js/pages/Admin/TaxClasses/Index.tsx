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
import { destroy, show } from '@/routes/admin/tax-classes';
import { type BreadcrumbItem, type PaginatedResponse } from '@/types';
import { Head, Link, router } from '@inertiajs/react';
import { Eye, Plus, Trash2 } from 'lucide-react';
import { useState } from 'react';

interface TaxClass {
    id: number;
    name: string;
    rate: number;
    is_active: boolean;
}

interface Props {
    taxClasses: PaginatedResponse<TaxClass>;
}

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Dashboard',
        href: '/admin/dashboard',
    },
    {
        title: 'Vergi Sınıfları',
        href: '/admin/tax-classes',
    },
];

export default function TaxClassesIndex({ taxClasses }: Props) {
    const [deleteTaxClassId, setDeleteTaxClassId] = useState<number | null>(
        null,
    );

    const handleDelete = (taxClassId: number) => {
        router.delete(destroy(taxClassId).url, {
            onSuccess: () => {
                setDeleteTaxClassId(null);
            },
        });
    };

    return (
        <AppLayout breadcrumbs={breadcrumbs}>
            <Head title="Vergi Sınıfları" />

            <div className="flex-1 space-y-6 p-6">
                <div className="flex items-center justify-between">
                    <div>
                        <h1 className="text-3xl font-bold tracking-tight">
                            Vergi Sınıfları
                        </h1>
                        <p className="mt-1 text-muted-foreground">
                            Ürün vergi sınıflarını yönetin
                        </p>
                    </div>
                    <Link href="/admin/tax-classes/create">
                        <Button>
                            <Plus className="mr-2 h-4 w-4" />
                            Yeni Vergi Sınıfı
                        </Button>
                    </Link>
                </div>

                <Card>
                    <CardHeader>
                        <CardTitle>Vergi Sınıfı Listesi</CardTitle>
                    </CardHeader>
                    <CardContent>
                        <div className="space-y-4">
                            {taxClasses.data.length > 0 ? (
                                <div className="space-y-2">
                                    {taxClasses.data.map((taxClass) => (
                                        <div
                                            key={taxClass.id}
                                            className="flex items-center justify-between rounded-lg border p-4"
                                        >
                                            <div className="flex-1">
                                                <div className="flex items-center gap-2">
                                                    <h3 className="font-semibold">
                                                        {taxClass.name}
                                                    </h3>
                                                    <span className="rounded-full bg-muted px-2 py-1 text-xs">
                                                        %{taxClass.rate.toFixed(2)}
                                                    </span>
                                                    {!taxClass.is_active && (
                                                        <span className="rounded-full bg-red-100 px-2 py-1 text-xs text-red-600">
                                                            Pasif
                                                        </span>
                                                    )}
                                                </div>
                                            </div>
                                            <div className="flex items-center gap-2">
                                                <Link href={show(taxClass.id)}>
                                                    <Button
                                                        variant="outline"
                                                        size="sm"
                                                    >
                                                        <Eye className="mr-2 h-4 w-4" />
                                                        Görüntüle
                                                    </Button>
                                                </Link>
                                                <Link
                                                    href={`/admin/tax-classes/${taxClass.id}/edit`}
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
                                                        deleteTaxClassId ===
                                                        taxClass.id
                                                    }
                                                    onOpenChange={(open) =>
                                                        setDeleteTaxClassId(
                                                            open
                                                                ? taxClass.id
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
                                                                Vergi Sınıfını Sil
                                                            </DialogTitle>
                                                            <DialogDescription>
                                                                Bu vergi sınıfını
                                                                silmek istediğinizden
                                                                emin misiniz? Bu
                                                                işlem geri alınamaz.
                                                            </DialogDescription>
                                                        </DialogHeader>
                                                        <DialogFooter>
                                                            <Button
                                                                variant="outline"
                                                                onClick={() =>
                                                                    setDeleteTaxClassId(
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
                                                                        taxClass.id,
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
                                    Henüz vergi sınıfı eklenmemiş.
                                </div>
                            )}
                        </div>
                    </CardContent>
                </Card>
            </div>
        </AppLayout>
    );
}

