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
import { destroy, show } from '@/routes/admin/brands';
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
        title: 'Markalar',
        href: '/admin/brands',
    },
];

interface Brand {
    id: number;
    name: string;
    slug: string;
    description?: string;
    logo?: string;
    website?: string;
    is_active: boolean;
    sort_order: number;
}

interface Props {
    brands: PaginatedResponse<Brand>;
}

export default function BrandsIndex({ brands }: Props) {
    const [deleteBrandId, setDeleteBrandId] = useState<number | null>(null);

    const handleDelete = (brandId: number) => {
        router.delete(destroy(brandId).url, {
            onSuccess: () => {
                setDeleteBrandId(null);
            },
        });
    };

    const handlePageChange = (page: number) => {
        router.get('/admin/brands', { page }, { preserveState: true });
    };

    const columns: ColumnDef<Brand>[] = [
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
            cell: ({ row }) => (
                <div className="font-medium">{row.getValue('name')}</div>
            ),
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
                const brand = row.original;

                return (
                    <div className="flex items-center gap-2">
                        <Button
                            variant="ghost"
                            size="icon"
                            className="h-8 w-8"
                            onClick={() => router.visit(show(brand.id))}
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
                                    `/admin/brands/${brand.id}/edit`,
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
                            onClick={() => setDeleteBrandId(brand.id)}
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
            <Head title="Markalar" />

            <div className="flex-1 space-y-6 p-6">
                <div className="flex items-center justify-between">
                    <div>
                        <h1 className="text-3xl font-bold tracking-tight">
                            Markalar
                        </h1>
                        <p className="mt-1 text-muted-foreground">
                            Ürün markalarını yönetin
                        </p>
                    </div>
                    <Link href="/admin/brands/create">
                        <Button>
                            <Plus className="mr-2 h-4 w-4" />
                            Yeni Marka
                        </Button>
                    </Link>
                </div>

                <div className="rounded-md border">
                    <DataTable
                        columns={columns}
                        data={brands.data}
                        pagination={{
                            currentPage: brands.current_page,
                            lastPage: brands.last_page,
                            perPage: brands.per_page,
                            total: brands.total,
                            from: brands.from,
                            to: brands.to,
                            links: brands.links,
                        }}
                        onPageChange={handlePageChange}
                    />
                </div>

                <Dialog
                    open={deleteBrandId !== null}
                    onOpenChange={(open) =>
                        setDeleteBrandId(open ? deleteBrandId : null)
                    }
                >
                    <DialogContent>
                        <DialogHeader>
                            <DialogTitle>Markayı Sil</DialogTitle>
                            <DialogDescription>
                                Bu markayı silmek istediğinizden emin misiniz?
                                Bu işlem geri alınamaz.
                            </DialogDescription>
                        </DialogHeader>
                        <DialogFooter>
                            <Button
                                variant="outline"
                                onClick={() => setDeleteBrandId(null)}
                            >
                                İptal
                            </Button>
                            <Button
                                variant="destructive"
                                onClick={() =>
                                    deleteBrandId && handleDelete(deleteBrandId)
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
