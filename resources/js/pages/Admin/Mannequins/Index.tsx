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
import { destroy, show } from '@/routes/admin/mannequins';
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
        title: 'Mankenler',
        href: '/admin/mannequins',
    },
];

interface Mannequin {
    id: number;
    name: string;
    code: string;
    description?: string;
    images?: string[];
    measurements?: Record<string, unknown>;
    is_active: boolean;
}

interface Props {
    mannequins: PaginatedResponse<Mannequin>;
}

export default function MannequinsIndex({ mannequins }: Props) {
    const [deleteMannequinId, setDeleteMannequinId] = useState<number | null>(
        null,
    );

    const handleDelete = (mannequinId: number) => {
        router.delete(destroy(mannequinId).url, {
            onSuccess: () => {
                setDeleteMannequinId(null);
            },
        });
    };

    const handlePageChange = (page: number) => {
        router.get('/admin/mannequins', { page }, { preserveState: true });
    };

    const columns: ColumnDef<Mannequin>[] = [
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
                const mannequin = row.original;

                return (
                    <div className="flex items-center gap-2">
                        <Button
                            variant="ghost"
                            size="icon"
                            className="h-8 w-8"
                            onClick={() => router.visit(show(mannequin.id))}
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
                                    `/admin/mannequins/${mannequin.id}/edit`,
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
                            onClick={() =>
                                setDeleteMannequinId(mannequin.id)
                            }
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
            <Head title="Mankenler" />

            <div className="flex-1 space-y-6 p-6">
                <div className="flex items-center justify-between">
                    <div>
                        <h1 className="text-3xl font-bold tracking-tight">
                            Mankenler
                        </h1>
                        <p className="mt-1 text-muted-foreground">
                            Ürün manken bilgilerini yönetin
                        </p>
                    </div>
                    <Link href="/admin/mannequins/create">
                        <Button>
                            <Plus className="mr-2 h-4 w-4" />
                            Yeni Manken
                        </Button>
                    </Link>
                </div>

                <div className="rounded-md border">
                    <DataTable
                        columns={columns}
                        data={mannequins.data}
                        pagination={{
                            currentPage: mannequins.current_page,
                            lastPage: mannequins.last_page,
                            perPage: mannequins.per_page,
                            total: mannequins.total,
                            from: mannequins.from,
                            to: mannequins.to,
                            links: mannequins.links,
                        }}
                        onPageChange={handlePageChange}
                    />
                </div>

                <Dialog
                    open={deleteMannequinId !== null}
                    onOpenChange={(open) =>
                        setDeleteMannequinId(open ? deleteMannequinId : null)
                    }
                >
                    <DialogContent>
                        <DialogHeader>
                            <DialogTitle>Manken'i Sil</DialogTitle>
                            <DialogDescription>
                                Bu mankeni silmek istediğinizden emin misiniz?
                                Bu işlem geri alınamaz.
                            </DialogDescription>
                        </DialogHeader>
                        <DialogFooter>
                            <Button
                                variant="outline"
                                onClick={() => setDeleteMannequinId(null)}
                            >
                                İptal
                            </Button>
                            <Button
                                variant="destructive"
                                onClick={() =>
                                    deleteMannequinId &&
                                    handleDelete(deleteMannequinId)
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
