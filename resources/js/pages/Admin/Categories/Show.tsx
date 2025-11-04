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
import {
    destroy,
    edit,
    index,
    show as showRoute,
} from '@/routes/admin/categories';
import { type BreadcrumbItem } from '@/types';
import { Head, Link, router } from '@inertiajs/react';
import { ArrowLeft, Edit, Trash2 } from 'lucide-react';
import { useState } from 'react';

interface Category {
    id: number;
    name: string;
}

interface Props {
    category: {
        id: number;
        name: string;
        slug: string;
        description?: string;
        parent_id?: number;
        is_active: boolean;
        sort_order: number;
        parent?: Category;
        children?: Category[];
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
        title: 'Kategoriler',
        href: '/admin/categories',
    },
    {
        title: 'Kategori Detayı',
        href: '#',
    },
];

export default function CategoriesShow({ category }: Props) {
    const [showDeleteDialog, setShowDeleteDialog] = useState(false);

    const handleDelete = () => {
        router.delete(destroy(category.id).url, {
            onSuccess: () => {
                router.visit(index().url);
            },
        });
        setShowDeleteDialog(false);
    };

    return (
        <AppLayout breadcrumbs={breadcrumbs}>
            <Head title={`${category.name} - Kategori Detayı`} />

            <div className="flex-1 space-y-6 p-6">
                <div className="flex items-center justify-between">
                    <div>
                        <h1 className="text-3xl font-bold tracking-tight">
                            {category.name}
                        </h1>
                        <p className="mt-1 text-muted-foreground">
                            Kategori detay bilgileri
                        </p>
                    </div>
                    <div className="flex gap-2">
                        <Link href={edit(category.id)}>
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
                                    <DialogTitle>Kategoriyi Sil</DialogTitle>
                                    <DialogDescription>
                                        Bu kategoriyi silmek istediğinizden emin
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

                <div className="grid gap-6 md:grid-cols-2">
                    <Card>
                        <CardHeader>
                            <CardTitle>Genel Bilgiler</CardTitle>
                        </CardHeader>
                        <CardContent className="space-y-4">
                            <div>
                                <p className="text-sm font-medium text-muted-foreground">
                                    Kategori Adı
                                </p>
                                <p className="mt-1 text-lg">{category.name}</p>
                            </div>
                            <div>
                                <p className="text-sm font-medium text-muted-foreground">
                                    Slug
                                </p>
                                <p className="mt-1 font-mono text-lg text-sm">
                                    {category.slug}
                                </p>
                            </div>
                            {category.description && (
                                <div>
                                    <p className="text-sm font-medium text-muted-foreground">
                                        Açıklama
                                    </p>
                                    <p className="mt-1">
                                        {category.description}
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
                                            category.is_active
                                                ? 'default'
                                                : 'secondary'
                                        }
                                    >
                                        {category.is_active ? 'Aktif' : 'Pasif'}
                                    </Badge>
                                </div>
                            </div>
                            <div>
                                <p className="text-sm font-medium text-muted-foreground">
                                    Sıra
                                </p>
                                <p className="mt-1 text-lg">
                                    {category.sort_order}
                                </p>
                            </div>
                        </CardContent>
                    </Card>

                    <Card>
                        <CardHeader>
                            <CardTitle>İlişkiler</CardTitle>
                        </CardHeader>
                        <CardContent className="space-y-4">
                            {category.parent && (
                                <div>
                                    <p className="text-sm font-medium text-muted-foreground">
                                        Üst Kategori
                                    </p>
                                    <p className="mt-1 text-lg">
                                        {category.parent.name}
                                    </p>
                                </div>
                            )}
                            {category.children &&
                                category.children.length > 0 && (
                                    <div>
                                        <p className="text-sm font-medium text-muted-foreground">
                                            Alt Kategoriler (
                                            {category.children.length})
                                        </p>
                                        <div className="mt-2 space-y-1">
                                            {category.children.map((child) => (
                                                <Link
                                                    key={child.id}
                                                    href={
                                                        showRoute(child.id).url
                                                    }
                                                    className="block rounded-md border p-2 hover:bg-muted"
                                                >
                                                    {child.name}
                                                </Link>
                                            ))}
                                        </div>
                                    </div>
                                )}
                        </CardContent>
                    </Card>
                </div>
            </div>
        </AppLayout>
    );
}
