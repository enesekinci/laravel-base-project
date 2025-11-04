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

export function NavMain({ items = [] }: { items: NavItem[] }) {
    const page = usePage();

    const renderMenuItem = (item: NavItem) => {
        const hasChildren = item.items && item.items.length > 0;
        const isActive = item.href
            ? page.url.startsWith(resolveUrl(item.href))
            : false;

        if (hasChildren) {
            return (
                <Collapsible
                    key={item.title}
                    asChild
                    defaultOpen={isActive}
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
                                    if (subItem.items && subItem.items.length > 0) {
                                        return (
                                            <SidebarMenuSubItem key={subItem.title}>
                                                <Collapsible
                                                    asChild
                                                    defaultOpen={
                                                        subItem.href
                                                            ? page.url.startsWith(
                                                                  resolveUrl(subItem.href),
                                                              )
                                                            : false
                                                    }
                                                    className="group/collapsible-sub"
                                                >
                                                    <>
                                                        <CollapsibleTrigger asChild>
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
                                                                <span>{subItem.title}</span>
                                                                <ChevronRight className="ml-auto transition-transform duration-200 group-data-[state=open]/collapsible-sub:rotate-90" />
                                                            </SidebarMenuSubButton>
                                                        </CollapsibleTrigger>
                                                        <CollapsibleContent>
                                                            <SidebarMenuSub>
                                                                {subItem.items.map(
                                                                    (nestedItem) => (
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
                                                    </>
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
                                                              resolveUrl(subItem.href),
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
