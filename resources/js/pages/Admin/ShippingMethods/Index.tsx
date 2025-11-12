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
        title: 'Kargo Yöntemleri',
        href: '/admin/shipping-methods',
    },
];

interface ShippingMethod {
    id: number;
    name: string;
    code: string;
    type: string;
    cost: number;
    is_active: boolean;
}

const typeLabels: Record<string, string> = {
    fixed: 'Sabit',
    free: 'Ücretsiz',
    weight_based: 'Ağırlık Bazlı',
    price_based: 'Fiyat Bazlı',
};

interface Props {
    shippingMethods: PaginatedResponse<ShippingMethod>;
}

export default function ShippingMethodsIndex({
    shippingMethods,
}: Props) {
    const [deleteShippingMethodId, setDeleteShippingMethodId] = useState<
        number | null
    >(null);

    const handleDelete = (shippingMethodId: number) => {
        router.delete(`/admin/shipping-methods/${shippingMethodId}`, {
            onSuccess: () => {
                setDeleteShippingMethodId(null);
            },
        });
    };

    const handlePageChange = (page: number) => {
        router.get(
            '/admin/shipping-methods',
            { page },
            { preserveState: true },
        );
    };

    const columns: ColumnDef<ShippingMethod>[] = [
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
                        Ad
                        <ArrowUpDown className="ml-2 h-4 w-4" />
                    </Button>
                );
            },
            cell: ({ row }) => (
                <div className="font-medium">{row.getValue('name')}</div>
            ),
        },
        {
            accessorKey: 'code',
            header: 'Kod',
            cell: ({ row }) => (
                <span className="font-mono text-sm">{row.getValue('code')}</span>
            ),
        },
        {
            accessorKey: 'type',
            header: 'Tip',
            cell: ({ row }) => {
                const type = row.getValue('type') as string;
                return (
                    <span className="rounded bg-blue-100 px-2 py-1 text-xs text-blue-800 dark:bg-blue-900 dark:text-blue-200">
                        {typeLabels[type] || type}
                    </span>
                );
            },
        },
        {
            accessorKey: 'cost',
            header: 'Maliyet',
            cell: ({ row }) => (
                <span className="text-sm font-medium">
                    {Number(row.getValue('cost')).toFixed(2)} ₺
                </span>
            ),
        },
        {
            accessorKey: 'is_active',
            header: 'Durum',
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
            id: 'actions',
            enableHiding: false,
            cell: ({ row }) => {
                const shippingMethod = row.original;

                return (
                    <div className="flex items-center gap-2">
                        <Button
                            variant="ghost"
                            size="icon"
                            className="h-8 w-8"
                            onClick={() =>
                                router.visit(
                                    `/admin/shipping-methods/${shippingMethod.id}`,
                                )
                            }
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
                                    `/admin/shipping-methods/${shippingMethod.id}/edit`,
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
                            onClick={() =>
                                setDeleteShippingMethodId(
                                    shippingMethod.id,
                                )
                            }
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
            <Head title="Kargo Yöntemleri" />

            <div className="flex-1 space-y-6 p-6">
                <div className="flex items-center justify-between">
                    <div>
                        <h1 className="text-3xl font-bold tracking-tight">
                            Kargo Yöntemleri
                        </h1>
                        <p className="mt-1 text-muted-foreground">
                            Kargo yöntemlerini yönetin
                        </p>
                    </div>
                    <Link href="/admin/shipping-methods/create">
                        <Button>
                            <Plus className="mr-2 h-4 w-4" />
                            Yeni Kargo Yöntemi
                        </Button>
                    </Link>
                </div>

                <div className="rounded-md border">
                    <DataTable
                        columns={columns}
                        data={shippingMethods.data}
                        pagination={{
                            currentPage: shippingMethods.current_page,
                            lastPage: shippingMethods.last_page,
                            perPage: shippingMethods.per_page,
                            total: shippingMethods.total,
                            from: shippingMethods.from,
                            to: shippingMethods.to,
                            links: shippingMethods.links,
                        }}
                        onPageChange={handlePageChange}
                    />
                </div>

                <Dialog
                    open={deleteShippingMethodId !== null}
                    onOpenChange={(open) =>
                        setDeleteShippingMethodId(
                            open ? deleteShippingMethodId : null,
                        )
                    }
                >
                    <DialogContent>
                        <DialogHeader>
                            <DialogTitle>Kargo Yöntemini Sil</DialogTitle>
                            <DialogDescription>
                                Bu kargo yöntemini silmek istediğinizden emin
                                misiniz? Bu işlem geri alınamaz.
                            </DialogDescription>
                        </DialogHeader>
                        <DialogFooter>
                            <Button
                                variant="outline"
                                onClick={() => setDeleteShippingMethodId(null)}
                            >
                                İptal
                            </Button>
                            <Button
                                variant="destructive"
                                onClick={() =>
                                    deleteShippingMethodId &&
                                    handleDelete(deleteShippingMethodId)
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

