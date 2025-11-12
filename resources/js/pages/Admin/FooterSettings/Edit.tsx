import InputError from '@/components/input-error';
import { Button } from '@/components/ui/button';
import { Card, CardContent, CardHeader, CardTitle } from '@/components/ui/card';
import { Checkbox } from '@/components/ui/checkbox';
import { Input } from '@/components/ui/input';
import { Label } from '@/components/ui/label';
import { Textarea } from '@/components/ui/textarea';
import AppLayout from '@/layouts/app-layout';
import { type BreadcrumbItem } from '@/types';
import { Head, useForm } from '@inertiajs/react';
import { Plus, Trash2 } from 'lucide-react';

interface CustomerServiceLink {
    label: string;
    url: string;
}

interface PaymentIcon {
    name: string;
    enabled: boolean;
}

interface Props {
    settings: {
        footer_about_logo: string;
        footer_about_description: string;
        footer_about_read_more_url: string;
        footer_contact_address: string;
        footer_contact_phone: string;
        footer_contact_email: string;
        footer_contact_working_hours: string;
        footer_social_facebook: string;
        footer_social_twitter: string;
        footer_social_linkedin: string;
        footer_customer_service_links: CustomerServiceLink[];
        footer_popular_tags: string[];
        footer_copyright: string;
        footer_payment_icons: PaymentIcon[];
    };
}

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Dashboard',
        href: '/admin/dashboard',
    },
    {
        title: 'Footer Ayarları',
        href: '/admin/footer-settings/edit',
    },
];

const PAYMENT_ICON_OPTIONS = [
    { name: 'visa', label: 'Visa' },
    { name: 'paypal', label: 'PayPal' },
    { name: 'stripe', label: 'Stripe' },
    { name: 'verisign', label: 'Verisign' },
];

export default function FooterSettingsEdit({ settings }: Props) {
    const { data, setData, put, processing, errors } = useForm({
        footer_about_logo: settings.footer_about_logo || '',
        footer_about_description: settings.footer_about_description || '',
        footer_about_read_more_url: settings.footer_about_read_more_url || '#',
        footer_contact_address: settings.footer_contact_address || '',
        footer_contact_phone: settings.footer_contact_phone || '',
        footer_contact_email: settings.footer_contact_email || '',
        footer_contact_working_hours:
            settings.footer_contact_working_hours || '',
        footer_social_facebook: settings.footer_social_facebook || '#',
        footer_social_twitter: settings.footer_social_twitter || '#',
        footer_social_linkedin: settings.footer_social_linkedin || '#',
        footer_customer_service_links:
            settings.footer_customer_service_links || [],
        footer_popular_tags: settings.footer_popular_tags || [],
        footer_copyright: settings.footer_copyright || '',
        footer_payment_icons: settings.footer_payment_icons || [],
    });

    const handleSubmit = (e: React.FormEvent) => {
        e.preventDefault();
        put('/admin/footer-settings');
    };

    const addCustomerServiceLink = () => {
        setData('footer_customer_service_links', [
            ...data.footer_customer_service_links,
            { label: '', url: '' },
        ]);
    };

    const removeCustomerServiceLink = (index: number) => {
        setData(
            'footer_customer_service_links',
            data.footer_customer_service_links.filter((_, i) => i !== index),
        );
    };

    const updateCustomerServiceLink = (
        index: number,
        field: keyof CustomerServiceLink,
        value: string,
    ) => {
        const updated = [...data.footer_customer_service_links];
        updated[index] = { ...updated[index], [field]: value };
        setData('footer_customer_service_links', updated);
    };

    const addTag = () => {
        setData('footer_popular_tags', [...data.footer_popular_tags, '']);
    };

    const removeTag = (index: number) => {
        setData(
            'footer_popular_tags',
            data.footer_popular_tags.filter((_, i) => i !== index),
        );
    };

    const updateTag = (index: number, value: string) => {
        const updated = [...data.footer_popular_tags];
        updated[index] = value;
        setData('footer_popular_tags', updated);
    };

    const togglePaymentIcon = (name: string) => {
        const existing = data.footer_payment_icons.find(
            (icon) => icon.name === name,
        );
        if (existing) {
            setData(
                'footer_payment_icons',
                data.footer_payment_icons.map((icon) =>
                    icon.name === name
                        ? { ...icon, enabled: !icon.enabled }
                        : icon,
                ),
            );
        } else {
            setData('footer_payment_icons', [
                ...data.footer_payment_icons,
                { name, enabled: true },
            ]);
        }
    };

    return (
        <AppLayout breadcrumbs={breadcrumbs}>
            <Head title="Footer Ayarları" />

            <div className="space-y-6">
                <div className="flex items-center justify-between">
                    <div>
                        <h1 className="text-2xl font-bold tracking-tight">
                            Footer Ayarları
                        </h1>
                        <p className="text-muted-foreground">
                            Footer içeriğini yönetin ve özelleştirin.
                        </p>
                    </div>
                </div>

                <form onSubmit={handleSubmit} className="space-y-6">
                    {/* About Us Bölümü */}
                    <Card>
                        <CardHeader>
                            <CardTitle>Hakkımızda</CardTitle>
                        </CardHeader>
                        <CardContent className="space-y-4">
                            <div className="space-y-2">
                                <Label htmlFor="footer_about_logo">
                                    Logo URL
                                </Label>
                                <Input
                                    id="footer_about_logo"
                                    value={data.footer_about_logo}
                                    onChange={(e) =>
                                        setData(
                                            'footer_about_logo',
                                            e.target.value,
                                        )
                                    }
                                    placeholder="/porto/assets/images/logo-footer.png"
                                />
                                <InputError
                                    message={errors.footer_about_logo}
                                />
                            </div>

                            <div className="space-y-2">
                                <Label htmlFor="footer_about_description">
                                    Açıklama
                                </Label>
                                <Textarea
                                    id="footer_about_description"
                                    value={data.footer_about_description}
                                    onChange={(e) =>
                                        setData(
                                            'footer_about_description',
                                            e.target.value,
                                        )
                                    }
                                    rows={4}
                                    placeholder="Hakkımızda açıklaması..."
                                />
                                <InputError
                                    message={errors.footer_about_description}
                                />
                            </div>

                            <div className="space-y-2">
                                <Label htmlFor="footer_about_read_more_url">
                                    Devamını Oku Linki
                                </Label>
                                <Input
                                    id="footer_about_read_more_url"
                                    value={data.footer_about_read_more_url}
                                    onChange={(e) =>
                                        setData(
                                            'footer_about_read_more_url',
                                            e.target.value,
                                        )
                                    }
                                    placeholder="#"
                                />
                                <InputError
                                    message={errors.footer_about_read_more_url}
                                />
                            </div>
                        </CardContent>
                    </Card>

                    {/* İletişim Bilgileri */}
                    <Card>
                        <CardHeader>
                            <CardTitle>İletişim Bilgileri</CardTitle>
                        </CardHeader>
                        <CardContent className="space-y-4">
                            <div className="space-y-2">
                                <Label htmlFor="footer_contact_address">
                                    Adres
                                </Label>
                                <Input
                                    id="footer_contact_address"
                                    value={data.footer_contact_address}
                                    onChange={(e) =>
                                        setData(
                                            'footer_contact_address',
                                            e.target.value,
                                        )
                                    }
                                    placeholder="123 Street Name, City, England"
                                />
                                <InputError
                                    message={errors.footer_contact_address}
                                />
                            </div>

                            <div className="space-y-2">
                                <Label htmlFor="footer_contact_phone">
                                    Telefon
                                </Label>
                                <Input
                                    id="footer_contact_phone"
                                    value={data.footer_contact_phone}
                                    onChange={(e) =>
                                        setData(
                                            'footer_contact_phone',
                                            e.target.value,
                                        )
                                    }
                                    placeholder="(123) 456-7890"
                                />
                                <InputError
                                    message={errors.footer_contact_phone}
                                />
                            </div>

                            <div className="space-y-2">
                                <Label htmlFor="footer_contact_email">
                                    E-posta
                                </Label>
                                <Input
                                    id="footer_contact_email"
                                    type="email"
                                    value={data.footer_contact_email}
                                    onChange={(e) =>
                                        setData(
                                            'footer_contact_email',
                                            e.target.value,
                                        )
                                    }
                                    placeholder="mail@example.com"
                                />
                                <InputError
                                    message={errors.footer_contact_email}
                                />
                            </div>

                            <div className="space-y-2">
                                <Label htmlFor="footer_contact_working_hours">
                                    Çalışma Saatleri
                                </Label>
                                <Input
                                    id="footer_contact_working_hours"
                                    value={data.footer_contact_working_hours}
                                    onChange={(e) =>
                                        setData(
                                            'footer_contact_working_hours',
                                            e.target.value,
                                        )
                                    }
                                    placeholder="Mon - Sun / 9:00 AM - 8:00 PM"
                                />
                                <InputError
                                    message={
                                        errors.footer_contact_working_hours
                                    }
                                />
                            </div>
                        </CardContent>
                    </Card>

                    {/* Sosyal Medya */}
                    <Card>
                        <CardHeader>
                            <CardTitle>Sosyal Medya</CardTitle>
                        </CardHeader>
                        <CardContent className="space-y-4">
                            <div className="space-y-2">
                                <Label htmlFor="footer_social_facebook">
                                    Facebook URL
                                </Label>
                                <Input
                                    id="footer_social_facebook"
                                    value={data.footer_social_facebook}
                                    onChange={(e) =>
                                        setData(
                                            'footer_social_facebook',
                                            e.target.value,
                                        )
                                    }
                                    placeholder="https://facebook.com/..."
                                />
                                <InputError
                                    message={errors.footer_social_facebook}
                                />
                            </div>

                            <div className="space-y-2">
                                <Label htmlFor="footer_social_twitter">
                                    Twitter URL
                                </Label>
                                <Input
                                    id="footer_social_twitter"
                                    value={data.footer_social_twitter}
                                    onChange={(e) =>
                                        setData(
                                            'footer_social_twitter',
                                            e.target.value,
                                        )
                                    }
                                    placeholder="https://twitter.com/..."
                                />
                                <InputError
                                    message={errors.footer_social_twitter}
                                />
                            </div>

                            <div className="space-y-2">
                                <Label htmlFor="footer_social_linkedin">
                                    LinkedIn URL
                                </Label>
                                <Input
                                    id="footer_social_linkedin"
                                    value={data.footer_social_linkedin}
                                    onChange={(e) =>
                                        setData(
                                            'footer_social_linkedin',
                                            e.target.value,
                                        )
                                    }
                                    placeholder="https://linkedin.com/..."
                                />
                                <InputError
                                    message={errors.footer_social_linkedin}
                                />
                            </div>
                        </CardContent>
                    </Card>

                    {/* Müşteri Hizmetleri Linkleri */}
                    <Card>
                        <CardHeader>
                            <div className="flex items-center justify-between">
                                <CardTitle>
                                    Müşteri Hizmetleri Linkleri
                                </CardTitle>
                                <Button
                                    type="button"
                                    variant="outline"
                                    size="sm"
                                    onClick={addCustomerServiceLink}
                                >
                                    <Plus className="mr-2 h-4 w-4" />
                                    Link Ekle
                                </Button>
                            </div>
                        </CardHeader>
                        <CardContent className="space-y-4">
                            {data.footer_customer_service_links.length === 0 ? (
                                <p className="text-sm text-muted-foreground">
                                    Henüz link eklenmemiş.
                                </p>
                            ) : (
                                data.footer_customer_service_links.map(
                                    (link, index) => (
                                        <div
                                            key={index}
                                            className="flex gap-2 rounded-lg border p-3"
                                        >
                                            <div className="flex-1 space-y-2">
                                                <Input
                                                    placeholder="Link Etiketi"
                                                    value={link.label}
                                                    onChange={(e) =>
                                                        updateCustomerServiceLink(
                                                            index,
                                                            'label',
                                                            e.target.value,
                                                        )
                                                    }
                                                />
                                                <Input
                                                    placeholder="URL"
                                                    value={link.url}
                                                    onChange={(e) =>
                                                        updateCustomerServiceLink(
                                                            index,
                                                            'url',
                                                            e.target.value,
                                                        )
                                                    }
                                                />
                                            </div>
                                            <Button
                                                type="button"
                                                variant="ghost"
                                                size="icon"
                                                onClick={() =>
                                                    removeCustomerServiceLink(
                                                        index,
                                                    )
                                                }
                                            >
                                                <Trash2 className="h-4 w-4" />
                                            </Button>
                                        </div>
                                    ),
                                )
                            )}
                            <InputError
                                message={
                                    errors[
                                        'footer_customer_service_links.0.label' as keyof typeof errors
                                    ]
                                }
                            />
                        </CardContent>
                    </Card>

                    {/* Popüler Etiketler */}
                    <Card>
                        <CardHeader>
                            <div className="flex items-center justify-between">
                                <CardTitle>Popüler Etiketler</CardTitle>
                                <Button
                                    type="button"
                                    variant="outline"
                                    size="sm"
                                    onClick={addTag}
                                >
                                    <Plus className="mr-2 h-4 w-4" />
                                    Etiket Ekle
                                </Button>
                            </div>
                        </CardHeader>
                        <CardContent className="space-y-4">
                            {data.footer_popular_tags.length === 0 ? (
                                <p className="text-sm text-muted-foreground">
                                    Henüz etiket eklenmemiş.
                                </p>
                            ) : (
                                <div className="space-y-2">
                                    {data.footer_popular_tags.map(
                                        (tag, index) => (
                                            <div
                                                key={index}
                                                className="flex gap-2 rounded-lg border p-3"
                                            >
                                                <Input
                                                    placeholder="Etiket Adı"
                                                    value={tag}
                                                    onChange={(e) =>
                                                        updateTag(
                                                            index,
                                                            e.target.value,
                                                        )
                                                    }
                                                />
                                                <Button
                                                    type="button"
                                                    variant="ghost"
                                                    size="icon"
                                                    onClick={() =>
                                                        removeTag(index)
                                                    }
                                                >
                                                    <Trash2 className="h-4 w-4" />
                                                </Button>
                                            </div>
                                        ),
                                    )}
                                </div>
                            )}
                        </CardContent>
                    </Card>

                    {/* Telif Hakkı */}
                    <Card>
                        <CardHeader>
                            <CardTitle>Telif Hakkı</CardTitle>
                        </CardHeader>
                        <CardContent className="space-y-4">
                            <div className="space-y-2">
                                <Label htmlFor="footer_copyright">
                                    Telif Hakkı Metni
                                </Label>
                                <Input
                                    id="footer_copyright"
                                    value={data.footer_copyright}
                                    onChange={(e) =>
                                        setData(
                                            'footer_copyright',
                                            e.target.value,
                                        )
                                    }
                                    placeholder="© Porto eCommerce. 2021. All Rights Reserved"
                                />
                                <InputError message={errors.footer_copyright} />
                            </div>
                        </CardContent>
                    </Card>

                    {/* Ödeme İkonları */}
                    <Card>
                        <CardHeader>
                            <CardTitle>Ödeme İkonları</CardTitle>
                        </CardHeader>
                        <CardContent className="space-y-4">
                            <div className="space-y-2">
                                {PAYMENT_ICON_OPTIONS.map((option) => {
                                    const icon = data.footer_payment_icons.find(
                                        (i) => i.name === option.name,
                                    );
                                    const isEnabled = icon?.enabled ?? false;

                                    return (
                                        <div
                                            key={option.name}
                                            className="flex items-center space-x-2"
                                        >
                                            <Checkbox
                                                id={`payment_${option.name}`}
                                                checked={isEnabled}
                                                onCheckedChange={() =>
                                                    togglePaymentIcon(
                                                        option.name,
                                                    )
                                                }
                                            />
                                            <Label
                                                htmlFor={`payment_${option.name}`}
                                                className="cursor-pointer text-sm font-normal"
                                            >
                                                {option.label}
                                            </Label>
                                        </div>
                                    );
                                })}
                            </div>
                        </CardContent>
                    </Card>

                    {/* Submit Button */}
                    <div className="flex justify-end">
                        <Button type="submit" disabled={processing}>
                            {processing ? 'Kaydediliyor...' : 'Kaydet'}
                        </Button>
                    </div>
                </form>
            </div>
        </AppLayout>
    );
}
