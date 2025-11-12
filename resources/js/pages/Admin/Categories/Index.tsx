import { DataTable } from '@/components/data-table';
import { Button } from '@/components/ui/button';
import {
    Dialog,
    DialogContent,
    DialogDescription,
    DialogFooter,
    DialogHeader,
    DialogTitle,
} from '@/components/ui/dialog';
import AppLayout from '@/layouts/app-layout';
import { destroy, show } from '@/routes/admin/categories';
import { type BreadcrumbItem, type PaginatedResponse } from '@/types';
import { Head, Link, router } from '@inertiajs/react';
import { type ColumnDef } from '@tanstack/react-table';
import { ArrowUpDown, Eye, Pencil, Plus, Trash2 } from 'lucide-react';
import { useState } from 'react';

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

export default function CategoriesIndex({ categories }: Props) {
    // Tree görünümü için kategorileri flat listeye çevir
    const flattenTree = (
        items: Category[],
        parentId: number | null = null,
        level = 0,
    ): (Category & { level: number })[] => {
        const result: (Category & { level: number })[] = [];
        const children = items.filter((item) => item.parent_id === parentId);

        children.forEach((item) => {
            result.push({ ...item, level });
            const grandChildren = flattenTree(items, item.id, level + 1);
            result.push(...grandChildren);
        });

        return result;
    };

    const flatCategories = flattenTree(categories.data);

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

    const handlePageChange = (page: number) => {
        router.get('/admin/categories', { page }, { preserveState: true });
    };

    const columns: ColumnDef<Category & { level?: number }>[] = [
        {
            accessorKey: 'name',
            header: ({ column }) => {
                return (
                    <Button
                        variant="ghost"
                        onClick={() =>
                            column.toggleSorting(column.getIsSorted() === 'asc')
                        }
                    >
                        Name
                        <ArrowUpDown className="ml-2 h-4 w-4" />
                    </Button>
                );
            },
            cell: ({ row }) => {
                const category = row.original;
                const level = category.level || 0;
                return (
                    <div
                        className="flex items-center gap-2"
                        style={{ paddingLeft: `${level * 24}px` }}
                    >
                        {level > 0 && (
                            <span className="text-muted-foreground">└─</span>
                        )}
                        <div>
                            <div className="font-medium">{category.name}</div>
                            {category.parent && (
                                <div className="text-xs text-muted-foreground">
                                    ← {category.parent.name}
                                </div>
                            )}
                        </div>
                    </div>
                );
            },
        },
        {
            accessorKey: 'slug',
            header: 'Slug',
            cell: ({ row }) => (
                <span className="font-mono text-sm text-muted-foreground">
                    {row.getValue('slug')}
                </span>
            ),
        },
        {
            accessorKey: 'is_active',
            header: 'Status',
            cell: ({ row }) => {
                const isActive = row.getValue('is_active') as boolean;
                return isActive ? (
                    <span className="rounded bg-green-100 px-2 py-1 text-xs text-green-800 dark:bg-green-900 dark:text-green-200">
                        Aktif
                    </span>
                ) : (
                    <span className="rounded bg-gray-100 px-2 py-1 text-xs text-gray-800 dark:bg-gray-900 dark:text-gray-200">
                        Pasif
                    </span>
                );
            },
        },
        {
            accessorKey: 'sort_order',
            header: 'Sıra',
            cell: ({ row }) => (
                <span className="text-sm">{row.getValue('sort_order')}</span>
            ),
        },
        {
            id: 'actions',
            enableHiding: false,
            cell: ({ row }) => {
                const category = row.original;

                return (
                    <div className="flex items-center gap-2">
                        <Button
                            variant="ghost"
                            size="icon"
                            className="h-8 w-8"
                            onClick={() => router.visit(show(category.id))}
                            title="Görüntüle"
                        >
                            <Eye className="h-4 w-4" />
                        </Button>
                        <Button
                            variant="ghost"
                            size="icon"
                            className="h-8 w-8"
                            onClick={() =>
                                router.visit(
                                    `/admin/categories/${category.id}/edit`,
                                )
                            }
                            title="Düzenle"
                        >
                            <Pencil className="h-4 w-4" />
                        </Button>
                        <Button
                            variant="ghost"
                            size="icon"
                            className="h-8 w-8 text-destructive hover:text-destructive"
                            onClick={() => setDeleteCategoryId(category.id)}
                            title="Sil"
                        >
                            <Trash2 className="h-4 w-4" />
                        </Button>
                    </div>
                );
            },
        },
    ];

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

                <div className="rounded-md border">
                    <DataTable
                        columns={columns}
                        data={flatCategories}
                        pagination={{
                            currentPage: categories.current_page,
                            lastPage: categories.last_page,
                            perPage: categories.per_page,
                            total: categories.total,
                            from: categories.from,
                            to: categories.to,
                            links: categories.links,
                        }}
                        onPageChange={handlePageChange}
                    />
                </div>

                <Dialog
                    open={deleteCategoryId !== null}
                    onOpenChange={(open) =>
                        setDeleteCategoryId(open ? deleteCategoryId : null)
                    }
                >
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
                                onClick={() => setDeleteCategoryId(null)}
                            >
                                İptal
                            </Button>
                            <Button
                                variant="destructive"
                                onClick={() =>
                                    deleteCategoryId &&
                                    handleDelete(deleteCategoryId)
                                }
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
