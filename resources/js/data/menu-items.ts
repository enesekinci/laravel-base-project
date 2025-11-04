import { type NavItem } from '@/types';
import {
    Activity,
    AlertCircle,
    Archive,
    BarChart,
    BarChart3,
    Bell,
    Box,
    Boxes,
    Building,
    Building2,
    Calendar,
    Camera,
    ClipboardList,
    CreditCard,
    CreditCard as CreditCardIcon,
    DollarSign,
    FileCode,
    FileText,
    FormInput,
    Gift,
    Globe,
    Globe2,
    Grid3x3,
    HardDrive,
    HelpCircle,
    Image,
    Languages,
    Layout,
    Link as LinkIcon,
    Mail,
    MapPin,
    Menu,
    MessageSquare,
    Newspaper,
    Package,
    Palette,
    PieChart,
    Receipt,
    RefreshCw,
    Settings,
    ShoppingBag,
    ShoppingCart,
    Star,
    Tag,
    Ticket,
    TrendingDown,
    TrendingUp,
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
                        href: '/admin/products/mannequins',
                        icon: Camera,
                    },
                    {
                        title: 'Özellik',
                        href: '/admin/products/attributes',
                        icon: Palette,
                    },
                    {
                        title: 'Varyasyon',
                        href: '/admin/products/variations',
                        icon: Boxes,
                    },
                ],
            },
            {
                title: 'Hareketler',
                icon: Activity,
                items: [
                    {
                        title: 'Yorumlar',
                        href: '/admin/products/reviews',
                        icon: MessageSquare,
                    },
                    {
                        title: 'Sorular',
                        href: '/admin/products/questions',
                        icon: HelpCircle,
                    },
                    {
                        title: 'Favoriler',
                        href: '/admin/products/favorites',
                        icon: Star,
                    },
                    {
                        title: 'Gelince Haber Ver',
                        href: '/admin/products/notify-stock',
                        icon: Bell,
                    },
                    {
                        title: 'Fiyat Düşünce Haber Ver',
                        href: '/admin/products/notify-price',
                        icon: TrendingDown,
                    },
                    {
                        title: 'Unutulmuş Sepetler',
                        href: '/admin/products/abandoned-carts',
                        icon: ShoppingCart,
                    },
                ],
            },
        ],
    },
    {
        title: 'XML Yönetimi',
        icon: FileCode,
        items: [
            {
                title: 'Export Yönetimi',
                href: '/admin/xml/exports',
                icon: FileText,
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
                href: '/admin/customers/groups',
                icon: Users,
            },
            {
                title: 'Temsilciler',
                href: '/admin/customers/representatives',
                icon: Users,
            },
        ],
    },
    {
        title: 'Sipariş Yönetimi',
        icon: ShoppingBag,
        items: [
            {
                title: 'Sipariş',
                href: '/admin/orders',
                icon: ShoppingCart,
            },
            {
                title: 'İade Talep',
                href: '/admin/orders/returns',
                icon: RefreshCw,
            },
        ],
    },
    {
        title: 'Kampanya Yönetimi',
        icon: Gift,
        items: [
            {
                title: 'Kupon',
                href: '/admin/campaigns/coupons',
                icon: Ticket,
            },
            {
                title: 'İndirim Sihirbazı',
                href: '/admin/campaigns/discounts',
                icon: TrendingDown,
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
                href: '/admin/notifications/email-templates',
                icon: Mail,
            },
            {
                title: 'SMS Taslakları',
                href: '/admin/notifications/sms-templates',
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
                href: '/admin/forms/contact',
                icon: Mail,
            },
            {
                title: 'Ödeme Bildirim',
                href: '/admin/forms/payment-notification',
                icon: CreditCard,
            },
            {
                title: 'E-Bülten',
                href: '/admin/forms/newsletter',
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
                        href: '/admin/content/design/sliders',
                        icon: Image,
                    },
                    {
                        title: 'Banner',
                        href: '/admin/content/design/banners',
                        icon: Image,
                    },
                    {
                        title: 'Popup',
                        href: '/admin/content/design/popups',
                        icon: Image,
                    },
                    {
                        title: 'Sık Sorulan Sorular',
                        href: '/admin/content/design/faq',
                        icon: HelpCircle,
                    },
                    {
                        title: 'Vitrin',
                        href: '/admin/content/design/showcases',
                        icon: Layout,
                    },
                ],
            },
            {
                title: 'Blog',
                href: '/admin/content/blog',
                icon: Newspaper,
            },
            {
                title: 'Sayfa',
                href: '/admin/content/pages',
                icon: FileText,
            },
            {
                title: 'Çeviri',
                href: '/admin/content/translations',
                icon: Languages,
            },
            {
                title: 'Dil',
                href: '/admin/content/languages',
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
                href: '/admin/settings/menu',
                icon: Menu,
            },
            {
                title: 'Mağaza Ayarları',
                icon: ShoppingBag,
                items: [
                    {
                        title: 'Genel Ayar',
                        href: '/admin/settings/store/general',
                        icon: Settings,
                    },
                    {
                        title: 'Ödeme Yöntem',
                        href: '/admin/settings/store/payment-methods',
                        icon: CreditCardIcon,
                    },
                    {
                        title: 'Para Birim',
                        href: '/admin/settings/store/currencies',
                        icon: DollarSign,
                    },
                    {
                        title: 'Vergi',
                        href: '/admin/settings/store/taxes',
                        icon: Receipt,
                    },
                ],
            },
            {
                title: 'Entegrasyon',
                href: '/admin/settings/integrations',
                icon: LinkIcon,
            },
            {
                title: 'Kargo',
                href: '/admin/settings/shipping',
                icon: Truck,
            },
            {
                title: 'Banka Hesap',
                href: '/admin/settings/bank-accounts',
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
                href: '/admin/tools/redirects',
                icon: LinkIcon,
            },
            {
                title: 'Depolama Aracı',
                href: '/admin/tools/storage',
                icon: HardDrive,
            },
            {
                title: 'Google Analytics',
                href: '/admin/tools/analytics',
                icon: BarChart3,
            },
            {
                title: 'Özel Kod',
                href: '/admin/tools/custom-code',
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
                href: '/admin/users/groups',
                icon: Users,
            },
            {
                title: 'Temsilciler',
                href: '/admin/users/representatives',
                icon: Users,
            },
        ],
    },
    {
        title: 'Destek Talepleri',
        href: '/admin/support',
        icon: HelpCircle,
    },
    {
        title: 'Raporlar',
        icon: BarChart3,
        items: [
            {
                title: 'Performans',
                icon: TrendingUp,
                items: [
                    {
                        title: 'Etkileşim ve Dönüşüm',
                        href: '/admin/reports/performance/interaction',
                        icon: Activity,
                    },
                    {
                        title: 'Funnel Trafik',
                        href: '/admin/reports/performance/funnel',
                        icon: BarChart,
                    },
                    {
                        title: 'Çapraz Ürün',
                        href: '/admin/reports/performance/cross-product',
                        icon: Grid3x3,
                    },
                    {
                        title: 'Müşteri Aktivite',
                        href: '/admin/reports/performance/customer-activity',
                        icon: Users,
                    },
                ],
            },
            {
                title: 'Envanter',
                icon: Archive,
                items: [
                    {
                        title: 'Envanter (Ürün Bazlı)',
                        href: '/admin/reports/inventory/product-based',
                        icon: Package,
                    },
                    {
                        title: 'Envanter (Model Bazlı)',
                        href: '/admin/reports/inventory/model-based',
                        icon: Boxes,
                    },
                    {
                        title: 'Kategori',
                        href: '/admin/reports/inventory/category',
                        icon: Grid3x3,
                    },
                    {
                        title: 'Marka',
                        href: '/admin/reports/inventory/brand',
                        icon: Building2,
                    },
                    {
                        title: 'Tedarikçi',
                        href: '/admin/reports/inventory/supplier',
                        icon: Truck,
                    },
                    {
                        title: 'Kritik Stok',
                        href: '/admin/reports/inventory/critical-stock',
                        icon: AlertCircle,
                    },
                ],
            },
            {
                title: 'Satış',
                icon: DollarSign,
                items: [
                    {
                        title: 'Satış ve Karlılık (Varyasyon Bazlı)',
                        href: '/admin/reports/sales/variation-based',
                        icon: BarChart,
                    },
                    {
                        title: 'Satış ve Karlılık (Model Bazlı)',
                        href: '/admin/reports/sales/model-based',
                        icon: PieChart,
                    },
                    {
                        title: 'Renk',
                        href: '/admin/reports/sales/color',
                        icon: Palette,
                    },
                    {
                        title: 'Ürün İade',
                        href: '/admin/reports/sales/returns',
                        icon: RefreshCw,
                    },
                    {
                        title: 'Süreli Sipariş',
                        href: '/admin/reports/sales/periodic-orders',
                        icon: Calendar,
                    },
                ],
            },
            {
                title: 'Sipariş',
                icon: ShoppingCart,
                items: [
                    {
                        title: 'Ülke',
                        href: '/admin/reports/orders/country',
                        icon: Globe2,
                    },
                    {
                        title: 'Şehir',
                        href: '/admin/reports/orders/city',
                        icon: MapPin,
                    },
                    {
                        title: 'Ödeme Yöntemi',
                        href: '/admin/reports/orders/payment-method',
                        icon: CreditCard,
                    },
                    {
                        title: 'Kargo',
                        href: '/admin/reports/orders/shipping',
                        icon: Truck,
                    },
                    {
                        title: 'Müşteri Sipariş',
                        href: '/admin/reports/orders/customer',
                        icon: Users,
                    },
                ],
            },
        ],
    },
];
