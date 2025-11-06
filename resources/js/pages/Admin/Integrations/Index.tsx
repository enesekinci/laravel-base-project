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
        title: 'Entegrasyonlar',
        href: '/admin/integrations',
    },
];

interface Integration {
    id: number;
    name: string;
    type: string;
    provider?: string;
    is_active: boolean;
}

interface Props {
    integrations: PaginatedResponse<Integration>;
}

export default function IntegrationsIndex({ integrations }: Props) {
    const [deleteIntegrationId, setDeleteIntegrationId] = useState<
        number | null
    >(null);

    const handleDelete = (integrationId: number) => {
        router.delete(`/admin/integrations/${integrationId}`, {
            onSuccess: () => {
                setDeleteIntegrationId(null);
            },
        });
    };

    const handlePageChange = (page: number) => {
        router.get('/admin/integrations', { page }, { preserveState: true });
    };

    const columns: ColumnDef<Integration>[] = [
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
            accessorKey: 'type',
            header: 'Tip',
            cell: ({ row }) => (
                <span className="text-sm">{row.getValue('type')}</span>
            ),
        },
        {
            accessorKey: 'provider',
            header: 'Sağlayıcı',
            cell: ({ row }) => {
                const provider = row.original.provider;
                return provider ? (
                    <span className="text-sm">{provider}</span>
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
                const integration = row.original;

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
                                        `/admin/integrations/${integration.id}`,
                                    )
                                }
                            >
                                <Eye className="mr-2 h-4 w-4" />
                                Görüntüle
                            </DropdownMenuItem>
                            <DropdownMenuItem
                                onClick={() =>
                                    router.visit(
                                        `/admin/integrations/${integration.id}/edit`,
                                    )
                                }
                            >
                                Düzenle
                            </DropdownMenuItem>
                            <DropdownMenuSeparator />
                            <DropdownMenuItem
                                onClick={() =>
                                    setDeleteIntegrationId(integration.id)
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
            <Head title="Entegrasyonlar" />

            <div className="flex-1 space-y-6 p-6">
                <div className="flex items-center justify-between">
                    <div>
                        <h1 className="text-3xl font-bold tracking-tight">
                            Entegrasyonlar
                        </h1>
                        <p className="mt-1 text-muted-foreground">
                            Entegrasyonları yönetin
                        </p>
                    </div>
                    <Link href="/admin/integrations/create">
                        <Button>
                            <Plus className="mr-2 h-4 w-4" />
                            Yeni Entegrasyon
                        </Button>
                    </Link>
                </div>

                <div className="rounded-md border">
                    <DataTable
                        columns={columns}
                        data={integrations.data}
                        pagination={{
                            currentPage: integrations.current_page,
                            lastPage: integrations.last_page,
                            perPage: integrations.per_page,
                            total: integrations.total,
                            from: integrations.from,
                            to: integrations.to,
                            links: integrations.links,
                        }}
                        onPageChange={handlePageChange}
                    />
                </div>

                <Dialog
                    open={deleteIntegrationId !== null}
                    onOpenChange={(open) =>
                        setDeleteIntegrationId(
                            open ? deleteIntegrationId : null,
                        )
                    }
                >
                    <DialogContent>
                        <DialogHeader>
                            <DialogTitle>Entegrasyonu Sil</DialogTitle>
                            <DialogDescription>
                                Bu entegrasyonu silmek istediğinizden emin
                                misiniz? Bu işlem geri alınamaz.
                            </DialogDescription>
                        </DialogHeader>
                        <DialogFooter>
                            <Button
                                variant="outline"
                                onClick={() => setDeleteIntegrationId(null)}
                            >
                                İptal
                            </Button>
                            <Button
                                variant="destructive"
                                onClick={() =>
                                    deleteIntegrationId &&
                                    handleDelete(deleteIntegrationId)
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

