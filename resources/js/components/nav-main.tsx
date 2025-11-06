import {
    Collapsible,
    CollapsibleContent,
    CollapsibleTrigger,
} from '@/components/ui/collapsible';
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
import { ChevronRight } from 'lucide-react';
import { useEffect, useState } from 'react';

export function NavMain({ items = [] }: { items: NavItem[] }) {
    const page = usePage();

    // Sadece aktif menüleri açık tut
    const getActiveMenuState = (): Record<string, boolean> => {
        const activeState: Record<string, boolean> = {};

        items.forEach((item) => {
            if (item.items && item.items.length > 0) {
                const isActive = item.href
                    ? page.url.startsWith(resolveUrl(item.href))
                    : false;
                const menuKey = `menu_${item.title}`;
                if (isActive) {
                    activeState[menuKey] = true;
                }
                // Alt menüleri kontrol et
                item.items.forEach((subItem) => {
                    if (subItem.items && subItem.items.length > 0) {
                        const subIsActive = subItem.href
                            ? page.url.startsWith(resolveUrl(subItem.href))
                            : false;
                        const subMenuKey = `menu_${item.title}_${subItem.title}`;
                        if (subIsActive) {
                            activeState[menuKey] = true;
                            activeState[subMenuKey] = true;
                        }
                    }
                });
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
            <SidebarMenu>{items.map(renderMenuItem)}</SidebarMenu>
        </SidebarGroup>
    );
}
