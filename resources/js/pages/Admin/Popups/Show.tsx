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
    popup: {
        id: number;
        title: string;
        content: string;
        image?: string;
        link?: string;
        display_delay: number;
        display_duration?: number;
        is_active: boolean;
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
        title: 'Popuplar',
        href: '/admin/popups',
    },
    {
        title: 'Popup Detayı',
        href: '#',
    },
];

export default function PopupsShow({ popup }: Props) {
    const [showDeleteDialog, setShowDeleteDialog] = useState(false);

    const handleDelete = () => {
        router.delete(`/admin/popups/${popup.id}`, {
            onSuccess: () => {
                router.visit('/admin/popups');
            },
        });
        setShowDeleteDialog(false);
    };

    return (
        <AppLayout breadcrumbs={breadcrumbs}>
            <Head title={`${popup.title} - Popup Detayı`} />

            <div className="flex-1 space-y-6 p-6">
                <div className="flex items-center justify-between">
                    <div>
                        <h1 className="text-3xl font-bold tracking-tight">
                            {popup.title}
                        </h1>
                        <p className="mt-1 text-muted-foreground">
                            Popup detay bilgileri
                        </p>
                    </div>
                    <div className="flex gap-2">
                        <Link href={`/admin/popups/${popup.id}/edit`}>
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
                        <Link href="/admin/popups">
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
                            <CardTitle>Popup Bilgileri</CardTitle>
                        </CardHeader>
                        <CardContent className="space-y-4">
                            <div>
                                <label className="text-sm font-medium text-muted-foreground">
                                    Başlık
                                </label>
                                <p className="text-sm font-medium">
                                    {popup.title}
                                </p>
                            </div>
                            <div>
                                <label className="text-sm font-medium text-muted-foreground">
                                    İçerik
                                </label>
                                <div className="mt-2 rounded-md bg-muted p-4">
                                    <p className="text-sm whitespace-pre-wrap">
                                        {popup.content}
                                    </p>
                                </div>
                            </div>
                            {popup.image && (
                                <div>
                                    <label className="text-sm font-medium text-muted-foreground">
                                        Görsel
                                    </label>
                                    <div className="mt-2">
                                        <img
                                            src={popup.image}
                                            alt={popup.title}
                                            className="h-32 w-auto rounded-md object-cover"
                                        />
                                    </div>
                                    <p className="mt-1 font-mono text-xs text-muted-foreground">
                                        {popup.image}
                                    </p>
                                </div>
                            )}
                            {popup.link && (
                                <div>
                                    <label className="text-sm font-medium text-muted-foreground">
                                        Link
                                    </label>
                                    <p className="font-mono text-sm">
                                        {popup.link}
                                    </p>
                                </div>
                            )}
                            <div>
                                <label className="text-sm font-medium text-muted-foreground">
                                    Görüntülenme Gecikmesi
                                </label>
                                <p className="text-sm font-medium">
                                    {popup.display_delay} saniye
                                </p>
                            </div>
                            {popup.display_duration && (
                                <div>
                                    <label className="text-sm font-medium text-muted-foreground">
                                        Görüntülenme Süresi
                                    </label>
                                    <p className="text-sm font-medium">
                                        {popup.display_duration} saniye
                                    </p>
                                </div>
                            )}
                            <div>
                                <label className="text-sm font-medium text-muted-foreground">
                                    Durum
                                </label>
                                <div className="mt-2">
                                    {popup.is_active ? (
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
                                        popup.created_at,
                                    ).toLocaleString('tr-TR')}
                                </p>
                            </div>
                            <div>
                                <label className="text-sm font-medium text-muted-foreground">
                                    Güncellenme Tarihi
                                </label>
                                <p className="text-sm font-medium">
                                    {new Date(
                                        popup.updated_at,
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
                            <DialogTitle>Popup'ı Sil</DialogTitle>
                            <DialogDescription>
                                Bu popup'ı silmek istediğinizden emin misiniz?
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

