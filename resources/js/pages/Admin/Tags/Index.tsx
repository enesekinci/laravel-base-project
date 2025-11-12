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
import { destroy, show } from '@/routes/admin/tags';
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
        title: 'Etiketler',
        href: '/admin/tags',
    },
];

interface Tag {
    id: number;
    name: string;
    slug: string;
    color?: string;
    is_active: boolean;
}

interface Props {
    tags: PaginatedResponse<Tag>;
}

export default function TagsIndex({ tags }: Props) {
    const [deleteTagId, setDeleteTagId] = useState<number | null>(null);

    const handleDelete = (tagId: number) => {
        router.delete(destroy(tagId).url, {
            onSuccess: () => {
                setDeleteTagId(null);
            },
        });
    };

    const handlePageChange = (page: number) => {
        router.get('/admin/tags', { page }, { preserveState: true });
    };

    const columns: ColumnDef<Tag>[] = [
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
            cell: ({ row }) => {
                const tag = row.original;
                return (
                    <div className="flex items-center gap-2">
                        {tag.color && (
                            <div
                                className="h-4 w-4 rounded-full border"
                                style={{ backgroundColor: tag.color }}
                            />
                        )}
                        <span className="font-medium">{tag.name}</span>
                    </div>
                );
            },
        },
        {
            accessorKey: 'slug',
            header: 'Slug',
            cell: ({ row }) => (
                <span className="font-mono text-sm text-muted-foreground">
                    {row.getValue('slug')}
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
                const tag = row.original;

                return (
                    <div className="flex items-center gap-2">
                        <Button
                            variant="ghost"
                            size="icon"
                            className="h-8 w-8"
                            onClick={() => router.visit(show(tag.id))}
                            title="Görüntüle"
                        >
                            <Eye className="h-4 w-4" />
                        </Button>
                        <Button
                            variant="ghost"
                            size="icon"
                            className="h-8 w-8"
                            onClick={() =>
                                router.visit(`/admin/tags/${tag.id}/edit`)
                            }
                            title="Düzenle"
                        >
                            <Pencil className="h-4 w-4" />
                        </Button>
                        <Button
                            variant="ghost"
                            size="icon"
                            className="h-8 w-8 text-destructive hover:text-destructive"
                            onClick={() => setDeleteTagId(tag.id)}
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
            <Head title="Etiketler" />

            <div className="flex-1 space-y-6 p-6">
                <div className="flex items-center justify-between">
                    <div>
                        <h1 className="text-3xl font-bold tracking-tight">
                            Etiketler
                        </h1>
                        <p className="mt-1 text-muted-foreground">
                            Ürün etiketlerini yönetin
                        </p>
                    </div>
                    <Link href="/admin/tags/create">
                        <Button>
                            <Plus className="mr-2 h-4 w-4" />
                            Yeni Etiket
                        </Button>
                    </Link>
                </div>

                <div className="rounded-md border">
                    <DataTable
                        columns={columns}
                        data={tags.data}
                        pagination={{
                            currentPage: tags.current_page,
                            lastPage: tags.last_page,
                            perPage: tags.per_page,
                            total: tags.total,
                            from: tags.from,
                            to: tags.to,
                            links: tags.links,
                        }}
                        onPageChange={handlePageChange}
                    />
                </div>

                <Dialog
                    open={deleteTagId !== null}
                    onOpenChange={(open) =>
                        setDeleteTagId(open ? deleteTagId : null)
                    }
                >
                    <DialogContent>
                        <DialogHeader>
                            <DialogTitle>Etiketi Sil</DialogTitle>
                            <DialogDescription>
                                Bu etiketi silmek istediğinizden emin misiniz?
                                Bu işlem geri alınamaz.
                            </DialogDescription>
                        </DialogHeader>
                        <DialogFooter>
                            <Button
                                variant="outline"
                                onClick={() => setDeleteTagId(null)}
                            >
                                İptal
                            </Button>
                            <Button
                                variant="destructive"
                                onClick={() =>
                                    deleteTagId && handleDelete(deleteTagId)
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
