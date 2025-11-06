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
        title: 'Destek Talepleri',
        href: '/admin/support-tickets',
    },
];

interface SupportTicket {
    id: number;
    ticket_number: string;
    subject: string;
    status: 'open' | 'in_progress' | 'resolved' | 'closed';
    priority: 'low' | 'medium' | 'high' | 'urgent';
    customer?: {
        id: number;
        name: string;
    };
    created_at: string;
}

interface Props {
    supportTickets: PaginatedResponse<SupportTicket>;
}

const statusLabels: Record<string, string> = {
    open: 'Açık',
    in_progress: 'İşleniyor',
    resolved: 'Çözüldü',
    closed: 'Kapatıldı',
};

const priorityLabels: Record<string, string> = {
    low: 'Düşük',
    medium: 'Orta',
    high: 'Yüksek',
    urgent: 'Acil',
};

const statusColors: Record<string, string> = {
    open: 'bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-200',
    in_progress:
        'bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-200',
    resolved:
        'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200',
    closed: 'bg-gray-100 text-gray-800 dark:bg-gray-900 dark:text-gray-200',
};

const priorityColors: Record<string, string> = {
    low: 'bg-gray-100 text-gray-800 dark:bg-gray-900 dark:text-gray-200',
    medium:
        'bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-200',
    high: 'bg-orange-100 text-orange-800 dark:bg-orange-900 dark:text-orange-200',
    urgent:
        'bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-200',
};

export default function SupportTicketsIndex({
    supportTickets,
}: Props) {
    const [deleteTicketId, setDeleteTicketId] = useState<number | null>(null);

    const handleDelete = (ticketId: number) => {
        router.delete(`/admin/support-tickets/${ticketId}`, {
            onSuccess: () => {
                setDeleteTicketId(null);
            },
        });
    };

    const handlePageChange = (page: number) => {
        router.get('/admin/support-tickets', { page }, { preserveState: true });
    };

    const columns: ColumnDef<SupportTicket>[] = [
        {
            accessorKey: 'ticket_number',
            header: ({ column }) => {
                return (
                    <Button
                        variant="ghost"
                        onClick={() =>
                            column.toggleSorting(column.getIsSorted() === 'asc')
                        }
                    >
                        Talep No
                        <ArrowUpDown className="ml-2 h-4 w-4" />
                    </Button>
                );
            },
            cell: ({ row }) => (
                <div className="font-medium font-mono">
                    {row.getValue('ticket_number')}
                </div>
            ),
        },
        {
            accessorKey: 'subject',
            header: 'Konu',
            cell: ({ row }) => (
                <div className="font-medium">{row.getValue('subject')}</div>
            ),
        },
        {
            accessorKey: 'customer',
            header: 'Müşteri',
            cell: ({ row }) => {
                const customer = row.original.customer;
                return customer ? (
                    <span className="text-sm">{customer.name}</span>
                ) : (
                    <span className="text-sm text-muted-foreground">-</span>
                );
            },
        },
        {
            accessorKey: 'status',
            header: 'Durum',
            cell: ({ row }) => {
                const status = row.getValue('status') as string;
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
            accessorKey: 'priority',
            header: 'Öncelik',
            cell: ({ row }) => {
                const priority = row.getValue('priority') as string;
                return (
                    <span
                        className={`rounded px-2 py-1 text-xs ${
                            priorityColors[priority] || ''
                        }`}
                    >
                        {priorityLabels[priority] || priority}
                    </span>
                );
            },
        },
        {
            id: 'actions',
            enableHiding: false,
            cell: ({ row }) => {
                const ticket = row.original;

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
                                        `/admin/support-tickets/${ticket.id}`,
                                    )
                                }
                            >
                                <Eye className="mr-2 h-4 w-4" />
                                Görüntüle
                            </DropdownMenuItem>
                            <DropdownMenuSeparator />
                            <DropdownMenuItem
                                onClick={() => setDeleteTicketId(ticket.id)}
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
            <Head title="Destek Talepleri" />

            <div className="flex-1 space-y-6 p-6">
                <div>
                    <h1 className="text-3xl font-bold tracking-tight">
                        Destek Talepleri
                    </h1>
                    <p className="mt-1 text-muted-foreground">
                        Destek taleplerini yönetin
                    </p>
                </div>

                <div className="rounded-md border">
                    <DataTable
                        columns={columns}
                        data={supportTickets.data}
                        pagination={{
                            currentPage: supportTickets.current_page,
                            lastPage: supportTickets.last_page,
                            perPage: supportTickets.per_page,
                            total: supportTickets.total,
                            from: supportTickets.from,
                            to: supportTickets.to,
                            links: supportTickets.links,
                        }}
                        onPageChange={handlePageChange}
                    />
                </div>

                <Dialog
                    open={deleteTicketId !== null}
                    onOpenChange={(open) =>
                        setDeleteTicketId(open ? deleteTicketId : null)
                    }
                >
                    <DialogContent>
                        <DialogHeader>
                            <DialogTitle>Destek Talebini Sil</DialogTitle>
                            <DialogDescription>
                                Bu destek talebini silmek istediğinizden emin
                                misiniz? Bu işlem geri alınamaz.
                            </DialogDescription>
                        </DialogHeader>
                        <DialogFooter>
                            <Button
                                variant="outline"
                                onClick={() => setDeleteTicketId(null)}
                            >
                                İptal
                            </Button>
                            <Button
                                variant="destructive"
                                onClick={() =>
                                    deleteTicketId &&
                                    handleDelete(deleteTicketId)
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

