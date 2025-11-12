import { type NavItem } from '@/types';
import {
    BarChart3,
    Bell,
    Box,
    Boxes,
    Building,
    Building2,
    Camera,
    ClipboardList,
    CreditCard,
    CreditCard as CreditCardIcon,
    DollarSign,
    FileCode,
    FileText,
    FormInput,
    Globe,
    Grid3x3,
    HelpCircle,
    Image,
    Languages,
    Layout,
    Link as LinkIcon,
    List,
    Mail,
    Menu,
    MessageSquare,
    Newspaper,
    Package,
    Palette,
    Receipt,
    Settings,
    ShoppingBag,
    Tag,
    Truck,
    Users,
} from 'lucide-react';

export const menuItems: NavItem[] = [
    {
        title: 'Dashboard',
        href: '/admin/dashboard',
        icon: Layout,
    },
    {
        title: 'Ürün Yönetimi',
        icon: Package,
        items: [
            {
                title: 'Ürün',
                href: '/admin/products',
                icon: Box,
            },
            {
                title: 'Kategori',
                href: '/admin/categories',
                icon: Grid3x3,
            },
            {
                title: 'Marka',
                href: '/admin/brands',
                icon: Building2,
            },
            {
                title: 'Etiket',
                href: '/admin/tags',
                icon: Tag,
            },
            {
                title: 'Tedarikçi',
                href: '/admin/suppliers',
                icon: Truck,
            },
            {
                title: 'Ürün Tanımları',
                icon: FileText,
                items: [
                    {
                        title: 'Manken',
                        href: '/admin/mannequins',
                        icon: Camera,
                    },
                    {
                        title: 'Özellik Seti',
                        href: '/admin/attribute-sets',
                        icon: FileText,
                    },
                    {
                        title: 'Özellik',
                        href: '/admin/attributes',
                        icon: Palette,
                    },
                    {
                        title: 'Varyasyon',
                        href: '/admin/variations',
                        icon: Boxes,
                    },
                    {
                        title: 'Seçenekler',
                        href: '/admin/options',
                        icon: List,
                    },
                ],
            },
        ],
    },
    {
        title: 'Üye Yönetimi',
        icon: Users,
        items: [
            {
                title: 'Üye',
                href: '/admin/customers',
                icon: Users,
            },
            {
                title: 'Grup',
                href: '/admin/customer-groups',
                icon: Users,
            },
            {
                title: 'Temsilciler',
                href: '/admin/customer-representatives',
                icon: Users,
            },
        ],
    },
    {
        title: 'Bildirim Yönetimi',
        icon: Bell,
        items: [
            {
                title: 'Bildirim Geçmişi',
                href: '/admin/notifications/history',
                icon: Bell,
            },
            {
                title: 'Mail Taslakları',
                href: '/admin/email-templates',
                icon: Mail,
            },
            {
                title: 'SMS Taslakları',
                href: '/admin/sms-templates',
                icon: MessageSquare,
            },
        ],
    },
    {
        title: 'Form Yönetimi',
        icon: FormInput,
        items: [
            {
                title: 'İletişim',
                href: '/admin/contact-forms',
                icon: Mail,
            },
            {
                title: 'Ödeme Bildirim',
                href: '/admin/payment-notifications',
                icon: CreditCard,
            },
            {
                title: 'E-Bülten',
                href: '/admin/newsletters',
                icon: Mail,
            },
        ],
    },
    {
        title: 'İçerik Yönetimi',
        icon: FileText,
        items: [
            {
                title: 'Tasarım',
                icon: Image,
                items: [
                    {
                        title: 'Slider',
                        href: '/admin/sliders',
                        icon: Image,
                    },
                    {
                        title: 'Banner',
                        href: '/admin/banners',
                        icon: Image,
                    },
                    {
                        title: 'Popup',
                        href: '/admin/popups',
                        icon: Image,
                    },
                    {
                        title: 'Top Notice',
                        href: '/admin/top-notice/edit',
                        icon: Bell,
                    },
                    {
                        title: 'Sık Sorulan Sorular',
                        href: '/admin/faqs',
                        icon: HelpCircle,
                    },
                    {
                        title: 'Vitrin',
                        href: '/admin/showcases',
                        icon: Layout,
                    },
                ],
            },
            {
                title: 'Blog',
                href: '/admin/blogs',
                icon: Newspaper,
            },
            {
                title: 'Sayfa',
                href: '/admin/pages',
                icon: FileText,
            },
            {
                title: 'Çeviri',
                href: '/admin/translations',
                icon: Languages,
            },
            {
                title: 'Dil',
                href: '/admin/languages',
                icon: Globe,
            },
        ],
    },
    {
        title: 'Genel Ayarlar',
        icon: Settings,
        items: [
            {
                title: 'Menü',
                href: '/admin/menus',
                icon: Menu,
            },
            {
                title: 'Mağaza',
                icon: ShoppingBag,
                items: [
                    {
                        title: 'Genel Ayarlar',
                        href: '/admin/general-settings/edit',
                        icon: Settings,
                    },
                    {
                        title: 'Mağaza Ayarları',
                        href: '/admin/store-settings?group=general',
                        icon: Settings,
                    },
                    {
                        title: 'Ödeme Yöntem',
                        href: '/admin/payment-methods',
                        icon: CreditCardIcon,
                    },
                    {
                        title: 'Para Birim',
                        href: '/admin/currencies',
                        icon: DollarSign,
                    },
                    {
                        title: 'Vergi',
                        href: '/admin/tax-classes',
                        icon: Receipt,
                    },
                ],
            },
            {
                title: 'Entegrasyon',
                href: '/admin/integrations',
                icon: LinkIcon,
            },
            {
                title: 'Kargo',
                href: '/admin/shipping-methods',
                icon: Truck,
            },
            {
                title: 'Banka Hesap',
                href: '/admin/bank-accounts',
                icon: Building,
            },
        ],
    },
    {
        title: 'Araçlar',
        icon: Settings,
        items: [
            {
                title: 'Url Yönlendirme',
                href: '/admin/redirects',
                icon: LinkIcon,
            },
            {
                title: 'Google Analytics',
                href: '/admin/analytics',
                icon: BarChart3,
            },
            {
                title: 'Özel Kod',
                href: '/admin/custom-codes',
                icon: FileCode,
            },
        ],
    },
    {
        title: 'Kullanıcı Yönetimi',
        icon: Users,
        items: [
            {
                title: 'İşlem Kayıt',
                href: '/admin/users/activity-logs',
                icon: ClipboardList,
            },
            {
                title: 'Kullanıcı',
                href: '/admin/users',
                icon: Users,
            },
            {
                title: 'Grup',
                href: '/admin/user-groups',
                icon: Users,
            },
        ],
    },
    {
        title: 'Destek Talepleri',
        href: '/admin/support-tickets',
        icon: HelpCircle,
    },
];
