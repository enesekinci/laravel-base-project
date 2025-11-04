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
import { destroy, show } from '@/routes/admin/mannequins';
import { type BreadcrumbItem, type PaginatedResponse } from '@/types';
import { Head, Link, router } from '@inertiajs/react';
import { Eye, Plus, Trash2 } from 'lucide-react';
import { useState } from 'react';

interface Mannequin {
    id: number;
    name: string;
    code: string;
    description?: string;
    images?: string[];
    measurements?: Record<string, unknown>;
    is_active: boolean;
}

interface Props {
    mannequins: PaginatedResponse<Mannequin>;
}

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Dashboard',
        href: '/admin/dashboard',
    },
    {
        title: 'Mankenler',
        href: '/admin/mannequins',
    },
];

export default function MannequinsIndex({ mannequins }: Props) {
    const [deleteMannequinId, setDeleteMannequinId] = useState<number | null>(null);

    const handleDelete = (mannequinId: number) => {
        router.delete(destroy(mannequinId).url, {
            onSuccess: () => {
                setDeleteMannequinId(null);
            },
        });
    };

    return (
        <AppLayout breadcrumbs={breadcrumbs}>
            <Head title="Mankenler" />

            <div className="flex-1 space-y-6 p-6">
                <div className="flex items-center justify-between">
                    <div>
                        <h1 className="text-3xl font-bold tracking-tight">
                            Mankenler
                        </h1>
                        <p className="mt-1 text-muted-foreground">
                            Ürün manken bilgilerini yönetin
                        </p>
                    </div>
                    <Link href="/admin/mannequins/create">
                        <Button>
                            <Plus className="mr-2 h-4 w-4" />
                            Yeni Manken
                        </Button>
                    </Link>
                </div>

                <Card>
                    <CardHeader>
                        <CardTitle>Manken Listesi</CardTitle>
                    </CardHeader>
                    <CardContent>
                        <div className="space-y-4">
                            {mannequins.data.length > 0 ? (
                                <div className="space-y-2">
                                    {mannequins.data.map((mannequin) => (
                                        <div
                                            key={mannequin.id}
                                            className="flex items-center justify-between rounded-lg border p-4"
                                        >
                                            <div className="flex-1">
                                                <div className="flex items-center gap-2">
                                                    <h3 className="font-semibold">
                                                        {mannequin.name}
                                                    </h3>
                                                    <span className="text-sm text-muted-foreground">
                                                        ({mannequin.code})
                                                    </span>
                                                </div>
                                                {mannequin.description && (
                                                    <p className="mt-1 text-sm text-muted-foreground">
                                                        {mannequin.description}
                                                    </p>
                                                )}
                                            </div>
                                            <div className="flex items-center gap-2">
                                                <Link href={show(mannequin.id)}>
                                                    <Button variant="outline" size="sm">
                                                        <Eye className="mr-2 h-4 w-4" />
                                                        Görüntüle
                                                    </Button>
                                                </Link>
                                                <Link
                                                    href={`/admin/mannequins/${mannequin.id}/edit`}
                                                >
                                                    <Button variant="outline" size="sm">
                                                        Düzenle
                                                    </Button>
                                                </Link>
                                                <Dialog
                                                    open={deleteMannequinId === mannequin.id}
                                                    onOpenChange={(open) =>
                                                        setDeleteMannequinId(
                                                            open ? mannequin.id : null,
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
                                                                Manken'i Sil
                                                            </DialogTitle>
                                                            <DialogDescription>
                                                                Bu mankeni silmek
                                                                istediğinizden emin
                                                                misiniz? Bu işlem
                                                                geri alınamaz.
                                                            </DialogDescription>
                                                        </DialogHeader>
                                                        <DialogFooter>
                                                            <Button
                                                                variant="outline"
                                                                onClick={() =>
                                                                    setDeleteMannequinId(
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
                                                                        mannequin.id,
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
                                    Henüz manken eklenmemiş.
                                </div>
                            )}
                        </div>
                    </CardContent>
                </Card>
            </div>
        </AppLayout>
    );
}

