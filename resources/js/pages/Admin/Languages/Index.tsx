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
        title: 'Diller',
        href: '/admin/languages',
    },
];

interface Language {
    id: number;
    name: string;
    code: string;
    native_name?: string;
    is_active: boolean;
    is_default: boolean;
}

interface Props {
    languages: PaginatedResponse<Language>;
}

export default function LanguagesIndex({ languages }: Props) {
    const [deleteLanguageId, setDeleteLanguageId] = useState<number | null>(
        null,
    );

    const handleDelete = (languageId: number) => {
        router.delete(`/admin/languages/${languageId}`, {
            onSuccess: () => {
                setDeleteLanguageId(null);
            },
        });
    };

    const handlePageChange = (page: number) => {
        router.get('/admin/languages', { page }, { preserveState: true });
    };

    const columns: ColumnDef<Language>[] = [
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
            accessorKey: 'native_name',
            header: 'Yerel Ad',
            cell: ({ row }) => {
                const nativeName = row.getValue('native_name') as
                    | string
                    | undefined;
                return nativeName ? (
                    <span className="text-sm">{nativeName}</span>
                ) : (
                    <span className="text-sm text-muted-foreground">-</span>
                );
            },
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
                const language = row.original;

                return (
                    <div className="flex items-center gap-2">
                        <Button
                            variant="ghost"
                            size="icon"
                            className="h-8 w-8"
                            onClick={() =>
                                router.visit(
                                    `/admin/languages/${language.id}`,
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
                                    `/admin/languages/${language.id}/edit`,
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
                                setDeleteLanguageId(language.id)
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
            <Head title="Diller" />

            <div className="flex-1 space-y-6 p-6">
                <div className="flex items-center justify-between">
                    <div>
                        <h1 className="text-3xl font-bold tracking-tight">
                            Diller
                        </h1>
                        <p className="mt-1 text-muted-foreground">
                            Dilleri yönetin
                        </p>
                    </div>
                    <Link href="/admin/languages/create">
                        <Button>
                            <Plus className="mr-2 h-4 w-4" />
                            Yeni Dil
                        </Button>
                    </Link>
                </div>

                <div className="rounded-md border">
                    <DataTable
                        columns={columns}
                        data={languages.data}
                        pagination={{
                            currentPage: languages.current_page,
                            lastPage: languages.last_page,
                            perPage: languages.per_page,
                            total: languages.total,
                            from: languages.from,
                            to: languages.to,
                            links: languages.links,
                        }}
                        onPageChange={handlePageChange}
                    />
                </div>

                <Dialog
                    open={deleteLanguageId !== null}
                    onOpenChange={(open) =>
                        setDeleteLanguageId(open ? deleteLanguageId : null)
                    }
                >
                    <DialogContent>
                        <DialogHeader>
                            <DialogTitle>Dili Sil</DialogTitle>
                            <DialogDescription>
                                Bu dili silmek istediğinizden emin misiniz? Bu
                                işlem geri alınamaz.
                            </DialogDescription>
                        </DialogHeader>
                        <DialogFooter>
                            <Button
                                variant="outline"
                                onClick={() => setDeleteLanguageId(null)}
                            >
                                İptal
                            </Button>
                            <Button
                                variant="destructive"
                                onClick={() =>
                                    deleteLanguageId &&
                                    handleDelete(deleteLanguageId)
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

