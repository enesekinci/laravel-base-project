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
    DialogTrigger,
} from '@/components/ui/dialog';
import AppLayout from '@/layouts/app-layout';
import { destroy, edit, index } from '@/routes/admin/attribute-sets';
import { type BreadcrumbItem } from '@/types';
import { Head, Link, router } from '@inertiajs/react';
import { ArrowLeft, Edit, Trash2 } from 'lucide-react';
import { useState } from 'react';

interface Props {
    attributeSet: {
        id: number;
        name: string;
        slug?: string;
        sort_order: number;
        is_active: boolean;
        created_at: string;
        updated_at: string;
        attributes_count?: number;
    };
}

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Dashboard',
        href: '/admin/dashboard',
    },
    {
        title: 'Özellik Setleri',
        href: '/admin/attribute-sets',
    },
    {
        title: 'Özellik Seti Detayı',
        href: '#',
    },
];

export default function AttributeSetsShow({
    attributeSet,
}: Props) {
    const [showDeleteDialog, setShowDeleteDialog] = useState(false);

    const handleDelete = () => {
        router.delete(destroy(attributeSet.id).url, {
            onSuccess: () => {
                router.visit(index().url);
            },
        });
        setShowDeleteDialog(false);
    };

    return (
        <AppLayout breadcrumbs={breadcrumbs}>
            <Head
                title={`${attributeSet.name} - Özellik Seti Detayı`}
            />

            <div className="flex-1 space-y-6 p-6">
                <div className="flex items-center justify-between">
                    <div>
                        <h1 className="text-3xl font-bold tracking-tight">
                            {attributeSet.name}
                        </h1>
                        <p className="mt-1 text-muted-foreground">
                            Özellik seti detay bilgileri
                        </p>
                    </div>
                    <div className="flex gap-2">
                        <Link href={edit(attributeSet.id)}>
                            <Button>
                                <Edit className="mr-2 h-4 w-4" />
                                Düzenle
                            </Button>
                        </Link>
                        <Dialog
                            open={showDeleteDialog}
                            onOpenChange={setShowDeleteDialog}
                        >
                            <DialogTrigger asChild>
                                <Button variant="destructive">
                                    <Trash2 className="mr-2 h-4 w-4" />
                                    Sil
                                </Button>
                            </DialogTrigger>
                            <DialogContent>
                                <DialogHeader>
                                    <DialogTitle>
                                        Özellik Setini Sil
                                    </DialogTitle>
                                    <DialogDescription>
                                        Bu özellik setini silmek istediğinizden
                                        emin misiniz? Bu işlem geri alınamaz.
                                    </DialogDescription>
                                </DialogHeader>
                                <DialogFooter>
                                    <Button
                                        variant="outline"
                                        onClick={() =>
                                            setShowDeleteDialog(false)
                                        }
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
                        <Link href={index()}>
                            <Button variant="outline">
                                <ArrowLeft className="mr-2 h-4 w-4" />
                                Geri Dön
                            </Button>
                        </Link>
                    </div>
                </div>

                <Card>
                    <CardHeader>
                        <CardTitle>Özellik Seti Bilgileri</CardTitle>
                    </CardHeader>
                    <CardContent className="space-y-4">
                        <div>
                            <p className="text-sm font-medium text-muted-foreground">
                                Özellik Seti Adı
                            </p>
                            <p className="mt-1 text-lg">
                                {attributeSet.name}
                            </p>
                        </div>
                        {attributeSet.slug && (
                            <div>
                                <p className="text-sm font-medium text-muted-foreground">
                                    Slug
                                </p>
                                <p className="mt-1 font-mono text-sm">
                                    {attributeSet.slug}
                                </p>
                            </div>
                        )}
                        <div>
                            <p className="text-sm font-medium text-muted-foreground">
                                Durum
                            </p>
                            <div className="mt-1">
                                <Badge
                                    variant={
                                        attributeSet.is_active
                                            ? 'default'
                                            : 'secondary'
                                    }
                                >
                                    {attributeSet.is_active
                                        ? 'Aktif'
                                        : 'Pasif'}
                                </Badge>
                            </div>
                        </div>
                        <div>
                            <p className="text-sm font-medium text-muted-foreground">
                                Sıra
                            </p>
                            <p className="mt-1 text-lg">
                                {attributeSet.sort_order}
                            </p>
                        </div>
                        {attributeSet.attributes_count !== undefined && (
                            <div>
                                <p className="text-sm font-medium text-muted-foreground">
                                    Özellik Sayısı
                                </p>
                                <p className="mt-1 text-lg">
                                    {attributeSet.attributes_count}
                                </p>
                            </div>
                        )}
                    </CardContent>
                </Card>
            </div>
        </AppLayout>
    );
}

