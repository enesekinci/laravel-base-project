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
import { destroy, show } from '@/routes/admin/attributes';
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
        title: 'Özellikler',
        href: '/admin/attributes',
    },
];

interface AttributeValue {
    id: number;
    value: string;
    slug?: string;
    color?: string;
    sort_order: number;
}

interface Attribute {
    id: number;
    name: string;
    is_filterable: boolean;
    is_required: boolean;
    sort_order: number;
    values?: AttributeValue[];
    attribute_set?: {
        id: number;
        name: string;
    };
    categories?: Array<{
        id: number;
        name: string;
    }>;
}

interface Props {
    attributes: PaginatedResponse<Attribute>;
}

export default function AttributesIndex({ attributes }: Props) {
    const [deleteAttributeId, setDeleteAttributeId] = useState<number | null>(
        null,
    );

    const handleDelete = (attributeId: number) => {
        router.delete(destroy(attributeId).url, {
            onSuccess: () => {
                setDeleteAttributeId(null);
            },
        });
    };

    const handlePageChange = (page: number) => {
        router.get('/admin/attributes', { page }, { preserveState: true });
    };

    const columns: ColumnDef<Attribute>[] = [
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
            accessorKey: 'attribute_set',
            header: 'Attribute Set',
            cell: ({ row }) => {
                const attributeSet = row.original.attribute_set;
                return attributeSet ? (
                    <span className="text-sm">{attributeSet.name}</span>
                ) : (
                    <span className="text-sm text-muted-foreground">-</span>
                );
            },
        },
        {
            accessorKey: 'is_filterable',
            header: 'Filterable',
            cell: ({ row }) => {
                const isFilterable = row.getValue('is_filterable') as boolean;
                return isFilterable ? (
                    <span className="rounded bg-blue-100 px-2 py-1 text-xs text-blue-800 dark:bg-blue-900 dark:text-blue-200">
                        Filterable
                    </span>
                ) : (
                    <span className="text-sm text-muted-foreground">-</span>
                );
            },
        },
        {
            accessorKey: 'values',
            header: 'Values',
            cell: ({ row }) => {
                const values = row.original.values || [];
                return (
                    <span className="text-sm text-muted-foreground">
                        {values.length} değer
                    </span>
                );
            },
        },
        {
            id: 'actions',
            enableHiding: false,
            cell: ({ row }) => {
                const attribute = row.original;

                return (
                    <div className="flex items-center gap-2">
                        <Button
                            variant="ghost"
                            size="icon"
                            className="h-8 w-8"
                            onClick={() => router.visit(show(attribute.id))}
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
                                    `/admin/attributes/${attribute.id}/edit`,
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
                                setDeleteAttributeId(attribute.id)
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
            <Head title="Özellikler" />

            <div className="flex-1 space-y-6 p-6">
                <div className="flex items-center justify-between">
                    <div>
                        <h1 className="text-3xl font-bold tracking-tight">
                            Özellikler
                        </h1>
                        <p className="mt-1 text-muted-foreground">
                            Ürün özelliklerini yönetin
                        </p>
                    </div>
                    <Link href="/admin/attributes/create">
                        <Button>
                            <Plus className="mr-2 h-4 w-4" />
                            Yeni Özellik
                        </Button>
                    </Link>
                </div>

                <div className="rounded-md border">
                    <DataTable
                        columns={columns}
                        data={attributes.data}
                        pagination={{
                            currentPage: attributes.current_page,
                            lastPage: attributes.last_page,
                            perPage: attributes.per_page,
                            total: attributes.total,
                            from: attributes.from,
                            to: attributes.to,
                            links: attributes.links,
                        }}
                        onPageChange={handlePageChange}
                    />
                </div>

                <Dialog
                    open={deleteAttributeId !== null}
                    onOpenChange={(open) =>
                        setDeleteAttributeId(open ? deleteAttributeId : null)
                    }
                >
                    <DialogContent>
                        <DialogHeader>
                            <DialogTitle>Özelliği Sil</DialogTitle>
                            <DialogDescription>
                                Bu özelliği silmek istediğinizden emin misiniz?
                                Bu işlem geri alınamaz.
                            </DialogDescription>
                        </DialogHeader>
                        <DialogFooter>
                            <Button
                                variant="outline"
                                onClick={() => setDeleteAttributeId(null)}
                            >
                                İptal
                            </Button>
                            <Button
                                variant="destructive"
                                onClick={() =>
                                    deleteAttributeId &&
                                    handleDelete(deleteAttributeId)
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
