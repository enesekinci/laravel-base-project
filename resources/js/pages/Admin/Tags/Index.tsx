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
import { destroy, show } from '@/routes/admin/tags';
import { type BreadcrumbItem, type PaginatedResponse } from '@/types';
import { Head, Link, router } from '@inertiajs/react';
import { Eye, Plus, Trash2 } from 'lucide-react';
import { useState } from 'react';

interface Tag {
    id: number;
    name: string;
    slug: string;
    color?: string;
    is_active: boolean;
}

interface Props {
    tags: PaginatedResponse<Tag>;
}

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Dashboard',
        href: '/admin/dashboard',
    },
    {
        title: 'Etiketler',
        href: '/admin/tags',
    },
];

export default function TagsIndex({ tags }: Props) {
    const [deleteTagId, setDeleteTagId] = useState<number | null>(null);

    const handleDelete = (tagId: number) => {
        router.delete(destroy(tagId).url, {
            onSuccess: () => {
                setDeleteTagId(null);
            },
        });
    };

    return (
        <AppLayout breadcrumbs={breadcrumbs}>
            <Head title="Etiketler" />

            <div className="flex-1 space-y-6 p-6">
                <div className="flex items-center justify-between">
                    <div>
                        <h1 className="text-3xl font-bold tracking-tight">
                            Etiketler
                        </h1>
                        <p className="mt-1 text-muted-foreground">
                            Ürün etiketlerini yönetin
                        </p>
                    </div>
                    <Link href="/admin/tags/create">
                        <Button>
                            <Plus className="mr-2 h-4 w-4" />
                            Yeni Etiket
                        </Button>
                    </Link>
                </div>

                <Card>
                    <CardHeader>
                        <CardTitle>Etiket Listesi</CardTitle>
                    </CardHeader>
                    <CardContent>
                        <div className="space-y-4">
                            {tags.data.length > 0 ? (
                                <div className="space-y-2">
                                    {tags.data.map((tag) => (
                                        <div
                                            key={tag.id}
                                            className="flex items-center justify-between rounded-lg border p-4"
                                        >
                                            <div className="flex items-center gap-3">
                                                {tag.color && (
                                                    <div
                                                        className="h-4 w-4 rounded-full"
                                                        style={{
                                                            backgroundColor:
                                                                tag.color,
                                                        }}
                                                    />
                                                )}
                                                <h3 className="font-semibold">
                                                    {tag.name}
                                                </h3>
                                            </div>
                                            <div className="flex items-center gap-2">
                                                <Link href={show(tag.id)}>
                                                    <Button variant="outline" size="sm">
                                                        <Eye className="mr-2 h-4 w-4" />
                                                        Görüntüle
                                                    </Button>
                                                </Link>
                                                <Link
                                                    href={`/admin/tags/${tag.id}/edit`}
                                                >
                                                    <Button variant="outline" size="sm">
                                                        Düzenle
                                                    </Button>
                                                </Link>
                                                <Dialog
                                                    open={deleteTagId === tag.id}
                                                    onOpenChange={(open) =>
                                                        setDeleteTagId(
                                                            open ? tag.id : null,
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
                                                                Etiketi Sil
                                                            </DialogTitle>
                                                            <DialogDescription>
                                                                Bu etiketi silmek
                                                                istediğinizden emin
                                                                misiniz? Bu işlem
                                                                geri alınamaz.
                                                            </DialogDescription>
                                                        </DialogHeader>
                                                        <DialogFooter>
                                                            <Button
                                                                variant="outline"
                                                                onClick={() =>
                                                                    setDeleteTagId(
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
                                                                        tag.id,
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
                                    Henüz etiket eklenmemiş.
                                </div>
                            )}
                        </div>
                    </CardContent>
                </Card>
            </div>
        </AppLayout>
    );
}

