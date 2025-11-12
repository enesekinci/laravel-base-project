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
        title: 'SSS',
        href: '/admin/faqs',
    },
];

interface Faq {
    id: number;
    question: string;
    sort_order: number;
    is_active: boolean;
}

interface Props {
    faqs: PaginatedResponse<Faq>;
}

export default function FaqsIndex({ faqs }: Props) {
    const [deleteFaqId, setDeleteFaqId] = useState<number | null>(null);

    const handleDelete = (faqId: number) => {
        router.delete(`/admin/faqs/${faqId}`, {
            onSuccess: () => {
                setDeleteFaqId(null);
            },
        });
    };

    const handlePageChange = (page: number) => {
        router.get('/admin/faqs', { page }, { preserveState: true });
    };

    const columns: ColumnDef<Faq>[] = [
        {
            accessorKey: 'question',
            header: ({ column }) => {
                return (
                    <Button
                        variant="ghost"
                        onClick={() =>
                            column.toggleSorting(column.getIsSorted() === 'asc')
                        }
                    >
                        Soru
                        <ArrowUpDown className="ml-2 h-4 w-4" />
                    </Button>
                );
            },
            cell: ({ row }) => (
                <div className="font-medium">{row.getValue('question')}</div>
            ),
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
                const faq = row.original;

                return (
                    <div className="flex items-center gap-2">
                        <Button
                            variant="ghost"
                            size="icon"
                            className="h-8 w-8"
                            onClick={() =>
                                router.visit(`/admin/faqs/${faq.id}`)
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
                                router.visit(`/admin/faqs/${faq.id}/edit`)
                            }
                            title="Düzenle"
                        >
                            <Pencil className="h-4 w-4" />
                        </Button>
                        <Button
                            variant="ghost"
                            size="icon"
                            className="h-8 w-8 text-destructive hover:text-destructive"
                            onClick={() => setDeleteFaqId(faq.id)}
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
            <Head title="SSS" />

            <div className="flex-1 space-y-6 p-6">
                <div className="flex items-center justify-between">
                    <div>
                        <h1 className="text-3xl font-bold tracking-tight">
                            Sık Sorulan Sorular
                        </h1>
                        <p className="mt-1 text-muted-foreground">
                            SSS'leri yönetin
                        </p>
                    </div>
                    <Link href="/admin/faqs/create">
                        <Button>
                            <Plus className="mr-2 h-4 w-4" />
                            Yeni SSS
                        </Button>
                    </Link>
                </div>

                <div className="rounded-md border">
                    <DataTable
                        columns={columns}
                        data={faqs.data}
                        pagination={{
                            currentPage: faqs.current_page,
                            lastPage: faqs.last_page,
                            perPage: faqs.per_page,
                            total: faqs.total,
                            from: faqs.from,
                            to: faqs.to,
                            links: faqs.links,
                        }}
                        onPageChange={handlePageChange}
                    />
                </div>

                <Dialog
                    open={deleteFaqId !== null}
                    onOpenChange={(open) =>
                        setDeleteFaqId(open ? deleteFaqId : null)
                    }
                >
                    <DialogContent>
                        <DialogHeader>
                            <DialogTitle>SSS'yi Sil</DialogTitle>
                            <DialogDescription>
                                Bu SSS'yi silmek istediğinizden emin misiniz? Bu
                                işlem geri alınamaz.
                            </DialogDescription>
                        </DialogHeader>
                        <DialogFooter>
                            <Button
                                variant="outline"
                                onClick={() => setDeleteFaqId(null)}
                            >
                                İptal
                            </Button>
                            <Button
                                variant="destructive"
                                onClick={() =>
                                    deleteFaqId && handleDelete(deleteFaqId)
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

