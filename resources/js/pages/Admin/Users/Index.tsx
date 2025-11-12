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
        title: 'Kullanıcılar',
        href: '/admin/users',
    },
];

interface User {
    id: number;
    name: string;
    email: string;
    groups?: Array<{
        id: number;
        name: string;
    }>;
    created_at: string;
}

interface Props {
    users: PaginatedResponse<User>;
}

export default function UsersIndex({ users }: Props) {
    const [deleteUserId, setDeleteUserId] = useState<number | null>(null);

    const handleDelete = (userId: number) => {
        router.delete(`/admin/users/${userId}`, {
            onSuccess: () => {
                setDeleteUserId(null);
            },
        });
    };

    const handlePageChange = (page: number) => {
        router.get('/admin/users', { page }, { preserveState: true });
    };

    const columns: ColumnDef<User>[] = [
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
            accessorKey: 'email',
            header: 'E-posta',
            cell: ({ row }) => (
                <span className="text-sm">{row.getValue('email')}</span>
            ),
        },
        {
            accessorKey: 'groups',
            header: 'Gruplar',
            cell: ({ row }) => {
                const groups = row.original.groups || [];
                return groups.length > 0 ? (
                    <span className="text-sm">
                        {groups.map((g) => g.name).join(', ')}
                    </span>
                ) : (
                    <span className="text-sm text-muted-foreground">-</span>
                );
            },
        },
        {
            id: 'actions',
            enableHiding: false,
            cell: ({ row }) => {
                const user = row.original;

                return (
                    <div className="flex items-center gap-2">
                        <Button
                            variant="ghost"
                            size="icon"
                            className="h-8 w-8"
                            onClick={() =>
                                router.visit(`/admin/users/${user.id}`)
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
                                    `/admin/users/${user.id}/edit`,
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
                            onClick={() => setDeleteUserId(user.id)}
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
            <Head title="Kullanıcılar" />

            <div className="flex-1 space-y-6 p-6">
                <div className="flex items-center justify-between">
                    <div>
                        <h1 className="text-3xl font-bold tracking-tight">
                            Kullanıcılar
                        </h1>
                        <p className="mt-1 text-muted-foreground">
                            Admin kullanıcılarını yönetin
                        </p>
                    </div>
                    <Link href="/admin/users/create">
                        <Button>
                            <Plus className="mr-2 h-4 w-4" />
                            Yeni Kullanıcı
                        </Button>
                    </Link>
                </div>

                <div className="rounded-md border">
                    <DataTable
                        columns={columns}
                        data={users.data}
                        pagination={{
                            currentPage: users.current_page,
                            lastPage: users.last_page,
                            perPage: users.per_page,
                            total: users.total,
                            from: users.from,
                            to: users.to,
                            links: users.links,
                        }}
                        onPageChange={handlePageChange}
                    />
                </div>

                <Dialog
                    open={deleteUserId !== null}
                    onOpenChange={(open) =>
                        setDeleteUserId(open ? deleteUserId : null)
                    }
                >
                    <DialogContent>
                        <DialogHeader>
                            <DialogTitle>Kullanıcıyı Sil</DialogTitle>
                            <DialogDescription>
                                Bu kullanıcıyı silmek istediğinizden emin
                                misiniz? Bu işlem geri alınamaz.
                            </DialogDescription>
                        </DialogHeader>
                        <DialogFooter>
                            <Button
                                variant="outline"
                                onClick={() => setDeleteUserId(null)}
                            >
                                İptal
                            </Button>
                            <Button
                                variant="destructive"
                                onClick={() =>
                                    deleteUserId && handleDelete(deleteUserId)
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

