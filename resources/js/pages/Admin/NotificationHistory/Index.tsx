import { DataTable } from '@/components/data-table';
import { Button } from '@/components/ui/button';
import AppLayout from '@/layouts/app-layout';
import { type BreadcrumbItem, type PaginatedResponse } from '@/types';
import { Head, router } from '@inertiajs/react';
import { type ColumnDef } from '@tanstack/react-table';
import { ArrowUpDown } from 'lucide-react';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Dashboard',
        href: '/admin/dashboard',
    },
    {
        title: 'Bildirim Geçmişi',
        href: '/admin/notifications/history',
    },
];

interface NotificationHistory {
    id: number;
    type: string;
    to: string;
    subject?: string;
    message: string;
    status: 'pending' | 'sent' | 'failed';
    error_message?: string;
    user?: {
        id: number;
        name: string;
        email: string;
    };
    customer?: {
        id: number;
        name: string;
        email: string;
    };
    sent_at?: string;
    created_at: string;
}

interface Props {
    notificationHistory: PaginatedResponse<NotificationHistory>;
}

const typeLabels: Record<string, string> = {
    email: 'E-posta',
    sms: 'SMS',
    push: 'Push',
};

const statusLabels: Record<string, string> = {
    pending: 'Beklemede',
    sent: 'Gönderildi',
    failed: 'Başarısız',
};

export default function NotificationHistoryIndex({
    notificationHistory,
}: Props) {
    const handlePageChange = (page: number) => {
        router.get(
            '/admin/notifications/history',
            { page },
            { preserveState: true },
        );
    };

    const columns: ColumnDef<NotificationHistory>[] = [
        {
            accessorKey: 'type',
            header: ({ column }) => {
                return (
                    <Button
                        variant="ghost"
                        onClick={() =>
                            column.toggleSorting(column.getIsSorted() === 'asc')
                        }
                    >
                        Tip
                        <ArrowUpDown className="ml-2 h-4 w-4" />
                    </Button>
                );
            },
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
            accessorKey: 'to',
            header: 'Alıcı',
            cell: ({ row }) => (
                <span className="text-sm font-medium">
                    {row.getValue('to')}
                </span>
            ),
        },
        {
            accessorKey: 'subject',
            header: 'Konu',
            cell: ({ row }) => {
                const subject = row.getValue('subject') as string | undefined;
                return subject ? (
                    <span className="text-sm">{subject}</span>
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
                const statusColors: Record<string, string> = {
                    pending:
                        'bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-200',
                    sent: 'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200',
                    failed:
                        'bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-200',
                };
                return (
                    <span
                        className={`rounded px-2 py-1 text-xs ${
                            statusColors[status] ||
                            'bg-gray-100 text-gray-800 dark:bg-gray-900 dark:text-gray-200'
                        }`}
                    >
                        {statusLabels[status] || status}
                    </span>
                );
            },
        },
        {
            accessorKey: 'user',
            header: 'Kullanıcı',
            cell: ({ row }) => {
                const user = row.original.user;
                return user ? (
                    <div className="text-sm">
                        <div className="font-medium">{user.name}</div>
                        <div className="text-muted-foreground">{user.email}</div>
                    </div>
                ) : (
                    <span className="text-sm text-muted-foreground">-</span>
                );
            },
        },
        {
            accessorKey: 'created_at',
            header: 'Tarih',
            cell: ({ row }) => (
                <span className="text-sm">
                    {new Date(row.getValue('created_at')).toLocaleString(
                        'tr-TR',
                    )}
                </span>
            ),
        },
    ];

    return (
        <AppLayout breadcrumbs={breadcrumbs}>
            <Head title="Bildirim Geçmişi" />

            <div className="flex-1 space-y-6 p-6">
                <div>
                    <h1 className="text-3xl font-bold tracking-tight">
                        Bildirim Geçmişi
                    </h1>
                    <p className="mt-1 text-muted-foreground">
                        Gönderilen tüm bildirimlerin geçmişi
                    </p>
                </div>

                <div className="rounded-md border">
                    <DataTable
                        columns={columns}
                        data={notificationHistory.data}
                        pagination={{
                            currentPage: notificationHistory.current_page,
                            lastPage: notificationHistory.last_page,
                            perPage: notificationHistory.per_page,
                            total: notificationHistory.total,
                            from: notificationHistory.from,
                            to: notificationHistory.to,
                            links: notificationHistory.links,
                        }}
                        onPageChange={handlePageChange}
                    />
                </div>
            </div>
        </AppLayout>
    );
}

