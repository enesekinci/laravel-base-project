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
        title: 'E-Bülten',
        href: '/admin/newsletters',
    },
];

interface Newsletter {
    id: number;
    email: string;
    name?: string;
    is_active: boolean;
    subscribed_at: string;
    created_at: string;
}

interface Props {
    newsletters: PaginatedResponse<Newsletter>;
}

export default function NewslettersIndex({ newsletters }: Props) {
    const [deleteNewsletterId, setDeleteNewsletterId] = useState<
        number | null
    >(null);

    const handleDelete = (newsletterId: number) => {
        router.delete(`/admin/newsletters/${newsletterId}`, {
            onSuccess: () => {
                setDeleteNewsletterId(null);
            },
        });
    };

    const handlePageChange = (page: number) => {
        router.get('/admin/newsletters', { page }, { preserveState: true });
    };

    const columns: ColumnDef<Newsletter>[] = [
        {
            accessorKey: 'email',
            header: ({ column }) => {
                return (
                    <Button
                        variant="ghost"
                        onClick={() =>
                            column.toggleSorting(column.getIsSorted() === 'asc')
                        }
                    >
                        E-posta
                        <ArrowUpDown className="ml-2 h-4 w-4" />
                    </Button>
                );
            },
            cell: ({ row }) => (
                <div className="font-medium">{row.getValue('email')}</div>
            ),
        },
        {
            accessorKey: 'name',
            header: 'Ad',
            cell: ({ row }) => {
                const name = row.getValue('name') as string | undefined;
                return name ? (
                    <span className="text-sm">{name}</span>
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
            accessorKey: 'subscribed_at',
            header: 'Abone Tarihi',
            cell: ({ row }) => (
                <span className="text-sm">
                    {new Date(row.getValue('subscribed_at')).toLocaleDateString(
                        'tr-TR',
                    )}
                </span>
            ),
        },
        {
            id: 'actions',
            enableHiding: false,
            cell: ({ row }) => {
                const newsletter = row.original;

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
                                    router.visit(`/admin/newsletters/${newsletter.id}`)
                                }
                            >
                                <Eye className="mr-2 h-4 w-4" />
                                Görüntüle
                            </DropdownMenuItem>
                            <DropdownMenuSeparator />
                            <DropdownMenuItem
                                onClick={() =>
                                    setDeleteNewsletterId(newsletter.id)
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
            <Head title="E-Bülten" />

            <div className="flex-1 space-y-6 p-6">
                <div>
                    <h1 className="text-3xl font-bold tracking-tight">
                        E-Bülten
                    </h1>
                    <p className="mt-1 text-muted-foreground">
                        E-bülten abonelerini yönetin
                    </p>
                </div>

                <div className="rounded-md border">
                    <DataTable
                        columns={columns}
                        data={newsletters.data}
                        pagination={{
                            currentPage: newsletters.current_page,
                            lastPage: newsletters.last_page,
                            perPage: newsletters.per_page,
                            total: newsletters.total,
                            from: newsletters.from,
                            to: newsletters.to,
                            links: newsletters.links,
                        }}
                        onPageChange={handlePageChange}
                    />
                </div>

                <Dialog
                    open={deleteNewsletterId !== null}
                    onOpenChange={(open) =>
                        setDeleteNewsletterId(open ? deleteNewsletterId : null)
                    }
                >
                    <DialogContent>
                        <DialogHeader>
                            <DialogTitle>Aboneyi Sil</DialogTitle>
                            <DialogDescription>
                                Bu aboneyi silmek istediğinizden emin misiniz? Bu
                                işlem geri alınamaz.
                            </DialogDescription>
                        </DialogHeader>
                        <DialogFooter>
                            <Button
                                variant="outline"
                                onClick={() => setDeleteNewsletterId(null)}
                            >
                                İptal
                            </Button>
                            <Button
                                variant="destructive"
                                onClick={() =>
                                    deleteNewsletterId &&
                                    handleDelete(deleteNewsletterId)
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

