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
    contactForm: {
        id: number;
        name: string;
        email: string;
        phone?: string;
        subject: string;
        message: string;
        status: 'new' | 'read' | 'replied' | 'closed';
        admin_notes?: string;
        assigned_user?: {
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
        title: 'İletişim Formları',
        href: '/admin/contact-forms',
    },
    {
        title: 'Form Detayı',
        href: '#',
    },
];

const statusLabels: Record<string, string> = {
    new: 'Yeni',
    read: 'Okundu',
    replied: 'Yanıtlandı',
    closed: 'Kapatıldı',
};

export default function ContactFormsShow({ contactForm }: Props) {
    const [showDeleteDialog, setShowDeleteDialog] = useState(false);

    const { data, setData, put, processing } = useForm({
        status: contactForm.status,
        admin_notes: contactForm.admin_notes || '',
    });

    const handleSubmit = (e: React.FormEvent) => {
        e.preventDefault();
        put(`/admin/contact-forms/${contactForm.id}`);
    };

    const handleDelete = () => {
        router.delete(`/admin/contact-forms/${contactForm.id}`, {
            onSuccess: () => {
                router.visit('/admin/contact-forms');
            },
        });
        setShowDeleteDialog(false);
    };

    return (
        <AppLayout breadcrumbs={breadcrumbs}>
            <Head title={`${contactForm.subject} - İletişim Formu Detayı`} />

            <div className="flex-1 space-y-6 p-6">
                <div className="flex items-center justify-between">
                    <div>
                        <h1 className="text-3xl font-bold tracking-tight">
                            {contactForm.subject}
                        </h1>
                        <p className="mt-1 text-muted-foreground">
                            İletişim formu detay bilgileri
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
                        <Link href="/admin/contact-forms">
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
                            <CardTitle>Form Bilgileri</CardTitle>
                        </CardHeader>
                        <CardContent className="space-y-4">
                            <div>
                                <label className="text-sm font-medium text-muted-foreground">
                                    Ad Soyad
                                </label>
                                <p className="text-sm font-medium">
                                    {contactForm.name}
                                </p>
                            </div>
                            <div>
                                <label className="text-sm font-medium text-muted-foreground">
                                    E-posta
                                </label>
                                <p className="text-sm font-medium">
                                    {contactForm.email}
                                </p>
                            </div>
                            {contactForm.phone && (
                                <div>
                                    <label className="text-sm font-medium text-muted-foreground">
                                        Telefon
                                    </label>
                                    <p className="text-sm font-medium">
                                        {contactForm.phone}
                                    </p>
                                </div>
                            )}
                            <div>
                                <label className="text-sm font-medium text-muted-foreground">
                                    Konu
                                </label>
                                <p className="text-sm font-medium">
                                    {contactForm.subject}
                                </p>
                            </div>
                            <div>
                                <label className="text-sm font-medium text-muted-foreground">
                                    Mesaj
                                </label>
                                <div className="mt-2 rounded-md bg-muted p-4">
                                    <p className="text-sm whitespace-pre-wrap">
                                        {contactForm.message}
                                    </p>
                                </div>
                            </div>
                            <div>
                                <label className="text-sm font-medium text-muted-foreground">
                                    Oluşturulma Tarihi
                                </label>
                                <p className="text-sm font-medium">
                                    {new Date(
                                        contactForm.created_at,
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
                                            <SelectItem value="read">
                                                Okundu
                                            </SelectItem>
                                            <SelectItem value="replied">
                                                Yanıtlandı
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
                            <DialogTitle>Formu Sil</DialogTitle>
                            <DialogDescription>
                                Bu formu silmek istediğinizden emin misiniz? Bu
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
