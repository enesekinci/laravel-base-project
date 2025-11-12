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
        title: 'Analitik',
        href: '/admin/analytics',
    },
];

interface Analytic {
    id: number;
    provider?: string;
    tracking_id?: string;
    is_active: boolean;
}

interface Props {
    analytics: PaginatedResponse<Analytic>;
}

export default function AnalyticsIndex({ analytics }: Props) {
    const [deleteAnalyticId, setDeleteAnalyticId] = useState<number | null>(
        null,
    );

    const handleDelete = (analyticId: number) => {
        router.delete(`/admin/analytics/${analyticId}`, {
            onSuccess: () => {
                setDeleteAnalyticId(null);
            },
        });
    };

    const handlePageChange = (page: number) => {
        router.get('/admin/analytics', { page }, { preserveState: true });
    };

    const columns: ColumnDef<Analytic>[] = [
        {
            accessorKey: 'provider',
            header: ({ column }) => {
                return (
                    <Button
                        variant="ghost"
                        onClick={() =>
                            column.toggleSorting(column.getIsSorted() === 'asc')
                        }
                    >
                        Sağlayıcı
                        <ArrowUpDown className="ml-2 h-4 w-4" />
                    </Button>
                );
            },
            cell: ({ row }) => {
                const provider = row.getValue('provider') as string | undefined;
                return provider ? (
                    <div className="font-medium">{provider}</div>
                ) : (
                    <span className="text-sm text-muted-foreground">-</span>
                );
            },
        },
        {
            accessorKey: 'tracking_id',
            header: 'Takip ID',
            cell: ({ row }) => {
                const trackingId = row.getValue('tracking_id') as
                    | string
                    | undefined;
                return trackingId ? (
                    <span className="font-mono text-sm">{trackingId}</span>
                ) : (
                    <span className="text-sm text-muted-foreground">-</span>
                );
            },
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
                const analytic = row.original;

                return (
                    <div className="flex items-center gap-2">
                        <Button
                            variant="ghost"
                            size="icon"
                            className="h-8 w-8"
                            onClick={() =>
                                router.visit(`/admin/analytics/${analytic.id}`)
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
                                    `/admin/analytics/${analytic.id}/edit`,
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
                            onClick={() => setDeleteAnalyticId(analytic.id)}
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
            <Head title="Analitik" />

            <div className="flex-1 space-y-6 p-6">
                <div className="flex items-center justify-between">
                    <div>
                        <h1 className="text-3xl font-bold tracking-tight">
                            Analitik
                        </h1>
                        <p className="mt-1 text-muted-foreground">
                            Analitik ayarlarını yönetin
                        </p>
                    </div>
                    <Link href="/admin/analytics/create">
                        <Button>
                            <Plus className="mr-2 h-4 w-4" />
                            Yeni Analitik
                        </Button>
                    </Link>
                </div>

                <div className="rounded-md border">
                    <DataTable
                        columns={columns}
                        data={analytics.data}
                        pagination={{
                            currentPage: analytics.current_page,
                            lastPage: analytics.last_page,
                            perPage: analytics.per_page,
                            total: analytics.total,
                            from: analytics.from,
                            to: analytics.to,
                            links: analytics.links,
                        }}
                        onPageChange={handlePageChange}
                    />
                </div>

                <Dialog
                    open={deleteAnalyticId !== null}
                    onOpenChange={(open) =>
                        setDeleteAnalyticId(open ? deleteAnalyticId : null)
                    }
                >
                    <DialogContent>
                        <DialogHeader>
                            <DialogTitle>Analitiği Sil</DialogTitle>
                            <DialogDescription>
                                Bu analitiği silmek istediğinizden emin misiniz?
                                Bu işlem geri alınamaz.
                            </DialogDescription>
                        </DialogHeader>
                        <DialogFooter>
                            <Button
                                variant="outline"
                                onClick={() => setDeleteAnalyticId(null)}
                            >
                                İptal
                            </Button>
                            <Button
                                variant="destructive"
                                onClick={() =>
                                    deleteAnalyticId &&
                                    handleDelete(deleteAnalyticId)
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

