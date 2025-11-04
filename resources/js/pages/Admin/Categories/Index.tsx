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
import { destroy, show } from '@/routes/admin/categories';
import { type BreadcrumbItem, type PaginatedResponse } from '@/types';
import { Head, Link, router } from '@inertiajs/react';
import { Eye, Plus, Trash2 } from 'lucide-react';
import { useState } from 'react';

interface Category {
    id: number;
    name: string;
    slug: string;
    description?: string;
    parent_id?: number;
    is_active: boolean;
    sort_order: number;
    parent?: Category;
    children?: Category[];
}

interface Props {
    categories: PaginatedResponse<Category>;
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
];

export default function CategoriesIndex({ categories }: Props) {
    // Tree görünümü için kategorileri hazırla
    const buildTree = (
        items: Category[],
        parentId: number | null = null,
    ): Category[] => {
        return items
            .filter((item) => item.parent_id === parentId)
            .map((item) => ({
                ...item,
                children: buildTree(items, item.id),
            }));
    };

    const treeCategories = buildTree(categories.data);

    const [deleteCategoryId, setDeleteCategoryId] = useState<number | null>(
        null,
    );

    const handleDelete = (categoryId: number) => {
        router.delete(destroy(categoryId).url, {
            onSuccess: () => {
                setDeleteCategoryId(null);
            },
        });
    };

    const renderCategoryTree = (cats: Category[], level = 0) => {
        return cats.map((category) => (
            <div key={category.id}>
                <div
                    className="flex items-center justify-between rounded-lg border p-4"
                    style={{ marginLeft: `${level * 24}px` }}
                >
                    <div className="flex-1">
                        <div className="flex items-center gap-2">
                            <h3 className="font-semibold">{category.name}</h3>
                            {category.parent && (
                                <span className="text-sm text-muted-foreground">
                                    (← {category.parent.name})
                                </span>
                            )}
                        </div>
                        {category.description && (
                            <p className="mt-1 text-sm text-muted-foreground">
                                {category.description}
                            </p>
                        )}
                    </div>
                    <div className="flex items-center gap-2">
                        <Link href={show(category.id)}>
                            <Button variant="outline" size="sm">
                                <Eye className="mr-2 h-4 w-4" />
                                Görüntüle
                            </Button>
                        </Link>
                        <Link href={`/admin/categories/${category.id}/edit`}>
                            <Button variant="outline" size="sm">
                                Düzenle
                            </Button>
                        </Link>
                        <Dialog
                            open={deleteCategoryId === category.id}
                            onOpenChange={(open) =>
                                setDeleteCategoryId(open ? category.id : null)
                            }
                        >
                            <DialogTrigger asChild>
                                <Button variant="destructive" size="sm">
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
                                        {category.children &&
                                            category.children.length > 0 && (
                                                <span className="mt-2 block text-red-500">
                                                    Uyarı: Bu kategorinin{' '}
                                                    {category.children.length}{' '}
                                                    alt kategorisi var. Alt
                                                    kategoriler de silinecek.
                                                </span>
                                            )}
                                    </DialogDescription>
                                </DialogHeader>
                                <DialogFooter>
                                    <Button
                                        variant="outline"
                                        onClick={() =>
                                            setDeleteCategoryId(null)
                                        }
                                    >
                                        İptal
                                    </Button>
                                    <Button
                                        variant="destructive"
                                        onClick={() =>
                                            handleDelete(category.id)
                                        }
                                    >
                                        Sil
                                    </Button>
                                </DialogFooter>
                            </DialogContent>
                        </Dialog>
                    </div>
                </div>
                {category.children && category.children.length > 0 && (
                    <div className="mt-1">
                        {renderCategoryTree(category.children, level + 1)}
                    </div>
                )}
            </div>
        ));
    };

    return (
        <AppLayout breadcrumbs={breadcrumbs}>
            <Head title="Kategoriler" />

            <div className="flex-1 space-y-6 p-6">
                <div className="flex items-center justify-between">
                    <div>
                        <h1 className="text-3xl font-bold tracking-tight">
                            Kategoriler
                        </h1>
                        <p className="mt-1 text-muted-foreground">
                            Ürün kategorilerini yönetin
                        </p>
                    </div>
                    <Link href="/admin/categories/create">
                        <Button>
                            <Plus className="mr-2 h-4 w-4" />
                            Yeni Kategori
                        </Button>
                    </Link>
                </div>

                <Card>
                    <CardHeader>
                        <CardTitle>Kategori Listesi</CardTitle>
                    </CardHeader>
                    <CardContent>
                        <div className="space-y-4">
                            {treeCategories.length > 0 ? (
                                <div className="space-y-2">
                                    {renderCategoryTree(treeCategories)}
                                </div>
                            ) : (
                                <div className="py-8 text-center text-muted-foreground">
                                    Henüz kategori eklenmemiş.
                                </div>
                            )}
                        </div>
                    </CardContent>
                </Card>
            </div>
        </AppLayout>
    );
}
