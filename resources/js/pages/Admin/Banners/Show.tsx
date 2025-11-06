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
    banner: {
        id: number;
        title: string;
        description?: string;
        image: string;
        link?: string;
        position?: string;
        sort_order: number;
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
        title: 'Bannerlar',
        href: '/admin/banners',
    },
    {
        title: 'Banner Detayı',
        href: '#',
    },
];

export default function BannersShow({ banner }: Props) {
    const [showDeleteDialog, setShowDeleteDialog] = useState(false);

    const handleDelete = () => {
        router.delete(`/admin/banners/${banner.id}`, {
            onSuccess: () => {
                router.visit('/admin/banners');
            },
        });
        setShowDeleteDialog(false);
    };

    return (
        <AppLayout breadcrumbs={breadcrumbs}>
            <Head title={`${banner.title} - Banner Detayı`} />

            <div className="flex-1 space-y-6 p-6">
                <div className="flex items-center justify-between">
                    <div>
                        <h1 className="text-3xl font-bold tracking-tight">
                            {banner.title}
                        </h1>
                        <p className="mt-1 text-muted-foreground">
                            Banner detay bilgileri
                        </p>
                    </div>
                    <div className="flex gap-2">
                        <Link href={`/admin/banners/${banner.id}/edit`}>
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
                        <Link href="/admin/banners">
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
                            <CardTitle>Banner Bilgileri</CardTitle>
                        </CardHeader>
                        <CardContent className="space-y-4">
                            <div>
                                <label className="text-sm font-medium text-muted-foreground">
                                    Başlık
                                </label>
                                <p className="text-sm font-medium">
                                    {banner.title}
                                </p>
                            </div>
                            {banner.description && (
                                <div>
                                    <label className="text-sm font-medium text-muted-foreground">
                                        Açıklama
                                    </label>
                                    <p className="text-sm whitespace-pre-wrap">
                                        {banner.description}
                                    </p>
                                </div>
                            )}
                            <div>
                                <label className="text-sm font-medium text-muted-foreground">
                                    Görsel
                                </label>
                                <div className="mt-2">
                                    <img
                                        src={banner.image}
                                        alt={banner.title}
                                        className="h-32 w-auto rounded-md object-cover"
                                    />
                                </div>
                                <p className="mt-1 font-mono text-xs text-muted-foreground">
                                    {banner.image}
                                </p>
                            </div>
                            {banner.link && (
                                <div>
                                    <label className="text-sm font-medium text-muted-foreground">
                                        Link
                                    </label>
                                    <p className="font-mono text-sm">
                                        {banner.link}
                                    </p>
                                </div>
                            )}
                            {banner.position && (
                                <div>
                                    <label className="text-sm font-medium text-muted-foreground">
                                        Pozisyon
                                    </label>
                                    <p className="text-sm font-medium">
                                        {banner.position}
                                    </p>
                                </div>
                            )}
                            <div>
                                <label className="text-sm font-medium text-muted-foreground">
                                    Sıra
                                </label>
                                <p className="text-sm font-medium">
                                    {banner.sort_order}
                                </p>
                            </div>
                            <div>
                                <label className="text-sm font-medium text-muted-foreground">
                                    Durum
                                </label>
                                <div className="mt-2">
                                    {banner.is_active ? (
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
                                        banner.created_at,
                                    ).toLocaleString('tr-TR')}
                                </p>
                            </div>
                            <div>
                                <label className="text-sm font-medium text-muted-foreground">
                                    Güncellenme Tarihi
                                </label>
                                <p className="text-sm font-medium">
                                    {new Date(
                                        banner.updated_at,
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
                            <DialogTitle>Bannerı Sil</DialogTitle>
                            <DialogDescription>
                                Bu bannerı silmek istediğinizden emin misiniz?
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

