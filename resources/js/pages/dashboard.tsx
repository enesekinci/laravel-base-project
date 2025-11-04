import { Button } from '@/components/ui/button';
import { Card, CardContent, CardHeader, CardTitle } from '@/components/ui/card';
import AppLayout from '@/layouts/app-layout';
import { type BreadcrumbItem } from '@/types';
import { Head, Link } from '@inertiajs/react';
import {
    Activity,
    ArrowRight,
    BarChart3,
    DollarSign,
    Package,
    ShoppingBag,
    ShoppingCart,
    TrendingDown,
    TrendingUp,
    Users,
} from 'lucide-react';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Dashboard',
        href: '/admin/dashboard',
    },
];

const stats = [
    {
        title: 'Toplam Satış',
        value: '₺125,430',
        change: '+12.5%',
        trend: 'up',
        icon: DollarSign,
        description: 'Bu ay',
        color: 'text-green-600',
    },
    {
        title: 'Siparişler',
        value: '1,234',
        change: '+8.2%',
        trend: 'up',
        icon: ShoppingCart,
        description: 'Bu ay',
        color: 'text-blue-600',
    },
    {
        title: 'Müşteriler',
        value: '5,678',
        change: '+15.3%',
        trend: 'up',
        icon: Users,
        description: 'Toplam',
        color: 'text-purple-600',
    },
    {
        title: 'Ürünler',
        value: '2,456',
        change: '-2.1%',
        trend: 'down',
        icon: Package,
        description: 'Stokta',
        color: 'text-orange-600',
    },
];

const recentOrders = [
    {
        id: '#1234',
        customer: 'Ahmet Yılmaz',
        amount: '₺1,234',
        status: 'Hazırlanıyor',
        time: '2 saat önce',
        statusColor:
            'bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-300',
    },
    {
        id: '#1235',
        customer: 'Ayşe Demir',
        amount: '₺2,456',
        status: 'Kargoda',
        time: '5 saat önce',
        statusColor:
            'bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-300',
    },
    {
        id: '#1236',
        customer: 'Mehmet Kaya',
        amount: '₺987',
        status: 'Teslim Edildi',
        time: '1 gün önce',
        statusColor:
            'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-300',
    },
    {
        id: '#1237',
        customer: 'Fatma Şahin',
        amount: '₺3,210',
        status: 'Beklemede',
        time: '2 gün önce',
        statusColor:
            'bg-gray-100 text-gray-800 dark:bg-gray-900 dark:text-gray-300',
    },
];

const quickActions = [
    {
        title: 'Yeni Ürün Ekle',
        href: '/admin/products/create',
        icon: Package,
        description: 'Ürün ekle',
    },
    {
        title: 'Siparişleri Görüntüle',
        href: '/admin/orders',
        icon: ShoppingCart,
        description: 'Tüm siparişler',
    },
    {
        title: 'Müşterileri Yönet',
        href: '/admin/customers',
        icon: Users,
        description: 'Müşteri listesi',
    },
    {
        title: 'Raporları Görüntüle',
        href: '/admin/reports',
        icon: BarChart3,
        description: 'Satış raporları',
    },
];

export default function Dashboard() {
    return (
        <AppLayout breadcrumbs={breadcrumbs}>
            <Head title="Dashboard" />
            <div className="flex-1 space-y-6 p-6">
                {/* Başlık */}
                <div className="flex items-center justify-between">
                    <div>
                        <h1 className="text-3xl font-bold tracking-tight">
                            Dashboard
                        </h1>
                        <p className="mt-1 text-muted-foreground">
                            E-ticaret yönetim paneline hoş geldiniz
                        </p>
                    </div>
                    <div className="flex items-center gap-2">
                        <Button variant="outline" size="sm">
                            <Activity className="mr-2 h-4 w-4" />
                            Canlı Durum
                        </Button>
                        <Button size="sm">
                            <BarChart3 className="mr-2 h-4 w-4" />
                            Detaylı Rapor
                        </Button>
                    </div>
                </div>

                {/* İstatistik Kartları */}
                <div className="grid gap-4 md:grid-cols-2 lg:grid-cols-4">
                    {stats.map((stat) => {
                        const Icon = stat.icon;
                        const TrendIcon =
                            stat.trend === 'up' ? TrendingUp : TrendingDown;
                        return (
                            <Card
                                key={stat.title}
                                className="transition-shadow hover:shadow-md"
                            >
                                <CardHeader className="flex flex-row items-center justify-between space-y-0 pb-2">
                                    <CardTitle className="text-sm font-medium text-muted-foreground">
                                        {stat.title}
                                    </CardTitle>
                                    <Icon className={`h-5 w-5 ${stat.color}`} />
                                </CardHeader>
                                <CardContent>
                                    <div className="text-2xl font-bold">
                                        {stat.value}
                                    </div>
                                    <p className="mt-2 flex items-center gap-1 text-xs text-muted-foreground">
                                        <TrendIcon
                                            className={`h-3 w-3 ${
                                                stat.trend === 'up'
                                                    ? 'text-green-500'
                                                    : 'text-red-500'
                                            }`}
                                        />
                                        <span
                                            className={
                                                stat.trend === 'up'
                                                    ? 'font-medium text-green-500'
                                                    : 'font-medium text-red-500'
                                            }
                                        >
                                            {stat.change}
                                        </span>
                                        <span className="text-muted-foreground">
                                            {stat.description}
                                        </span>
                                    </p>
                                </CardContent>
                            </Card>
                        );
                    })}
                </div>

                {/* Ana İçerik */}
                <div className="grid gap-6 md:grid-cols-2 lg:grid-cols-7">
                    {/* Son Siparişler */}
                    <Card className="col-span-4">
                        <CardHeader className="flex flex-row items-center justify-between">
                            <CardTitle>Son Siparişler</CardTitle>
                            <Button variant="ghost" size="sm" asChild>
                                <Link href="/admin/orders">
                                    Tümünü Gör
                                    <ArrowRight className="ml-2 h-4 w-4" />
                                </Link>
                            </Button>
                        </CardHeader>
                        <CardContent>
                            <div className="space-y-4">
                                {recentOrders.map((order) => (
                                    <div
                                        key={order.id}
                                        className="flex items-center justify-between rounded-lg border p-4 transition-colors hover:bg-accent/50"
                                    >
                                        <div className="flex items-center space-x-4">
                                            <div className="flex h-10 w-10 items-center justify-center rounded-full bg-primary/10">
                                                <ShoppingBag className="h-5 w-5 text-primary" />
                                            </div>
                                            <div>
                                                <p className="text-sm font-medium">
                                                    {order.id}
                                                </p>
                                                <p className="text-xs text-muted-foreground">
                                                    {order.customer} •{' '}
                                                    {order.time}
                                                </p>
                                            </div>
                                        </div>
                                        <div className="flex items-center gap-4">
                                            <div className="text-right">
                                                <p className="text-sm font-medium">
                                                    {order.amount}
                                                </p>
                                                <span
                                                    className={`inline-flex items-center rounded-full px-2 py-1 text-xs font-medium ${order.statusColor}`}
                                                >
                                                    {order.status}
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                ))}
                            </div>
                        </CardContent>
                    </Card>

                    {/* Hızlı İşlemler */}
                    <Card className="col-span-3">
                        <CardHeader>
                            <CardTitle>Hızlı İşlemler</CardTitle>
                        </CardHeader>
                        <CardContent className="space-y-2">
                            {quickActions.map((action) => {
                                const Icon = action.icon;
                                return (
                                    <Button
                                        key={action.title}
                                        variant="outline"
                                        className="h-auto w-full justify-start px-4 py-3"
                                        asChild
                                    >
                                        <Link href={action.href}>
                                            <Icon className="mr-3 h-4 w-4" />
                                            <div className="flex flex-col items-start">
                                                <span className="text-sm font-medium">
                                                    {action.title}
                                                </span>
                                                <span className="text-xs text-muted-foreground">
                                                    {action.description}
                                                </span>
                                            </div>
                                        </Link>
                                    </Button>
                                );
                            })}
                        </CardContent>
                    </Card>
                </div>

                {/* Alt İstatistikler */}
                <div className="grid gap-4 md:grid-cols-3">
                    <Card>
                        <CardHeader className="pb-3">
                            <CardTitle className="text-sm font-medium text-muted-foreground">
                                Bugünkü Satışlar
                            </CardTitle>
                        </CardHeader>
                        <CardContent>
                            <div className="text-2xl font-bold">₺12,450</div>
                            <p className="mt-1 text-xs text-muted-foreground">
                                <span className="text-green-500">+18.2%</span>{' '}
                                dün ile karşılaştırıldığında
                            </p>
                        </CardContent>
                    </Card>
                    <Card>
                        <CardHeader className="pb-3">
                            <CardTitle className="text-sm font-medium text-muted-foreground">
                                Bekleyen Siparişler
                            </CardTitle>
                        </CardHeader>
                        <CardContent>
                            <div className="text-2xl font-bold">24</div>
                            <p className="mt-1 text-xs text-muted-foreground">
                                <span className="text-orange-500">+3</span> yeni
                                sipariş
                            </p>
                        </CardContent>
                    </Card>
                    <Card>
                        <CardHeader className="pb-3">
                            <CardTitle className="text-sm font-medium text-muted-foreground">
                                Stok Uyarıları
                            </CardTitle>
                        </CardHeader>
                        <CardContent>
                            <div className="text-2xl font-bold">8</div>
                            <p className="mt-1 text-xs text-muted-foreground">
                                <span className="text-red-500">Kritik</span>{' '}
                                stok seviyesi
                            </p>
                        </CardContent>
                    </Card>
                </div>
            </div>
        </AppLayout>
    );
}
