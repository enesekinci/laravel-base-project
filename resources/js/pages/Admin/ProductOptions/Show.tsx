import { Badge } from '@/components/ui/badge';
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
import { destroy, edit, index } from '@/routes/admin/product-options';
import { type BreadcrumbItem } from '@/types';
import { Head, Link, router } from '@inertiajs/react';
import { ArrowLeft, Edit, Trash2 } from 'lucide-react';
import { useState } from 'react';

interface ProductOptionValue {
    id: number;
    label: string;
    value?: string;
    price_adjustment: number;
    sort_order: number;
}

interface Props {
    option: {
        id: number;
        name: string;
        description?: string;
        type: 'select' | 'radio' | 'checkbox';
        sort_order: number;
        is_active: boolean;
        values?: ProductOptionValue[];
        created_at: string;
        updated_at: string;
    };
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
    {
        title: 'Seçenek Detayı',
        href: '#',
    },
];

const typeLabels: Record<string, string> = {
    select: 'Select',
    radio: 'Radio',
    checkbox: 'Checkbox',
};

export default function ProductOptionsShow({ option }: Props) {
    const [showDeleteDialog, setShowDeleteDialog] = useState(false);

    const handleDelete = () => {
        router.delete(destroy(option.id).url, {
            onSuccess: () => {
                router.visit(index().url);
            },
        });
        setShowDeleteDialog(false);
    };

    return (
        <AppLayout breadcrumbs={breadcrumbs}>
            <Head title={`${option.name} - Seçenek Detayı`} />

            <div className="flex-1 space-y-6 p-6">
                <div className="flex items-center justify-between">
                    <div>
                        <h1 className="text-3xl font-bold tracking-tight">
                            {option.name}
                        </h1>
                        <p className="mt-1 text-muted-foreground">
                            Ürün seçeneği detay bilgileri
                        </p>
                    </div>
                    <div className="flex gap-2">
                        <Link href={edit(option.id)}>
                            <Button>
                                <Edit className="mr-2 h-4 w-4" />
                                Düzenle
                            </Button>
                        </Link>
                        <Dialog
                            open={showDeleteDialog}
                            onOpenChange={setShowDeleteDialog}
                        >
                            <DialogTrigger asChild>
                                <Button variant="destructive">
                                    <Trash2 className="mr-2 h-4 w-4" />
                                    Sil
                                </Button>
                            </DialogTrigger>
                            <DialogContent>
                                <DialogHeader>
                                    <DialogTitle>Seçeneği Sil</DialogTitle>
                                    <DialogDescription>
                                        Bu seçeneği silmek istediğinizden emin
                                        misiniz? Bu işlem geri alınamaz.
                                    </DialogDescription>
                                </DialogHeader>
                                <DialogFooter>
                                    <Button
                                        variant="outline"
                                        onClick={() =>
                                            setShowDeleteDialog(false)
                                        }
                                    >
                                        İptal
                                    </Button>
                                    <Button
                                        variant="destructive"
                                        onClick={handleDelete}
                                    >
                                        Sil
                                    </Button>
                                </DialogFooter>
                            </DialogContent>
                        </Dialog>
                        <Link href={index()}>
                            <Button variant="outline">
                                <ArrowLeft className="mr-2 h-4 w-4" />
                                Geri Dön
                            </Button>
                        </Link>
                    </div>
                </div>

                <Card>
                    <CardHeader>
                        <CardTitle>Seçenek Bilgileri</CardTitle>
                    </CardHeader>
                    <CardContent className="space-y-4">
                        <div>
                            <p className="text-sm font-medium text-muted-foreground">
                                Ad
                            </p>
                            <p className="mt-1 text-lg">{option.name}</p>
                        </div>
                        {option.description && (
                            <div>
                                <p className="text-sm font-medium text-muted-foreground">
                                    Açıklama
                                </p>
                                <p className="mt-1">{option.description}</p>
                            </div>
                        )}
                        <div>
                            <p className="text-sm font-medium text-muted-foreground">
                                Tip
                            </p>
                            <div className="mt-1">
                                <Badge>
                                    {typeLabels[option.type] || option.type}
                                </Badge>
                            </div>
                        </div>
                        <div>
                            <p className="text-sm font-medium text-muted-foreground">
                                Durum
                            </p>
                            <div className="mt-1">
                                <Badge
                                    variant={
                                        option.is_active
                                            ? 'default'
                                            : 'secondary'
                                    }
                                >
                                    {option.is_active ? 'Aktif' : 'Pasif'}
                                </Badge>
                            </div>
                        </div>
                        <div>
                            <p className="text-sm font-medium text-muted-foreground">
                                Sıra
                            </p>
                            <p className="mt-1 text-lg">{option.sort_order}</p>
                        </div>
                    </CardContent>
                </Card>

                {option.values && option.values.length > 0 && (
                    <Card>
                        <CardHeader>
                            <CardTitle>
                                Değerler ({option.values.length})
                            </CardTitle>
                        </CardHeader>
                        <CardContent>
                            <div className="space-y-4">
                                {option.values.map((value) => (
                                    <div
                                        key={value.id}
                                        className="rounded-lg border p-4"
                                    >
                                        <div className="flex items-start justify-between">
                                            <div className="flex-1">
                                                <div className="flex items-center gap-2">
                                                    <p className="font-semibold">
                                                        {value.label}
                                                    </p>
                                                    {value.value && (
                                                        <Badge variant="outline">
                                                            {value.value}
                                                        </Badge>
                                                    )}
                                                    {value.price_adjustment !==
                                                        0 && (
                                                        <Badge
                                                            variant={
                                                                value.price_adjustment >
                                                                0
                                                                    ? 'default'
                                                                    : 'secondary'
                                                            }
                                                        >
                                                            {value.price_adjustment >
                                                            0
                                                                ? '+'
                                                                : ''}
                                                            {value.price_adjustment.toFixed(
                                                                2,
                                                            )}{' '}
                                                            ₺
                                                        </Badge>
                                                    )}
                                                </div>
                                                <p className="mt-1 text-xs text-muted-foreground">
                                                    Sıra: {value.sort_order}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                ))}
                            </div>
                        </CardContent>
                    </Card>
                )}
            </div>
        </AppLayout>
    );
}
