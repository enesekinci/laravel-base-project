import {
    Collapsible,
    CollapsibleContent,
    CollapsibleTrigger,
} from '@/components/ui/collapsible';
import { Input } from '@/components/ui/input';
import {
    SidebarGroup,
    SidebarGroupLabel,
    SidebarMenu,
    SidebarMenuButton,
    SidebarMenuItem,
    SidebarMenuSub,
    SidebarMenuSubButton,
    SidebarMenuSubItem,
} from '@/components/ui/sidebar';
import { resolveUrl } from '@/lib/utils';
import { type NavItem } from '@/types';
import { Link, usePage } from '@inertiajs/react';
import { ChevronRight, Search } from 'lucide-react';
import { useEffect, useMemo, useState } from 'react';

export function NavMain({ items = [] }: { items: NavItem[] }) {
    const page = usePage();
    const [searchQuery, setSearchQuery] = useState('');

    // Sadece aktif menüleri açık tut
    const getActiveMenuState = (): Record<string, boolean> => {
        const activeState: Record<string, boolean> = {};

        // Alt menülerde aktif öğe var mı kontrol eden yardımcı fonksiyon
        const checkSubItemsActive = (
            subItems: NavItem[],
            parentKey: string,
        ): boolean => {
            let hasActive = false;

            subItems.forEach((subItem) => {
                // Direkt alt menü öğesi aktif mi?
                if (subItem.href) {
                    const subIsActive = page.url.startsWith(
                        resolveUrl(subItem.href),
                    );
                    if (subIsActive) {
                        hasActive = true;
                    }
                }

                // Nested alt menüler var mı?
                if (subItem.items && subItem.items.length > 0) {
                    const subMenuKey = `${parentKey}_${subItem.title}`;
                    const nestedActive = checkSubItemsActive(
                        subItem.items,
                        subMenuKey,
                    );
                    if (nestedActive) {
                        hasActive = true;
                        // Nested menüyü de açık tut
                        activeState[subMenuKey] = true;
                    }
                }
            });

            return hasActive;
        };

        items.forEach((item) => {
            if (item.items && item.items.length > 0) {
                const menuKey = `menu_${item.title}`;

                // Üst menü kendisi aktif mi?
                const isActive = item.href
                    ? page.url.startsWith(resolveUrl(item.href))
                    : false;

                if (isActive) {
                    activeState[menuKey] = true;
                } else {
                    // Alt menülerde aktif öğe var mı kontrol et
                    const hasActiveSubItem = checkSubItemsActive(
                        item.items,
                        menuKey,
                    );
                    if (hasActiveSubItem) {
                        activeState[menuKey] = true;
                    }
                }
            }
        });

        return activeState;
    };

    const [menuState, setMenuState] =
        useState<Record<string, boolean>>(getActiveMenuState);

    // Sayfa değiştiğinde sadece aktif menüleri açık tut
    useEffect(() => {
        const activeState = getActiveMenuState();
        setMenuState(activeState);
        // eslint-disable-next-line react-hooks/exhaustive-deps
    }, [page.url]);

    const handleMenuToggle = (menuKey: string, isOpen: boolean) => {
        // Kullanıcı manuel açtığında sadece o an için açık tut
        // Sayfa değiştiğinde useEffect aktif menüleri belirleyecek
        setMenuState((prev) => ({ ...prev, [menuKey]: isOpen }));
    };

    // Menü öğelerini arama sorgusuna göre filtrele
    const filterMenuItems = (
        menuItems: NavItem[],
        query: string,
    ): NavItem[] => {
        if (!query.trim()) {
            return menuItems;
        }

        const lowerQuery = query.toLowerCase();

        return menuItems
            .map((item) => {
                const titleMatches = item.title
                    .toLowerCase()
                    .includes(lowerQuery);

                // Alt menüleri de filtrele
                let filteredItems: NavItem[] | undefined;
                if (item.items && item.items.length > 0) {
                    filteredItems = filterMenuItems(item.items, query);
                }

                // Eğer başlık eşleşiyorsa veya filtrelenmiş alt menüler varsa, öğeyi dahil et
                if (
                    titleMatches ||
                    (filteredItems && filteredItems.length > 0)
                ) {
                    return {
                        ...item,
                        items: filteredItems,
                    };
                }

                return null;
            })
            .filter((item): item is NavItem => item !== null);
    };

    const filteredItems = useMemo(
        () => filterMenuItems(items, searchQuery),
        [items, searchQuery],
    );

    // Arama yapıldığında eşleşen menüleri otomatik aç
    useEffect(() => {
        if (searchQuery.trim()) {
            const openMenus: Record<string, boolean> = {};
            const markMenusToOpen = (menuItems: NavItem[], parentKey = '') => {
                menuItems.forEach((item) => {
                    if (item.items && item.items.length > 0) {
                        const menuKey = parentKey
                            ? `${parentKey}_${item.title}`
                            : `menu_${item.title}`;
                        openMenus[menuKey] = true;
                        markMenusToOpen(item.items, menuKey);
                    }
                });
            };
            markMenusToOpen(filteredItems);
            setMenuState((prev) => ({ ...prev, ...openMenus }));
        }
    }, [searchQuery, filteredItems]);

    const renderMenuItem = (item: NavItem) => {
        const hasChildren = item.items && item.items.length > 0;
        const isActive = item.href
            ? page.url.startsWith(resolveUrl(item.href))
            : false;
        const menuKey = `menu_${item.title}`;
        const isOpen = menuState[menuKey] ?? isActive;

        if (hasChildren) {
            return (
                <Collapsible
                    key={item.title}
                    asChild
                    open={isOpen}
                    onOpenChange={(open) => handleMenuToggle(menuKey, open)}
                    className="group/collapsible"
                >
                    <SidebarMenuItem>
                        <CollapsibleTrigger asChild>
                            <SidebarMenuButton
                                tooltip={{ children: item.title }}
                                isActive={isActive}
                                className="cursor-pointer"
                            >
                                {item.icon && <item.icon />}
                                <span>{item.title}</span>
                                <ChevronRight className="ml-auto transition-transform duration-200 group-data-[state=open]/collapsible:rotate-90" />
                            </SidebarMenuButton>
                        </CollapsibleTrigger>
                        <CollapsibleContent>
                            <SidebarMenuSub>
                                {item.items?.map((subItem) => {
                                    if (
                                        subItem.items &&
                                        subItem.items.length > 0
                                    ) {
                                        const subMenuKey = `menu_${item.title}_${subItem.title}`;
                                        const subIsActive = subItem.href
                                            ? page.url.startsWith(
                                                  resolveUrl(subItem.href),
                                              )
                                            : false;
                                        const subIsOpen =
                                            menuState[subMenuKey] ??
                                            subIsActive;

                                        return (
                                            <SidebarMenuSubItem
                                                key={subItem.title}
                                            >
                                                <Collapsible
                                                    open={subIsOpen}
                                                    onOpenChange={(open) =>
                                                        handleMenuToggle(
                                                            subMenuKey,
                                                            open,
                                                        )
                                                    }
                                                    className="group/collapsible-sub"
                                                >
                                                    <div>
                                                        <CollapsibleTrigger
                                                            asChild
                                                        >
                                                            <SidebarMenuSubButton
                                                                isActive={
                                                                    subItem.href
                                                                        ? page.url.startsWith(
                                                                              resolveUrl(
                                                                                  subItem.href,
                                                                              ),
                                                                          )
                                                                        : false
                                                                }
                                                                className="cursor-pointer"
                                                            >
                                                                {subItem.icon && (
                                                                    <subItem.icon />
                                                                )}
                                                                <span>
                                                                    {
                                                                        subItem.title
                                                                    }
                                                                </span>
                                                                <ChevronRight className="ml-auto transition-transform duration-200 group-data-[state=open]/collapsible-sub:rotate-90" />
                                                            </SidebarMenuSubButton>
                                                        </CollapsibleTrigger>
                                                        <CollapsibleContent>
                                                            <SidebarMenuSub>
                                                                {subItem.items.map(
                                                                    (
                                                                        nestedItem,
                                                                    ) => (
                                                                        <SidebarMenuSubItem
                                                                            key={
                                                                                nestedItem.title
                                                                            }
                                                                        >
                                                                            <SidebarMenuSubButton
                                                                                asChild
                                                                                isActive={
                                                                                    nestedItem.href
                                                                                        ? page.url.startsWith(
                                                                                              resolveUrl(
                                                                                                  nestedItem.href,
                                                                                              ),
                                                                                          )
                                                                                        : false
                                                                                }
                                                                            >
                                                                                <Link
                                                                                    href={
                                                                                        nestedItem.href ||
                                                                                        '#'
                                                                                    }
                                                                                    prefetch
                                                                                >
                                                                                    {nestedItem.icon && (
                                                                                        <nestedItem.icon />
                                                                                    )}
                                                                                    <span>
                                                                                        {
                                                                                            nestedItem.title
                                                                                        }
                                                                                    </span>
                                                                                </Link>
                                                                            </SidebarMenuSubButton>
                                                                        </SidebarMenuSubItem>
                                                                    ),
                                                                )}
                                                            </SidebarMenuSub>
                                                        </CollapsibleContent>
                                                    </div>
                                                </Collapsible>
                                            </SidebarMenuSubItem>
                                        );
                                    }

                                    return (
                                        <SidebarMenuSubItem key={subItem.title}>
                                            <SidebarMenuSubButton
                                                asChild
                                                isActive={
                                                    subItem.href
                                                        ? page.url.startsWith(
                                                              resolveUrl(
                                                                  subItem.href,
                                                              ),
                                                          )
                                                        : false
                                                }
                                            >
                                                <Link
                                                    href={subItem.href || '#'}
                                                    prefetch
                                                >
                                                    {subItem.icon && (
                                                        <subItem.icon />
                                                    )}
                                                    <span>{subItem.title}</span>
                                                </Link>
                                            </SidebarMenuSubButton>
                                        </SidebarMenuSubItem>
                                    );
                                })}
                            </SidebarMenuSub>
                        </CollapsibleContent>
                    </SidebarMenuItem>
                </Collapsible>
            );
        }

        return (
            <SidebarMenuItem key={item.title}>
                <SidebarMenuButton
                    asChild
                    isActive={isActive}
                    tooltip={{ children: item.title }}
                >
                    <Link href={item.href || '#'} prefetch>
                        {item.icon && <item.icon />}
                        <span>{item.title}</span>
                    </Link>
                </SidebarMenuButton>
            </SidebarMenuItem>
        );
    };

    return (
        <SidebarGroup className="px-2 py-0">
            <SidebarGroupLabel>Menü</SidebarGroupLabel>
            <div className="px-2 pb-2">
                <div className="relative">
                    <Search className="absolute top-1/2 left-2 h-4 w-4 -translate-y-1/2 text-muted-foreground" />
                    <Input
                        type="search"
                        placeholder="Menüde ara..."
                        value={searchQuery}
                        onChange={(e) => setSearchQuery(e.target.value)}
                        className="pl-8"
                    />
                </div>
            </div>
            <SidebarMenu>
                {filteredItems.length > 0 ? (
                    filteredItems.map(renderMenuItem)
                ) : (
                    <SidebarMenuItem>
                        <div className="px-2 py-4 text-center text-sm text-muted-foreground">
                            Sonuç bulunamadı
                        </div>
                    </SidebarMenuItem>
                )}
            </SidebarMenu>
        </SidebarGroup>
    );
}
