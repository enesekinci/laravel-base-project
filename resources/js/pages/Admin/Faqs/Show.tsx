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
    faq: {
        id: number;
        question: string;
        answer: string;
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
        title: 'SSS',
        href: '/admin/faqs',
    },
    {
        title: 'SSS Detayı',
        href: '#',
    },
];

export default function FaqsShow({ faq }: Props) {
    const [showDeleteDialog, setShowDeleteDialog] = useState(false);

    const handleDelete = () => {
        router.delete(`/admin/faqs/${faq.id}`, {
            onSuccess: () => {
                router.visit('/admin/faqs');
            },
        });
        setShowDeleteDialog(false);
    };

    return (
        <AppLayout breadcrumbs={breadcrumbs}>
            <Head title={`${faq.question} - SSS Detayı`} />

            <div className="flex-1 space-y-6 p-6">
                <div className="flex items-center justify-between">
                    <div>
                        <h1 className="text-3xl font-bold tracking-tight">
                            {faq.question}
                        </h1>
                        <p className="mt-1 text-muted-foreground">
                            SSS detay bilgileri
                        </p>
                    </div>
                    <div className="flex gap-2">
                        <Link href={`/admin/faqs/${faq.id}/edit`}>
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
                        <Link href="/admin/faqs">
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
                            <CardTitle>SSS Bilgileri</CardTitle>
                        </CardHeader>
                        <CardContent className="space-y-4">
                            <div>
                                <label className="text-sm font-medium text-muted-foreground">
                                    Soru
                                </label>
                                <p className="text-sm font-medium">
                                    {faq.question}
                                </p>
                            </div>
                            <div>
                                <label className="text-sm font-medium text-muted-foreground">
                                    Cevap
                                </label>
                                <div className="mt-2 rounded-md bg-muted p-4">
                                    <p className="text-sm whitespace-pre-wrap">
                                        {faq.answer}
                                    </p>
                                </div>
                            </div>
                            <div>
                                <label className="text-sm font-medium text-muted-foreground">
                                    Sıra
                                </label>
                                <p className="text-sm font-medium">
                                    {faq.sort_order}
                                </p>
                            </div>
                            <div>
                                <label className="text-sm font-medium text-muted-foreground">
                                    Durum
                                </label>
                                <div className="mt-2">
                                    {faq.is_active ? (
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
                                    {new Date(faq.created_at).toLocaleString(
                                        'tr-TR',
                                    )}
                                </p>
                            </div>
                            <div>
                                <label className="text-sm font-medium text-muted-foreground">
                                    Güncellenme Tarihi
                                </label>
                                <p className="text-sm font-medium">
                                    {new Date(faq.updated_at).toLocaleString(
                                        'tr-TR',
                                    )}
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
                            <DialogTitle>SSS'yi Sil</DialogTitle>
                            <DialogDescription>
                                Bu SSS'yi silmek istediğinizden emin misiniz?
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

