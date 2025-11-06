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
import { Head, router } from '@inertiajs/react';
import { type ColumnDef } from '@tanstack/react-table';
import { ArrowUpDown, Eye, MoreHorizontal, Trash2 } from 'lucide-react';
import { useState } from 'react';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Dashboard',
        href: '/admin/dashboard',
    },
    {
        title: 'Ödeme Bildirimleri',
        href: '/admin/payment-notifications',
    },
];

interface PaymentNotification {
    id: number;
    name: string;
    email: string;
    order_number?: string;
    amount: number;
    currency: string;
    status: 'new' | 'processed' | 'closed';
    created_at: string;
}

interface Props {
    paymentNotifications: PaginatedResponse<PaymentNotification>;
}

const statusLabels: Record<string, string> = {
    new: 'Yeni',
    processed: 'İşlendi',
    closed: 'Kapatıldı',
};

export default function PaymentNotificationsIndex({
    paymentNotifications,
}: Props) {
    const [deleteNotificationId, setDeleteNotificationId] = useState<
        number | null
    >(null);

    const handleDelete = (notificationId: number) => {
        router.delete(`/admin/payment-notifications/${notificationId}`, {
            onSuccess: () => {
                setDeleteNotificationId(null);
            },
        });
    };

    const handlePageChange = (page: number) => {
        router.get(
            '/admin/payment-notifications',
            { page },
            { preserveState: true },
        );
    };

    const columns: ColumnDef<PaymentNotification>[] = [
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
            accessorKey: 'email',
            header: 'E-posta',
            cell: ({ row }) => (
                <span className="text-sm">{row.getValue('email')}</span>
            ),
        },
        {
            accessorKey: 'order_number',
            header: 'Sipariş No',
            cell: ({ row }) => {
                const orderNumber = row.getValue('order_number') as
                    | string
                    | undefined;
                return orderNumber ? (
                    <span className="font-mono text-sm">{orderNumber}</span>
                ) : (
                    <span className="text-sm text-muted-foreground">-</span>
                );
            },
        },
        {
            accessorKey: 'amount',
            header: 'Tutar',
            cell: ({ row }) => {
                const amount = row.getValue('amount') as number;
                const currency = row.original.currency;
                return (
                    <span className="text-sm font-medium">
                        {amount.toFixed(2)} {currency}
                    </span>
                );
            },
        },
        {
            accessorKey: 'status',
            header: 'Durum',
            cell: ({ row }) => {
                const status = row.getValue('status') as string;
                const statusColors: Record<string, string> = {
                    new: 'bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-200',
                    processed:
                        'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200',
                    closed: 'bg-gray-100 text-gray-800 dark:bg-gray-900 dark:text-gray-200',
                };
                return (
                    <span
                        className={`rounded px-2 py-1 text-xs ${
                            statusColors[status] || ''
                        }`}
                    >
                        {statusLabels[status] || status}
                    </span>
                );
            },
        },
        {
            id: 'actions',
            enableHiding: false,
            cell: ({ row }) => {
                const notification = row.original;

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
                                        `/admin/payment-notifications/${notification.id}`,
                                    )
                                }
                            >
                                <Eye className="mr-2 h-4 w-4" />
                                Görüntüle
                            </DropdownMenuItem>
                            <DropdownMenuSeparator />
                            <DropdownMenuItem
                                onClick={() =>
                                    setDeleteNotificationId(notification.id)
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
            <Head title="Ödeme Bildirimleri" />

            <div className="flex-1 space-y-6 p-6">
                <div>
                    <h1 className="text-3xl font-bold tracking-tight">
                        Ödeme Bildirimleri
                    </h1>
                    <p className="mt-1 text-muted-foreground">
                        Ödeme bildirimi taleplerini yönetin
                    </p>
                </div>

                <div className="rounded-md border">
                    <DataTable
                        columns={columns}
                        data={paymentNotifications.data}
                        pagination={{
                            currentPage: paymentNotifications.current_page,
                            lastPage: paymentNotifications.last_page,
                            perPage: paymentNotifications.per_page,
                            total: paymentNotifications.total,
                            from: paymentNotifications.from,
                            to: paymentNotifications.to,
                            links: paymentNotifications.links,
                        }}
                        onPageChange={handlePageChange}
                    />
                </div>

                <Dialog
                    open={deleteNotificationId !== null}
                    onOpenChange={(open) =>
                        setDeleteNotificationId(
                            open ? deleteNotificationId : null,
                        )
                    }
                >
                    <DialogContent>
                        <DialogHeader>
                            <DialogTitle>Bildirimi Sil</DialogTitle>
                            <DialogDescription>
                                Bu bildirimi silmek istediğinizden emin misiniz?
                                Bu işlem geri alınamaz.
                            </DialogDescription>
                        </DialogHeader>
                        <DialogFooter>
                            <Button
                                variant="outline"
                                onClick={() => setDeleteNotificationId(null)}
                            >
                                İptal
                            </Button>
                            <Button
                                variant="destructive"
                                onClick={() =>
                                    deleteNotificationId &&
                                    handleDelete(deleteNotificationId)
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
