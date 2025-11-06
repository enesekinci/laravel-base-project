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
} from '@/components/ui/dialog';
import { Checkbox } from '@/components/ui/checkbox';
import { Label } from '@/components/ui/label';
import AppLayout from '@/layouts/app-layout';
import { type BreadcrumbItem } from '@/types';
import { Head, Link, router, useForm } from '@inertiajs/react';
import { ArrowLeft, Trash2 } from 'lucide-react';
import { useState } from 'react';

interface Props {
    newsletter: {
        id: number;
        email: string;
        name?: string;
        is_active: boolean;
        subscribed_at: string;
        unsubscribed_at?: string;
        ip_address?: string;
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
        title: 'E-Bülten',
        href: '/admin/newsletters',
    },
    {
        title: 'Abone Detayı',
        href: '#',
    },
];

export default function NewslettersShow({ newsletter }: Props) {
    const [showDeleteDialog, setShowDeleteDialog] = useState(false);

    const { data, setData, put, processing } = useForm({
        is_active: newsletter.is_active,
    });

    const handleSubmit = (e: React.FormEvent) => {
        e.preventDefault();
        put(`/admin/newsletters/${newsletter.id}`);
    };

    const handleDelete = () => {
        router.delete(`/admin/newsletters/${newsletter.id}`, {
            onSuccess: () => {
                router.visit('/admin/newsletters');
            },
        });
        setShowDeleteDialog(false);
    };

    return (
        <AppLayout breadcrumbs={breadcrumbs}>
            <Head title={`${newsletter.email} - E-Bülten Abone Detayı`} />

            <div className="flex-1 space-y-6 p-6">
                <div className="flex items-center justify-between">
                    <div>
                        <h1 className="text-3xl font-bold tracking-tight">
                            {newsletter.email}
                        </h1>
                        <p className="mt-1 text-muted-foreground">
                            E-bülten abone detay bilgileri
                        </p>
                    </div>
                    <div className="flex gap-2">
                        <Button
                            variant="destructive"
                            onClick={() => setShowDeleteDialog(true)}
                        >
                            <Trash2 className="mr-2 h-4 w-4" />
                            Sil
                        </Button>
                        <Link href="/admin/newsletters">
                            <Button variant="outline">
                                <ArrowLeft className="mr-2 h-4 w-4" />
                                Geri Dön
                            </Button>
                        </Link>
                    </div>
                </div>

                <div className="grid gap-6">
                    <Card>
                        <CardHeader>
                            <CardTitle>Abone Bilgileri</CardTitle>
                        </CardHeader>
                        <CardContent className="space-y-4">
                            <div>
                                <label className="text-sm font-medium text-muted-foreground">
                                    E-posta
                                </label>
                                <p className="text-sm font-medium">
                                    {newsletter.email}
                                </p>
                            </div>
                            {newsletter.name && (
                                <div>
                                    <label className="text-sm font-medium text-muted-foreground">
                                        Ad
                                    </label>
                                    <p className="text-sm font-medium">
                                        {newsletter.name}
                                    </p>
                                </div>
                            )}
                            <div>
                                <label className="text-sm font-medium text-muted-foreground">
                                    Durum
                                </label>
                                <div className="mt-2">
                                    {newsletter.is_active ? (
                                        <Badge variant="default">Aktif</Badge>
                                    ) : (
                                        <Badge variant="secondary">Pasif</Badge>
                                    )}
                                </div>
                            </div>
                            <div>
                                <label className="text-sm font-medium text-muted-foreground">
                                    Abone Tarihi
                                </label>
                                <p className="text-sm font-medium">
                                    {new Date(
                                        newsletter.subscribed_at,
                                    ).toLocaleString('tr-TR')}
                                </p>
                            </div>
                            {newsletter.unsubscribed_at && (
                                <div>
                                    <label className="text-sm font-medium text-muted-foreground">
                                        Abonelikten Çıkış Tarihi
                                    </label>
                                    <p className="text-sm font-medium">
                                        {new Date(
                                            newsletter.unsubscribed_at,
                                        ).toLocaleString('tr-TR')}
                                    </p>
                                </div>
                            )}
                            {newsletter.ip_address && (
                                <div>
                                    <label className="text-sm font-medium text-muted-foreground">
                                        IP Adresi
                                    </label>
                                    <p className="text-sm font-mono">
                                        {newsletter.ip_address}
                                    </p>
                                </div>
                            )}
                            <div>
                                <label className="text-sm font-medium text-muted-foreground">
                                    Oluşturulma Tarihi
                                </label>
                                <p className="text-sm font-medium">
                                    {new Date(
                                        newsletter.created_at,
                                    ).toLocaleString('tr-TR')}
                                </p>
                            </div>
                        </CardContent>
                    </Card>

                    <Card>
                        <CardHeader>
                            <CardTitle>Yönetim</CardTitle>
                        </CardHeader>
                        <CardContent>
                            <form onSubmit={handleSubmit} className="space-y-6">
                                <div className="flex items-center space-x-2">
                                    <Checkbox
                                        id="is_active"
                                        checked={data.is_active}
                                        onCheckedChange={(checked) => {
                                            setData(
                                                'is_active',
                                                checked === true,
                                            );
                                        }}
                                    />
                                    <Label
                                        htmlFor="is_active"
                                        className="text-sm leading-none font-normal peer-disabled:cursor-not-allowed peer-disabled:opacity-70"
                                    >
                                        Aktif
                                    </Label>
                                </div>

                                <div className="flex justify-end">
                                    <Button type="submit" disabled={processing}>
                                        {processing
                                            ? 'Kaydediliyor...'
                                            : 'Kaydet'}
                                    </Button>
                                </div>
                            </form>
                        </CardContent>
                    </Card>
                </div>

                <Dialog
                    open={showDeleteDialog}
                    onOpenChange={setShowDeleteDialog}
                >
                    <DialogContent>
                        <DialogHeader>
                            <DialogTitle>Aboneyi Sil</DialogTitle>
                            <DialogDescription>
                                Bu aboneyi silmek istediğinizden emin misiniz? Bu
                                işlem geri alınamaz.
                            </DialogDescription>
                        </DialogHeader>
                        <DialogFooter>
                            <Button
                                variant="outline"
                                onClick={() => setShowDeleteDialog(false)}
                            >
                                İptal
                            </Button>
                            <Button variant="destructive" onClick={handleDelete}>
                                Sil
                            </Button>
                        </DialogFooter>
                    </DialogContent>
                </Dialog>
            </div>
        </AppLayout>
    );
}

