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
import { destroy, show } from '@/routes/admin/attribute-sets';
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
        title: 'Özellik Setleri',
        href: '/admin/attribute-sets',
    },
];

interface AttributeSet {
    id: number;
    name: string;
    slug?: string;
    sort_order: number;
    is_active: boolean;
    attributes_count?: number;
}

interface Props {
    attributeSets: PaginatedResponse<AttributeSet>;
}

export default function AttributeSetsIndex({ attributeSets }: Props) {
    const [deleteAttributeSetId, setDeleteAttributeSetId] = useState<
        number | null
    >(null);

    const handleDelete = (attributeSetId: number) => {
        router.delete(destroy(attributeSetId).url, {
            onSuccess: () => {
                setDeleteAttributeSetId(null);
            },
        });
    };

    const handlePageChange = (page: number) => {
        router.get(
            '/admin/attribute-sets',
            { page },
            {
                preserveState: true,
            },
        );
    };

    const columns: ColumnDef<AttributeSet>[] = [
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
            cell: ({ row }) => (
                <div className="font-medium">{row.getValue('name')}</div>
            ),
        },
        {
            accessorKey: 'slug',
            header: 'Slug',
            cell: ({ row }) => {
                const slug = row.getValue('slug') as string | undefined;
                return slug ? (
                    <span className="font-mono text-sm text-muted-foreground">
                        {slug}
                    </span>
                ) : (
                    <span className="text-sm text-muted-foreground">-</span>
                );
            },
        },
        {
            accessorKey: 'attributes_count',
            header: 'Özellik Sayısı',
            cell: ({ row }) => {
                const count = row.getValue('attributes_count') as
                    | number
                    | undefined;
                return (
                    <span className="text-sm text-muted-foreground">
                        {count ?? 0} özellik
                    </span>
                );
            },
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
                    <span className="rounded bg-red-100 px-2 py-1 text-xs text-red-800 dark:bg-red-900 dark:text-red-200">
                        Pasif
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
            id: 'actions',
            enableHiding: false,
            cell: ({ row }) => {
                const attributeSet = row.original;

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
                                    router.visit(show(attributeSet.id))
                                }
                            >
                                <Eye className="mr-2 h-4 w-4" />
                                Görüntüle
                            </DropdownMenuItem>
                            <DropdownMenuItem
                                onClick={() =>
                                    router.visit(
                                        `/admin/attribute-sets/${attributeSet.id}/edit`,
                                    )
                                }
                            >
                                Düzenle
                            </DropdownMenuItem>
                            <DropdownMenuSeparator />
                            <DropdownMenuItem
                                onClick={() =>
                                    setDeleteAttributeSetId(attributeSet.id)
                                }
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
            <Head title="Özellik Setleri" />

            <div className="flex-1 space-y-6 p-6">
                <div className="flex items-center justify-between">
                    <div>
                        <h1 className="text-3xl font-bold tracking-tight">
                            Özellik Setleri
                        </h1>
                        <p className="mt-1 text-muted-foreground">
                            Özellik setlerini yönetin
                        </p>
                    </div>
                    <Link href="/admin/attribute-sets/create">
                        <Button>
                            <Plus className="mr-2 h-4 w-4" />
                            Yeni Özellik Seti
                        </Button>
                    </Link>
                </div>

                <div className="rounded-md border">
                    <DataTable
                        columns={columns}
                        data={attributeSets.data}
                        pagination={{
                            currentPage: attributeSets.current_page,
                            lastPage: attributeSets.last_page,
                            perPage: attributeSets.per_page,
                            total: attributeSets.total,
                            from: attributeSets.from,
                            to: attributeSets.to,
                            links: attributeSets.links,
                        }}
                        onPageChange={handlePageChange}
                    />
                </div>

                <Dialog
                    open={deleteAttributeSetId !== null}
                    onOpenChange={(open) =>
                        setDeleteAttributeSetId(
                            open ? deleteAttributeSetId : null,
                        )
                    }
                >
                    <DialogContent>
                        <DialogHeader>
                            <DialogTitle>Özellik Setini Sil</DialogTitle>
                            <DialogDescription>
                                Bu özellik setini silmek istediğinizden emin
                                misiniz? Bu işlem geri alınamaz.
                            </DialogDescription>
                        </DialogHeader>
                        <DialogFooter>
                            <Button
                                variant="outline"
                                onClick={() => setDeleteAttributeSetId(null)}
                            >
                                İptal
                            </Button>
                            <Button
                                variant="destructive"
                                onClick={() =>
                                    deleteAttributeSetId &&
                                    handleDelete(deleteAttributeSetId)
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
