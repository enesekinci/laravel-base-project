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
import { destroy, show } from '@/routes/admin/tax-classes';
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
        title: 'Vergi Sınıfları',
        href: '/admin/tax-classes',
    },
];

interface TaxClass {
    id: number;
    name: string;
    rate: number;
    is_active: boolean;
}

interface Props {
    taxClasses: PaginatedResponse<TaxClass>;
}

export default function TaxClassesIndex({ taxClasses }: Props) {
    const [deleteTaxClassId, setDeleteTaxClassId] = useState<number | null>(
        null,
    );

    const handleDelete = (taxClassId: number) => {
        router.delete(destroy(taxClassId).url, {
            onSuccess: () => {
                setDeleteTaxClassId(null);
            },
        });
    };

    const handlePageChange = (page: number) => {
        router.get('/admin/tax-classes', { page }, { preserveState: true });
    };

    const columns: ColumnDef<TaxClass>[] = [
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
            accessorKey: 'rate',
            header: 'Rate',
            cell: ({ row }) => {
                const rateValue = row.getValue('rate');
                const rate = Number(rateValue) || 0;
                return (
                    <span className="text-sm font-medium">
                        %{rate.toFixed(2)}
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
                const taxClass = row.original;

                return (
                    <div className="flex items-center gap-2">
                        <Button
                            variant="ghost"
                            size="icon"
                            className="h-8 w-8"
                            onClick={() => router.visit(show(taxClass.id))}
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
                                    `/admin/tax-classes/${taxClass.id}/edit`,
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
                            onClick={() => setDeleteTaxClassId(taxClass.id)}
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
            <Head title="Vergi Sınıfları" />

            <div className="flex-1 space-y-6 p-6">
                <div className="flex items-center justify-between">
                    <div>
                        <h1 className="text-3xl font-bold tracking-tight">
                            Vergi Sınıfları
                        </h1>
                        <p className="mt-1 text-muted-foreground">
                            Ürün vergi sınıflarını yönetin
                        </p>
                    </div>
                    <Link href="/admin/tax-classes/create">
                        <Button>
                            <Plus className="mr-2 h-4 w-4" />
                            Yeni Vergi Sınıfı
                        </Button>
                    </Link>
                </div>

                <div className="rounded-md border">
                    <DataTable
                        columns={columns}
                        data={taxClasses.data}
                        pagination={{
                            currentPage: taxClasses.current_page,
                            lastPage: taxClasses.last_page,
                            perPage: taxClasses.per_page,
                            total: taxClasses.total,
                            from: taxClasses.from,
                            to: taxClasses.to,
                            links: taxClasses.links,
                        }}
                        onPageChange={handlePageChange}
                    />
                </div>

                <Dialog
                    open={deleteTaxClassId !== null}
                    onOpenChange={(open) =>
                        setDeleteTaxClassId(open ? deleteTaxClassId : null)
                    }
                >
                    <DialogContent>
                        <DialogHeader>
                            <DialogTitle>Vergi Sınıfını Sil</DialogTitle>
                            <DialogDescription>
                                Bu vergi sınıfını silmek istediğinizden emin
                                misiniz? Bu işlem geri alınamaz.
                            </DialogDescription>
                        </DialogHeader>
                        <DialogFooter>
                            <Button
                                variant="outline"
                                onClick={() => setDeleteTaxClassId(null)}
                            >
                                İptal
                            </Button>
                            <Button
                                variant="destructive"
                                onClick={() =>
                                    deleteTaxClassId &&
                                    handleDelete(deleteTaxClassId)
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
