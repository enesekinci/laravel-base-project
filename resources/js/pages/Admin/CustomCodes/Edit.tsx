import InputError from '@/components/input-error';
import { Button } from '@/components/ui/button';
import { Card, CardContent, CardHeader, CardTitle } from '@/components/ui/card';
import { Checkbox } from '@/components/ui/checkbox';
import { Input } from '@/components/ui/input';
import { Label } from '@/components/ui/label';
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
import { Head, Link, useForm } from '@inertiajs/react';
import { ArrowLeft } from 'lucide-react';

interface Props {
    customCode: {
        id: number;
        name: string;
        location?: string;
        code: string;
        is_active: boolean;
    };
}

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Dashboard',
        href: '/admin/dashboard',
    },
    {
        title: 'Özel Kodlar',
        href: '/admin/custom-codes',
    },
    {
        title: 'Özel Kod Düzenle',
        href: '#',
    },
];

export default function CustomCodesEdit({ customCode }: Props) {
    const { data, setData, put, processing, errors } = useForm({
        name: customCode.name,
        location: customCode.location || '',
        code: customCode.code,
        is_active: customCode.is_active,
    });

    const handleSubmit = (e: React.FormEvent) => {
        e.preventDefault();
        put(`/admin/custom-codes/${customCode.id}`);
    };

    return (
        <AppLayout breadcrumbs={breadcrumbs}>
            <Head title="Özel Kod Düzenle" />

            <div className="flex-1 space-y-6 p-6">
                <div className="flex items-center justify-between">
                    <div>
                        <h1 className="text-3xl font-bold tracking-tight">
                            Özel Kod Düzenle
                        </h1>
                        <p className="mt-1 text-muted-foreground">
                            {customCode.name} özel kodunu düzenleyin
                        </p>
                    </div>
                    <div className="flex gap-2">
                        <Link href={`/admin/custom-codes/${customCode.id}`}>
                            <Button variant="outline">Görüntüle</Button>
                        </Link>
                        <Link href="/admin/custom-codes">
                            <Button variant="outline">
                                <ArrowLeft className="mr-2 h-4 w-4" />
                                Geri Dön
                            </Button>
                        </Link>
                    </div>
                </div>

                <Card>
                    <CardHeader>
                        <CardTitle>Özel Kod Bilgileri</CardTitle>
                    </CardHeader>
                    <CardContent>
                        <form onSubmit={handleSubmit} className="space-y-6">
                            <div className="grid gap-2">
                                <Label htmlFor="name">
                                    Ad <span className="text-red-500">*</span>
                                </Label>
                                <Input
                                    id="name"
                                    name="name"
                                    required
                                    placeholder="Özel kod adı"
                                    value={data.name}
                                    onChange={(e) =>
                                        setData('name', e.target.value)
                                    }
                                />
                                <InputError message={errors.name} />
                            </div>

                            <div className="grid gap-2">
                                <Label htmlFor="location">Konum</Label>
                                <Select
                                    value={data.location}
                                    onValueChange={(value) =>
                                        setData('location', value)
                                    }
                                >
                                    <SelectTrigger>
                                        <SelectValue placeholder="Konum seçin" />
                                    </SelectTrigger>
                                    <SelectContent>
                                        <SelectItem value="header">Header</SelectItem>
                                        <SelectItem value="footer">Footer</SelectItem>
                                        <SelectItem value="body_start">
                                            Body Başlangıcı
                                        </SelectItem>
                                        <SelectItem value="body_end">
                                            Body Sonu
                                        </SelectItem>
                                    </SelectContent>
                                </Select>
                                <InputError message={errors.location} />
                            </div>

                            <div className="grid gap-2">
                                <Label htmlFor="code">
                                    Kod <span className="text-red-500">*</span>
                                </Label>
                                <Textarea
                                    id="code"
                                    name="code"
                                    required
                                    rows={10}
                                    placeholder="HTML, CSS, JavaScript kodları..."
                                    value={data.code}
                                    onChange={(e) =>
                                        setData('code', e.target.value)
                                    }
                                    className="font-mono text-sm"
                                />
                                <InputError message={errors.code} />
                            </div>

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
                            <InputError message={errors.is_active} />

                            <div className="flex justify-end gap-2">
                                <Link href="/admin/custom-codes">
                                    <Button type="button" variant="outline">
                                        İptal
                                    </Button>
                                </Link>
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
        </AppLayout>
    );
}

