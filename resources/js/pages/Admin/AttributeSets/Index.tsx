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
import { destroy, show } from '@/routes/admin/attribute-sets';
import { type BreadcrumbItem, type PaginatedResponse } from '@/types';
import { Head, Link, router } from '@inertiajs/react';
import { Eye, Plus, Trash2 } from 'lucide-react';
import { useState } from 'react';

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

export default function AttributeSetsIndex({
    attributeSets,
}: Props) {
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

                <Card>
                    <CardHeader>
                        <CardTitle>Özellik Seti Listesi</CardTitle>
                    </CardHeader>
                    <CardContent>
                        <div className="space-y-4">
                            {attributeSets.data.length > 0 ? (
                                <div className="space-y-2">
                                    {attributeSets.data.map((attributeSet) => (
                                        <div
                                            key={attributeSet.id}
                                            className="flex items-center justify-between rounded-lg border p-4"
                                        >
                                            <div className="flex-1">
                                                <h3 className="font-semibold">
                                                    {attributeSet.name}
                                                </h3>
                                                {attributeSet.slug && (
                                                    <p className="mt-1 font-mono text-sm text-muted-foreground">
                                                        {attributeSet.slug}
                                                    </p>
                                                )}
                                                {attributeSet.attributes_count !==
                                                    undefined && (
                                                    <p className="mt-1 text-sm text-muted-foreground">
                                                        {
                                                            attributeSet.attributes_count
                                                        }{' '}
                                                        özellik
                                                    </p>
                                                )}
                                            </div>
                                            <div className="flex items-center gap-2">
                                                <Link
                                                    href={show(
                                                        attributeSet.id,
                                                    )}
                                                >
                                                    <Button
                                                        variant="outline"
                                                        size="sm"
                                                    >
                                                        <Eye className="mr-2 h-4 w-4" />
                                                        Görüntüle
                                                    </Button>
                                                </Link>
                                                <Link
                                                    href={`/admin/attribute-sets/${attributeSet.id}/edit`}
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
                                                        deleteAttributeSetId ===
                                                        attributeSet.id
                                                    }
                                                    onOpenChange={(open) =>
                                                        setDeleteAttributeSetId(
                                                            open
                                                                ? attributeSet.id
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
                                                                Özellik Setini
                                                                Sil
                                                            </DialogTitle>
                                                            <DialogDescription>
                                                                Bu özellik setini
                                                                silmek istediğinizden
                                                                emin misiniz? Bu
                                                                işlem geri alınamaz.
                                                            </DialogDescription>
                                                        </DialogHeader>
                                                        <DialogFooter>
                                                            <Button
                                                                variant="outline"
                                                                onClick={() =>
                                                                    setDeleteAttributeSetId(
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
                                                                        attributeSet.id,
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
                                    Henüz özellik seti eklenmemiş.
                                </div>
                            )}
                        </div>
                    </CardContent>
                </Card>
            </div>
        </AppLayout>
    );
}

