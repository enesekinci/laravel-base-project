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
import {
    Select,
    SelectContent,
    SelectItem,
    SelectTrigger,
    SelectValue,
} from '@/components/ui/select';
import { Textarea } from '@/components/ui/textarea';
import AppLayout from '@/layouts/app-layout';
import { type BreadcrumbItem } from '@/types';
import { Head, Link, router, useForm } from '@inertiajs/react';
import { ArrowLeft, Trash2 } from 'lucide-react';
import { useState } from 'react';

interface Props {
    paymentNotification: {
        id: number;
        name: string;
        email: string;
        phone?: string;
        order_number?: string;
        amount: number;
        currency: string;
        message: string;
        status: 'new' | 'processed' | 'closed';
        admin_notes?: string;
        customer?: {
            id: number;
            name: string;
        };
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
        title: 'Ödeme Bildirimleri',
        href: '/admin/payment-notifications',
    },
    {
        title: 'Bildirim Detayı',
        href: '#',
    },
];

const statusLabels: Record<string, string> = {
    new: 'Yeni',
    processed: 'İşlendi',
    closed: 'Kapatıldı',
};

export default function PaymentNotificationsShow({
    paymentNotification,
}: Props) {
    const [showDeleteDialog, setShowDeleteDialog] = useState(false);

    const { data, setData, put, processing } = useForm({
        status: paymentNotification.status,
        admin_notes: paymentNotification.admin_notes || '',
    });

    const handleSubmit = (e: React.FormEvent) => {
        e.preventDefault();
        put(`/admin/payment-notifications/${paymentNotification.id}`);
    };

    const handleDelete = () => {
        router.delete(
            `/admin/payment-notifications/${paymentNotification.id}`,
            {
                onSuccess: () => {
                    router.visit('/admin/payment-notifications');
                },
            },
        );
        setShowDeleteDialog(false);
    };

    return (
        <AppLayout breadcrumbs={breadcrumbs}>
            <Head title="Ödeme Bildirimi Detayı" />

            <div className="flex-1 space-y-6 p-6">
                <div className="flex items-center justify-between">
                    <div>
                        <h1 className="text-3xl font-bold tracking-tight">
                            Ödeme Bildirimi
                        </h1>
                        <p className="mt-1 text-muted-foreground">
                            Ödeme bildirimi detay bilgileri
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
                        <Link href="/admin/payment-notifications">
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
                            <CardTitle>Bildirim Bilgileri</CardTitle>
                        </CardHeader>
                        <CardContent className="space-y-4">
                            <div>
                                <label className="text-sm font-medium text-muted-foreground">
                                    Ad Soyad
                                </label>
                                <p className="text-sm font-medium">
                                    {paymentNotification.name}
                                </p>
                            </div>
                            <div>
                                <label className="text-sm font-medium text-muted-foreground">
                                    E-posta
                                </label>
                                <p className="text-sm font-medium">
                                    {paymentNotification.email}
                                </p>
                            </div>
                            {paymentNotification.phone && (
                                <div>
                                    <label className="text-sm font-medium text-muted-foreground">
                                        Telefon
                                    </label>
                                    <p className="text-sm font-medium">
                                        {paymentNotification.phone}
                                    </p>
                                </div>
                            )}
                            {paymentNotification.customer && (
                                <div>
                                    <label className="text-sm font-medium text-muted-foreground">
                                        Müşteri
                                    </label>
                                    <p className="text-sm font-medium">
                                        {paymentNotification.customer.name}
                                    </p>
                                </div>
                            )}
                            {paymentNotification.order_number && (
                                <div>
                                    <label className="text-sm font-medium text-muted-foreground">
                                        Sipariş No
                                    </label>
                                    <p className="font-mono text-sm">
                                        {paymentNotification.order_number}
                                    </p>
                                </div>
                            )}
                            <div>
                                <label className="text-sm font-medium text-muted-foreground">
                                    Tutar
                                </label>
                                <p className="text-sm font-medium">
                                    {paymentNotification.amount.toFixed(2)}{' '}
                                    {paymentNotification.currency}
                                </p>
                            </div>
                            <div>
                                <label className="text-sm font-medium text-muted-foreground">
                                    Mesaj
                                </label>
                                <div className="mt-2 rounded-md bg-muted p-4">
                                    <p className="text-sm whitespace-pre-wrap">
                                        {paymentNotification.message}
                                    </p>
                                </div>
                            </div>
                            <div>
                                <label className="text-sm font-medium text-muted-foreground">
                                    Oluşturulma Tarihi
                                </label>
                                <p className="text-sm font-medium">
                                    {new Date(
                                        paymentNotification.created_at,
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
                                <div className="grid gap-2">
                                    <label className="text-sm font-medium">
                                        Durum
                                    </label>
                                    <Select
                                        value={data.status}
                                        onValueChange={(value) =>
                                            setData('status', value as any)
                                        }
                                    >
                                        <SelectTrigger>
                                            <SelectValue />
                                        </SelectTrigger>
                                        <SelectContent>
                                            <SelectItem value="new">
                                                Yeni
                                            </SelectItem>
                                            <SelectItem value="processed">
                                                İşlendi
                                            </SelectItem>
                                            <SelectItem value="closed">
                                                Kapatıldı
                                            </SelectItem>
                                        </SelectContent>
                                    </Select>
                                </div>

                                <div className="grid gap-2">
                                    <label className="text-sm font-medium">
                                        Admin Notları
                                    </label>
                                    <Textarea
                                        rows={4}
                                        value={data.admin_notes}
                                        onChange={(e) =>
                                            setData(
                                                'admin_notes',
                                                e.target.value,
                                            )
                                        }
                                        placeholder="Notlar..."
                                    />
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
                            <DialogTitle>Bildirimi Sil</DialogTitle>
                            <DialogDescription>
                                Bu bildirimi silmek istediğinizden emin misiniz?
                                Bu işlem geri alınamaz.
                            </DialogDescription>
                        </DialogHeader>
                        <DialogFooter>
                            <Button
                                variant="outline"
                                onClick={() => setShowDeleteDialog(false)}
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
            </div>
        </AppLayout>
    );
}
