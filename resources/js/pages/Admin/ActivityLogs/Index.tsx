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
        title: 'İşlem Kayıt',
        href: '/admin/users/activity-logs',
    },
];

interface ActivityLog {
    id: number;
    action: string;
    description?: string;
    model_type?: string;
    model_id?: number;
    user?: {
        id: number;
        name: string;
        email: string;
    };
    created_at: string;
}

interface Props {
    activityLogs: PaginatedResponse<ActivityLog>;
}

const actionLabels: Record<string, string> = {
    created: 'Oluşturuldu',
    updated: 'Güncellendi',
    deleted: 'Silindi',
};

export default function ActivityLogsIndex({ activityLogs }: Props) {
    const handlePageChange = (page: number) => {
        router.get('/admin/users/activity-logs', { page }, { preserveState: true });
    };

    const columns: ColumnDef<ActivityLog>[] = [
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
                    <span className="text-sm text-muted-foreground">Sistem</span>
                );
            },
        },
        {
            accessorKey: 'action',
            header: ({ column }) => {
                return (
                    <Button
                        variant="ghost"
                        onClick={() =>
                            column.toggleSorting(column.getIsSorted() === 'asc')
                        }
                    >
                        İşlem
                        <ArrowUpDown className="ml-2 h-4 w-4" />
                    </Button>
                );
            },
            cell: ({ row }) => {
                const action = row.getValue('action') as string;
                return (
                    <span className="rounded bg-blue-100 px-2 py-1 text-xs text-blue-800 dark:bg-blue-900 dark:text-blue-200">
                        {actionLabels[action] || action}
                    </span>
                );
            },
        },
        {
            accessorKey: 'description',
            header: 'Açıklama',
            cell: ({ row }) => (
                <span className="text-sm">
                    {row.getValue('description') || '-'}
                </span>
            ),
        },
        {
            accessorKey: 'model_type',
            header: 'Model',
            cell: ({ row }) => {
                const modelType = row.original.model_type;
                const modelId = row.original.model_id;
                return modelType ? (
                    <span className="text-sm font-mono">
                        {modelType} #{modelId}
                    </span>
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
                    {new Date(row.getValue('created_at')).toLocaleString('tr-TR')}
                </span>
            ),
        },
    ];

    return (
        <AppLayout breadcrumbs={breadcrumbs}>
            <Head title="İşlem Kayıt" />

            <div className="flex-1 space-y-6 p-6">
                <div>
                    <h1 className="text-3xl font-bold tracking-tight">
                        İşlem Kayıt
                    </h1>
                    <p className="mt-1 text-muted-foreground">
                        Sistemdeki tüm işlem kayıtları
                    </p>
                </div>

                <div className="rounded-md border">
                    <DataTable
                        columns={columns}
                        data={activityLogs.data}
                        pagination={{
                            currentPage: activityLogs.current_page,
                            lastPage: activityLogs.last_page,
                            perPage: activityLogs.per_page,
                            total: activityLogs.total,
                            from: activityLogs.from,
                            to: activityLogs.to,
                            links: activityLogs.links,
                        }}
                        onPageChange={handlePageChange}
                    />
                </div>
            </div>
        </AppLayout>
    );
}

