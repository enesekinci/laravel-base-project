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
    emailTemplate: {
        id: number;
        name: string;
        slug: string;
        subject: string;
        body: string;
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
        title: 'Mail Taslakları',
        href: '/admin/email-templates',
    },
    {
        title: 'Şablon Detayı',
        href: '#',
    },
];

export default function EmailTemplatesShow({ emailTemplate }: Props) {
    const [showDeleteDialog, setShowDeleteDialog] = useState(false);

    const handleDelete = () => {
        router.delete(`/admin/email-templates/${emailTemplate.id}`, {
            onSuccess: () => {
                router.visit('/admin/email-templates');
            },
        });
        setShowDeleteDialog(false);
    };

    return (
        <AppLayout breadcrumbs={breadcrumbs}>
            <Head title={`${emailTemplate.name} - Email Şablonu Detayı`} />

            <div className="flex-1 space-y-6 p-6">
                <div className="flex items-center justify-between">
                    <div>
                        <h1 className="text-3xl font-bold tracking-tight">
                            {emailTemplate.name}
                        </h1>
                        <p className="mt-1 text-muted-foreground">
                            Email şablonu detay bilgileri
                        </p>
                    </div>
                    <div className="flex gap-2">
                        <Link href={`/admin/email-templates/${emailTemplate.id}/edit`}>
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
                        <Link href="/admin/email-templates">
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
                            <CardTitle>Şablon Bilgileri</CardTitle>
                        </CardHeader>
                        <CardContent className="space-y-4">
                            <div>
                                <label className="text-sm font-medium text-muted-foreground">
                                    Şablon Adı
                                </label>
                                <p className="text-sm font-medium">
                                    {emailTemplate.name}
                                </p>
                            </div>
                            <div>
                                <label className="text-sm font-medium text-muted-foreground">
                                    Slug
                                </label>
                                <p className="text-sm font-mono">
                                    {emailTemplate.slug}
                                </p>
                            </div>
                            <div>
                                <label className="text-sm font-medium text-muted-foreground">
                                    Konu
                                </label>
                                <p className="text-sm font-medium">
                                    {emailTemplate.subject}
                                </p>
                            </div>
                            <div>
                                <label className="text-sm font-medium text-muted-foreground">
                                    İçerik
                                </label>
                                <div className="mt-2 p-4 bg-muted rounded-md">
                                    <pre className="text-sm whitespace-pre-wrap font-mono">
                                        {emailTemplate.body}
                                    </pre>
                                </div>
                            </div>
                            <div>
                                <label className="text-sm font-medium text-muted-foreground">
                                    Durum
                                </label>
                                <div className="mt-2">
                                    {emailTemplate.is_active ? (
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
                                        emailTemplate.created_at,
                                    ).toLocaleString('tr-TR')}
                                </p>
                            </div>
                            <div>
                                <label className="text-sm font-medium text-muted-foreground">
                                    Güncellenme Tarihi
                                </label>
                                <p className="text-sm font-medium">
                                    {new Date(
                                        emailTemplate.updated_at,
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
                            <DialogTitle>Şablonu Sil</DialogTitle>
                            <DialogDescription>
                                Bu şablonu silmek istediğinizden emin misiniz? Bu
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

