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
    analytic: {
        id: number;
        provider?: string;
        tracking_id?: string;
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
        title: 'Analitik',
        href: '/admin/analytics',
    },
    {
        title: 'Analitik Detayı',
        href: '#',
    },
];

export default function AnalyticsShow({ analytic }: Props) {
    const [showDeleteDialog, setShowDeleteDialog] = useState(false);

    const handleDelete = () => {
        router.delete(`/admin/analytics/${analytic.id}`, {
            onSuccess: () => {
                router.visit('/admin/analytics');
            },
        });
        setShowDeleteDialog(false);
    };

    return (
        <AppLayout breadcrumbs={breadcrumbs}>
            <Head title="Analitik Detayı" />

            <div className="flex-1 space-y-6 p-6">
                <div className="flex items-center justify-between">
                    <div>
                        <h1 className="text-3xl font-bold tracking-tight">
                            Analitik
                        </h1>
                        <p className="mt-1 text-muted-foreground">
                            Analitik detay bilgileri
                        </p>
                    </div>
                    <div className="flex gap-2">
                        <Link href={`/admin/analytics/${analytic.id}/edit`}>
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
                        <Link href="/admin/analytics">
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
                            <CardTitle>Analitik Bilgileri</CardTitle>
                        </CardHeader>
                        <CardContent className="space-y-4">
                            {analytic.provider && (
                                <div>
                                    <label className="text-sm font-medium text-muted-foreground">
                                        Sağlayıcı
                                    </label>
                                    <p className="text-sm font-medium">
                                        {analytic.provider}
                                    </p>
                                </div>
                            )}
                            {analytic.tracking_id && (
                                <div>
                                    <label className="text-sm font-medium text-muted-foreground">
                                        Takip ID
                                    </label>
                                    <p className="font-mono text-sm">
                                        {analytic.tracking_id}
                                    </p>
                                </div>
                            )}
                            <div>
                                <label className="text-sm font-medium text-muted-foreground">
                                    Durum
                                </label>
                                <div className="mt-2">
                                    {analytic.is_active ? (
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
                                        analytic.created_at,
                                    ).toLocaleString('tr-TR')}
                                </p>
                            </div>
                            <div>
                                <label className="text-sm font-medium text-muted-foreground">
                                    Güncellenme Tarihi
                                </label>
                                <p className="text-sm font-medium">
                                    {new Date(
                                        analytic.updated_at,
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
                            <DialogTitle>Analitiği Sil</DialogTitle>
                            <DialogDescription>
                                Bu analitiği silmek istediğinizden emin misiniz?
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
