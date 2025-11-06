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
        title: 'Ödeme Yöntemleri',
        href: '/admin/payment-methods',
    },
];

interface PaymentMethod {
    id: number;
    name: string;
    code: string;
    is_active: boolean;
    sort_order: number;
}

interface Props {
    paymentMethods: PaginatedResponse<PaymentMethod>;
}

export default function PaymentMethodsIndex({
    paymentMethods,
}: Props) {
    const [deletePaymentMethodId, setDeletePaymentMethodId] = useState<
        number | null
    >(null);

    const handleDelete = (paymentMethodId: number) => {
        router.delete(`/admin/payment-methods/${paymentMethodId}`, {
            onSuccess: () => {
                setDeletePaymentMethodId(null);
            },
        });
    };

    const handlePageChange = (page: number) => {
        router.get(
            '/admin/payment-methods',
            { page },
            { preserveState: true },
        );
    };

    const columns: ColumnDef<PaymentMethod>[] = [
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
                const paymentMethod = row.original;

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
                                onClick={() =>
                                    router.visit(
                                        `/admin/payment-methods/${paymentMethod.id}`,
                                    )
                                }
                            >
                                <Eye className="mr-2 h-4 w-4" />
                                Görüntüle
                            </DropdownMenuItem>
                            <DropdownMenuItem
                                onClick={() =>
                                    router.visit(
                                        `/admin/payment-methods/${paymentMethod.id}/edit`,
                                    )
                                }
                            >
                                Düzenle
                            </DropdownMenuItem>
                            <DropdownMenuSeparator />
                            <DropdownMenuItem
                                onClick={() =>
                                    setDeletePaymentMethodId(paymentMethod.id)
                                }
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
            <Head title="Ödeme Yöntemleri" />

            <div className="flex-1 space-y-6 p-6">
                <div className="flex items-center justify-between">
                    <div>
                        <h1 className="text-3xl font-bold tracking-tight">
                            Ödeme Yöntemleri
                        </h1>
                        <p className="mt-1 text-muted-foreground">
                            Ödeme yöntemlerini yönetin
                        </p>
                    </div>
                    <Link href="/admin/payment-methods/create">
                        <Button>
                            <Plus className="mr-2 h-4 w-4" />
                            Yeni Ödeme Yöntemi
                        </Button>
                    </Link>
                </div>

                <div className="rounded-md border">
                    <DataTable
                        columns={columns}
                        data={paymentMethods.data}
                        pagination={{
                            currentPage: paymentMethods.current_page,
                            lastPage: paymentMethods.last_page,
                            perPage: paymentMethods.per_page,
                            total: paymentMethods.total,
                            from: paymentMethods.from,
                            to: paymentMethods.to,
                            links: paymentMethods.links,
                        }}
                        onPageChange={handlePageChange}
                    />
                </div>

                <Dialog
                    open={deletePaymentMethodId !== null}
                    onOpenChange={(open) =>
                        setDeletePaymentMethodId(
                            open ? deletePaymentMethodId : null,
                        )
                    }
                >
                    <DialogContent>
                        <DialogHeader>
                            <DialogTitle>Ödeme Yöntemini Sil</DialogTitle>
                            <DialogDescription>
                                Bu ödeme yöntemini silmek istediğinizden emin
                                misiniz? Bu işlem geri alınamaz.
                            </DialogDescription>
                        </DialogHeader>
                        <DialogFooter>
                            <Button
                                variant="outline"
                                onClick={() => setDeletePaymentMethodId(null)}
                            >
                                İptal
                            </Button>
                            <Button
                                variant="destructive"
                                onClick={() =>
                                    deletePaymentMethodId &&
                                    handleDelete(deletePaymentMethodId)
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

