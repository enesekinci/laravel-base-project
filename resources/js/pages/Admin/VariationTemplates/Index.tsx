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
import { destroy, show } from '@/routes/admin/variation-templates';
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
        title: 'Varyasyon Şablonları',
        href: '/admin/variation-templates',
    },
];

interface VariationTemplateValue {
    id: number;
    label: string;
    value?: string;
    color?: string;
    image?: string;
    sort_order: number;
}

interface VariationTemplate {
    id: number;
    name: string;
    type: 'text' | 'color' | 'image';
    sort_order: number;
    is_active: boolean;
    values?: VariationTemplateValue[];
}

interface Props {
    templates: PaginatedResponse<VariationTemplate>;
}

const typeLabels: Record<string, string> = {
    text: 'Metin',
    color: 'Renk',
    image: 'Resim',
};

export default function VariationTemplatesIndex({ templates }: Props) {
    const [deleteTemplateId, setDeleteTemplateId] = useState<number | null>(
        null,
    );

    const handleDelete = (templateId: number) => {
        router.delete(destroy(templateId).url, {
            onSuccess: () => {
                setDeleteTemplateId(null);
            },
        });
    };

    const handlePageChange = (page: number) => {
        router.get(
            '/admin/variation-templates',
            { page },
            {
                preserveState: true,
            },
        );
    };

    const columns: ColumnDef<VariationTemplate>[] = [
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
                    <span className="rounded bg-muted px-2 py-1 text-xs">
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
                return (
                    <span className="text-sm text-muted-foreground">
                        {values.length} değer
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
            id: 'actions',
            enableHiding: false,
            cell: ({ row }) => {
                const template = row.original;

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
                                onClick={() => router.visit(show(template.id))}
                            >
                                <Eye className="mr-2 h-4 w-4" />
                                Görüntüle
                            </DropdownMenuItem>
                            <DropdownMenuItem
                                onClick={() =>
                                    router.visit(
                                        `/admin/variation-templates/${template.id}/edit`,
                                    )
                                }
                            >
                                Düzenle
                            </DropdownMenuItem>
                            <DropdownMenuSeparator />
                            <DropdownMenuItem
                                onClick={() => setDeleteTemplateId(template.id)}
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
            <Head title="Varyasyon Şablonları" />

            <div className="flex-1 space-y-6 p-6">
                <div className="flex items-center justify-between">
                    <div>
                        <h1 className="text-3xl font-bold tracking-tight">
                            Varyasyon Şablonları
                        </h1>
                        <p className="mt-1 text-muted-foreground">
                            Ürün varyasyon şablonlarını yönetin (Renk, Beden,
                            vb.)
                        </p>
                    </div>
                    <Link href="/admin/variation-templates/create">
                        <Button>
                            <Plus className="mr-2 h-4 w-4" />
                            Yeni Şablon
                        </Button>
                    </Link>
                </div>

                <div className="rounded-md border">
                    <DataTable
                        columns={columns}
                        data={templates.data}
                        pagination={{
                            currentPage: templates.current_page,
                            lastPage: templates.last_page,
                            perPage: templates.per_page,
                            total: templates.total,
                            from: templates.from,
                            to: templates.to,
                            links: templates.links,
                        }}
                        onPageChange={handlePageChange}
                    />
                </div>

                <Dialog
                    open={deleteTemplateId !== null}
                    onOpenChange={(open) =>
                        setDeleteTemplateId(open ? deleteTemplateId : null)
                    }
                >
                    <DialogContent>
                        <DialogHeader>
                            <DialogTitle>Şablonu Sil</DialogTitle>
                            <DialogDescription>
                                Bu şablonu silmek istediğinizden emin misiniz?
                                Bu işlem geri alınamaz.
                            </DialogDescription>
                        </DialogHeader>
                        <DialogFooter>
                            <Button
                                variant="outline"
                                onClick={() => setDeleteTemplateId(null)}
                            >
                                İptal
                            </Button>
                            <Button
                                variant="destructive"
                                onClick={() =>
                                    deleteTemplateId &&
                                    handleDelete(deleteTemplateId)
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
