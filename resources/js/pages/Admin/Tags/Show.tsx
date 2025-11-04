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
import { destroy, edit, index } from '@/routes/admin/tags';
import { type BreadcrumbItem } from '@/types';
import { Head, Link, router } from '@inertiajs/react';
import { ArrowLeft, Edit, Trash2 } from 'lucide-react';
import { useState } from 'react';

interface Props {
    tag: {
        id: number;
        name: string;
        slug: string;
        color?: string;
        is_active: boolean;
        created_at: string;
        updated_at: string;
    };
}

const breadcrumbs: BreadcrumbItem[] = [
    { title: 'Dashboard', href: '/admin/dashboard' },
    { title: 'Etiketler', href: '/admin/tags' },
    { title: 'Etiket Detayı', href: '#' },
];

export default function TagsShow({ tag }: Props) {
    const [showDeleteDialog, setShowDeleteDialog] = useState(false);
    const handleDelete = () => {
        router.delete(destroy(tag.id).url, {
            onSuccess: () => router.visit(index().url),
        });
        setShowDeleteDialog(false);
    };
    return (
        <AppLayout breadcrumbs={breadcrumbs}>
            <Head title={`${tag.name} - Etiket Detayı`} />
            <div className="flex-1 space-y-6 p-6">
                <div className="flex items-center justify-between">
                    <div>
                        <h1 className="text-3xl font-bold tracking-tight">
                            {tag.name}
                        </h1>
                        <p className="mt-1 text-muted-foreground">
                            Etiket detay bilgileri
                        </p>
                    </div>
                    <div className="flex gap-2">
                        <Link href={edit(tag.id)}>
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
                                    <DialogTitle>Etiketi Sil</DialogTitle>
                                    <DialogDescription>
                                        Bu etiketi silmek istediğinizden emin
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
                <Card>
                    <CardHeader>
                        <CardTitle>Etiket Bilgileri</CardTitle>
                    </CardHeader>
                    <CardContent className="space-y-4">
                        <div>
                            <p className="text-sm font-medium text-muted-foreground">
                                Etiket Adı
                            </p>
                            <p className="mt-1 text-lg">{tag.name}</p>
                        </div>
                        <div>
                            <p className="text-sm font-medium text-muted-foreground">
                                Slug
                            </p>
                            <p className="mt-1 font-mono text-lg text-sm">
                                {tag.slug}
                            </p>
                        </div>
                        {tag.color && (
                            <div>
                                <p className="text-sm font-medium text-muted-foreground">
                                    Renk
                                </p>
                                <div className="mt-1 flex items-center gap-2">
                                    <div
                                        className="h-6 w-6 rounded-full border"
                                        style={{ backgroundColor: tag.color }}
                                    />
                                    <span className="font-mono text-sm">
                                        {tag.color}
                                    </span>
                                </div>
                            </div>
                        )}
                        <div>
                            <p className="text-sm font-medium text-muted-foreground">
                                Durum
                            </p>
                            <div className="mt-1">
                                <Badge
                                    variant={
                                        tag.is_active ? 'default' : 'secondary'
                                    }
                                >
                                    {tag.is_active ? 'Aktif' : 'Pasif'}
                                </Badge>
                            </div>
                        </div>
                    </CardContent>
                </Card>
            </div>
        </AppLayout>
    );
}
