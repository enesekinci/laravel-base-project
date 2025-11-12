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
        title: 'Bannerlar',
        href: '/admin/banners',
    },
];

interface Banner {
    id: number;
    title: string;
    position?: string;
    sort_order: number;
    is_active: boolean;
}

interface Props {
    banners: PaginatedResponse<Banner>;
}

export default function BannersIndex({ banners }: Props) {
    const [deleteBannerId, setDeleteBannerId] = useState<number | null>(null);

    const handleDelete = (bannerId: number) => {
        router.delete(`/admin/banners/${bannerId}`, {
            onSuccess: () => {
                setDeleteBannerId(null);
            },
        });
    };

    const handlePageChange = (page: number) => {
        router.get('/admin/banners', { page }, { preserveState: true });
    };

    const columns: ColumnDef<Banner>[] = [
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
            accessorKey: 'position',
            header: 'Pozisyon',
            cell: ({ row }) => {
                const position = row.getValue('position') as string | undefined;
                return position ? (
                    <span className="text-sm">{position}</span>
                ) : (
                    <span className="text-sm text-muted-foreground">-</span>
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
                const banner = row.original;

                return (
                    <div className="flex items-center gap-2">
                        <Button
                            variant="ghost"
                            size="icon"
                            className="h-8 w-8"
                            onClick={() =>
                                router.visit(`/admin/banners/${banner.id}`)
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
                                router.visit(`/admin/banners/${banner.id}/edit`)
                            }
                            title="Düzenle"
                        >
                            <Pencil className="h-4 w-4" />
                        </Button>
                        <Button
                            variant="ghost"
                            size="icon"
                            className="h-8 w-8 text-destructive hover:text-destructive"
                            onClick={() => setDeleteBannerId(banner.id)}
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
            <Head title="Bannerlar" />

            <div className="flex-1 space-y-6 p-6">
                <div className="flex items-center justify-between">
                    <div>
                        <h1 className="text-3xl font-bold tracking-tight">
                            Bannerlar
                        </h1>
                        <p className="mt-1 text-muted-foreground">
                            Bannerları yönetin
                        </p>
                    </div>
                    <Link href="/admin/banners/create">
                        <Button>
                            <Plus className="mr-2 h-4 w-4" />
                            Yeni Banner
                        </Button>
                    </Link>
                </div>

                <div className="rounded-md border">
                    <DataTable
                        columns={columns}
                        data={banners.data}
                        pagination={{
                            currentPage: banners.current_page,
                            lastPage: banners.last_page,
                            perPage: banners.per_page,
                            total: banners.total,
                            from: banners.from,
                            to: banners.to,
                            links: banners.links,
                        }}
                        onPageChange={handlePageChange}
                    />
                </div>

                <Dialog
                    open={deleteBannerId !== null}
                    onOpenChange={(open) =>
                        setDeleteBannerId(open ? deleteBannerId : null)
                    }
                >
                    <DialogContent>
                        <DialogHeader>
                            <DialogTitle>Bannerı Sil</DialogTitle>
                            <DialogDescription>
                                Bu bannerı silmek istediğinizden emin misiniz? Bu
                                işlem geri alınamaz.
                            </DialogDescription>
                        </DialogHeader>
                        <DialogFooter>
                            <Button
                                variant="outline"
                                onClick={() => setDeleteBannerId(null)}
                            >
                                İptal
                            </Button>
                            <Button
                                variant="destructive"
                                onClick={() =>
                                    deleteBannerId && handleDelete(deleteBannerId)
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

