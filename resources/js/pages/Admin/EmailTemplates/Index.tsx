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
        title: 'Mail Taslakları',
        href: '/admin/email-templates',
    },
];

interface EmailTemplate {
    id: number;
    name: string;
    slug: string;
    subject: string;
    is_active: boolean;
}

interface Props {
    emailTemplates: PaginatedResponse<EmailTemplate>;
}

export default function EmailTemplatesIndex({ emailTemplates }: Props) {
    const [deleteTemplateId, setDeleteTemplateId] = useState<number | null>(
        null,
    );

    const handleDelete = (templateId: number) => {
        router.delete(`/admin/email-templates/${templateId}`, {
            onSuccess: () => {
                setDeleteTemplateId(null);
            },
        });
    };

    const handlePageChange = (page: number) => {
        router.get('/admin/email-templates', { page }, { preserveState: true });
    };

    const columns: ColumnDef<EmailTemplate>[] = [
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
            accessorKey: 'subject',
            header: 'Konu',
            cell: ({ row }) => (
                <span className="text-sm">{row.getValue('subject')}</span>
            ),
        },
        {
            accessorKey: 'slug',
            header: 'Slug',
            cell: ({ row }) => (
                <span className="font-mono text-sm text-muted-foreground">
                    {row.getValue('slug')}
                </span>
            ),
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
                                onClick={() =>
                                    router.visit(
                                        `/admin/email-templates/${template.id}`,
                                    )
                                }
                            >
                                <Eye className="mr-2 h-4 w-4" />
                                Görüntüle
                            </DropdownMenuItem>
                            <DropdownMenuItem
                                onClick={() =>
                                    router.visit(
                                        `/admin/email-templates/${template.id}/edit`,
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
            <Head title="Mail Taslakları" />

            <div className="flex-1 space-y-6 p-6">
                <div className="flex items-center justify-between">
                    <div>
                        <h1 className="text-3xl font-bold tracking-tight">
                            Mail Taslakları
                        </h1>
                        <p className="mt-1 text-muted-foreground">
                            E-posta şablonlarını yönetin
                        </p>
                    </div>
                    <Link href="/admin/email-templates/create">
                        <Button>
                            <Plus className="mr-2 h-4 w-4" />
                            Yeni Şablon
                        </Button>
                    </Link>
                </div>

                <div className="rounded-md border">
                    <DataTable
                        columns={columns}
                        data={emailTemplates.data}
                        pagination={{
                            currentPage: emailTemplates.current_page,
                            lastPage: emailTemplates.last_page,
                            perPage: emailTemplates.per_page,
                            total: emailTemplates.total,
                            from: emailTemplates.from,
                            to: emailTemplates.to,
                            links: emailTemplates.links,
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
                                Bu şablonu silmek istediğinizden emin misiniz? Bu
                                işlem geri alınamaz.
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

