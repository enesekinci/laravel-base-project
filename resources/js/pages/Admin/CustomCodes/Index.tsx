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
        title: 'Özel Kodlar',
        href: '/admin/custom-codes',
    },
];

interface CustomCode {
    id: number;
    name: string;
    location?: string;
    is_active: boolean;
}

interface Props {
    customCodes: PaginatedResponse<CustomCode>;
}

export default function CustomCodesIndex({ customCodes }: Props) {
    const [deleteCustomCodeId, setDeleteCustomCodeId] = useState<
        number | null
    >(null);

    const handleDelete = (customCodeId: number) => {
        router.delete(`/admin/custom-codes/${customCodeId}`, {
            onSuccess: () => {
                setDeleteCustomCodeId(null);
            },
        });
    };

    const handlePageChange = (page: number) => {
        router.get('/admin/custom-codes', { page }, { preserveState: true });
    };

    const columns: ColumnDef<CustomCode>[] = [
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
            accessorKey: 'location',
            header: 'Konum',
            cell: ({ row }) => {
                const location = row.getValue('location') as string | undefined;
                return location ? (
                    <span className="text-sm">{location}</span>
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
                const customCode = row.original;

                return (
                    <div className="flex items-center gap-2">
                        <Button
                            variant="ghost"
                            size="icon"
                            className="h-8 w-8"
                            onClick={() =>
                                router.visit(
                                    `/admin/custom-codes/${customCode.id}`,
                                )
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
                                    `/admin/custom-codes/${customCode.id}/edit`,
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
                                setDeleteCustomCodeId(customCode.id)
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
            <Head title="Özel Kodlar" />

            <div className="flex-1 space-y-6 p-6">
                <div className="flex items-center justify-between">
                    <div>
                        <h1 className="text-3xl font-bold tracking-tight">
                            Özel Kodlar
                        </h1>
                        <p className="mt-1 text-muted-foreground">
                            Özel kodları yönetin
                        </p>
                    </div>
                    <Link href="/admin/custom-codes/create">
                        <Button>
                            <Plus className="mr-2 h-4 w-4" />
                            Yeni Özel Kod
                        </Button>
                    </Link>
                </div>

                <div className="rounded-md border">
                    <DataTable
                        columns={columns}
                        data={customCodes.data}
                        pagination={{
                            currentPage: customCodes.current_page,
                            lastPage: customCodes.last_page,
                            perPage: customCodes.per_page,
                            total: customCodes.total,
                            from: customCodes.from,
                            to: customCodes.to,
                            links: customCodes.links,
                        }}
                        onPageChange={handlePageChange}
                    />
                </div>

                <Dialog
                    open={deleteCustomCodeId !== null}
                    onOpenChange={(open) =>
                        setDeleteCustomCodeId(
                            open ? deleteCustomCodeId : null,
                        )
                    }
                >
                    <DialogContent>
                        <DialogHeader>
                            <DialogTitle>Özel Kodu Sil</DialogTitle>
                            <DialogDescription>
                                Bu özel kodu silmek istediğinizden emin misiniz?
                                Bu işlem geri alınamaz.
                            </DialogDescription>
                        </DialogHeader>
                        <DialogFooter>
                            <Button
                                variant="outline"
                                onClick={() => setDeleteCustomCodeId(null)}
                            >
                                İptal
                            </Button>
                            <Button
                                variant="destructive"
                                onClick={() =>
                                    deleteCustomCodeId &&
                                    handleDelete(deleteCustomCodeId)
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

