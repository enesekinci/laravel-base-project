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
        title: 'Menüler',
        href: '/admin/menus',
    },
];

interface Menu {
    id: number;
    name: string;
    location?: string;
    is_active: boolean;
}

interface Props {
    menus: PaginatedResponse<Menu>;
}

export default function MenusIndex({ menus }: Props) {
    const [deleteMenuId, setDeleteMenuId] = useState<number | null>(null);

    const handleDelete = (menuId: number) => {
        router.delete(`/admin/menus/${menuId}`, {
            onSuccess: () => {
                setDeleteMenuId(null);
            },
        });
    };

    const handlePageChange = (page: number) => {
        router.get('/admin/menus', { page }, { preserveState: true });
    };

    const columns: ColumnDef<Menu>[] = [
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
            accessorKey: 'location',
            header: 'Konum',
            cell: ({ row }) => {
                const location = row.getValue('location') as string | undefined;
                return location ? (
                    <span className="text-sm">{location}</span>
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
                const menu = row.original;

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
                                    router.visit(`/admin/menus/${menu.id}`)
                                }
                            >
                                <Eye className="mr-2 h-4 w-4" />
                                Görüntüle
                            </DropdownMenuItem>
                            <DropdownMenuItem
                                onClick={() =>
                                    router.visit(`/admin/menus/${menu.id}/edit`)
                                }
                            >
                                Düzenle
                            </DropdownMenuItem>
                            <DropdownMenuSeparator />
                            <DropdownMenuItem
                                onClick={() => setDeleteMenuId(menu.id)}
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
            <Head title="Menüler" />

            <div className="flex-1 space-y-6 p-6">
                <div className="flex items-center justify-between">
                    <div>
                        <h1 className="text-3xl font-bold tracking-tight">
                            Menüler
                        </h1>
                        <p className="mt-1 text-muted-foreground">
                            Menüleri yönetin
                        </p>
                    </div>
                    <Link href="/admin/menus/create">
                        <Button>
                            <Plus className="mr-2 h-4 w-4" />
                            Yeni Menü
                        </Button>
                    </Link>
                </div>

                <div className="rounded-md border">
                    <DataTable
                        columns={columns}
                        data={menus.data}
                        pagination={{
                            currentPage: menus.current_page,
                            lastPage: menus.last_page,
                            perPage: menus.per_page,
                            total: menus.total,
                            from: menus.from,
                            to: menus.to,
                            links: menus.links,
                        }}
                        onPageChange={handlePageChange}
                    />
                </div>

                <Dialog
                    open={deleteMenuId !== null}
                    onOpenChange={(open) =>
                        setDeleteMenuId(open ? deleteMenuId : null)
                    }
                >
                    <DialogContent>
                        <DialogHeader>
                            <DialogTitle>Menüyü Sil</DialogTitle>
                            <DialogDescription>
                                Bu menüyü silmek istediğinizden emin misiniz? Bu
                                işlem geri alınamaz.
                            </DialogDescription>
                        </DialogHeader>
                        <DialogFooter>
                            <Button
                                variant="outline"
                                onClick={() => setDeleteMenuId(null)}
                            >
                                İptal
                            </Button>
                            <Button
                                variant="destructive"
                                onClick={() =>
                                    deleteMenuId && handleDelete(deleteMenuId)
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

