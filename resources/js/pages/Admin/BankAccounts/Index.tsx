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
        title: 'Banka Hesapları',
        href: '/admin/bank-accounts',
    },
];

interface BankAccount {
    id: number;
    bank_name: string;
    account_holder: string;
    account_number: string;
    currency: string;
    is_active: boolean;
}

interface Props {
    bankAccounts: PaginatedResponse<BankAccount>;
}

export default function BankAccountsIndex({ bankAccounts }: Props) {
    const [deleteBankAccountId, setDeleteBankAccountId] = useState<
        number | null
    >(null);

    const handleDelete = (bankAccountId: number) => {
        router.delete(`/admin/bank-accounts/${bankAccountId}`, {
            onSuccess: () => {
                setDeleteBankAccountId(null);
            },
        });
    };

    const handlePageChange = (page: number) => {
        router.get('/admin/bank-accounts', { page }, { preserveState: true });
    };

    const columns: ColumnDef<BankAccount>[] = [
        {
            accessorKey: 'bank_name',
            header: ({ column }) => {
                return (
                    <Button
                        variant="ghost"
                        onClick={() =>
                            column.toggleSorting(column.getIsSorted() === 'asc')
                        }
                    >
                        Banka Adı
                        <ArrowUpDown className="ml-2 h-4 w-4" />
                    </Button>
                );
            },
            cell: ({ row }) => (
                <div className="font-medium">{row.getValue('bank_name')}</div>
            ),
        },
        {
            accessorKey: 'account_holder',
            header: 'Hesap Sahibi',
            cell: ({ row }) => (
                <span className="text-sm">{row.getValue('account_holder')}</span>
            ),
        },
        {
            accessorKey: 'account_number',
            header: 'Hesap No',
            cell: ({ row }) => (
                <span className="font-mono text-sm">
                    {row.getValue('account_number')}
                </span>
            ),
        },
        {
            accessorKey: 'currency',
            header: 'Para Birimi',
            cell: ({ row }) => (
                <span className="text-sm">{row.getValue('currency')}</span>
            ),
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
                const bankAccount = row.original;

                return (
                    <div className="flex items-center gap-2">
                        <Button
                            variant="ghost"
                            size="icon"
                            className="h-8 w-8"
                            onClick={() =>
                                router.visit(
                                    `/admin/bank-accounts/${bankAccount.id}`,
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
                                    `/admin/bank-accounts/${bankAccount.id}/edit`,
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
                                setDeleteBankAccountId(bankAccount.id)
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
            <Head title="Banka Hesapları" />

            <div className="flex-1 space-y-6 p-6">
                <div className="flex items-center justify-between">
                    <div>
                        <h1 className="text-3xl font-bold tracking-tight">
                            Banka Hesapları
                        </h1>
                        <p className="mt-1 text-muted-foreground">
                            Banka hesaplarını yönetin
                        </p>
                    </div>
                    <Link href="/admin/bank-accounts/create">
                        <Button>
                            <Plus className="mr-2 h-4 w-4" />
                            Yeni Banka Hesabı
                        </Button>
                    </Link>
                </div>

                <div className="rounded-md border">
                    <DataTable
                        columns={columns}
                        data={bankAccounts.data}
                        pagination={{
                            currentPage: bankAccounts.current_page,
                            lastPage: bankAccounts.last_page,
                            perPage: bankAccounts.per_page,
                            total: bankAccounts.total,
                            from: bankAccounts.from,
                            to: bankAccounts.to,
                            links: bankAccounts.links,
                        }}
                        onPageChange={handlePageChange}
                    />
                </div>

                <Dialog
                    open={deleteBankAccountId !== null}
                    onOpenChange={(open) =>
                        setDeleteBankAccountId(
                            open ? deleteBankAccountId : null,
                        )
                    }
                >
                    <DialogContent>
                        <DialogHeader>
                            <DialogTitle>Banka Hesabını Sil</DialogTitle>
                            <DialogDescription>
                                Bu banka hesabını silmek istediğinizden emin
                                misiniz? Bu işlem geri alınamaz.
                            </DialogDescription>
                        </DialogHeader>
                        <DialogFooter>
                            <Button
                                variant="outline"
                                onClick={() => setDeleteBankAccountId(null)}
                            >
                                İptal
                            </Button>
                            <Button
                                variant="destructive"
                                onClick={() =>
                                    deleteBankAccountId &&
                                    handleDelete(deleteBankAccountId)
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

