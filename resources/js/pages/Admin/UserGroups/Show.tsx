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
    userGroup: {
        id: number;
        name: string;
        slug: string;
        description?: string;
        is_active: boolean;
        users?: Array<{
            id: number;
            name: string;
            email: string;
        }>;
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
        title: 'Kullanıcı Grupları',
        href: '/admin/user-groups',
    },
    {
        title: 'Grup Detayı',
        href: '#',
    },
];

export default function UserGroupsShow({ userGroup }: Props) {
    const [showDeleteDialog, setShowDeleteDialog] = useState(false);

    const handleDelete = () => {
        router.delete(`/admin/user-groups/${userGroup.id}`, {
            onSuccess: () => {
                router.visit('/admin/user-groups');
            },
        });
        setShowDeleteDialog(false);
    };

    return (
        <AppLayout breadcrumbs={breadcrumbs}>
            <Head title={`${userGroup.name} - Grup Detayı`} />

            <div className="flex-1 space-y-6 p-6">
                <div className="flex items-center justify-between">
                    <div>
                        <h1 className="text-3xl font-bold tracking-tight">
                            {userGroup.name}
                        </h1>
                        <p className="mt-1 text-muted-foreground">
                            Grup detay bilgileri
                        </p>
                    </div>
                    <div className="flex gap-2">
                        <Link href={`/admin/user-groups/${userGroup.id}/edit`}>
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
                        <Link href="/admin/user-groups">
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
                            <CardTitle>Grup Bilgileri</CardTitle>
                        </CardHeader>
                        <CardContent className="space-y-4">
                            <div>
                                <label className="text-sm font-medium text-muted-foreground">
                                    Grup Adı
                                </label>
                                <p className="text-sm font-medium">
                                    {userGroup.name}
                                </p>
                            </div>
                            <div>
                                <label className="text-sm font-medium text-muted-foreground">
                                    Slug
                                </label>
                                <p className="text-sm font-mono">
                                    {userGroup.slug}
                                </p>
                            </div>
                            <div>
                                <label className="text-sm font-medium text-muted-foreground">
                                    Açıklama
                                </label>
                                <p className="text-sm">
                                    {userGroup.description || '-'}
                                </p>
                            </div>
                            <div>
                                <label className="text-sm font-medium text-muted-foreground">
                                    Durum
                                </label>
                                <div className="mt-2">
                                    {userGroup.is_active ? (
                                        <Badge variant="default">Aktif</Badge>
                                    ) : (
                                        <Badge variant="secondary">Pasif</Badge>
                                    )}
                                </div>
                            </div>
                            <div>
                                <label className="text-sm font-medium text-muted-foreground">
                                    Kullanıcılar
                                </label>
                                <div className="mt-2 space-y-2">
                                    {userGroup.users && userGroup.users.length > 0 ? (
                                        userGroup.users.map((user) => (
                                            <div
                                                key={user.id}
                                                className="flex items-center justify-between p-2 border rounded"
                                            >
                                                <div>
                                                    <p className="text-sm font-medium">
                                                        {user.name}
                                                    </p>
                                                    <p className="text-xs text-muted-foreground">
                                                        {user.email}
                                                    </p>
                                                </div>
                                                <Link href={`/admin/users/${user.id}`}>
                                                    <Button variant="ghost" size="sm">
                                                        Görüntüle
                                                    </Button>
                                                </Link>
                                            </div>
                                        ))
                                    ) : (
                                        <p className="text-sm text-muted-foreground">
                                            Bu gruba ait kullanıcı yok
                                        </p>
                                    )}
                                </div>
                            </div>
                            <div>
                                <label className="text-sm font-medium text-muted-foreground">
                                    Oluşturulma Tarihi
                                </label>
                                <p className="text-sm font-medium">
                                    {new Date(userGroup.created_at).toLocaleString('tr-TR')}
                                </p>
                            </div>
                            <div>
                                <label className="text-sm font-medium text-muted-foreground">
                                    Güncellenme Tarihi
                                </label>
                                <p className="text-sm font-medium">
                                    {new Date(userGroup.updated_at).toLocaleString('tr-TR')}
                                </p>
                            </div>
                        </CardContent>
                    </Card>
                </div>

                <Dialog open={showDeleteDialog} onOpenChange={setShowDeleteDialog}>
                    <DialogContent>
                        <DialogHeader>
                            <DialogTitle>Grubu Sil</DialogTitle>
                            <DialogDescription>
                                Bu grubu silmek istediğinizden emin misiniz? Bu
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

