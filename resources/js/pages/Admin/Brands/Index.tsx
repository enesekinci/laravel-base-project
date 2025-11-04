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
import { destroy, show } from '@/routes/admin/brands';
import { type BreadcrumbItem, type PaginatedResponse } from '@/types';
import { Head, Link, router } from '@inertiajs/react';
import { Eye, Plus, Trash2 } from 'lucide-react';
import { useState } from 'react';

interface Brand {
    id: number;
    name: string;
    slug: string;
    description?: string;
    logo?: string;
    website?: string;
    is_active: boolean;
    sort_order: number;
}

interface Props {
    brands: PaginatedResponse<Brand>;
}

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Dashboard',
        href: '/admin/dashboard',
    },
    {
        title: 'Markalar',
        href: '/admin/brands',
    },
];

export default function BrandsIndex({ brands }: Props) {
    const [deleteBrandId, setDeleteBrandId] = useState<number | null>(null);

    const handleDelete = (brandId: number) => {
        router.delete(destroy(brandId).url, {
            onSuccess: () => {
                setDeleteBrandId(null);
            },
        });
    };

    return (
        <AppLayout breadcrumbs={breadcrumbs}>
            <Head title="Markalar" />

            <div className="flex-1 space-y-6 p-6">
                <div className="flex items-center justify-between">
                    <div>
                        <h1 className="text-3xl font-bold tracking-tight">
                            Markalar
                        </h1>
                        <p className="mt-1 text-muted-foreground">
                            Ürün markalarını yönetin
                        </p>
                    </div>
                    <Link href="/admin/brands/create">
                        <Button>
                            <Plus className="mr-2 h-4 w-4" />
                            Yeni Marka
                        </Button>
                    </Link>
                </div>

                <Card>
                    <CardHeader>
                        <CardTitle>Marka Listesi</CardTitle>
                    </CardHeader>
                    <CardContent>
                        <div className="space-y-4">
                            {brands.data.length > 0 ? (
                                <div className="space-y-2">
                                    {brands.data.map((brand) => (
                                        <div
                                            key={brand.id}
                                            className="flex items-center justify-between rounded-lg border p-4"
                                        >
                                            <div className="flex-1">
                                                <h3 className="font-semibold">
                                                    {brand.name}
                                                </h3>
                                                {brand.description && (
                                                    <p className="mt-1 text-sm text-muted-foreground">
                                                        {brand.description}
                                                    </p>
                                                )}
                                            </div>
                                            <div className="flex items-center gap-2">
                                                <Link href={show(brand.id)}>
                                                    <Button variant="outline" size="sm">
                                                        <Eye className="mr-2 h-4 w-4" />
                                                        Görüntüle
                                                    </Button>
                                                </Link>
                                                <Link
                                                    href={`/admin/brands/${brand.id}/edit`}
                                                >
                                                    <Button variant="outline" size="sm">
                                                        Düzenle
                                                    </Button>
                                                </Link>
                                                <Dialog
                                                    open={deleteBrandId === brand.id}
                                                    onOpenChange={(open) =>
                                                        setDeleteBrandId(
                                                            open ? brand.id : null,
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
                                                                Markayı Sil
                                                            </DialogTitle>
                                                            <DialogDescription>
                                                                Bu markayı silmek
                                                                istediğinizden emin
                                                                misiniz? Bu işlem
                                                                geri alınamaz.
                                                            </DialogDescription>
                                                        </DialogHeader>
                                                        <DialogFooter>
                                                            <Button
                                                                variant="outline"
                                                                onClick={() =>
                                                                    setDeleteBrandId(
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
                                                                        brand.id,
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
                                    Henüz marka eklenmemiş.
                                </div>
                            )}
                        </div>
                    </CardContent>
                </Card>
            </div>
        </AppLayout>
    );
}

