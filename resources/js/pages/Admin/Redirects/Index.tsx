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
        title: 'Yönlendirmeler',
        href: '/admin/redirects',
    },
];

interface Redirect {
    id: number;
    from: string;
    to: string;
    type: '301' | '302';
    is_active: boolean;
}

interface Props {
    redirects: PaginatedResponse<Redirect>;
}

export default function RedirectsIndex({ redirects }: Props) {
    const [deleteRedirectId, setDeleteRedirectId] = useState<number | null>(
        null,
    );

    const handleDelete = (redirectId: number) => {
        router.delete(`/admin/redirects/${redirectId}`, {
            onSuccess: () => {
                setDeleteRedirectId(null);
            },
        });
    };

    const handlePageChange = (page: number) => {
        router.get('/admin/redirects', { page }, { preserveState: true });
    };

    const columns: ColumnDef<Redirect>[] = [
        {
            accessorKey: 'from',
            header: ({ column }) => {
                return (
                    <Button
                        variant="ghost"
                        onClick={() =>
                            column.toggleSorting(column.getIsSorted() === 'asc')
                        }
                    >
                        Kaynak
                        <ArrowUpDown className="ml-2 h-4 w-4" />
                    </Button>
                );
            },
            cell: ({ row }) => (
                <div className="font-medium font-mono text-sm">
                    {row.getValue('from')}
                </div>
            ),
        },
        {
            accessorKey: 'to',
            header: 'Hedef',
            cell: ({ row }) => (
                <span className="font-mono text-sm">{row.getValue('to')}</span>
            ),
        },
        {
            accessorKey: 'type',
            header: 'Tip',
            cell: ({ row }) => {
                const type = row.getValue('type') as string;
                return (
                    <span className="rounded bg-blue-100 px-2 py-1 text-xs text-blue-800 dark:bg-blue-900 dark:text-blue-200">
                        {type}
                    </span>
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
                const redirect = row.original;

                return (
                    <div className="flex items-center gap-2">
                        <Button
                            variant="ghost"
                            size="icon"
                            className="h-8 w-8"
                            onClick={() =>
                                router.visit(`/admin/redirects/${redirect.id}`)
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
                                    `/admin/redirects/${redirect.id}/edit`,
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
                            onClick={() => setDeleteRedirectId(redirect.id)}
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
            <Head title="Yönlendirmeler" />

            <div className="flex-1 space-y-6 p-6">
                <div className="flex items-center justify-between">
                    <div>
                        <h1 className="text-3xl font-bold tracking-tight">
                            Yönlendirmeler
                        </h1>
                        <p className="mt-1 text-muted-foreground">
                            URL yönlendirmelerini yönetin
                        </p>
                    </div>
                    <Link href="/admin/redirects/create">
                        <Button>
                            <Plus className="mr-2 h-4 w-4" />
                            Yeni Yönlendirme
                        </Button>
                    </Link>
                </div>

                <div className="rounded-md border">
                    <DataTable
                        columns={columns}
                        data={redirects.data}
                        pagination={{
                            currentPage: redirects.current_page,
                            lastPage: redirects.last_page,
                            perPage: redirects.per_page,
                            total: redirects.total,
                            from: redirects.from,
                            to: redirects.to,
                            links: redirects.links,
                        }}
                        onPageChange={handlePageChange}
                    />
                </div>

                <Dialog
                    open={deleteRedirectId !== null}
                    onOpenChange={(open) =>
                        setDeleteRedirectId(open ? deleteRedirectId : null)
                    }
                >
                    <DialogContent>
                        <DialogHeader>
                            <DialogTitle>Yönlendirmeyi Sil</DialogTitle>
                            <DialogDescription>
                                Bu yönlendirmeyi silmek istediğinizden emin
                                misiniz? Bu işlem geri alınamaz.
                            </DialogDescription>
                        </DialogHeader>
                        <DialogFooter>
                            <Button
                                variant="outline"
                                onClick={() => setDeleteRedirectId(null)}
                            >
                                İptal
                            </Button>
                            <Button
                                variant="destructive"
                                onClick={() =>
                                    deleteRedirectId &&
                                    handleDelete(deleteRedirectId)
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

