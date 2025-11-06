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
        title: 'Temsilciler',
        href: '/admin/customer-representatives',
    },
];

interface CustomerRepresentative {
    id: number;
    name: string;
    email?: string;
    phone?: string;
    is_active: boolean;
    customer?: {
        id: number;
        name: string;
        email: string;
    };
}

interface Props {
    representatives: PaginatedResponse<CustomerRepresentative>;
}

export default function CustomerRepresentativesIndex({
    representatives,
}: Props) {
    const [deleteRepresentativeId, setDeleteRepresentativeId] =
        useState<number | null>(null);

    const handleDelete = (representativeId: number) => {
        router.delete(`/admin/customer-representatives/${representativeId}`, {
            onSuccess: () => {
                setDeleteRepresentativeId(null);
            },
        });
    };

    const handlePageChange = (page: number) => {
        router.get(
            '/admin/customer-representatives',
            { page },
            { preserveState: true },
        );
    };

    const columns: ColumnDef<CustomerRepresentative>[] = [
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
            accessorKey: 'customer',
            header: 'Müşteri',
            cell: ({ row }) => {
                const customer = row.original.customer;
                return customer ? (
                    <div className="text-sm">
                        <div className="font-medium">{customer.name}</div>
                        <div className="text-muted-foreground">
                            {customer.email}
                        </div>
                    </div>
                ) : (
                    <span className="text-sm text-muted-foreground">-</span>
                );
            },
        },
        {
            accessorKey: 'email',
            header: 'E-posta',
            cell: ({ row }) => {
                const email = row.getValue('email') as string | undefined;
                return email ? (
                    <span className="text-sm">{email}</span>
                ) : (
                    <span className="text-sm text-muted-foreground">-</span>
                );
            },
        },
        {
            accessorKey: 'phone',
            header: 'Telefon',
            cell: ({ row }) => {
                const phone = row.getValue('phone') as string | undefined;
                return phone ? (
                    <span className="text-sm">{phone}</span>
                ) : (
                    <span className="text-sm text-muted-foreground">-</span>
                );
            },
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
                const representative = row.original;

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
                                        `/admin/customer-representatives/${representative.id}`,
                                    )
                                }
                            >
                                <Eye className="mr-2 h-4 w-4" />
                                Görüntüle
                            </DropdownMenuItem>
                            <DropdownMenuItem
                                onClick={() =>
                                    router.visit(
                                        `/admin/customer-representatives/${representative.id}/edit`,
                                    )
                                }
                            >
                                Düzenle
                            </DropdownMenuItem>
                            <DropdownMenuSeparator />
                            <DropdownMenuItem
                                onClick={() =>
                                    setDeleteRepresentativeId(representative.id)
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
            <Head title="Temsilciler" />

            <div className="flex-1 space-y-6 p-6">
                <div className="flex items-center justify-between">
                    <div>
                        <h1 className="text-3xl font-bold tracking-tight">
                            Temsilciler
                        </h1>
                        <p className="mt-1 text-muted-foreground">
                            Müşteri temsilcilerini yönetin
                        </p>
                    </div>
                    <Link href="/admin/customer-representatives/create">
                        <Button>
                            <Plus className="mr-2 h-4 w-4" />
                            Yeni Temsilci
                        </Button>
                    </Link>
                </div>

                <div className="rounded-md border">
                    <DataTable
                        columns={columns}
                        data={representatives.data}
                        pagination={{
                            currentPage: representatives.current_page,
                            lastPage: representatives.last_page,
                            perPage: representatives.per_page,
                            total: representatives.total,
                            from: representatives.from,
                            to: representatives.to,
                            links: representatives.links,
                        }}
                        onPageChange={handlePageChange}
                    />
                </div>

                <Dialog
                    open={deleteRepresentativeId !== null}
                    onOpenChange={(open) =>
                        setDeleteRepresentativeId(
                            open ? deleteRepresentativeId : null,
                        )
                    }
                >
                    <DialogContent>
                        <DialogHeader>
                            <DialogTitle>Temsilciyi Sil</DialogTitle>
                            <DialogDescription>
                                Bu temsilciyi silmek istediğinizden emin misiniz?
                                Bu işlem geri alınamaz.
                            </DialogDescription>
                        </DialogHeader>
                        <DialogFooter>
                            <Button
                                variant="outline"
                                onClick={() => setDeleteRepresentativeId(null)}
                            >
                                İptal
                            </Button>
                            <Button
                                variant="destructive"
                                onClick={() =>
                                    deleteRepresentativeId &&
                                    handleDelete(deleteRepresentativeId)
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

