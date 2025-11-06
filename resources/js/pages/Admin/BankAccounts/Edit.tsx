import InputError from '@/components/input-error';
import { Button } from '@/components/ui/button';
import { Card, CardContent, CardHeader, CardTitle } from '@/components/ui/card';
import { Checkbox } from '@/components/ui/checkbox';
import { Input } from '@/components/ui/input';
import { Label } from '@/components/ui/label';
import { Textarea } from '@/components/ui/textarea';
import AppLayout from '@/layouts/app-layout';
import { type BreadcrumbItem } from '@/types';
import { Head, Link, useForm } from '@inertiajs/react';
import { ArrowLeft } from 'lucide-react';

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
        title: 'Banka Hesabı Düzenle',
        href: '#',
    },
];

export default function BankAccountsEdit({ bankAccount }: Props) {
    const { data, setData, put, processing, errors } = useForm({
        bank_name: bankAccount.bank_name,
        account_holder: bankAccount.account_holder,
        account_number: bankAccount.account_number,
        iban: bankAccount.iban || '',
        branch: bankAccount.branch || '',
        currency: bankAccount.currency,
        notes: bankAccount.notes || '',
        is_active: bankAccount.is_active,
    });

    const handleSubmit = (e: React.FormEvent) => {
        e.preventDefault();
        put(`/admin/bank-accounts/${bankAccount.id}`);
    };

    return (
        <AppLayout breadcrumbs={breadcrumbs}>
            <Head title="Banka Hesabı Düzenle" />

            <div className="flex-1 space-y-6 p-6">
                <div className="flex items-center justify-between">
                    <div>
                        <h1 className="text-3xl font-bold tracking-tight">
                            Banka Hesabı Düzenle
                        </h1>
                        <p className="mt-1 text-muted-foreground">
                            {bankAccount.bank_name} banka hesabını düzenleyin
                        </p>
                    </div>
                    <div className="flex gap-2">
                        <Link href={`/admin/bank-accounts/${bankAccount.id}`}>
                            <Button variant="outline">Görüntüle</Button>
                        </Link>
                        <Link href="/admin/bank-accounts">
                            <Button variant="outline">
                                <ArrowLeft className="mr-2 h-4 w-4" />
                                Geri Dön
                            </Button>
                        </Link>
                    </div>
                </div>

                <Card>
                    <CardHeader>
                        <CardTitle>Banka Hesabı Bilgileri</CardTitle>
                    </CardHeader>
                    <CardContent>
                        <form onSubmit={handleSubmit} className="space-y-6">
                            <div className="grid gap-2">
                                <Label htmlFor="bank_name">
                                    Banka Adı{' '}
                                    <span className="text-red-500">*</span>
                                </Label>
                                <Input
                                    id="bank_name"
                                    name="bank_name"
                                    required
                                    placeholder="Banka adı"
                                    value={data.bank_name}
                                    onChange={(e) =>
                                        setData('bank_name', e.target.value)
                                    }
                                />
                                <InputError message={errors.bank_name} />
                            </div>

                            <div className="grid gap-2">
                                <Label htmlFor="account_holder">
                                    Hesap Sahibi{' '}
                                    <span className="text-red-500">*</span>
                                </Label>
                                <Input
                                    id="account_holder"
                                    name="account_holder"
                                    required
                                    placeholder="Hesap sahibi adı"
                                    value={data.account_holder}
                                    onChange={(e) =>
                                        setData(
                                            'account_holder',
                                            e.target.value,
                                        )
                                    }
                                />
                                <InputError message={errors.account_holder} />
                            </div>

                            <div className="grid gap-2">
                                <Label htmlFor="account_number">
                                    Hesap Numarası{' '}
                                    <span className="text-red-500">*</span>
                                </Label>
                                <Input
                                    id="account_number"
                                    name="account_number"
                                    required
                                    placeholder="Hesap numarası"
                                    value={data.account_number}
                                    onChange={(e) =>
                                        setData(
                                            'account_number',
                                            e.target.value,
                                        )
                                    }
                                />
                                <InputError message={errors.account_number} />
                            </div>

                            <div className="grid gap-2">
                                <Label htmlFor="iban">IBAN</Label>
                                <Input
                                    id="iban"
                                    name="iban"
                                    placeholder="TR00 0000 0000 0000 0000 0000 00"
                                    value={data.iban}
                                    onChange={(e) =>
                                        setData('iban', e.target.value)
                                    }
                                />
                                <InputError message={errors.iban} />
                            </div>

                            <div className="grid gap-2">
                                <Label htmlFor="branch">Şube</Label>
                                <Input
                                    id="branch"
                                    name="branch"
                                    placeholder="Şube adı/kodu"
                                    value={data.branch}
                                    onChange={(e) =>
                                        setData('branch', e.target.value)
                                    }
                                />
                                <InputError message={errors.branch} />
                            </div>

                            <div className="grid gap-2">
                                <Label htmlFor="currency">Para Birimi</Label>
                                <Input
                                    id="currency"
                                    name="currency"
                                    maxLength={3}
                                    placeholder="TRY"
                                    value={data.currency}
                                    onChange={(e) =>
                                        setData(
                                            'currency',
                                            e.target.value.toUpperCase(),
                                        )
                                    }
                                />
                                <InputError message={errors.currency} />
                            </div>

                            <div className="grid gap-2">
                                <Label htmlFor="notes">Notlar</Label>
                                <Textarea
                                    id="notes"
                                    name="notes"
                                    rows={3}
                                    placeholder="Notlar..."
                                    value={data.notes}
                                    onChange={(e) =>
                                        setData('notes', e.target.value)
                                    }
                                />
                                <InputError message={errors.notes} />
                            </div>

                            <div className="flex items-center space-x-2">
                                <Checkbox
                                    id="is_active"
                                    checked={data.is_active}
                                    onCheckedChange={(checked) => {
                                        setData('is_active', checked === true);
                                    }}
                                />
                                <Label
                                    htmlFor="is_active"
                                    className="text-sm leading-none font-normal peer-disabled:cursor-not-allowed peer-disabled:opacity-70"
                                >
                                    Aktif
                                </Label>
                            </div>
                            <InputError message={errors.is_active} />

                            <div className="flex justify-end gap-2">
                                <Link href="/admin/bank-accounts">
                                    <Button type="button" variant="outline">
                                        İptal
                                    </Button>
                                </Link>
                                <Button type="submit" disabled={processing}>
                                    {processing ? 'Kaydediliyor...' : 'Kaydet'}
                                </Button>
                            </div>
                        </form>
                    </CardContent>
                </Card>
            </div>
        </AppLayout>
    );
}
