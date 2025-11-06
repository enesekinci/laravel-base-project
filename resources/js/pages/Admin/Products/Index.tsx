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
import {
    DropdownMenu,
    DropdownMenuContent,
    DropdownMenuItem,
    DropdownMenuLabel,
    DropdownMenuSeparator,
    DropdownMenuTrigger,
} from '@/components/ui/dropdown-menu';
import AppLayout from '@/layouts/app-layout';
import { destroy, show } from '@/routes/admin/products';
import { type BreadcrumbItem, type PaginatedResponse } from '@/types';
import { Head, Link, router } from '@inertiajs/react';
import { type ColumnDef } from '@tanstack/react-table';
import { ArrowUpDown, Eye, MoreHorizontal, Plus, Trash2 } from 'lucide-react';
import { useState } from 'react';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Dashboard',
        href: '/admin/dashboard',
    },
    {
        title: 'Ürünler',
        href: '/admin/products',
    },
];

interface Product {
    id: number;
    name: string;
    slug: string;
    sku: string;
    status: 'draft' | 'published';
    brand?: {
        id: number;
        name: string;
    };
    categories?: Array<{
        id: number;
        name: string;
    }>;
}

interface Props {
    products: PaginatedResponse<Product>;
}

const statusLabels: Record<string, string> = {
    draft: 'Taslak',
    published: 'Yayınlandı',
};

export default function ProductsIndex({ products }: Props) {
    const [deleteProductId, setDeleteProductId] = useState<number | null>(null);

    const handleDelete = (productId: number) => {
        router.delete(destroy(productId).url, {
            onSuccess: () => {
                setDeleteProductId(null);
            },
        });
    };

    const handlePageChange = (page: number) => {
        router.get('/admin/products', { page }, { preserveState: true });
    };

    const columns: ColumnDef<Product>[] = [
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
            accessorKey: 'sku',
            header: 'SKU',
            cell: ({ row }) => (
                <span className="font-mono text-sm text-muted-foreground">
                    {row.getValue('sku')}
                </span>
            ),
        },
        {
            accessorKey: 'status',
            header: 'Status',
            cell: ({ row }) => {
                const status = row.getValue('status') as string;
                return (
                    <span
                        className={`rounded-full px-2 py-1 text-xs ${
                            status === 'published'
                                ? 'bg-green-100 text-green-600 dark:bg-green-900 dark:text-green-200'
                                : 'bg-gray-100 text-gray-600 dark:bg-gray-900 dark:text-gray-200'
                        }`}
                    >
                        {statusLabels[status] || status}
                    </span>
                );
            },
        },
        {
            accessorKey: 'brand',
            header: 'Brand',
            cell: ({ row }) => {
                const brand = row.original.brand;
                return brand ? (
                    <span className="text-sm">{brand.name}</span>
                ) : (
                    <span className="text-sm text-muted-foreground">-</span>
                );
            },
        },
        {
            accessorKey: 'categories',
            header: 'Categories',
            cell: ({ row }) => {
                const categories = row.original.categories || [];
                return categories.length > 0 ? (
                    <span className="text-sm">
                        {categories.map((c) => c.name).join(', ')}
                    </span>
                ) : (
                    <span className="text-sm text-muted-foreground">-</span>
                );
            },
        },
        {
            id: 'actions',
            enableHiding: false,
            cell: ({ row }) => {
                const product = row.original;

                return (
                    <DropdownMenu>
                        <DropdownMenuTrigger asChild>
                            <Button variant="ghost" className="h-8 w-8 p-0">
                                <span className="sr-only">Menüyü aç</span>
                                <MoreHorizontal className="h-4 w-4" />
                            </Button>
                        </DropdownMenuTrigger>
                        <DropdownMenuContent align="end">
                            <DropdownMenuLabel>İşlemler</DropdownMenuLabel>
                            <DropdownMenuItem
                                onClick={() => router.visit(show(product.id))}
                            >
                                <Eye className="mr-2 h-4 w-4" />
                                Görüntüle
                            </DropdownMenuItem>
                            <DropdownMenuItem
                                onClick={() =>
                                    router.visit(
                                        `/admin/products/${product.id}/edit`,
                                    )
                                }
                            >
                                Düzenle
                            </DropdownMenuItem>
                            <DropdownMenuSeparator />
                            <DropdownMenuItem
                                onClick={() => setDeleteProductId(product.id)}
                                className="text-destructive"
                            >
                                <Trash2 className="mr-2 h-4 w-4" />
                                Sil
                            </DropdownMenuItem>
                        </DropdownMenuContent>
                    </DropdownMenu>
                );
            },
        },
    ];

    return (
        <AppLayout breadcrumbs={breadcrumbs}>
            <Head title="Ürünler" />

            <div className="flex-1 space-y-6 p-6">
                <div className="flex items-center justify-between">
                    <div>
                        <h1 className="text-3xl font-bold tracking-tight">
                            Ürünler
                        </h1>
                        <p className="mt-1 text-muted-foreground">
                            Ürünleri yönetin
                        </p>
                    </div>
                    <Link href="/admin/products/create">
                        <Button>
                            <Plus className="mr-2 h-4 w-4" />
                            Yeni Ürün
                        </Button>
                    </Link>
                </div>

                <div className="rounded-md border">
                    <DataTable
                        columns={columns}
                        data={products.data}
                        pagination={{
                            currentPage: products.current_page,
                            lastPage: products.last_page,
                            perPage: products.per_page,
                            total: products.total,
                            from: products.from,
                            to: products.to,
                            links: products.links,
                        }}
                        onPageChange={handlePageChange}
                    />
                </div>

                <Dialog
                    open={deleteProductId !== null}
                    onOpenChange={(open) =>
                        setDeleteProductId(open ? deleteProductId : null)
                    }
                >
                    <DialogContent>
                        <DialogHeader>
                            <DialogTitle>Ürünü Sil</DialogTitle>
                            <DialogDescription>
                                Bu ürünü silmek istediğinizden emin misiniz? Bu
                                işlem geri alınamaz.
                            </DialogDescription>
                        </DialogHeader>
                        <DialogFooter>
                            <Button
                                variant="outline"
                                onClick={() => setDeleteProductId(null)}
                            >
                                İptal
                            </Button>
                            <Button
                                variant="destructive"
                                onClick={() =>
                                    deleteProductId &&
                                    handleDelete(deleteProductId)
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
