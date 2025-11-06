import InputError from '@/components/input-error';
import { Button } from '@/components/ui/button';
import { Card, CardContent, CardHeader, CardTitle } from '@/components/ui/card';
import { Checkbox } from '@/components/ui/checkbox';
import { Input } from '@/components/ui/input';
import { Label } from '@/components/ui/label';
import AppLayout from '@/layouts/app-layout';
import { type BreadcrumbItem } from '@/types';
import { Head, Link, useForm } from '@inertiajs/react';
import { ArrowLeft } from 'lucide-react';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Dashboard',
        href: '/admin/dashboard',
    },
    {
        title: 'Kullanıcılar',
        href: '/admin/users',
    },
    {
        title: 'Yeni Kullanıcı',
        href: '/admin/users/create',
    },
];

interface UserGroup {
    id: number;
    name: string;
}

interface Props {
    userGroups: UserGroup[];
}

export default function UsersCreate({ userGroups }: Props) {
    const { data, setData, post, processing, errors } = useForm({
        name: '',
        email: '',
        password: '',
        password_confirmation: '',
        group_ids: [] as number[],
    });

    const handleSubmit = (e: React.FormEvent) => {
        e.preventDefault();
        post('/admin/users');
    };

    const handleGroupToggle = (groupId: number) => {
        const currentGroups = data.group_ids || [];
        if (currentGroups.includes(groupId)) {
            setData(
                'group_ids',
                currentGroups.filter((id) => id !== groupId),
            );
        } else {
            setData('group_ids', [...currentGroups, groupId]);
        }
    };

    return (
        <AppLayout breadcrumbs={breadcrumbs}>
            <Head title="Yeni Kullanıcı" />

            <div className="flex-1 space-y-6 p-6">
                <div className="flex items-center justify-between">
                    <div>
                        <h1 className="text-3xl font-bold tracking-tight">
                            Yeni Kullanıcı
                        </h1>
                        <p className="mt-1 text-muted-foreground">
                            Yeni bir admin kullanıcısı oluşturun
                        </p>
                    </div>
                    <Link href="/admin/users">
                        <Button variant="outline">
                            <ArrowLeft className="mr-2 h-4 w-4" />
                            Geri Dön
                        </Button>
                    </Link>
                </div>

                <Card>
                    <CardHeader>
                        <CardTitle>Kullanıcı Bilgileri</CardTitle>
                    </CardHeader>
                    <CardContent>
                        <form onSubmit={handleSubmit} className="space-y-6">
                            <div className="grid gap-2">
                                <Label htmlFor="name">
                                    Ad Soyad <span className="text-red-500">*</span>
                                </Label>
                                <Input
                                    id="name"
                                    name="name"
                                    required
                                    placeholder="Ad Soyad"
                                    value={data.name}
                                    onChange={(e) =>
                                        setData('name', e.target.value)
                                    }
                                />
                                <InputError message={errors.name} />
                            </div>

                            <div className="grid gap-2">
                                <Label htmlFor="email">
                                    E-posta <span className="text-red-500">*</span>
                                </Label>
                                <Input
                                    id="email"
                                    name="email"
                                    type="email"
                                    required
                                    placeholder="email@example.com"
                                    value={data.email}
                                    onChange={(e) =>
                                        setData('email', e.target.value)
                                    }
                                />
                                <InputError message={errors.email} />
                            </div>

                            <div className="grid gap-2">
                                <Label htmlFor="password">
                                    Şifre <span className="text-red-500">*</span>
                                </Label>
                                <Input
                                    id="password"
                                    name="password"
                                    type="password"
                                    required
                                    placeholder="En az 8 karakter"
                                    value={data.password}
                                    onChange={(e) =>
                                        setData('password', e.target.value)
                                    }
                                />
                                <InputError message={errors.password} />
                            </div>

                            <div className="grid gap-2">
                                <Label htmlFor="password_confirmation">
                                    Şifre Tekrar{' '}
                                    <span className="text-red-500">*</span>
                                </Label>
                                <Input
                                    id="password_confirmation"
                                    name="password_confirmation"
                                    type="password"
                                    required
                                    placeholder="Şifreyi tekrar girin"
                                    value={data.password_confirmation}
                                    onChange={(e) =>
                                        setData(
                                            'password_confirmation',
                                            e.target.value,
                                        )
                                    }
                                />
                                <InputError
                                    message={errors.password_confirmation}
                                />
                            </div>

                            <div className="grid gap-2">
                                <Label>Gruplar</Label>
                                <div className="space-y-2">
                                    {userGroups.map((group) => (
                                        <div
                                            key={group.id}
                                            className="flex items-center space-x-2"
                                        >
                                            <Checkbox
                                                id={`group-${group.id}`}
                                                checked={data.group_ids?.includes(
                                                    group.id,
                                                )}
                                                onCheckedChange={() =>
                                                    handleGroupToggle(group.id)
                                                }
                                            />
                                            <Label
                                                htmlFor={`group-${group.id}`}
                                                className="text-sm font-normal cursor-pointer"
                                            >
                                                {group.name}
                                            </Label>
                                        </div>
                                    ))}
                                </div>
                                <InputError message={errors.group_ids} />
                            </div>

                            <div className="flex justify-end gap-2">
                                <Link href="/admin/users">
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

