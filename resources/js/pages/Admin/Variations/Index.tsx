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
import { destroy, show } from '@/routes/admin/variations';
import { type BreadcrumbItem, type PaginatedResponse } from '@/types';
import { Head, Link, router } from '@inertiajs/react';
import { Eye, Plus, Trash2 } from 'lucide-react';
import { useState } from 'react';

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

export default function VariationsIndex({ variations }: Props) {
    const [deleteVariationId, setDeleteVariationId] = useState<number | null>(null);

    const handleDelete = (variationId: number) => {
        router.delete(destroy(variationId).url, {
            onSuccess: () => {
                setDeleteVariationId(null);
            },
        });
    };

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

                <Card>
                    <CardHeader>
                        <CardTitle>Varyasyon Listesi</CardTitle>
                    </CardHeader>
                    <CardContent>
                        <div className="space-y-4">
                            {variations.data.length > 0 ? (
                                <div className="space-y-2">
                                    {variations.data.map((variation) => (
                                        <div
                                            key={variation.id}
                                            className="flex items-center justify-between rounded-lg border p-4"
                                        >
                                            <div className="flex-1">
                                                <div className="flex items-center gap-2">
                                                    <h3 className="font-semibold">
                                                        {variation.name}
                                                    </h3>
                                                    <span className="rounded-full bg-muted px-2 py-1 text-xs font-medium capitalize">
                                                        {variation.type}
                                                    </span>
                                                </div>
                                                <div className="mt-2">
                                                    {variation.values && variation.values.length > 0 ? (
                                                        <div className="flex flex-wrap gap-2">
                                                            {variation.values.map((value) => (
                                                                <span
                                                                    key={value.id}
                                                                    className="rounded-md bg-muted px-2 py-1 text-xs text-muted-foreground"
                                                                >
                                                                    {value.label}
                                                                    {variation.type === 'color' &&
                                                                        value.color && (
                                                                            <span
                                                                                className="ml-1 inline-block h-3 w-3 rounded-full border"
                                                                                style={{
                                                                                    backgroundColor:
                                                                                        value.color,
                                                                                }}
                                                                            />
                                                                        )}
                                                                </span>
                                                            ))}
                                                        </div>
                                                    ) : (
                                                        <p className="text-sm text-muted-foreground">
                                                            Henüz değer eklenmemiş
                                                        </p>
                                                    )}
                                                </div>
                                            </div>
                                            <div className="flex items-center gap-2">
                                                <Link href={show(variation.id)}>
                                                    <Button variant="outline" size="sm">
                                                        <Eye className="mr-2 h-4 w-4" />
                                                        Görüntüle
                                                    </Button>
                                                </Link>
                                                <Link
                                                    href={`/admin/variations/${variation.id}/edit`}
                                                >
                                                    <Button variant="outline" size="sm">
                                                        Düzenle
                                                    </Button>
                                                </Link>
                                                <Dialog
                                                    open={deleteVariationId === variation.id}
                                                    onOpenChange={(open) =>
                                                        setDeleteVariationId(
                                                            open ? variation.id : null,
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
                                                                Varyasyonu Sil
                                                            </DialogTitle>
                                                            <DialogDescription>
                                                                Bu varyasyonu silmek
                                                                istediğinizden emin
                                                                misiniz? Bu işlem
                                                                geri alınamaz.
                                                            </DialogDescription>
                                                        </DialogHeader>
                                                        <DialogFooter>
                                                            <Button
                                                                variant="outline"
                                                                onClick={() =>
                                                                    setDeleteVariationId(
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
                                                                        variation.id,
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
                                    Henüz varyasyon eklenmemiş.
                                </div>
                            )}
                        </div>
                    </CardContent>
                </Card>
            </div>
        </AppLayout>
    );
}

