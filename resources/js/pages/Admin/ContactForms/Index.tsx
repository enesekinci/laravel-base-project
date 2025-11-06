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
import { Head, router } from '@inertiajs/react';
import { type ColumnDef } from '@tanstack/react-table';
import { ArrowUpDown, Eye, MoreHorizontal, Trash2 } from 'lucide-react';
import { useState } from 'react';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Dashboard',
        href: '/admin/dashboard',
    },
    {
        title: 'İletişim Formları',
        href: '/admin/contact-forms',
    },
];

interface ContactForm {
    id: number;
    name: string;
    email: string;
    phone?: string;
    subject: string;
    status: 'new' | 'read' | 'replied' | 'closed';
    assigned_user?: {
        id: number;
        name: string;
    };
    created_at: string;
}

interface Props {
    contactForms: PaginatedResponse<ContactForm>;
}

const statusLabels: Record<string, string> = {
    new: 'Yeni',
    read: 'Okundu',
    replied: 'Yanıtlandı',
    closed: 'Kapatıldı',
};

export default function ContactFormsIndex({ contactForms }: Props) {
    const [deleteFormId, setDeleteFormId] = useState<number | null>(null);

    const handleDelete = (formId: number) => {
        router.delete(`/admin/contact-forms/${formId}`, {
            onSuccess: () => {
                setDeleteFormId(null);
            },
        });
    };

    const handlePageChange = (page: number) => {
        router.get('/admin/contact-forms', { page }, { preserveState: true });
    };

    const columns: ColumnDef<ContactForm>[] = [
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
            accessorKey: 'subject',
            header: 'Konu',
            cell: ({ row }) => (
                <span className="text-sm">{row.getValue('subject')}</span>
            ),
        },
        {
            accessorKey: 'status',
            header: 'Durum',
            cell: ({ row }) => {
                const status = row.getValue('status') as string;
                const statusColors: Record<string, string> = {
                    new: 'bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-200',
                    read: 'bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-200',
                    replied:
                        'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200',
                    closed: 'bg-gray-100 text-gray-800 dark:bg-gray-900 dark:text-gray-200',
                };
                return (
                    <span
                        className={`rounded px-2 py-1 text-xs ${
                            statusColors[status] || ''
                        }`}
                    >
                        {statusLabels[status] || status}
                    </span>
                );
            },
        },
        {
            id: 'actions',
            enableHiding: false,
            cell: ({ row }) => {
                const form = row.original;

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
                                    router.visit(
                                        `/admin/contact-forms/${form.id}`,
                                    )
                                }
                            >
                                <Eye className="mr-2 h-4 w-4" />
                                Görüntüle
                            </DropdownMenuItem>
                            <DropdownMenuSeparator />
                            <DropdownMenuItem
                                onClick={() => setDeleteFormId(form.id)}
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
            <Head title="İletişim Formları" />

            <div className="flex-1 space-y-6 p-6">
                <div>
                    <h1 className="text-3xl font-bold tracking-tight">
                        İletişim Formları
                    </h1>
                    <p className="mt-1 text-muted-foreground">
                        İletişim formu taleplerini yönetin
                    </p>
                </div>

                <div className="rounded-md border">
                    <DataTable
                        columns={columns}
                        data={contactForms.data}
                        pagination={{
                            currentPage: contactForms.current_page,
                            lastPage: contactForms.last_page,
                            perPage: contactForms.per_page,
                            total: contactForms.total,
                            from: contactForms.from,
                            to: contactForms.to,
                            links: contactForms.links,
                        }}
                        onPageChange={handlePageChange}
                    />
                </div>

                <Dialog
                    open={deleteFormId !== null}
                    onOpenChange={(open) =>
                        setDeleteFormId(open ? deleteFormId : null)
                    }
                >
                    <DialogContent>
                        <DialogHeader>
                            <DialogTitle>Formu Sil</DialogTitle>
                            <DialogDescription>
                                Bu formu silmek istediğinizden emin misiniz? Bu
                                işlem geri alınamaz.
                            </DialogDescription>
                        </DialogHeader>
                        <DialogFooter>
                            <Button
                                variant="outline"
                                onClick={() => setDeleteFormId(null)}
                            >
                                İptal
                            </Button>
                            <Button
                                variant="destructive"
                                onClick={() =>
                                    deleteFormId && handleDelete(deleteFormId)
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
