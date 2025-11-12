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
import { destroy, show } from '@/routes/admin/variations';
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
        title: 'Varyasyonlar',
        href: '/admin/variations',
    },
];

interface VariationValue {
    id: number;
    label: string;
    value?: string;
    color?: string;
    image?: string;
    sort_order: number;
}

interface Variation {
    id: number;
    name: string;
    type: 'text' | 'color' | 'image';
    values?: VariationValue[];
}

interface Props {
    variations: PaginatedResponse<Variation>;
}

export default function VariationsIndex({ variations }: Props) {
    const [deleteVariationId, setDeleteVariationId] = useState<number | null>(
        null,
    );

    const handleDelete = (variationId: number) => {
        router.delete(destroy(variationId).url, {
            onSuccess: () => {
                setDeleteVariationId(null);
            },
        });
    };

    const handlePageChange = (page: number) => {
        router.get('/admin/variations', { page }, { preserveState: true });
    };

    const typeLabels: Record<string, string> = {
        text: 'Metin',
        color: 'Renk',
        image: 'Resim',
    };

    const columns: ColumnDef<Variation>[] = [
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
            accessorKey: 'type',
            header: 'Type',
            cell: ({ row }) => {
                const type = row.getValue('type') as string;
                return (
                    <span className="rounded bg-muted px-2 py-1 text-xs capitalize">
                        {typeLabels[type] || type}
                    </span>
                );
            },
        },
        {
            accessorKey: 'values',
            header: 'Values',
            cell: ({ row }) => {
                const values = row.original.values || [];
                if (values.length === 0) {
                    return (
                        <span className="text-sm text-muted-foreground">
                            Henüz değer eklenmemiş
                        </span>
                    );
                }
                return (
                    <div className="flex flex-wrap gap-2">
                        {values.slice(0, 3).map((value) => (
                            <span
                                key={value.id}
                                className="rounded-md bg-muted px-2 py-1 text-xs text-muted-foreground"
                            >
                                {value.label}
                                {row.original.type === 'color' &&
                                    value.color && (
                                        <span
                                            className="ml-1 inline-block h-3 w-3 rounded-full border"
                                            style={{
                                                backgroundColor: value.color,
                                            }}
                                        />
                                    )}
                            </span>
                        ))}
                        {values.length > 3 && (
                            <span className="text-xs text-muted-foreground">
                                +{values.length - 3} daha
                            </span>
                        )}
                    </div>
                );
            },
        },
        {
            id: 'actions',
            enableHiding: false,
            cell: ({ row }) => {
                const variation = row.original;

                return (
                    <div className="flex items-center gap-2">
                        <Button
                            variant="ghost"
                            size="icon"
                            className="h-8 w-8"
                            onClick={() => router.visit(show(variation.id))}
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
                                    `/admin/variations/${variation.id}/edit`,
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
                                setDeleteVariationId(variation.id)
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
            <Head title="Varyasyonlar" />

            <div className="flex-1 space-y-6 p-6">
                <div className="flex items-center justify-between">
                    <div>
                        <h1 className="text-3xl font-bold tracking-tight">
                            Varyasyonlar
                        </h1>
                        <p className="mt-1 text-muted-foreground">
                            Ürün varyasyonlarını yönetin
                        </p>
                    </div>
                    <Link href="/admin/variations/create">
                        <Button>
                            <Plus className="mr-2 h-4 w-4" />
                            Yeni Varyasyon
                        </Button>
                    </Link>
                </div>

                <div className="rounded-md border">
                    <DataTable
                        columns={columns}
                        data={variations.data}
                        pagination={{
                            currentPage: variations.current_page,
                            lastPage: variations.last_page,
                            perPage: variations.per_page,
                            total: variations.total,
                            from: variations.from,
                            to: variations.to,
                            links: variations.links,
                        }}
                        onPageChange={handlePageChange}
                    />
                </div>

                <Dialog
                    open={deleteVariationId !== null}
                    onOpenChange={(open) =>
                        setDeleteVariationId(open ? deleteVariationId : null)
                    }
                >
                    <DialogContent>
                        <DialogHeader>
                            <DialogTitle>Varyasyonu Sil</DialogTitle>
                            <DialogDescription>
                                Bu varyasyonu silmek istediğinizden emin
                                misiniz? Bu işlem geri alınamaz.
                            </DialogDescription>
                        </DialogHeader>
                        <DialogFooter>
                            <Button
                                variant="outline"
                                onClick={() => setDeleteVariationId(null)}
                            >
                                İptal
                            </Button>
                            <Button
                                variant="destructive"
                                onClick={() =>
                                    deleteVariationId &&
                                    handleDelete(deleteVariationId)
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
