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
        title: 'Para Birimleri',
        href: '/admin/currencies',
    },
];

interface Currency {
    id: number;
    name: string;
    code: string;
    symbol: string;
    exchange_rate: number;
    is_default: boolean;
    is_active: boolean;
}

interface Props {
    currencies: PaginatedResponse<Currency>;
}

export default function CurrenciesIndex({ currencies }: Props) {
    const [deleteCurrencyId, setDeleteCurrencyId] = useState<number | null>(
        null,
    );

    const handleDelete = (currencyId: number) => {
        router.delete(`/admin/currencies/${currencyId}`, {
            onSuccess: () => {
                setDeleteCurrencyId(null);
            },
        });
    };

    const handlePageChange = (page: number) => {
        router.get('/admin/currencies', { page }, { preserveState: true });
    };

    const columns: ColumnDef<Currency>[] = [
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
            accessorKey: 'code',
            header: 'Kod',
            cell: ({ row }) => (
                <span className="font-mono text-sm">{row.getValue('code')}</span>
            ),
        },
        {
            accessorKey: 'symbol',
            header: 'Sembol',
            cell: ({ row }) => (
                <span className="text-sm">{row.getValue('symbol')}</span>
            ),
        },
        {
            accessorKey: 'exchange_rate',
            header: 'Kur',
            cell: ({ row }) => (
                <span className="text-sm">
                    {Number(row.getValue('exchange_rate')).toFixed(4)}
                </span>
            ),
        },
        {
            accessorKey: 'is_default',
            header: 'Varsayılan',
            cell: ({ row }) => {
                const isDefault = row.getValue('is_default') as boolean;
                return isDefault ? (
                    <span className="rounded bg-blue-100 px-2 py-1 text-xs text-blue-800 dark:bg-blue-900 dark:text-blue-200">
                        Varsayılan
                    </span>
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
                const currency = row.original;

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
                                        `/admin/currencies/${currency.id}`,
                                    )
                                }
                            >
                                <Eye className="mr-2 h-4 w-4" />
                                Görüntüle
                            </DropdownMenuItem>
                            <DropdownMenuItem
                                onClick={() =>
                                    router.visit(
                                        `/admin/currencies/${currency.id}/edit`,
                                    )
                                }
                            >
                                Düzenle
                            </DropdownMenuItem>
                            <DropdownMenuSeparator />
                            <DropdownMenuItem
                                onClick={() =>
                                    setDeleteCurrencyId(currency.id)
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
            <Head title="Para Birimleri" />

            <div className="flex-1 space-y-6 p-6">
                <div className="flex items-center justify-between">
                    <div>
                        <h1 className="text-3xl font-bold tracking-tight">
                            Para Birimleri
                        </h1>
                        <p className="mt-1 text-muted-foreground">
                            Para birimlerini yönetin
                        </p>
                    </div>
                    <Link href="/admin/currencies/create">
                        <Button>
                            <Plus className="mr-2 h-4 w-4" />
                            Yeni Para Birimi
                        </Button>
                    </Link>
                </div>

                <div className="rounded-md border">
                    <DataTable
                        columns={columns}
                        data={currencies.data}
                        pagination={{
                            currentPage: currencies.current_page,
                            lastPage: currencies.last_page,
                            perPage: currencies.per_page,
                            total: currencies.total,
                            from: currencies.from,
                            to: currencies.to,
                            links: currencies.links,
                        }}
                        onPageChange={handlePageChange}
                    />
                </div>

                <Dialog
                    open={deleteCurrencyId !== null}
                    onOpenChange={(open) =>
                        setDeleteCurrencyId(open ? deleteCurrencyId : null)
                    }
                >
                    <DialogContent>
                        <DialogHeader>
                            <DialogTitle>Para Birimini Sil</DialogTitle>
                            <DialogDescription>
                                Bu para birimini silmek istediğinizden emin
                                misiniz? Bu işlem geri alınamaz.
                            </DialogDescription>
                        </DialogHeader>
                        <DialogFooter>
                            <Button
                                variant="outline"
                                onClick={() => setDeleteCurrencyId(null)}
                            >
                                İptal
                            </Button>
                            <Button
                                variant="destructive"
                                onClick={() =>
                                    deleteCurrencyId &&
                                    handleDelete(deleteCurrencyId)
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

