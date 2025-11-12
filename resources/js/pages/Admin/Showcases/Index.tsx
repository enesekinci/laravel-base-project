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
        title: 'Vitrinler',
        href: '/admin/showcases',
    },
];

interface Showcase {
    id: number;
    title: string;
    type: string;
    sort_order: number;
    is_active: boolean;
}

interface Props {
    showcases: PaginatedResponse<Showcase>;
}

const typeLabels: Record<string, string> = {
    product: 'Ürün',
    category: 'Kategori',
    custom: 'Özel',
};

export default function ShowcasesIndex({ showcases }: Props) {
    const [deleteShowcaseId, setDeleteShowcaseId] = useState<number | null>(
        null,
    );

    const handleDelete = (showcaseId: number) => {
        router.delete(`/admin/showcases/${showcaseId}`, {
            onSuccess: () => {
                setDeleteShowcaseId(null);
            },
        });
    };

    const handlePageChange = (page: number) => {
        router.get('/admin/showcases', { page }, { preserveState: true });
    };

    const columns: ColumnDef<Showcase>[] = [
        {
            accessorKey: 'title',
            header: ({ column }) => {
                return (
                    <Button
                        variant="ghost"
                        onClick={() =>
                            column.toggleSorting(column.getIsSorted() === 'asc')
                        }
                    >
                        Başlık
                        <ArrowUpDown className="ml-2 h-4 w-4" />
                    </Button>
                );
            },
            cell: ({ row }) => (
                <div className="font-medium">{row.getValue('title')}</div>
            ),
        },
        {
            accessorKey: 'type',
            header: 'Tip',
            cell: ({ row }) => {
                const type = row.getValue('type') as string;
                return (
                    <span className="rounded bg-blue-100 px-2 py-1 text-xs text-blue-800 dark:bg-blue-900 dark:text-blue-200">
                        {typeLabels[type] || type}
                    </span>
                );
            },
        },
        {
            accessorKey: 'sort_order',
            header: 'Sıra',
            cell: ({ row }) => (
                <span className="text-sm">{row.getValue('sort_order')}</span>
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
                const showcase = row.original;

                return (
                    <div className="flex items-center gap-2">
                        <Button
                            variant="ghost"
                            size="icon"
                            className="h-8 w-8"
                            onClick={() =>
                                router.visit(`/admin/showcases/${showcase.id}`)
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
                                    `/admin/showcases/${showcase.id}/edit`,
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
                            onClick={() => setDeleteShowcaseId(showcase.id)}
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
            <Head title="Vitrinler" />

            <div className="flex-1 space-y-6 p-6">
                <div className="flex items-center justify-between">
                    <div>
                        <h1 className="text-3xl font-bold tracking-tight">
                            Vitrinler
                        </h1>
                        <p className="mt-1 text-muted-foreground">
                            Vitrinleri yönetin
                        </p>
                    </div>
                    <Link href="/admin/showcases/create">
                        <Button>
                            <Plus className="mr-2 h-4 w-4" />
                            Yeni Vitrin
                        </Button>
                    </Link>
                </div>

                <div className="rounded-md border">
                    <DataTable
                        columns={columns}
                        data={showcases.data}
                        pagination={{
                            currentPage: showcases.current_page,
                            lastPage: showcases.last_page,
                            perPage: showcases.per_page,
                            total: showcases.total,
                            from: showcases.from,
                            to: showcases.to,
                            links: showcases.links,
                        }}
                        onPageChange={handlePageChange}
                    />
                </div>

                <Dialog
                    open={deleteShowcaseId !== null}
                    onOpenChange={(open) =>
                        setDeleteShowcaseId(open ? deleteShowcaseId : null)
                    }
                >
                    <DialogContent>
                        <DialogHeader>
                            <DialogTitle>Vitrini Sil</DialogTitle>
                            <DialogDescription>
                                Bu vitrini silmek istediğinizden emin misiniz? Bu
                                işlem geri alınamaz.
                            </DialogDescription>
                        </DialogHeader>
                        <DialogFooter>
                            <Button
                                variant="outline"
                                onClick={() => setDeleteShowcaseId(null)}
                            >
                                İptal
                            </Button>
                            <Button
                                variant="destructive"
                                onClick={() =>
                                    deleteShowcaseId &&
                                    handleDelete(deleteShowcaseId)
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

