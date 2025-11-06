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
import { destroy, edit, index } from '@/routes/admin/tax-classes';
import { type BreadcrumbItem } from '@/types';
import { Head, Link, router } from '@inertiajs/react';
import { ArrowLeft, Edit, Trash2 } from 'lucide-react';
import { useState } from 'react';

interface Props {
    taxClass: {
        id: number;
        name: string;
        rate: number;
        is_active: boolean;
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
        title: 'Vergi Sınıfları',
        href: '/admin/tax-classes',
    },
    {
        title: 'Vergi Sınıfı Detayı',
        href: '#',
    },
];

export default function TaxClassesShow({ taxClass }: Props) {
    const [showDeleteDialog, setShowDeleteDialog] = useState(false);

    const handleDelete = () => {
        router.delete(destroy(taxClass.id).url, {
            onSuccess: () => {
                router.visit(index().url);
            },
        });
        setShowDeleteDialog(false);
    };

    return (
        <AppLayout breadcrumbs={breadcrumbs}>
            <Head title={`${taxClass.name} - Vergi Sınıfı Detayı`} />

            <div className="flex-1 space-y-6 p-6">
                <div className="flex items-center justify-between">
                    <div>
                        <h1 className="text-3xl font-bold tracking-tight">
                            {taxClass.name}
                        </h1>
                        <p className="mt-1 text-muted-foreground">
                            Vergi sınıfı detay bilgileri
                        </p>
                    </div>
                    <div className="flex gap-2">
                        <Link href={edit(taxClass.id)}>
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
                                    <DialogTitle>
                                        Vergi Sınıfını Sil
                                    </DialogTitle>
                                    <DialogDescription>
                                        Bu vergi sınıfını silmek istediğinizden
                                        emin misiniz? Bu işlem geri alınamaz.
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
                        <CardTitle>Vergi Sınıfı Bilgileri</CardTitle>
                    </CardHeader>
                    <CardContent className="space-y-4">
                        <div>
                            <p className="text-sm font-medium text-muted-foreground">
                                Ad
                            </p>
                            <p className="mt-1 text-lg">{taxClass.name}</p>
                        </div>
                        <div>
                            <p className="text-sm font-medium text-muted-foreground">
                                Oran
                            </p>
                            <p className="mt-1 text-lg">
                                %{taxClass.rate.toFixed(2)}
                            </p>
                        </div>
                        <div>
                            <p className="text-sm font-medium text-muted-foreground">
                                Durum
                            </p>
                            <div className="mt-1">
                                <Badge
                                    variant={
                                        taxClass.is_active
                                            ? 'default'
                                            : 'secondary'
                                    }
                                >
                                    {taxClass.is_active ? 'Aktif' : 'Pasif'}
                                </Badge>
                            </div>
                        </div>
                    </CardContent>
                </Card>
            </div>
        </AppLayout>
    );
}
