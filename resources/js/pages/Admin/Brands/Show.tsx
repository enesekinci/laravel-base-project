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
import { destroy, edit, index } from '@/routes/admin/brands';
import { type BreadcrumbItem } from '@/types';
import { Head, Link, router } from '@inertiajs/react';
import { ArrowLeft, Edit, Trash2 } from 'lucide-react';
import { useState } from 'react';

interface Props {
    brand: {
        id: number;
        name: string;
        slug: string;
        description?: string;
        website?: string;
        is_active: boolean;
        sort_order: number;
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
        title: 'Markalar',
        href: '/admin/brands',
    },
    {
        title: 'Marka Detayı',
        href: '#',
    },
];

export default function BrandsShow({ brand }: Props) {
    const [showDeleteDialog, setShowDeleteDialog] = useState(false);

    const handleDelete = () => {
        router.delete(destroy(brand.id).url, {
            onSuccess: () => {
                router.visit(index().url);
            },
        });
        setShowDeleteDialog(false);
    };

    return (
        <AppLayout breadcrumbs={breadcrumbs}>
            <Head title={`${brand.name} - Marka Detayı`} />

            <div className="flex-1 space-y-6 p-6">
                <div className="flex items-center justify-between">
                    <div>
                        <h1 className="text-3xl font-bold tracking-tight">
                            {brand.name}
                        </h1>
                        <p className="mt-1 text-muted-foreground">
                            Marka detay bilgileri
                        </p>
                    </div>
                    <div className="flex gap-2">
                        <Link href={edit(brand.id)}>
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
                                    <DialogTitle>Markayı Sil</DialogTitle>
                                    <DialogDescription>
                                        Bu markayı silmek istediğinizden emin
                                        misiniz? Bu işlem geri alınamaz.
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
                        <CardTitle>Marka Bilgileri</CardTitle>
                    </CardHeader>
                    <CardContent className="space-y-4">
                        <div>
                            <p className="text-sm font-medium text-muted-foreground">
                                Marka Adı
                            </p>
                            <p className="mt-1 text-lg">{brand.name}</p>
                        </div>
                        <div>
                            <p className="text-sm font-medium text-muted-foreground">
                                Slug
                            </p>
                            <p className="mt-1 font-mono text-lg text-sm">
                                {brand.slug}
                            </p>
                        </div>
                        {brand.description && (
                            <div>
                                <p className="text-sm font-medium text-muted-foreground">
                                    Açıklama
                                </p>
                                <p className="mt-1">{brand.description}</p>
                            </div>
                        )}
                        {brand.website && (
                            <div>
                                <p className="text-sm font-medium text-muted-foreground">
                                    Web Sitesi
                                </p>
                                <a
                                    href={brand.website}
                                    target="_blank"
                                    rel="noopener noreferrer"
                                    className="mt-1 text-blue-600 hover:underline"
                                >
                                    {brand.website}
                                </a>
                            </div>
                        )}
                        <div>
                            <p className="text-sm font-medium text-muted-foreground">
                                Durum
                            </p>
                            <div className="mt-1">
                                <Badge
                                    variant={
                                        brand.is_active
                                            ? 'default'
                                            : 'secondary'
                                    }
                                >
                                    {brand.is_active ? 'Aktif' : 'Pasif'}
                                </Badge>
                            </div>
                        </div>
                        <div>
                            <p className="text-sm font-medium text-muted-foreground">
                                Sıra
                            </p>
                            <p className="mt-1 text-lg">{brand.sort_order}</p>
                        </div>
                    </CardContent>
                </Card>
            </div>
        </AppLayout>
    );
}
