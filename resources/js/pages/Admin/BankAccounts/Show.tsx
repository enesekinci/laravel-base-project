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
import AppLayout from '@/layouts/app-layout';
import { type BreadcrumbItem } from '@/types';
import { Head, Link, router } from '@inertiajs/react';
import { ArrowLeft, Edit, Trash2 } from 'lucide-react';
import { useState } from 'react';

interface Props {
    bankAccount: {
        id: number;
        bank_name: string;
        account_holder: string;
        account_number: string;
        iban?: string;
        branch?: string;
        currency: string;
        notes?: string;
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
        title: 'Banka Hesapları',
        href: '/admin/bank-accounts',
    },
    {
        title: 'Banka Hesabı Detayı',
        href: '#',
    },
];

export default function BankAccountsShow({ bankAccount }: Props) {
    const [showDeleteDialog, setShowDeleteDialog] = useState(false);

    const handleDelete = () => {
        router.delete(`/admin/bank-accounts/${bankAccount.id}`, {
            onSuccess: () => {
                router.visit('/admin/bank-accounts');
            },
        });
        setShowDeleteDialog(false);
    };

    return (
        <AppLayout breadcrumbs={breadcrumbs}>
            <Head title={`${bankAccount.bank_name} - Banka Hesabı Detayı`} />

            <div className="flex-1 space-y-6 p-6">
                <div className="flex items-center justify-between">
                    <div>
                        <h1 className="text-3xl font-bold tracking-tight">
                            {bankAccount.bank_name}
                        </h1>
                        <p className="mt-1 text-muted-foreground">
                            Banka hesabı detay bilgileri
                        </p>
                    </div>
                    <div className="flex gap-2">
                        <Link
                            href={`/admin/bank-accounts/${bankAccount.id}/edit`}
                        >
                            <Button>
                                <Edit className="mr-2 h-4 w-4" />
                                Düzenle
                            </Button>
                        </Link>
                        <Button
                            variant="destructive"
                            onClick={() => setShowDeleteDialog(true)}
                        >
                            <Trash2 className="mr-2 h-4 w-4" />
                            Sil
                        </Button>
                        <Link href="/admin/bank-accounts">
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
                            <CardTitle>Banka Hesabı Bilgileri</CardTitle>
                        </CardHeader>
                        <CardContent className="space-y-4">
                            <div>
                                <label className="text-sm font-medium text-muted-foreground">
                                    Banka Adı
                                </label>
                                <p className="text-sm font-medium">
                                    {bankAccount.bank_name}
                                </p>
                            </div>
                            <div>
                                <label className="text-sm font-medium text-muted-foreground">
                                    Hesap Sahibi
                                </label>
                                <p className="text-sm font-medium">
                                    {bankAccount.account_holder}
                                </p>
                            </div>
                            <div>
                                <label className="text-sm font-medium text-muted-foreground">
                                    Hesap Numarası
                                </label>
                                <p className="font-mono text-sm">
                                    {bankAccount.account_number}
                                </p>
                            </div>
                            {bankAccount.iban && (
                                <div>
                                    <label className="text-sm font-medium text-muted-foreground">
                                        IBAN
                                    </label>
                                    <p className="font-mono text-sm">
                                        {bankAccount.iban}
                                    </p>
                                </div>
                            )}
                            {bankAccount.branch && (
                                <div>
                                    <label className="text-sm font-medium text-muted-foreground">
                                        Şube
                                    </label>
                                    <p className="text-sm font-medium">
                                        {bankAccount.branch}
                                    </p>
                                </div>
                            )}
                            <div>
                                <label className="text-sm font-medium text-muted-foreground">
                                    Para Birimi
                                </label>
                                <p className="text-sm font-medium">
                                    {bankAccount.currency}
                                </p>
                            </div>
                            {bankAccount.notes && (
                                <div>
                                    <label className="text-sm font-medium text-muted-foreground">
                                        Notlar
                                    </label>
                                    <p className="text-sm whitespace-pre-wrap">
                                        {bankAccount.notes}
                                    </p>
                                </div>
                            )}
                            <div>
                                <label className="text-sm font-medium text-muted-foreground">
                                    Durum
                                </label>
                                <div className="mt-2">
                                    {bankAccount.is_active ? (
                                        <Badge variant="default">Aktif</Badge>
                                    ) : (
                                        <Badge variant="secondary">Pasif</Badge>
                                    )}
                                </div>
                            </div>
                            <div>
                                <label className="text-sm font-medium text-muted-foreground">
                                    Oluşturulma Tarihi
                                </label>
                                <p className="text-sm font-medium">
                                    {new Date(
                                        bankAccount.created_at,
                                    ).toLocaleString('tr-TR')}
                                </p>
                            </div>
                            <div>
                                <label className="text-sm font-medium text-muted-foreground">
                                    Güncellenme Tarihi
                                </label>
                                <p className="text-sm font-medium">
                                    {new Date(
                                        bankAccount.updated_at,
                                    ).toLocaleString('tr-TR')}
                                </p>
                            </div>
                        </CardContent>
                    </Card>
                </div>

                <Dialog
                    open={showDeleteDialog}
                    onOpenChange={setShowDeleteDialog}
                >
                    <DialogContent>
                        <DialogHeader>
                            <DialogTitle>Banka Hesabını Sil</DialogTitle>
                            <DialogDescription>
                                Bu banka hesabını silmek istediğinizden emin
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
