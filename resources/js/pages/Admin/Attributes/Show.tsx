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
import { destroy, edit, index } from '@/routes/admin/attributes';
import { type BreadcrumbItem } from '@/types';
import { Head, Link, router } from '@inertiajs/react';
import { ArrowLeft, Edit, Trash2 } from 'lucide-react';
import { useState } from 'react';

interface AttributeValue {
    id: number;
    value: string;
    slug?: string;
    color?: string;
    sort_order: number;
}

interface Props {
    attribute: {
        id: number;
        name: string;
        slug: string;
        type: string;
        is_filterable: boolean;
        is_required: boolean;
        sort_order: number;
        values?: AttributeValue[];
        created_at: string;
        updated_at: string;
    };
}

const breadcrumbs: BreadcrumbItem[] = [
    { title: 'Dashboard', href: '/admin/dashboard' },
    { title: 'Özellikler', href: '/admin/attributes' },
    { title: 'Özellik Detayı', href: '#' },
];

export default function AttributesShow({ attribute }: Props) {
    const [showDeleteDialog, setShowDeleteDialog] = useState(false);
    const handleDelete = () => {
        router.delete(destroy(attribute.id).url, {
            onSuccess: () => router.visit(index().url),
        });
        setShowDeleteDialog(false);
    };
    return (
        <AppLayout breadcrumbs={breadcrumbs}>
            <Head title={`${attribute.name} - Özellik Detayı`} />
            <div className="flex-1 space-y-6 p-6">
                <div className="flex items-center justify-between">
                    <div>
                        <h1 className="text-3xl font-bold tracking-tight">
                            {attribute.name}
                        </h1>
                        <p className="mt-1 text-muted-foreground">
                            Özellik detay bilgileri
                        </p>
                    </div>
                    <div className="flex gap-2">
                        <Link href={edit(attribute.id)}>
                            <Button>
                                <Edit className="mr-2 h-4 w-4" /> Düzenle
                            </Button>
                        </Link>
                        <Dialog
                            open={showDeleteDialog}
                            onOpenChange={setShowDeleteDialog}
                        >
                            <DialogTrigger asChild>
                                <Button variant="destructive">
                                    <Trash2 className="mr-2 h-4 w-4" /> Sil
                                </Button>
                            </DialogTrigger>
                            <DialogContent>
                                <DialogHeader>
                                    <DialogTitle>Özelliği Sil</DialogTitle>
                                    <DialogDescription>
                                        Bu özelliği silmek istediğinizden emin
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
                                <ArrowLeft className="mr-2 h-4 w-4" /> Geri Dön
                            </Button>
                        </Link>
                    </div>
                </div>
                <div className="grid gap-6 md:grid-cols-2">
                    <Card>
                        <CardHeader>
                            <CardTitle>Genel Bilgiler</CardTitle>
                        </CardHeader>
                        <CardContent className="space-y-4">
                            <div>
                                <p className="text-sm font-medium text-muted-foreground">
                                    Özellik Adı
                                </p>
                                <p className="mt-1 text-lg">{attribute.name}</p>
                            </div>
                            <div>
                                <p className="text-sm font-medium text-muted-foreground">
                                    Slug
                                </p>
                                <p className="mt-1 font-mono text-lg text-sm">
                                    {attribute.slug}
                                </p>
                            </div>
                            <div>
                                <p className="text-sm font-medium text-muted-foreground">
                                    Tip
                                </p>
                                <div className="mt-1">
                                    <Badge>{attribute.type}</Badge>
                                </div>
                            </div>
                            <div>
                                <p className="text-sm font-medium text-muted-foreground">
                                    Sıra
                                </p>
                                <p className="mt-1 text-lg">
                                    {attribute.sort_order}
                                </p>
                            </div>
                        </CardContent>
                    </Card>
                    <Card>
                        <CardHeader>
                            <CardTitle>Ayarlar</CardTitle>
                        </CardHeader>
                        <CardContent className="space-y-4">
                            <div>
                                <p className="text-sm font-medium text-muted-foreground">
                                    Filtrelenebilir
                                </p>
                                <div className="mt-1">
                                    <Badge
                                        variant={
                                            attribute.is_filterable
                                                ? 'default'
                                                : 'secondary'
                                        }
                                    >
                                        {attribute.is_filterable
                                            ? 'Evet'
                                            : 'Hayır'}
                                    </Badge>
                                </div>
                            </div>
                            <div>
                                <p className="text-sm font-medium text-muted-foreground">
                                    Zorunlu
                                </p>
                                <div className="mt-1">
                                    <Badge
                                        variant={
                                            attribute.is_required
                                                ? 'default'
                                                : 'secondary'
                                        }
                                    >
                                        {attribute.is_required
                                            ? 'Evet'
                                            : 'Hayır'}
                                    </Badge>
                                </div>
                            </div>
                            {attribute.values &&
                                attribute.values.length > 0 && (
                                    <div>
                                        <p className="text-sm font-medium text-muted-foreground">
                                            Değerler ({attribute.values.length})
                                        </p>
                                        <div className="mt-2 space-y-1">
                                            {attribute.values.map((value) => (
                                                <div
                                                    key={value.id}
                                                    className="flex items-center gap-2 rounded-md border p-2"
                                                >
                                                    {value.color && (
                                                        <div
                                                            className="h-4 w-4 rounded-full border"
                                                            style={{
                                                                backgroundColor:
                                                                    value.color,
                                                            }}
                                                        />
                                                    )}
                                                    <span>{value.value}</span>
                                                </div>
                                            ))}
                                        </div>
                                    </div>
                                )}
                        </CardContent>
                    </Card>
                </div>
            </div>
        </AppLayout>
    );
}
