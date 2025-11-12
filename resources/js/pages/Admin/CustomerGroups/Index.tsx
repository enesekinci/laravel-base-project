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
        title: 'Üye Grupları',
        href: '/admin/customer-groups',
    },
];

interface CustomerGroup {
    id: number;
    name: string;
    slug: string;
    description?: string;
    is_active: boolean;
    customers_count?: number;
}

interface Props {
    customerGroups: PaginatedResponse<CustomerGroup>;
}

export default function CustomerGroupsIndex({ customerGroups }: Props) {
    const [deleteGroupId, setDeleteGroupId] = useState<number | null>(null);

    const handleDelete = (groupId: number) => {
        router.delete(`/admin/customer-groups/${groupId}`, {
            onSuccess: () => {
                setDeleteGroupId(null);
            },
        });
    };

    const handlePageChange = (page: number) => {
        router.get('/admin/customer-groups', { page }, { preserveState: true });
    };

    const columns: ColumnDef<CustomerGroup>[] = [
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
            accessorKey: 'slug',
            header: 'Slug',
            cell: ({ row }) => (
                <span className="font-mono text-sm text-muted-foreground">
                    {row.getValue('slug')}
                </span>
            ),
        },
        {
            accessorKey: 'customers_count',
            header: 'Üye Sayısı',
            cell: ({ row }) => (
                <span className="text-sm">
                    {row.getValue('customers_count') || 0}
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
            id: 'actions',
            enableHiding: false,
            cell: ({ row }) => {
                const group = row.original;

                return (
                    <div className="flex items-center gap-2">
                        <Button
                            variant="ghost"
                            size="icon"
                            className="h-8 w-8"
                            onClick={() =>
                                router.visit(`/admin/customer-groups/${group.id}`)
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
                                    `/admin/customer-groups/${group.id}/edit`,
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
                            onClick={() => setDeleteGroupId(group.id)}
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
            <Head title="Üye Grupları" />

            <div className="flex-1 space-y-6 p-6">
                <div className="flex items-center justify-between">
                    <div>
                        <h1 className="text-3xl font-bold tracking-tight">
                            Üye Grupları
                        </h1>
                        <p className="mt-1 text-muted-foreground">
                            Üye gruplarını yönetin
                        </p>
                    </div>
                    <Link href="/admin/customer-groups/create">
                        <Button>
                            <Plus className="mr-2 h-4 w-4" />
                            Yeni Grup
                        </Button>
                    </Link>
                </div>

                <div className="rounded-md border">
                    <DataTable
                        columns={columns}
                        data={customerGroups.data}
                        pagination={{
                            currentPage: customerGroups.current_page,
                            lastPage: customerGroups.last_page,
                            perPage: customerGroups.per_page,
                            total: customerGroups.total,
                            from: customerGroups.from,
                            to: customerGroups.to,
                            links: customerGroups.links,
                        }}
                        onPageChange={handlePageChange}
                    />
                </div>

                <Dialog
                    open={deleteGroupId !== null}
                    onOpenChange={(open) =>
                        setDeleteGroupId(open ? deleteGroupId : null)
                    }
                >
                    <DialogContent>
                        <DialogHeader>
                            <DialogTitle>Grubu Sil</DialogTitle>
                            <DialogDescription>
                                Bu grubu silmek istediğinizden emin misiniz? Bu
                                işlem geri alınamaz.
                            </DialogDescription>
                        </DialogHeader>
                        <DialogFooter>
                            <Button
                                variant="outline"
                                onClick={() => setDeleteGroupId(null)}
                            >
                                İptal
                            </Button>
                            <Button
                                variant="destructive"
                                onClick={() =>
                                    deleteGroupId && handleDelete(deleteGroupId)
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

