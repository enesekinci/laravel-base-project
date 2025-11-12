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
import { destroy, show } from '@/routes/admin/options';
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
        title: 'Ürün Seçenekleri',
        href: '/admin/options',
    },
];

interface ProductOptionValue {
    id: number;
    label: string;
    value?: string;
    price_adjustment: number;
    sort_order: number;
}

interface ProductOption {
    id: number;
    name: string;
    description?: string;
    type: string;
    required: boolean;
    sort_order: number;
    is_active: boolean;
    values?: ProductOptionValue[];
}

interface Props {
    options: PaginatedResponse<ProductOption>;
}

export default function ProductOptionsIndex({ options }: Props) {
    const [deleteOptionId, setDeleteOptionId] = useState<number | null>(null);

    const handleDelete = (optionId: number) => {
        router.delete(destroy(optionId).url, {
            onSuccess: () => {
                setDeleteOptionId(null);
            },
        });
    };

    const handlePageChange = (page: number) => {
        router.get('/admin/options', { page }, { preserveState: true });
    };

    const columns: ColumnDef<ProductOption>[] = [
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
            accessorKey: 'type',
            header: 'Type',
            cell: ({ row }) => {
                const type = row.getValue('type') as string;
                return (
                    <span className="rounded bg-muted px-2 py-1 text-xs">
                        {type}
                    </span>
                );
            },
        },
        {
            accessorKey: 'required',
            header: 'Required',
            cell: ({ row }) => {
                const required = row.getValue('required') as boolean;
                return required ? (
                    <span className="rounded bg-blue-100 px-2 py-1 text-xs text-blue-800 dark:bg-blue-900 dark:text-blue-200">
                        Zorunlu
                    </span>
                ) : (
                    <span className="text-sm text-muted-foreground">-</span>
                );
            },
        },
        {
            accessorKey: 'values',
            header: 'Values',
            cell: ({ row }) => {
                const values = row.original.values || [];
                return (
                    <span className="text-sm text-muted-foreground">
                        {values.length} değer
                    </span>
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
                    <span className="rounded bg-red-100 px-2 py-1 text-xs text-red-800 dark:bg-red-900 dark:text-red-200">
                        Pasif
                    </span>
                );
            },
        },
        {
            id: 'actions',
            enableHiding: false,
            cell: ({ row }) => {
                const option = row.original;

                return (
                    <div className="flex items-center gap-2">
                        <Button
                            variant="ghost"
                            size="icon"
                            className="h-8 w-8"
                            onClick={() => router.visit(show(option.id))}
                            title="Görüntüle"
                        >
                            <Eye className="h-4 w-4" />
                        </Button>
                        <Button
                            variant="ghost"
                            size="icon"
                            className="h-8 w-8"
                            onClick={() =>
                                router.visit(`/admin/options/${option.id}/edit`)
                            }
                            title="Düzenle"
                        >
                            <Pencil className="h-4 w-4" />
                        </Button>
                        <Button
                            variant="ghost"
                            size="icon"
                            className="h-8 w-8 text-destructive hover:text-destructive"
                            onClick={() => setDeleteOptionId(option.id)}
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
            <Head title="Ürün Seçenekleri" />

            <div className="flex-1 space-y-6 p-6">
                <div className="flex items-center justify-between">
                    <div>
                        <h1 className="text-3xl font-bold tracking-tight">
                            Ürün Seçenekleri
                        </h1>
                        <p className="mt-1 text-muted-foreground">
                            Ürün seçeneklerini yönetin (RAM, Depolama, vb.)
                        </p>
                    </div>
                    <Link href="/admin/options/create">
                        <Button>
                            <Plus className="mr-2 h-4 w-4" />
                            Yeni Seçenek
                        </Button>
                    </Link>
                </div>

                <div className="rounded-md border">
                    <DataTable
                        columns={columns}
                        data={options.data}
                        pagination={{
                            currentPage: options.current_page,
                            lastPage: options.last_page,
                            perPage: options.per_page,
                            total: options.total,
                            from: options.from,
                            to: options.to,
                            links: options.links,
                        }}
                        onPageChange={handlePageChange}
                    />
                </div>

                <Dialog
                    open={deleteOptionId !== null}
                    onOpenChange={(open) =>
                        setDeleteOptionId(open ? deleteOptionId : null)
                    }
                >
                    <DialogContent>
                        <DialogHeader>
                            <DialogTitle>Seçeneği Sil</DialogTitle>
                            <DialogDescription>
                                Bu seçeneği silmek istediğinizden emin misiniz?
                                Bu işlem geri alınamaz.
                            </DialogDescription>
                        </DialogHeader>
                        <DialogFooter>
                            <Button
                                variant="outline"
                                onClick={() => setDeleteOptionId(null)}
                            >
                                İptal
                            </Button>
                            <Button
                                variant="destructive"
                                onClick={() =>
                                    deleteOptionId &&
                                    handleDelete(deleteOptionId)
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
