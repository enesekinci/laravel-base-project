import { Button } from '@/components/ui/button';
import { Card, CardContent, CardHeader, CardTitle } from '@/components/ui/card';
import {
    Dialog,
    DialogContent,
    DialogDescription,
    DialogFooter,
    DialogHeader,
    DialogTitle,
    DialogTrigger,
} from '@/components/ui/dialog';
import AppLayout from '@/layouts/app-layout';
import { destroy, show } from '@/routes/admin/product-options';
import { type BreadcrumbItem, type PaginatedResponse } from '@/types';
import { Head, Link, router } from '@inertiajs/react';
import { Eye, Plus, Trash2 } from 'lucide-react';
import { useState } from 'react';

interface ProductOptionValue {
    id: number;
    label: string;
    value?: string;
    price_adjustment: number;
    sort_order: number;
}

interface ProductOption {
    id: number;
    name: string;
    description?: string;
    type: 'select' | 'radio' | 'checkbox';
    sort_order: number;
    is_active: boolean;
    values?: ProductOptionValue[];
}

interface Props {
    options: PaginatedResponse<ProductOption>;
}

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Dashboard',
        href: '/admin/dashboard',
    },
    {
        title: 'Ürün Seçenekleri',
        href: '/admin/product-options',
    },
];

const typeLabels: Record<string, string> = {
    select: 'Select',
    radio: 'Radio',
    checkbox: 'Checkbox',
};

export default function ProductOptionsIndex({ options }: Props) {
    const [deleteOptionId, setDeleteOptionId] = useState<number | null>(null);

    const handleDelete = (optionId: number) => {
        router.delete(destroy(optionId).url, {
            onSuccess: () => {
                setDeleteOptionId(null);
            },
        });
    };

    return (
        <AppLayout breadcrumbs={breadcrumbs}>
            <Head title="Ürün Seçenekleri" />

            <div className="flex-1 space-y-6 p-6">
                <div className="flex items-center justify-between">
                    <div>
                        <h1 className="text-3xl font-bold tracking-tight">
                            Ürün Seçenekleri
                        </h1>
                        <p className="mt-1 text-muted-foreground">
                            Ürün seçeneklerini yönetin (RAM, Depolama, vb.)
                        </p>
                    </div>
                    <Link href="/admin/product-options/create">
                        <Button>
                            <Plus className="mr-2 h-4 w-4" />
                            Yeni Seçenek
                        </Button>
                    </Link>
                </div>

                <Card>
                    <CardHeader>
                        <CardTitle>Seçenek Listesi</CardTitle>
                    </CardHeader>
                    <CardContent>
                        <div className="space-y-4">
                            {options.data.length > 0 ? (
                                <div className="space-y-2">
                                    {options.data.map((option) => (
                                        <div
                                            key={option.id}
                                            className="flex items-center justify-between rounded-lg border p-4"
                                        >
                                            <div className="flex-1">
                                                <div className="flex items-center gap-2">
                                                    <h3 className="font-semibold">
                                                        {option.name}
                                                    </h3>
                                                    <span className="rounded-full bg-muted px-2 py-1 text-xs">
                                                        {typeLabels[option.type] ||
                                                            option.type}
                                                    </span>
                                                    {!option.is_active && (
                                                        <span className="rounded-full bg-red-100 px-2 py-1 text-xs text-red-600">
                                                            Pasif
                                                        </span>
                                                    )}
                                                </div>
                                                {option.description && (
                                                    <p className="mt-1 text-sm text-muted-foreground">
                                                        {option.description}
                                                    </p>
                                                )}
                                                {option.values &&
                                                    option.values.length > 0 && (
                                                        <p className="mt-1 text-sm text-muted-foreground">
                                                            {option.values.length}{' '}
                                                            değer
                                                        </p>
                                                    )}
                                            </div>
                                            <div className="flex items-center gap-2">
                                                <Link href={show(option.id)}>
                                                    <Button
                                                        variant="outline"
                                                        size="sm"
                                                    >
                                                        <Eye className="mr-2 h-4 w-4" />
                                                        Görüntüle
                                                    </Button>
                                                </Link>
                                                <Link
                                                    href={`/admin/product-options/${option.id}/edit`}
                                                >
                                                    <Button
                                                        variant="outline"
                                                        size="sm"
                                                    >
                                                        Düzenle
                                                    </Button>
                                                </Link>
                                                <Dialog
                                                    open={
                                                        deleteOptionId ===
                                                        option.id
                                                    }
                                                    onOpenChange={(open) =>
                                                        setDeleteOptionId(
                                                            open
                                                                ? option.id
                                                                : null,
                                                        )
                                                    }
                                                >
                                                    <DialogTrigger asChild>
                                                        <Button
                                                            variant="destructive"
                                                            size="sm"
                                                        >
                                                            <Trash2 className="mr-2 h-4 w-4" />
                                                            Sil
                                                        </Button>
                                                    </DialogTrigger>
                                                    <DialogContent>
                                                        <DialogHeader>
                                                            <DialogTitle>
                                                                Seçeneği Sil
                                                            </DialogTitle>
                                                            <DialogDescription>
                                                                Bu seçeneği silmek
                                                                istediğinizden emin
                                                                misiniz? Bu işlem
                                                                geri alınamaz.
                                                            </DialogDescription>
                                                        </DialogHeader>
                                                        <DialogFooter>
                                                            <Button
                                                                variant="outline"
                                                                onClick={() =>
                                                                    setDeleteOptionId(
                                                                        null,
                                                                    )
                                                                }
                                                            >
                                                                İptal
                                                            </Button>
                                                            <Button
                                                                variant="destructive"
                                                                onClick={() =>
                                                                    handleDelete(
                                                                        option.id,
                                                                    )
                                                                }
                                                            >
                                                                Sil
                                                            </Button>
                                                        </DialogFooter>
                                                    </DialogContent>
                                                </Dialog>
                                            </div>
                                        </div>
                                    ))}
                                </div>
                            ) : (
                                <div className="py-8 text-center text-muted-foreground">
                                    Henüz seçenek eklenmemiş.
                                </div>
                            )}
                        </div>
                    </CardContent>
                </Card>
            </div>
        </AppLayout>
    );
}

