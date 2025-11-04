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
import AppLayout from '@/layouts/app-layout';
import { index, show, update } from '@/routes/admin/attributes';
import { type BreadcrumbItem } from '@/types';
import { Head, Link, useForm } from '@inertiajs/react';
import { ArrowLeft } from 'lucide-react';

interface Props {
    attribute: {
        id: number;
        name: string;
        slug: string;
        type: string;
        is_filterable: boolean;
        is_required: boolean;
        sort_order: number;
    };
}

const breadcrumbs: BreadcrumbItem[] = [
    { title: 'Dashboard', href: '/admin/dashboard' },
    { title: 'Özellikler', href: '/admin/attributes' },
    { title: 'Özellik Düzenle', href: '#' },
];

export default function AttributesEdit({ attribute }: Props) {
    const { data, setData, put, processing, errors } = useForm({
        name: attribute.name,
        slug: attribute.slug,
        type: attribute.type,
        sort_order: attribute.sort_order,
        is_filterable: attribute.is_filterable,
        is_required: attribute.is_required,
    });

    const handleSubmit = (e: React.FormEvent) => {
        e.preventDefault();
        put(update(attribute.id).url);
    };

    return (
        <AppLayout breadcrumbs={breadcrumbs}>
            <Head title="Özellik Düzenle" />
            <div className="flex-1 space-y-6 p-6">
                <div className="flex items-center justify-between">
                    <div>
                        <h1 className="text-3xl font-bold tracking-tight">
                            Özellik Düzenle
                        </h1>
                        <p className="mt-1 text-muted-foreground">
                            {attribute.name} özelliğini düzenleyin
                        </p>
                    </div>
                    <div className="flex gap-2">
                        <Link href={show(attribute.id)}>
                            <Button variant="outline">Görüntüle</Button>
                        </Link>
                        <Link href={index()}>
                            <Button variant="outline">
                                <ArrowLeft className="mr-2 h-4 w-4" /> Geri Dön
                            </Button>
                        </Link>
                    </div>
                </div>
                <Card>
                    <CardHeader>
                        <CardTitle>Özellik Bilgileri</CardTitle>
                    </CardHeader>
                    <CardContent>
                        <form onSubmit={handleSubmit} className="space-y-6">
                            <>
                                <div className="grid gap-2">
                                    <Label htmlFor="name">
                                        Özellik Adı{' '}
                                        <span className="text-red-500">*</span>
                                    </Label>
                                    <Input
                                        id="name"
                                        name="name"
                                        required
                                        value={data.name}
                                        onChange={(e) =>
                                            setData('name', e.target.value)
                                        }
                                    />
                                    <InputError message={errors.name} />
                                </div>
                                <div className="grid gap-2">
                                    <Label htmlFor="slug">
                                        Slug{' '}
                                        <span className="text-red-500">*</span>
                                    </Label>
                                    <Input
                                        id="slug"
                                        name="slug"
                                        required
                                        value={data.slug}
                                        onChange={(e) =>
                                            setData('slug', e.target.value)
                                        }
                                    />
                                    <InputError message={errors.slug} />
                                </div>
                                <div className="grid gap-2">
                                    <Label htmlFor="type">
                                        Tip{' '}
                                        <span className="text-red-500">*</span>
                                    </Label>
                                    <Select
                                        value={data.type}
                                        onValueChange={(value) =>
                                            setData('type', value)
                                        }
                                    >
                                        <SelectTrigger>
                                            <SelectValue />
                                        </SelectTrigger>
                                        <SelectContent>
                                            <SelectItem value="text">
                                                Metin
                                            </SelectItem>
                                            <SelectItem value="select">
                                                Seçim
                                            </SelectItem>
                                            <SelectItem value="multiselect">
                                                Çoklu Seçim
                                            </SelectItem>
                                            <SelectItem value="color">
                                                Renk
                                            </SelectItem>
                                            <SelectItem value="size">
                                                Beden
                                            </SelectItem>
                                        </SelectContent>
                                    </Select>
                                    <InputError message={errors.type} />
                                </div>
                                <div className="grid gap-2">
                                    <Label htmlFor="sort_order">Sıra</Label>
                                    <Input
                                        id="sort_order"
                                        name="sort_order"
                                        type="number"
                                        value={data.sort_order}
                                        onChange={(e) =>
                                            setData(
                                                'sort_order',
                                                parseInt(e.target.value) || 0,
                                            )
                                        }
                                        min={0}
                                    />
                                    <InputError message={errors.sort_order} />
                                </div>
                                <div className="flex items-center space-x-2">
                                    <Checkbox
                                        id="is_filterable"
                                        checked={data.is_filterable}
                                        onCheckedChange={(checked) =>
                                            setData(
                                                'is_filterable',
                                                checked === true,
                                            )
                                        }
                                    />
                                    <Label
                                        htmlFor="is_filterable"
                                        className="text-sm leading-none font-normal"
                                    >
                                        Filtrelenebilir
                                    </Label>
                                </div>
                                <InputError message={errors.is_filterable} />
                                <div className="flex items-center space-x-2">
                                    <Checkbox
                                        id="is_required"
                                        checked={data.is_required}
                                        onCheckedChange={(checked) =>
                                            setData(
                                                'is_required',
                                                checked === true,
                                            )
                                        }
                                    />
                                    <Label
                                        htmlFor="is_required"
                                        className="text-sm leading-none font-normal"
                                    >
                                        Zorunlu
                                    </Label>
                                </div>
                                <InputError message={errors.is_required} />
                                <div className="flex justify-end gap-2">
                                    <Link href={index()}>
                                        <Button type="button" variant="outline">
                                            İptal
                                        </Button>
                                    </Link>
                                    <Button type="submit" disabled={processing}>
                                        {processing
                                            ? 'Güncelleniyor...'
                                            : 'Güncelle'}
                                    </Button>
                                </div>
                            </>
                        </form>
                    </CardContent>
                </Card>
            </div>
        </AppLayout>
    );
}
