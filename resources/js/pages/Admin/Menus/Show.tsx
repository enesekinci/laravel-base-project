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

interface Menu {
    id: number;
    name: string;
    location?: string;
    items: Array<Record<string, unknown>>;
    is_active: boolean;
    created_at: string;
    updated_at: string;
}

interface Props {
    menu: Menu;
}

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Dashboard',
        href: '/admin/dashboard',
    },
    {
        title: 'Menüler',
        href: '/admin/menus',
    },
    {
        title: 'Menü Detayı',
        href: '#',
    },
];

export default function MenusShow({ menu }: Props) {
    const [showDeleteDialog, setShowDeleteDialog] = useState(false);

    const handleDelete = () => {
        router.delete(`/admin/menus/${menu.id}`, {
            onSuccess: () => {
                router.visit('/admin/menus');
            },
        });
        setShowDeleteDialog(false);
    };

    return (
        <AppLayout breadcrumbs={breadcrumbs}>
            <Head title={`${menu.name} - Menü Detayı`} />

            <div className="flex-1 space-y-6 p-6">
                <div className="flex items-center justify-between">
                    <div>
                        <h1 className="text-3xl font-bold tracking-tight">
                            {menu.name}
                        </h1>
                        <p className="mt-1 text-muted-foreground">
                            Menü detay bilgileri
                        </p>
                    </div>
                    <div className="flex gap-2">
                        <Link href="/admin/menus">
                            <Button variant="outline">
                                <ArrowLeft className="mr-2 h-4 w-4" />
                                Geri Dön
                            </Button>
                        </Link>
                        <Link href={`/admin/menus/${menu.id}/edit`}>
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
                                    Menü Adı
                                </p>
                                <p className="mt-1 text-sm">{menu.name}</p>
                            </div>

                            <div>
                                <p className="text-sm font-medium text-muted-foreground">
                                    Konum
                                </p>
                                <p className="mt-1 text-sm">
                                    {menu.location ? (
                                        <Badge variant="outline">
                                            {menu.location}
                                        </Badge>
                                    ) : (
                                        <span className="text-muted-foreground">
                                            Belirtilmemiş
                                        </span>
                                    )}
                                </p>
                            </div>

                            <div>
                                <p className="text-sm font-medium text-muted-foreground">
                                    Durum
                                </p>
                                <p className="mt-1">
                                    {menu.is_active ? (
                                        <Badge className="bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200">
                                            Aktif
                                        </Badge>
                                    ) : (
                                        <Badge className="bg-gray-100 text-gray-800 dark:bg-gray-900 dark:text-gray-200">
                                            Pasif
                                        </Badge>
                                    )}
                                </p>
                            </div>

                            <div>
                                <p className="text-sm font-medium text-muted-foreground">
                                    Oluşturulma Tarihi
                                </p>
                                <p className="mt-1 text-sm">
                                    {new Date(menu.created_at).toLocaleString(
                                        'tr-TR',
                                    )}
                                </p>
                            </div>

                            <div>
                                <p className="text-sm font-medium text-muted-foreground">
                                    Güncellenme Tarihi
                                </p>
                                <p className="mt-1 text-sm">
                                    {new Date(menu.updated_at).toLocaleString(
                                        'tr-TR',
                                    )}
                                </p>
                            </div>
                        </CardContent>
                    </Card>

                    <Card>
                        <CardHeader>
                            <CardTitle>Menü Öğeleri</CardTitle>
                        </CardHeader>
                        <CardContent>
                            <div className="space-y-2">
                                <p className="text-sm text-muted-foreground">
                                    Toplam {menu.items?.length || 0} öğe
                                </p>
                                <div className="rounded-md border p-4">
                                    <pre className="overflow-auto text-xs">
                                        {JSON.stringify(menu.items, null, 2)}
                                    </pre>
                                </div>
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
                            <DialogTitle>Menüyü Sil</DialogTitle>
                            <DialogDescription>
                                Bu menüyü silmek istediğinizden emin misiniz? Bu
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

