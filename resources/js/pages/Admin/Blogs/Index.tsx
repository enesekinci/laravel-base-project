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
        title: 'Blog',
        href: '/admin/blogs',
    },
];

interface Blog {
    id: number;
    title: string;
    slug: string;
    status: 'draft' | 'published';
    author?: {
        id: number;
        name: string;
    };
    published_at?: string;
    created_at: string;
}

interface Props {
    blogs: PaginatedResponse<Blog>;
}

const statusLabels: Record<string, string> = {
    draft: 'Taslak',
    published: 'Yayınlandı',
};

export default function BlogsIndex({ blogs }: Props) {
    const [deleteBlogId, setDeleteBlogId] = useState<number | null>(null);

    const handleDelete = (blogId: number) => {
        router.delete(`/admin/blogs/${blogId}`, {
            onSuccess: () => {
                setDeleteBlogId(null);
            },
        });
    };

    const handlePageChange = (page: number) => {
        router.get('/admin/blogs', { page }, { preserveState: true });
    };

    const columns: ColumnDef<Blog>[] = [
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
            accessorKey: 'status',
            header: 'Durum',
            cell: ({ row }) => {
                const status = row.getValue('status') as string;
                return (
                    <span
                        className={`rounded px-2 py-1 text-xs ${
                            status === 'published'
                                ? 'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200'
                                : 'bg-gray-100 text-gray-800 dark:bg-gray-900 dark:text-gray-200'
                        }`}
                    >
                        {statusLabels[status] || status}
                    </span>
                );
            },
        },
        {
            accessorKey: 'author',
            header: 'Yazar',
            cell: ({ row }) => {
                const author = row.original.author;
                return author ? (
                    <span className="text-sm">{author.name}</span>
                ) : (
                    <span className="text-sm text-muted-foreground">-</span>
                );
            },
        },
        {
            id: 'actions',
            enableHiding: false,
            cell: ({ row }) => {
                const blog = row.original;

                return (
                    <div className="flex items-center gap-2">
                        <Button
                            variant="ghost"
                            size="icon"
                            className="h-8 w-8"
                            onClick={() =>
                                router.visit(`/admin/blogs/${blog.id}`)
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
                                router.visit(`/admin/blogs/${blog.id}/edit`)
                            }
                            title="Düzenle"
                        >
                            <Pencil className="h-4 w-4" />
                        </Button>
                        <Button
                            variant="ghost"
                            size="icon"
                            className="h-8 w-8 text-destructive hover:text-destructive"
                            onClick={() => setDeleteBlogId(blog.id)}
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
            <Head title="Blog" />

            <div className="flex-1 space-y-6 p-6">
                <div className="flex items-center justify-between">
                    <div>
                        <h1 className="text-3xl font-bold tracking-tight">
                            Blog
                        </h1>
                        <p className="mt-1 text-muted-foreground">
                            Blog yazılarını yönetin
                        </p>
                    </div>
                    <Link href="/admin/blogs/create">
                        <Button>
                            <Plus className="mr-2 h-4 w-4" />
                            Yeni Yazı
                        </Button>
                    </Link>
                </div>

                <div className="rounded-md border">
                    <DataTable
                        columns={columns}
                        data={blogs.data}
                        pagination={{
                            currentPage: blogs.current_page,
                            lastPage: blogs.last_page,
                            perPage: blogs.per_page,
                            total: blogs.total,
                            from: blogs.from,
                            to: blogs.to,
                            links: blogs.links,
                        }}
                        onPageChange={handlePageChange}
                    />
                </div>

                <Dialog
                    open={deleteBlogId !== null}
                    onOpenChange={(open) =>
                        setDeleteBlogId(open ? deleteBlogId : null)
                    }
                >
                    <DialogContent>
                        <DialogHeader>
                            <DialogTitle>Yazıyı Sil</DialogTitle>
                            <DialogDescription>
                                Bu yazıyı silmek istediğinizden emin misiniz? Bu
                                işlem geri alınamaz.
                            </DialogDescription>
                        </DialogHeader>
                        <DialogFooter>
                            <Button
                                variant="outline"
                                onClick={() => setDeleteBlogId(null)}
                            >
                                İptal
                            </Button>
                            <Button
                                variant="destructive"
                                onClick={() =>
                                    deleteBlogId && handleDelete(deleteBlogId)
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

