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
    supportTicket: {
        id: number;
        ticket_number: string;
        subject: string;
        message: string;
        status: 'open' | 'in_progress' | 'resolved' | 'closed';
        priority: 'low' | 'medium' | 'high' | 'urgent';
        admin_notes?: string;
        customer?: {
            id: number;
            name: string;
            email: string;
        };
        assigned_user?: {
            id: number;
            name: string;
        };
        replies?: Array<{
            id: number;
            message: string;
            is_internal: boolean;
            user?: {
                id: number;
                name: string;
            };
            customer?: {
                id: number;
                name: string;
            };
            created_at: string;
        }>;
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
        title: 'Destek Talepleri',
        href: '/admin/support-tickets',
    },
    {
        title: 'Talep Detayı',
        href: '#',
    },
];

const statusLabels: Record<string, string> = {
    open: 'Açık',
    in_progress: 'İşleniyor',
    resolved: 'Çözüldü',
    closed: 'Kapatıldı',
};

const priorityLabels: Record<string, string> = {
    low: 'Düşük',
    medium: 'Orta',
    high: 'Yüksek',
    urgent: 'Acil',
};

export default function SupportTicketsShow({ supportTicket }: Props) {
    const [showDeleteDialog, setShowDeleteDialog] = useState(false);

    const { data, setData, put, processing } = useForm({
        status: supportTicket.status,
        priority: supportTicket.priority,
        admin_notes: supportTicket.admin_notes || '',
    });

    const handleSubmit = (e: React.FormEvent) => {
        e.preventDefault();
        put(`/admin/support-tickets/${supportTicket.id}`);
    };

    const handleDelete = () => {
        router.delete(`/admin/support-tickets/${supportTicket.id}`, {
            onSuccess: () => {
                router.visit('/admin/support-tickets');
            },
        });
        setShowDeleteDialog(false);
    };

    return (
        <AppLayout breadcrumbs={breadcrumbs}>
            <Head
                title={`${supportTicket.ticket_number} - Destek Talebi Detayı`}
            />

            <div className="flex-1 space-y-6 p-6">
                <div className="flex items-center justify-between">
                    <div>
                        <h1 className="text-3xl font-bold tracking-tight">
                            {supportTicket.ticket_number}
                        </h1>
                        <p className="mt-1 text-muted-foreground">
                            {supportTicket.subject}
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
                        <Link href="/admin/support-tickets">
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
                            <CardTitle>Talep Bilgileri</CardTitle>
                        </CardHeader>
                        <CardContent className="space-y-4">
                            <div>
                                <label className="text-sm font-medium text-muted-foreground">
                                    Talep Numarası
                                </label>
                                <p className="font-mono text-sm">
                                    {supportTicket.ticket_number}
                                </p>
                            </div>
                            <div>
                                <label className="text-sm font-medium text-muted-foreground">
                                    Konu
                                </label>
                                <p className="text-sm font-medium">
                                    {supportTicket.subject}
                                </p>
                            </div>
                            {supportTicket.customer && (
                                <div>
                                    <label className="text-sm font-medium text-muted-foreground">
                                        Müşteri
                                    </label>
                                    <p className="text-sm font-medium">
                                        {supportTicket.customer.name} (
                                        {supportTicket.customer.email})
                                    </p>
                                </div>
                            )}
                            <div>
                                <label className="text-sm font-medium text-muted-foreground">
                                    Mesaj
                                </label>
                                <div className="mt-2 rounded-md bg-muted p-4">
                                    <p className="text-sm whitespace-pre-wrap">
                                        {supportTicket.message}
                                    </p>
                                </div>
                            </div>
                            <div>
                                <label className="text-sm font-medium text-muted-foreground">
                                    Oluşturulma Tarihi
                                </label>
                                <p className="text-sm font-medium">
                                    {new Date(
                                        supportTicket.created_at,
                                    ).toLocaleString('tr-TR')}
                                </p>
                            </div>
                        </CardContent>
                    </Card>

                    {supportTicket.replies &&
                        supportTicket.replies.length > 0 && (
                            <Card>
                                <CardHeader>
                                    <CardTitle>Yanıtlar</CardTitle>
                                </CardHeader>
                                <CardContent className="space-y-4">
                                    {supportTicket.replies.map((reply) => (
                                        <div
                                            key={reply.id}
                                            className="rounded-md border p-4"
                                        >
                                            <div className="mb-2 flex items-center justify-between">
                                                <div className="flex items-center gap-2">
                                                    <span className="text-sm font-medium">
                                                        {reply.user
                                                            ? reply.user.name
                                                            : reply.customer
                                                              ? reply.customer
                                                                    .name
                                                              : 'Bilinmeyen'}
                                                    </span>
                                                    {reply.is_internal && (
                                                        <Badge variant="secondary">
                                                            İç Not
                                                        </Badge>
                                                    )}
                                                </div>
                                                <span className="text-xs text-muted-foreground">
                                                    {new Date(
                                                        reply.created_at,
                                                    ).toLocaleString('tr-TR')}
                                                </span>
                                            </div>
                                            <p className="text-sm whitespace-pre-wrap">
                                                {reply.message}
                                            </p>
                                        </div>
                                    ))}
                                </CardContent>
                            </Card>
                        )}

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
                                            <SelectItem value="open">
                                                Açık
                                            </SelectItem>
                                            <SelectItem value="in_progress">
                                                İşleniyor
                                            </SelectItem>
                                            <SelectItem value="resolved">
                                                Çözüldü
                                            </SelectItem>
                                            <SelectItem value="closed">
                                                Kapatıldı
                                            </SelectItem>
                                        </SelectContent>
                                    </Select>
                                </div>

                                <div className="grid gap-2">
                                    <label className="text-sm font-medium">
                                        Öncelik
                                    </label>
                                    <Select
                                        value={data.priority}
                                        onValueChange={(value) =>
                                            setData('priority', value as any)
                                        }
                                    >
                                        <SelectTrigger>
                                            <SelectValue />
                                        </SelectTrigger>
                                        <SelectContent>
                                            <SelectItem value="low">
                                                Düşük
                                            </SelectItem>
                                            <SelectItem value="medium">
                                                Orta
                                            </SelectItem>
                                            <SelectItem value="high">
                                                Yüksek
                                            </SelectItem>
                                            <SelectItem value="urgent">
                                                Acil
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
                            <DialogTitle>Destek Talebini Sil</DialogTitle>
                            <DialogDescription>
                                Bu destek talebini silmek istediğinizden emin
                                misiniz? Bu işlem geri alınamaz.
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
