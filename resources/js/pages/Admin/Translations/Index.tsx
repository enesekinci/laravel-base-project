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
        title: 'Çeviriler',
        href: '/admin/translations',
    },
];

interface Translation {
    id: number;
    key: string;
    value: string;
    group: string;
    language?: {
        id: number;
        name: string;
        code: string;
    };
}

interface Props {
    translations: PaginatedResponse<Translation>;
}

export default function TranslationsIndex({ translations }: Props) {
    const [deleteTranslationId, setDeleteTranslationId] = useState<
        number | null
    >(null);

    const handleDelete = (translationId: number) => {
        router.delete(`/admin/translations/${translationId}`, {
            onSuccess: () => {
                setDeleteTranslationId(null);
            },
        });
    };

    const handlePageChange = (page: number) => {
        router.get('/admin/translations', { page }, { preserveState: true });
    };

    const columns: ColumnDef<Translation>[] = [
        {
            accessorKey: 'key',
            header: ({ column }) => {
                return (
                    <Button
                        variant="ghost"
                        onClick={() =>
                            column.toggleSorting(column.getIsSorted() === 'asc')
                        }
                    >
                        Anahtar
                        <ArrowUpDown className="ml-2 h-4 w-4" />
                    </Button>
                );
            },
            cell: ({ row }) => (
                <div className="font-medium font-mono text-sm">
                    {row.getValue('key')}
                </div>
            ),
        },
        {
            accessorKey: 'language',
            header: 'Dil',
            cell: ({ row }) => {
                const language = row.original.language;
                return language ? (
                    <span className="text-sm">
                        {language.name} ({language.code})
                    </span>
                ) : (
                    <span className="text-sm text-muted-foreground">-</span>
                );
            },
        },
        {
            accessorKey: 'group',
            header: 'Grup',
            cell: ({ row }) => (
                <span className="text-sm">{row.getValue('group')}</span>
            ),
        },
        {
            accessorKey: 'value',
            header: 'Değer',
            cell: ({ row }) => {
                const value = row.getValue('value') as string;
                return (
                    <span className="text-sm line-clamp-2">
                        {value.length > 100 ? value.substring(0, 100) + '...' : value}
                    </span>
                );
            },
        },
        {
            id: 'actions',
            enableHiding: false,
            cell: ({ row }) => {
                const translation = row.original;

                return (
                    <div className="flex items-center gap-2">
                        <Button
                            variant="ghost"
                            size="icon"
                            className="h-8 w-8"
                            onClick={() =>
                                router.visit(
                                    `/admin/translations/${translation.id}`,
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
                                    `/admin/translations/${translation.id}/edit`,
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
                                setDeleteTranslationId(translation.id)
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
            <Head title="Çeviriler" />

            <div className="flex-1 space-y-6 p-6">
                <div className="flex items-center justify-between">
                    <div>
                        <h1 className="text-3xl font-bold tracking-tight">
                            Çeviriler
                        </h1>
                        <p className="mt-1 text-muted-foreground">
                            Çevirileri yönetin
                        </p>
                    </div>
                    <Link href="/admin/translations/create">
                        <Button>
                            <Plus className="mr-2 h-4 w-4" />
                            Yeni Çeviri
                        </Button>
                    </Link>
                </div>

                <div className="rounded-md border">
                    <DataTable
                        columns={columns}
                        data={translations.data}
                        pagination={{
                            currentPage: translations.current_page,
                            lastPage: translations.last_page,
                            perPage: translations.per_page,
                            total: translations.total,
                            from: translations.from,
                            to: translations.to,
                            links: translations.links,
                        }}
                        onPageChange={handlePageChange}
                    />
                </div>

                <Dialog
                    open={deleteTranslationId !== null}
                    onOpenChange={(open) =>
                        setDeleteTranslationId(
                            open ? deleteTranslationId : null,
                        )
                    }
                >
                    <DialogContent>
                        <DialogHeader>
                            <DialogTitle>Çeviriyi Sil</DialogTitle>
                            <DialogDescription>
                                Bu çeviriyi silmek istediğinizden emin misiniz?
                                Bu işlem geri alınamaz.
                            </DialogDescription>
                        </DialogHeader>
                        <DialogFooter>
                            <Button
                                variant="outline"
                                onClick={() => setDeleteTranslationId(null)}
                            >
                                İptal
                            </Button>
                            <Button
                                variant="destructive"
                                onClick={() =>
                                    deleteTranslationId &&
                                    handleDelete(deleteTranslationId)
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

