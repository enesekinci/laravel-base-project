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
import { destroy, edit, index } from '@/routes/admin/variation-templates';
import { type BreadcrumbItem } from '@/types';
import { Head, Link, router } from '@inertiajs/react';
import { ArrowLeft, Edit, Trash2 } from 'lucide-react';
import { useState } from 'react';

interface VariationTemplateValue {
    id: number;
    label: string;
    value?: string;
    color?: string;
    image?: string;
    sort_order: number;
}

interface Props {
    template: {
        id: number;
        name: string;
        type: 'text' | 'color' | 'image';
        sort_order: number;
        is_active: boolean;
        values?: VariationTemplateValue[];
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
        title: 'Varyasyon Şablonları',
        href: '/admin/variation-templates',
    },
    {
        title: 'Şablon Detayı',
        href: '#',
    },
];

const typeLabels: Record<string, string> = {
    text: 'Metin',
    color: 'Renk',
    image: 'Resim',
};

export default function VariationTemplatesShow({ template }: Props) {
    const [showDeleteDialog, setShowDeleteDialog] = useState(false);

    const handleDelete = () => {
        router.delete(destroy(template.id).url, {
            onSuccess: () => {
                router.visit(index().url);
            },
        });
        setShowDeleteDialog(false);
    };

    return (
        <AppLayout breadcrumbs={breadcrumbs}>
            <Head title={`${template.name} - Şablon Detayı`} />

            <div className="flex-1 space-y-6 p-6">
                <div className="flex items-center justify-between">
                    <div>
                        <h1 className="text-3xl font-bold tracking-tight">
                            {template.name}
                        </h1>
                        <p className="mt-1 text-muted-foreground">
                            Varyasyon şablonu detay bilgileri
                        </p>
                    </div>
                    <div className="flex gap-2">
                        <Link href={edit(template.id)}>
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
                                    <DialogTitle>Şablonu Sil</DialogTitle>
                                    <DialogDescription>
                                        Bu şablonu silmek istediğinizden emin
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
                        <CardTitle>Şablon Bilgileri</CardTitle>
                    </CardHeader>
                    <CardContent className="space-y-4">
                        <div>
                            <p className="text-sm font-medium text-muted-foreground">
                                Ad
                            </p>
                            <p className="mt-1 text-lg">{template.name}</p>
                        </div>
                        <div>
                            <p className="text-sm font-medium text-muted-foreground">
                                Tip
                            </p>
                            <div className="mt-1">
                                <Badge>{typeLabels[template.type] || template.type}</Badge>
                            </div>
                        </div>
                        <div>
                            <p className="text-sm font-medium text-muted-foreground">
                                Durum
                            </p>
                            <div className="mt-1">
                                <Badge
                                    variant={
                                        template.is_active
                                            ? 'default'
                                            : 'secondary'
                                    }
                                >
                                    {template.is_active ? 'Aktif' : 'Pasif'}
                                </Badge>
                            </div>
                        </div>
                        <div>
                            <p className="text-sm font-medium text-muted-foreground">
                                Sıra
                            </p>
                            <p className="mt-1 text-lg">{template.sort_order}</p>
                        </div>
                    </CardContent>
                </Card>

                {template.values && template.values.length > 0 && (
                    <Card>
                        <CardHeader>
                            <CardTitle>
                                Değerler ({template.values.length})
                            </CardTitle>
                        </CardHeader>
                        <CardContent>
                            <div className="space-y-4">
                                {template.values.map((value) => (
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
                                                </div>
                                                {template.type === 'color' &&
                                                    value.color && (
                                                        <div className="mt-2 flex items-center gap-2">
                                                            <div
                                                                className="h-6 w-6 rounded border"
                                                                style={{
                                                                    backgroundColor:
                                                                        value.color,
                                                                }}
                                                            />
                                                            <span className="text-sm text-muted-foreground">
                                                                {value.color}
                                                            </span>
                                                        </div>
                                                    )}
                                                {template.type === 'image' &&
                                                    value.image && (
                                                        <div className="mt-2">
                                                            <img
                                                                src={value.image}
                                                                alt={value.label}
                                                                className="h-16 w-16 rounded border object-cover"
                                                            />
                                                        </div>
                                                    )}
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

