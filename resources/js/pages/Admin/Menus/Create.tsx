import InputError from '@/components/input-error';
import { Button } from '@/components/ui/button';
import { Card, CardContent, CardHeader, CardTitle } from '@/components/ui/card';
import { Checkbox } from '@/components/ui/checkbox';
import {
    Collapsible,
    CollapsibleContent,
    CollapsibleTrigger,
} from '@/components/ui/collapsible';
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
import {
    DndContext,
    DragEndEvent,
    KeyboardSensor,
    PointerSensor,
    useSensor,
    useSensors,
} from '@dnd-kit/core';
import {
    arrayMove,
    SortableContext,
    sortableKeyboardCoordinates,
    useSortable,
    verticalListSortingStrategy,
} from '@dnd-kit/sortable';
import { CSS } from '@dnd-kit/utilities';
import { Head, Link, router, useForm } from '@inertiajs/react';
import {
    ArrowLeft,
    ChevronRight,
    GripVertical,
    Plus,
    Trash2,
} from 'lucide-react';
import { useState } from 'react';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Dashboard',
        href: '/admin/dashboard',
    },
    {
        title: 'Menüler',
        href: '/admin/menus',
    },
    {
        title: 'Yeni Menü',
        href: '/admin/menus/create',
    },
];

interface MenuItem {
    name: string;
    url: string;
    icon?: string;
    target?: '_self' | '_blank';
    badge?: string;
    badge_type?: string;
    menu_type?: 'megamenu' | 'categories' | null;
    megamenu_cols?: number;
    children?: MenuItem[];
    is_active?: boolean;
    tempId?: string;
}

function MenuItemForm({
    item,
    index,
    onUpdate,
    onRemove,
    onAddChild,
    level = 0,
}: {
    item: MenuItem & { tempId: string };
    index: number;
    onUpdate: (index: number, field: keyof MenuItem, value: unknown) => void;
    onRemove: (index: number) => void;
    onAddChild: (index: number) => void;
    level?: number;
}) {
    const [isOpen, setIsOpen] = useState(false);
    const hasChildren = item.children && item.children.length > 0;

    const {
        attributes,
        listeners,
        setNodeRef,
        transform,
        transition,
        isDragging,
    } = useSortable({ id: item.tempId });

    const style = {
        transform: CSS.Transform.toString(transform),
        transition,
        opacity: isDragging ? 0.5 : 1,
    };

    return (
        <div
            ref={setNodeRef}
            style={style}
            className={`rounded-md border bg-card p-4 ${
                level > 0 ? 'ml-8 border-l-2' : ''
            }`}
        >
            <div className="flex items-start gap-3">
                <div
                    {...attributes}
                    {...listeners}
                    className="mt-2 cursor-grab active:cursor-grabbing"
                >
                    <GripVertical className="h-5 w-5 text-muted-foreground" />
                </div>

                <div className="flex-1 space-y-3">
                    <div className="grid grid-cols-2 gap-3">
                        <div className="grid gap-2">
                            <Label>
                                Menü Adı <span className="text-red-500">*</span>
                            </Label>
                            <Input
                                value={item.name}
                                onChange={(e) =>
                                    onUpdate(index, 'name', e.target.value)
                                }
                                placeholder="Örn: Ana Sayfa"
                            />
                        </div>

                        <div className="grid gap-2">
                            <Label>
                                URL <span className="text-red-500">*</span>
                            </Label>
                            <Input
                                value={item.url}
                                onChange={(e) =>
                                    onUpdate(index, 'url', e.target.value)
                                }
                                placeholder="/porto/demo1.html"
                            />
                        </div>
                    </div>

                    <div className="grid grid-cols-3 gap-3">
                        <div className="grid gap-2">
                            <Label>Icon</Label>
                            <Input
                                value={item.icon || ''}
                                onChange={(e) =>
                                    onUpdate(index, 'icon', e.target.value)
                                }
                                placeholder="icon-home"
                            />
                        </div>

                        <div className="grid gap-2">
                            <Label>Hedef</Label>
                            <Select
                                value={item.target || '_self'}
                                onValueChange={(value) =>
                                    onUpdate(
                                        index,
                                        'target',
                                        value as '_self' | '_blank',
                                    )
                                }
                            >
                                <SelectTrigger>
                                    <SelectValue />
                                </SelectTrigger>
                                <SelectContent>
                                    <SelectItem value="_self">
                                        Aynı Sekme
                                    </SelectItem>
                                    <SelectItem value="_blank">
                                        Yeni Sekme
                                    </SelectItem>
                                </SelectContent>
                            </Select>
                        </div>

                        <div className="grid gap-2">
                            <Label>Menü Tipi</Label>
                            <Select
                                value={item.menu_type || 'normal'}
                                onValueChange={(value) =>
                                    onUpdate(
                                        index,
                                        'menu_type',
                                        value === 'normal' ? null : value,
                                    )
                                }
                            >
                                <SelectTrigger>
                                    <SelectValue placeholder="Normal" />
                                </SelectTrigger>
                                <SelectContent>
                                    <SelectItem value="normal">
                                        Normal
                                    </SelectItem>
                                    <SelectItem value="megamenu">
                                        Megamenu
                                    </SelectItem>
                                    <SelectItem value="categories">
                                        Kategoriler
                                    </SelectItem>
                                </SelectContent>
                            </Select>
                        </div>
                    </div>

                    {item.menu_type === 'megamenu' && (
                        <div className="grid gap-2">
                            <Label>Megamenu Kolon Sayısı</Label>
                            <Select
                                value={String(item.megamenu_cols || 3)}
                                onValueChange={(value) =>
                                    onUpdate(
                                        index,
                                        'megamenu_cols',
                                        parseInt(value),
                                    )
                                }
                            >
                                <SelectTrigger>
                                    <SelectValue />
                                </SelectTrigger>
                                <SelectContent>
                                    <SelectItem value="2">2 Kolon</SelectItem>
                                    <SelectItem value="3">3 Kolon</SelectItem>
                                    <SelectItem value="4">4 Kolon</SelectItem>
                                </SelectContent>
                            </Select>
                        </div>
                    )}

                    <div className="grid grid-cols-2 gap-3">
                        <div className="grid gap-2">
                            <Label>Badge</Label>
                            <Input
                                value={item.badge || ''}
                                onChange={(e) =>
                                    onUpdate(index, 'badge', e.target.value)
                                }
                                placeholder="New"
                            />
                        </div>

                        <div className="grid gap-2">
                            <Label>Badge Tipi</Label>
                            <Select
                                value={item.badge_type || 'tip-new'}
                                onValueChange={(value) =>
                                    onUpdate(index, 'badge_type', value)
                                }
                            >
                                <SelectTrigger>
                                    <SelectValue />
                                </SelectTrigger>
                                <SelectContent>
                                    <SelectItem value="tip-new">New</SelectItem>
                                    <SelectItem value="tip-hot">Hot</SelectItem>
                                    <SelectItem value="tip-top">Top</SelectItem>
                                </SelectContent>
                            </Select>
                        </div>
                    </div>

                    <div className="flex items-center justify-between">
                        <div className="flex items-center space-x-2">
                            <Checkbox
                                id={`active-${item.tempId}`}
                                checked={item.is_active !== false}
                                onCheckedChange={(checked) =>
                                    onUpdate(
                                        index,
                                        'is_active',
                                        checked === true,
                                    )
                                }
                            />
                            <Label
                                htmlFor={`active-${item.tempId}`}
                                className="text-sm font-normal"
                            >
                                Aktif
                            </Label>
                        </div>

                        <div className="flex gap-2">
                            <Button
                                type="button"
                                variant="outline"
                                size="sm"
                                onClick={() => onAddChild(index)}
                            >
                                <Plus className="mr-2 h-4 w-4" />
                                Alt Menü Ekle
                            </Button>
                            <Button
                                type="button"
                                variant="destructive"
                                size="sm"
                                onClick={() => onRemove(index)}
                            >
                                <Trash2 className="h-4 w-4" />
                            </Button>
                        </div>
                    </div>
                </div>
            </div>

            {hasChildren && (
                <Collapsible open={isOpen} onOpenChange={setIsOpen}>
                    <CollapsibleTrigger className="mt-3 flex items-center gap-2 text-sm text-muted-foreground">
                        <ChevronRight
                            className={`h-4 w-4 transition-transform ${
                                isOpen ? 'rotate-90' : ''
                            }`}
                        />
                        {item.children?.length || 0} alt menü öğesi
                    </CollapsibleTrigger>
                    <CollapsibleContent className="mt-2">
                        <div className="space-y-3">
                            {item.children?.map((child, childIndex) => (
                                <MenuItemForm
                                    key={
                                        (child as MenuItem & { tempId: string })
                                            .tempId
                                    }
                                    item={
                                        child as MenuItem & { tempId: string }
                                    }
                                    index={childIndex}
                                    onUpdate={(idx, field, value) => {
                                        const updated = [
                                            ...(item.children || []),
                                        ];
                                        updated[idx] = {
                                            ...updated[idx],
                                            [field]: value,
                                        };
                                        onUpdate(index, 'children', updated);
                                    }}
                                    onRemove={(idx) => {
                                        const updated = (
                                            item.children || []
                                        ).filter((_, i) => i !== idx);
                                        onUpdate(index, 'children', updated);
                                    }}
                                    onAddChild={(idx) => {
                                        const updated = [
                                            ...(item.children || []),
                                        ];
                                        const newChild: MenuItem & {
                                            tempId: string;
                                        } = {
                                            name: '',
                                            url: '#',
                                            is_active: true,
                                            tempId: `child-${Date.now()}-${Math.random()}`,
                                        };
                                        updated[idx] = {
                                            ...updated[idx],
                                            children: [
                                                ...(updated[idx].children ||
                                                    []),
                                                newChild,
                                            ],
                                        };
                                        onUpdate(index, 'children', updated);
                                    }}
                                    level={level + 1}
                                />
                            ))}
                        </div>
                    </CollapsibleContent>
                </Collapsible>
            )}
        </div>
    );
}

export default function MenusCreate() {
    const [menuItems, setMenuItems] = useState<
        (MenuItem & { tempId: string })[]
    >([]);

    const { data, setData, processing, errors } = useForm({
        name: '',
        location: '',
        items: [],
        is_active: true,
    });

    const sensors = useSensors(
        useSensor(PointerSensor),
        useSensor(KeyboardSensor, {
            coordinateGetter: sortableKeyboardCoordinates,
        }),
    );

    const handleDragEnd = (event: DragEndEvent) => {
        const { active, over } = event;

        if (over && active.id !== over.id) {
            setMenuItems((items) => {
                const oldIndex = items.findIndex(
                    (item) => item.tempId === active.id,
                );
                const newIndex = items.findIndex(
                    (item) => item.tempId === over.id,
                );

                return arrayMove(items, oldIndex, newIndex);
            });
        }
    };

    const addMenuItem = () => {
        const newItem: MenuItem & { tempId: string } = {
            name: '',
            url: '#',
            is_active: true,
            tempId: `item-${Date.now()}-${Math.random()}`,
        };
        setMenuItems([...menuItems, newItem]);
    };

    const updateMenuItem = (
        index: number,
        field: keyof MenuItem,
        value: unknown,
    ) => {
        const updated = [...menuItems];
        updated[index] = {
            ...updated[index],
            [field]: value,
        };
        setMenuItems(updated);
    };

    const removeMenuItem = (index: number) => {
        setMenuItems(menuItems.filter((_, i) => i !== index));
    };

    const addChildMenuItem = (parentIndex: number) => {
        const updated = [...menuItems];
        const newChild: MenuItem & { tempId: string } = {
            name: '',
            url: '#',
            is_active: true,
            tempId: `child-${Date.now()}-${Math.random()}`,
        };
        updated[parentIndex] = {
            ...updated[parentIndex],
            children: [...(updated[parentIndex].children || []), newChild],
        };
        setMenuItems(updated);
    };

    const handleSubmit = (e: React.FormEvent) => {
        e.preventDefault();

        // tempId'leri kaldır ve items'a dönüştür
        const cleanItems: MenuItem[] = menuItems.map((item) => {
            // eslint-disable-next-line @typescript-eslint/no-unused-vars
            const { tempId, ...cleanItem } = item;
            const result: MenuItem = {
                name: cleanItem.name,
                url: cleanItem.url,
                icon: cleanItem.icon,
                target: cleanItem.target,
                badge: cleanItem.badge,
                badge_type: cleanItem.badge_type,
                menu_type: cleanItem.menu_type,
                megamenu_cols: cleanItem.megamenu_cols,
                is_active: cleanItem.is_active,
            };

            if (cleanItem.children && cleanItem.children.length > 0) {
                result.children = cleanItem.children.map((child) => {
                    // eslint-disable-next-line @typescript-eslint/no-unused-vars
                    const { tempId: childTempId, ...cleanChild } =
                        child as MenuItem & { tempId: string };
                    return {
                        name: cleanChild.name,
                        url: cleanChild.url,
                        icon: cleanChild.icon,
                        target: cleanChild.target,
                        badge: cleanChild.badge,
                        badge_type: cleanChild.badge_type,
                        menu_type: cleanChild.menu_type,
                        megamenu_cols: cleanChild.megamenu_cols,
                        is_active: cleanChild.is_active,
                        children: cleanChild.children,
                    } as MenuItem;
                });
            }

            return result;
        });

        const formData = {
            ...data,
            items: cleanItems,
        };
        // @ts-expect-error - MenuItem[] type'ı router.post'un beklediği type ile uyumlu değil ama backend'e doğru şekilde gönderiliyor
        router.post('/admin/menus', formData);
    };

    return (
        <AppLayout breadcrumbs={breadcrumbs}>
            <Head title="Yeni Menü" />

            <div className="flex-1 space-y-6 p-6">
                <div className="flex items-center justify-between">
                    <div>
                        <h1 className="text-3xl font-bold tracking-tight">
                            Yeni Menü
                        </h1>
                        <p className="mt-1 text-muted-foreground">
                            Yeni bir menü oluşturun
                        </p>
                    </div>
                    <Link href="/admin/menus">
                        <Button variant="outline">
                            <ArrowLeft className="mr-2 h-4 w-4" />
                            Geri Dön
                        </Button>
                    </Link>
                </div>

                <form onSubmit={handleSubmit} className="space-y-6">
                    <Card>
                        <CardHeader>
                            <CardTitle>Menü Bilgileri</CardTitle>
                        </CardHeader>
                        <CardContent className="space-y-6">
                            <div className="grid gap-2">
                                <Label htmlFor="name">
                                    Menü Adı{' '}
                                    <span className="text-red-500">*</span>
                                </Label>
                                <Input
                                    id="name"
                                    name="name"
                                    required
                                    placeholder="Örn: Sidebar Menü"
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
                                        <SelectValue placeholder="Menü konumunu seçin" />
                                    </SelectTrigger>
                                    <SelectContent>
                                        <SelectItem value="sidebar">
                                            Sidebar
                                        </SelectItem>
                                        <SelectItem value="header">
                                            Header
                                        </SelectItem>
                                        <SelectItem value="footer">
                                            Footer
                                        </SelectItem>
                                        <SelectItem value="mobile">
                                            Mobile
                                        </SelectItem>
                                    </SelectContent>
                                </Select>
                                <InputError message={errors.location} />
                                <p className="text-sm text-muted-foreground">
                                    Menünün görüntüleneceği konum
                                </p>
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
                        </CardContent>
                    </Card>

                    <Card>
                        <CardHeader>
                            <div className="flex items-center justify-between">
                                <CardTitle>Menü Öğeleri</CardTitle>
                                <Button
                                    type="button"
                                    variant="outline"
                                    onClick={addMenuItem}
                                >
                                    <Plus className="mr-2 h-4 w-4" />
                                    Öğe Ekle
                                </Button>
                            </div>
                        </CardHeader>
                        <CardContent>
                            {menuItems.length === 0 ? (
                                <div className="py-8 text-center text-muted-foreground">
                                    <p>Henüz menü öğesi eklenmemiş</p>
                                    <Button
                                        type="button"
                                        variant="outline"
                                        className="mt-4"
                                        onClick={addMenuItem}
                                    >
                                        <Plus className="mr-2 h-4 w-4" />
                                        İlk Öğeyi Ekle
                                    </Button>
                                </div>
                            ) : (
                                <DndContext
                                    sensors={sensors}
                                    onDragEnd={handleDragEnd}
                                >
                                    <SortableContext
                                        items={menuItems.map(
                                            (item) => item.tempId,
                                        )}
                                        strategy={verticalListSortingStrategy}
                                    >
                                        <div className="space-y-3">
                                            {menuItems.map((item, index) => (
                                                <MenuItemForm
                                                    key={item.tempId}
                                                    item={item}
                                                    index={index}
                                                    onUpdate={updateMenuItem}
                                                    onRemove={removeMenuItem}
                                                    onAddChild={
                                                        addChildMenuItem
                                                    }
                                                />
                                            ))}
                                        </div>
                                    </SortableContext>
                                </DndContext>
                            )}
                            <InputError message={errors.items} />
                        </CardContent>
                    </Card>

                    <div className="flex justify-end gap-2">
                        <Link href="/admin/menus">
                            <Button type="button" variant="outline">
                                İptal
                            </Button>
                        </Link>
                        <Button type="submit" disabled={processing}>
                            {processing ? 'Kaydediliyor...' : 'Kaydet'}
                        </Button>
                    </div>
                </form>
            </div>
        </AppLayout>
    );
}
