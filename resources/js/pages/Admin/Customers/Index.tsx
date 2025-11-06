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
        title: 'Üyeler',
        href: '/admin/customers',
    },
];

interface Customer {
    id: number;
    name: string;
    email: string;
    phone?: string;
    city?: string;
    is_active: boolean;
    groups?: Array<{
        id: number;
        name: string;
    }>;
    created_at: string;
}

interface Props {
    customers: PaginatedResponse<Customer>;
}

export default function CustomersIndex({ customers }: Props) {
    const [deleteCustomerId, setDeleteCustomerId] = useState<number | null>(null);

    const handleDelete = (customerId: number) => {
        router.delete(`/admin/customers/${customerId}`, {
            onSuccess: () => {
                setDeleteCustomerId(null);
            },
        });
    };

    const handlePageChange = (page: number) => {
        router.get('/admin/customers', { page }, { preserveState: true });
    };

    const columns: ColumnDef<Customer>[] = [
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
            accessorKey: 'city',
            header: 'Şehir',
            cell: ({ row }) => {
                const city = row.getValue('city') as string | undefined;
                return city ? (
                    <span className="text-sm">{city}</span>
                ) : (
                    <span className="text-sm text-muted-foreground">-</span>
                );
            },
        },
        {
            accessorKey: 'groups',
            header: 'Gruplar',
            cell: ({ row }) => {
                const groups = row.original.groups || [];
                return groups.length > 0 ? (
                    <span className="text-sm">
                        {groups.map((g) => g.name).join(', ')}
                    </span>
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
                const customer = row.original;

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
                                    router.visit(`/admin/customers/${customer.id}`)
                                }
                            >
                                <Eye className="mr-2 h-4 w-4" />
                                Görüntüle
                            </DropdownMenuItem>
                            <DropdownMenuItem
                                onClick={() =>
                                    router.visit(
                                        `/admin/customers/${customer.id}/edit`,
                                    )
                                }
                            >
                                Düzenle
                            </DropdownMenuItem>
                            <DropdownMenuSeparator />
                            <DropdownMenuItem
                                onClick={() => setDeleteCustomerId(customer.id)}
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
            <Head title="Üyeler" />

            <div className="flex-1 space-y-6 p-6">
                <div className="flex items-center justify-between">
                    <div>
                        <h1 className="text-3xl font-bold tracking-tight">
                            Üyeler
                        </h1>
                        <p className="mt-1 text-muted-foreground">
                            Müşterileri yönetin
                        </p>
                    </div>
                    <Link href="/admin/customers/create">
                        <Button>
                            <Plus className="mr-2 h-4 w-4" />
                            Yeni Üye
                        </Button>
                    </Link>
                </div>

                <div className="rounded-md border">
                    <DataTable
                        columns={columns}
                        data={customers.data}
                        pagination={{
                            currentPage: customers.current_page,
                            lastPage: customers.last_page,
                            perPage: customers.per_page,
                            total: customers.total,
                            from: customers.from,
                            to: customers.to,
                            links: customers.links,
                        }}
                        onPageChange={handlePageChange}
                    />
                </div>

                <Dialog
                    open={deleteCustomerId !== null}
                    onOpenChange={(open) =>
                        setDeleteCustomerId(open ? deleteCustomerId : null)
                    }
                >
                    <DialogContent>
                        <DialogHeader>
                            <DialogTitle>Üyeyi Sil</DialogTitle>
                            <DialogDescription>
                                Bu üyeyi silmek istediğinizden emin misiniz? Bu
                                işlem geri alınamaz.
                            </DialogDescription>
                        </DialogHeader>
                        <DialogFooter>
                            <Button
                                variant="outline"
                                onClick={() => setDeleteCustomerId(null)}
                            >
                                İptal
                            </Button>
                            <Button
                                variant="destructive"
                                onClick={() =>
                                    deleteCustomerId &&
                                    handleDelete(deleteCustomerId)
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

