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
import { type BreadcrumbItem } from '@/types';
import { Head, useForm } from '@inertiajs/react';
import { Plus, Trash2 } from 'lucide-react';

interface TopNoticeLink {
    label: string;
    url: string;
}

interface Props {
    topNotice: {
        text: string;
        links: TopNoticeLink[];
        footer_text?: string;
        is_active: boolean;
        background_color: string;
        text_color: string;
    };
}

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Dashboard',
        href: '/admin/dashboard',
    },
    {
        title: 'Top Notice',
        href: '/admin/top-notice/edit',
    },
];

const backgroundColors = [
    { value: 'bg-dark', label: 'Koyu (Dark)' },
    { value: 'bg-primary', label: 'Birincil (Primary)' },
    { value: 'bg-secondary', label: 'İkincil (Secondary)' },
    { value: 'bg-success', label: 'Başarılı (Success)' },
    { value: 'bg-danger', label: 'Tehlike (Danger)' },
    { value: 'bg-warning', label: 'Uyarı (Warning)' },
    { value: 'bg-info', label: 'Bilgi (Info)' },
];

const textColors = [
    { value: 'text-white', label: 'Beyaz' },
    { value: 'text-dark', label: 'Koyu' },
    { value: 'text-primary', label: 'Birincil' },
    { value: 'text-secondary', label: 'İkincil' },
];

export default function TopNoticeEdit({ topNotice }: Props) {
    const { data, setData, put, processing, errors } = useForm({
        text: topNotice.text || '',
        links: topNotice.links || [],
        footer_text: topNotice.footer_text || '',
        is_active: topNotice.is_active ?? false,
        background_color: topNotice.background_color || 'bg-dark',
        text_color: topNotice.text_color || 'text-white',
    });

    const handleSubmit = (e: React.FormEvent) => {
        e.preventDefault();
        put('/admin/top-notice');
    };

    const addLink = () => {
        setData('links', [
            ...data.links,
            { label: '', url: '' },
        ]);
    };

    const removeLink = (index: number) => {
        setData(
            'links',
            data.links.filter((_, i) => i !== index),
        );
    };

    const updateLink = (index: number, field: 'label' | 'url', value: string) => {
        const updatedLinks = [...data.links];
        updatedLinks[index] = {
            ...updatedLinks[index],
            [field]: value,
        };
        setData('links', updatedLinks);
    };

    return (
        <AppLayout breadcrumbs={breadcrumbs}>
            <Head title="Top Notice Düzenle" />

            <div className="flex-1 space-y-6 p-6">
                <div className="flex items-center justify-between">
                    <div>
                        <h1 className="text-3xl font-bold tracking-tight">
                            Top Notice Düzenle
                        </h1>
                        <p className="mt-1 text-muted-foreground">
                            Sayfanın üst kısmında gösterilecek bildirimi yönetin
                        </p>
                    </div>
                </div>

                <Card>
                    <CardHeader>
                        <CardTitle>Top Notice Ayarları</CardTitle>
                    </CardHeader>
                    <CardContent>
                        <form onSubmit={handleSubmit} className="space-y-6">
                            <div className="grid gap-2">
                                <Label htmlFor="text">
                                    Ana Metin <span className="text-red-500">*</span>
                                </Label>
                                <Input
                                    id="text"
                                    name="text"
                                    required
                                    placeholder="Get Up to &lt;b&gt;40% OFF&lt;/b&gt; New-Season Styles"
                                    value={data.text}
                                    onChange={(e) =>
                                        setData('text', e.target.value)
                                    }
                                />
                                <p className="text-sm text-muted-foreground">
                                    HTML etiketleri kullanabilirsiniz (örn:{' '}
                                    <code>&lt;b&gt;</code>, <code>&lt;strong&gt;</code>)
                                </p>
                                <InputError message={errors.text} />
                            </div>

                            <div className="grid gap-2">
                                <div className="flex items-center justify-between">
                                    <Label>Linkler</Label>
                                    <Button
                                        type="button"
                                        variant="outline"
                                        size="sm"
                                        onClick={addLink}
                                    >
                                        <Plus className="mr-2 h-4 w-4" />
                                        Link Ekle
                                    </Button>
                                </div>

                                {data.links.length === 0 ? (
                                    <p className="text-sm text-muted-foreground">
                                        Henüz link eklenmemiş
                                    </p>
                                ) : (
                                    <div className="space-y-3">
                                        {data.links.map((link, index) => (
                                            <div
                                                key={index}
                                                className="flex gap-2 items-start"
                                            >
                                                <div className="flex-1 grid gap-2">
                                                    <Input
                                                        placeholder="Etiket (örn: MEN)"
                                                        value={link.label}
                                                        onChange={(e) =>
                                                            updateLink(
                                                                index,
                                                                'label',
                                                                e.target.value,
                                                            )
                                                        }
                                                    />
                                                    <InputError
                                                        message={
                                                            errors[
                                                                `links.${index}.label` as keyof typeof errors
                                                            ]
                                                        }
                                                    />
                                                </div>
                                                <div className="flex-1 grid gap-2">
                                                    <Input
                                                        placeholder="URL (örn: /shop)"
                                                        value={link.url}
                                                        onChange={(e) =>
                                                            updateLink(
                                                                index,
                                                                'url',
                                                                e.target.value,
                                                            )
                                                        }
                                                    />
                                                    <InputError
                                                        message={
                                                            errors[
                                                                `links.${index}.url` as keyof typeof errors
                                                            ]
                                                        }
                                                    />
                                                </div>
                                                <Button
                                                    type="button"
                                                    variant="outline"
                                                    size="icon"
                                                    onClick={() =>
                                                        removeLink(index)
                                                    }
                                                    className="mt-0"
                                                >
                                                    <Trash2 className="h-4 w-4" />
                                                </Button>
                                            </div>
                                        ))}
                                    </div>
                                )}
                                <InputError message={errors.links} />
                            </div>

                            <div className="grid gap-2">
                                <Label htmlFor="footer_text">Alt Metin</Label>
                                <Input
                                    id="footer_text"
                                    name="footer_text"
                                    placeholder="* Limited time only."
                                    value={data.footer_text}
                                    onChange={(e) =>
                                        setData('footer_text', e.target.value)
                                    }
                                />
                                <InputError message={errors.footer_text} />
                            </div>

                            <div className="grid grid-cols-2 gap-4">
                                <div className="grid gap-2">
                                    <Label htmlFor="background_color">
                                        Arka Plan Rengi
                                    </Label>
                                    <Select
                                        value={data.background_color}
                                        onValueChange={(value) =>
                                            setData('background_color', value)
                                        }
                                    >
                                        <SelectTrigger>
                                            <SelectValue />
                                        </SelectTrigger>
                                        <SelectContent>
                                            {backgroundColors.map((color) => (
                                                <SelectItem
                                                    key={color.value}
                                                    value={color.value}
                                                >
                                                    {color.label}
                                                </SelectItem>
                                            ))}
                                        </SelectContent>
                                    </Select>
                                    <InputError
                                        message={errors.background_color}
                                    />
                                </div>

                                <div className="grid gap-2">
                                    <Label htmlFor="text_color">Metin Rengi</Label>
                                    <Select
                                        value={data.text_color}
                                        onValueChange={(value) =>
                                            setData('text_color', value)
                                        }
                                    >
                                        <SelectTrigger>
                                            <SelectValue />
                                        </SelectTrigger>
                                        <SelectContent>
                                            {textColors.map((color) => (
                                                <SelectItem
                                                    key={color.value}
                                                    value={color.value}
                                                >
                                                    {color.label}
                                                </SelectItem>
                                            ))}
                                        </SelectContent>
                                    </Select>
                                    <InputError message={errors.text_color} />
                                </div>
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
                                    Aktif (Top notice gösterilsin)
                                </Label>
                            </div>
                            <InputError message={errors.is_active} />

                            <div className="flex justify-end gap-2">
                                <Button type="submit" disabled={processing}>
                                    {processing ? 'Kaydediliyor...' : 'Kaydet'}
                                </Button>
                            </div>
                        </form>
                    </CardContent>
                </Card>

                {data.is_active && (
                    <Card>
                        <CardHeader>
                            <CardTitle>Önizleme</CardTitle>
                        </CardHeader>
                        <CardContent>
                            <div
                                className={`${data.background_color} ${data.text_color} p-4 rounded-lg`}
                            >
                                <div className="text-center">
                                    <h5
                                        className="d-inline-block mb-0"
                                        dangerouslySetInnerHTML={{
                                            __html: data.text,
                                        }}
                                    />
                                    {data.links.length > 0 && (
                                        <div className="mt-2 space-x-2">
                                            {data.links.map((link, index) => (
                                                <a
                                                    key={index}
                                                    href={link.url}
                                                    className="category underline"
                                                >
                                                    {link.label}
                                                </a>
                                            ))}
                                        </div>
                                    )}
                                    {data.footer_text && (
                                        <small className="block mt-2">
                                            {data.footer_text}
                                        </small>
                                    )}
                                </div>
                            </div>
                        </CardContent>
                    </Card>
                )}
            </div>
        </AppLayout>
    );
}

