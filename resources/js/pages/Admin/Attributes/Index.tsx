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
import { destroy, show } from '@/routes/admin/attributes';
import { type BreadcrumbItem, type PaginatedResponse } from '@/types';
import { Head, Link, router } from '@inertiajs/react';
import { Eye, Plus, Trash2 } from 'lucide-react';
import { useState } from 'react';

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
    slug: string;
    type: string;
    is_filterable: boolean;
    is_required: boolean;
    sort_order: number;
    values?: AttributeValue[];
}

interface Props {
    attributes: PaginatedResponse<Attribute>;
}

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

export default function AttributesIndex({ attributes }: Props) {
    const [deleteAttributeId, setDeleteAttributeId] = useState<number | null>(null);

    const handleDelete = (attributeId: number) => {
        router.delete(destroy(attributeId).url, {
            onSuccess: () => {
                setDeleteAttributeId(null);
            },
        });
    };

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

                <Card>
                    <CardHeader>
                        <CardTitle>Özellik Listesi</CardTitle>
                    </CardHeader>
                    <CardContent>
                        <div className="space-y-4">
                            {attributes.data.length > 0 ? (
                                <div className="space-y-2">
                                    {attributes.data.map((attribute) => (
                                        <div
                                            key={attribute.id}
                                            className="flex items-center justify-between rounded-lg border p-4"
                                        >
                                            <div className="flex-1">
                                                <div className="flex items-center gap-2">
                                                    <h3 className="font-semibold">
                                                        {attribute.name}
                                                    </h3>
                                                    <span className="rounded bg-muted px-2 py-1 text-xs text-muted-foreground">
                                                        {attribute.type}
                                                    </span>
                                                    {attribute.is_filterable && (
                                                        <span className="rounded bg-blue-100 px-2 py-1 text-xs text-blue-800 dark:bg-blue-900 dark:text-blue-200">
                                                            Filtrelenebilir
                                                        </span>
                                                    )}
                                                </div>
                                                {attribute.values &&
                                                    attribute.values.length > 0 && (
                                                        <p className="mt-1 text-sm text-muted-foreground">
                                                            {attribute.values.length}{' '}
                                                            değer
                                                        </p>
                                                    )}
                                            </div>
                                            <div className="flex items-center gap-2">
                                                <Link href={show(attribute.id)}>
                                                    <Button variant="outline" size="sm">
                                                        <Eye className="mr-2 h-4 w-4" />
                                                        Görüntüle
                                                    </Button>
                                                </Link>
                                                <Link
                                                    href={`/admin/attributes/${attribute.id}/edit`}
                                                >
                                                    <Button variant="outline" size="sm">
                                                        Düzenle
                                                    </Button>
                                                </Link>
                                                <Dialog
                                                    open={deleteAttributeId === attribute.id}
                                                    onOpenChange={(open) =>
                                                        setDeleteAttributeId(
                                                            open ? attribute.id : null,
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
                                                                Özelliği Sil
                                                            </DialogTitle>
                                                            <DialogDescription>
                                                                Bu özelliği silmek
                                                                istediğinizden emin
                                                                misiniz? Bu işlem
                                                                geri alınamaz.
                                                            </DialogDescription>
                                                        </DialogHeader>
                                                        <DialogFooter>
                                                            <Button
                                                                variant="outline"
                                                                onClick={() =>
                                                                    setDeleteAttributeId(
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
                                                                        attribute.id,
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
                                    Henüz özellik eklenmemiş.
                                </div>
                            )}
                        </div>
                    </CardContent>
                </Card>
            </div>
        </AppLayout>
    );
}

