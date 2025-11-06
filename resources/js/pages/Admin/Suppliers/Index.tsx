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
import { destroy, show } from '@/routes/admin/suppliers';
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
        title: 'Tedarikçiler',
        href: '/admin/suppliers',
    },
];

interface Supplier {
    id: number;
    name: string;
    code: string;
    contact_person?: string;
    email?: string;
    phone?: string;
    city?: string;
    country?: string;
    is_active: boolean;
}

interface Props {
    suppliers: PaginatedResponse<Supplier>;
}

export default function SuppliersIndex({ suppliers }: Props) {
    const [deleteSupplierId, setDeleteSupplierId] = useState<number | null>(
        null,
    );

    const handleDelete = (supplierId: number) => {
        router.delete(destroy(supplierId).url, {
            onSuccess: () => {
                setDeleteSupplierId(null);
            },
        });
    };

    const handlePageChange = (page: number) => {
        router.get('/admin/suppliers', { page }, { preserveState: true });
    };

    const columns: ColumnDef<Supplier>[] = [
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
                        Name
                        <ArrowUpDown className="ml-2 h-4 w-4" />
                    </Button>
                );
            },
            cell: ({ row }) => (
                <div className="font-medium">{row.getValue('name')}</div>
            ),
        },
        {
            accessorKey: 'code',
            header: 'Code',
            cell: ({ row }) => (
                <span className="font-mono text-sm text-muted-foreground">
                    {row.getValue('code')}
                </span>
            ),
        },
        {
            accessorKey: 'contact_person',
            header: 'İletişim',
            cell: ({ row }) => {
                const supplier = row.original;
                return (
                    <div className="text-sm">
                        {supplier.contact_person && (
                            <div>{supplier.contact_person}</div>
                        )}
                        {supplier.email && (
                            <div className="text-muted-foreground">
                                {supplier.email}
                            </div>
                        )}
                    </div>
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
                const supplier = row.original;

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
                                onClick={() => router.visit(show(supplier.id))}
                            >
                                <Eye className="mr-2 h-4 w-4" />
                                Görüntüle
                            </DropdownMenuItem>
                            <DropdownMenuItem
                                onClick={() =>
                                    router.visit(
                                        `/admin/suppliers/${supplier.id}/edit`,
                                    )
                                }
                            >
                                Düzenle
                            </DropdownMenuItem>
                            <DropdownMenuSeparator />
                            <DropdownMenuItem
                                onClick={() => setDeleteSupplierId(supplier.id)}
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
            <Head title="Tedarikçiler" />

            <div className="flex-1 space-y-6 p-6">
                <div className="flex items-center justify-between">
                    <div>
                        <h1 className="text-3xl font-bold tracking-tight">
                            Tedarikçiler
                        </h1>
                        <p className="mt-1 text-muted-foreground">
                            Tedarikçi bilgilerini yönetin
                        </p>
                    </div>
                    <Link href="/admin/suppliers/create">
                        <Button>
                            <Plus className="mr-2 h-4 w-4" />
                            Yeni Tedarikçi
                        </Button>
                    </Link>
                </div>

                <div className="rounded-md border">
                    <DataTable
                        columns={columns}
                        data={suppliers.data}
                        pagination={{
                            currentPage: suppliers.current_page,
                            lastPage: suppliers.last_page,
                            perPage: suppliers.per_page,
                            total: suppliers.total,
                            from: suppliers.from,
                            to: suppliers.to,
                            links: suppliers.links,
                        }}
                        onPageChange={handlePageChange}
                    />
                </div>

                <Dialog
                    open={deleteSupplierId !== null}
                    onOpenChange={(open) =>
                        setDeleteSupplierId(open ? deleteSupplierId : null)
                    }
                >
                    <DialogContent>
                        <DialogHeader>
                            <DialogTitle>Tedarikçiyi Sil</DialogTitle>
                            <DialogDescription>
                                Bu tedarikçiyi silmek istediğinizden emin
                                misiniz? Bu işlem geri alınamaz.
                            </DialogDescription>
                        </DialogHeader>
                        <DialogFooter>
                            <Button
                                variant="outline"
                                onClick={() => setDeleteSupplierId(null)}
                            >
                                İptal
                            </Button>
                            <Button
                                variant="destructive"
                                onClick={() =>
                                    deleteSupplierId &&
                                    handleDelete(deleteSupplierId)
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
