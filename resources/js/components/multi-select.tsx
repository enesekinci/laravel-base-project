import { Badge } from '@/components/ui/badge';
import { Button } from '@/components/ui/button';
import {
    Command,
    CommandEmpty,
    CommandGroup,
    CommandInput,
    CommandItem,
    CommandList,
} from '@/components/ui/command';
import {
    Popover,
    PopoverContent,
    PopoverTrigger,
} from '@/components/ui/popover';
import { cn } from '@/lib/utils';
import { CheckIcon, ChevronsUpDown, X } from 'lucide-react';
import * as React from 'react';

interface MultiSelectOption {
    value: string;
    label: string;
    group?: string;
    searchKey?: string; // Search için özel key (prefix olmadan)
}

interface MultiSelectProps {
    options: MultiSelectOption[];
    selected: string[];
    onSelectionChange: (selected: string[]) => void;
    placeholder?: string;
    searchPlaceholder?: string;
    emptyMessage?: string;
    disabled?: boolean;
    maxDisplay?: number;
}

export function MultiSelect({
    options,
    selected,
    onSelectionChange,
    placeholder = 'Select items...',
    searchPlaceholder = 'Search...',
    emptyMessage = 'No results found.',
    disabled = false,
    maxDisplay = 2,
}: MultiSelectProps) {
    const [open, setOpen] = React.useState(false);

    const handleSelect = (value: string) => {
        const newSelected = selected.includes(value)
            ? selected.filter((item) => item !== value)
            : [...selected, value];
        onSelectionChange(newSelected);
    };

    const handleRemove = (value: string, e: React.MouseEvent) => {
        e.stopPropagation();
        onSelectionChange(selected.filter((item) => item !== value));
    };

    // Group options by group if provided
    const groupedOptions = React.useMemo(() => {
        const groups: Record<string, MultiSelectOption[]> = {};
        const ungrouped: MultiSelectOption[] = [];

        options.forEach((option) => {
            if (option.group) {
                if (!groups[option.group]) {
                    groups[option.group] = [];
                }
                groups[option.group].push(option);
            } else {
                ungrouped.push(option);
            }
        });

        return { groups, ungrouped };
    }, [options]);

    const displayItems = selected.slice(0, maxDisplay);
    const remainingCount = selected.length - maxDisplay;

    return (
        <Popover open={open} onOpenChange={setOpen}>
            <PopoverTrigger asChild>
                <Button
                    variant="outline"
                    role="combobox"
                    aria-expanded={open}
                    className="h-auto min-h-10 w-full justify-between py-2"
                    disabled={disabled}
                >
                    <div className="flex flex-1 flex-wrap gap-1">
                        {selected.length === 0 ? (
                            <span className="text-muted-foreground">
                                {placeholder}
                            </span>
                        ) : (
                            <>
                                {displayItems.map((value) => {
                                    const option = options.find(
                                        (opt) => opt.value === value,
                                    );
                                    return (
                                        <Badge
                                            key={value}
                                            variant="secondary"
                                            className="mr-1"
                                        >
                                            {option?.label || value}
                                            <div
                                                role="button"
                                                tabIndex={0}
                                                className="ml-1 inline-flex cursor-pointer items-center rounded-full ring-offset-background outline-none focus:ring-2 focus:ring-ring focus:ring-offset-2"
                                                onKeyDown={(e) => {
                                                    if (e.key === 'Enter' || e.key === ' ') {
                                                        e.preventDefault();
                                                        handleRemove(
                                                            value,
                                                            e as any,
                                                        );
                                                    }
                                                }}
                                                onMouseDown={(e) => {
                                                    e.preventDefault();
                                                    e.stopPropagation();
                                                }}
                                                onClick={(e) =>
                                                    handleRemove(value, e)
                                                }
                                            >
                                                <X className="h-3 w-3 text-muted-foreground hover:text-foreground" />
                                            </div>
                                        </Badge>
                                    );
                                })}
                                {remainingCount > 0 && (
                                    <Badge variant="secondary" className="mr-1">
                                        +{remainingCount} more
                                    </Badge>
                                )}
                            </>
                        )}
                    </div>
                    <ChevronsUpDown className="ml-2 h-4 w-4 shrink-0 opacity-50" />
                </Button>
            </PopoverTrigger>
            <PopoverContent className="w-full p-0" align="start">
                <Command>
                    <CommandInput placeholder={searchPlaceholder} />
                    <CommandList>
                        <CommandEmpty>{emptyMessage}</CommandEmpty>
                        {Object.keys(groupedOptions.groups).length > 0 && (
                            <>
                                {Object.entries(groupedOptions.groups).map(
                                    ([groupName, groupOptions]) => (
                                        <CommandGroup
                                            key={groupName}
                                            heading={groupName}
                                        >
                                            {groupOptions.map((option) => (
                                                <CommandItem
                                                    key={option.value}
                                                    value={
                                                        option.searchKey ||
                                                        option.label
                                                            .replace(
                                                                /^--*\s*/g,
                                                                '',
                                                            )
                                                            .trim() ||
                                                        option.value
                                                    }
                                                    onSelect={() =>
                                                        handleSelect(
                                                            option.value,
                                                        )
                                                    }
                                                >
                                                    <CheckIcon
                                                        className={cn(
                                                            'mr-2 h-4 w-4',
                                                            selected.includes(
                                                                option.value,
                                                            )
                                                                ? 'opacity-100'
                                                                : 'opacity-0',
                                                        )}
                                                    />
                                                    {option.label}
                                                </CommandItem>
                                            ))}
                                        </CommandGroup>
                                    ),
                                )}
                            </>
                        )}
                        {groupedOptions.ungrouped.length > 0 && (
                            <CommandGroup>
                                {groupedOptions.ungrouped.map((option) => (
                                    <CommandItem
                                        key={option.value}
                                        value={
                                            option.searchKey ||
                                            option.label
                                                .replace(/^--*\s*/g, '')
                                                .trim() ||
                                            option.value
                                        }
                                        onSelect={() =>
                                            handleSelect(option.value)
                                        }
                                    >
                                        <CheckIcon
                                            className={cn(
                                                'mr-2 h-4 w-4',
                                                selected.includes(option.value)
                                                    ? 'opacity-100'
                                                    : 'opacity-0',
                                            )}
                                        />
                                        {option.label}
                                    </CommandItem>
                                ))}
                            </CommandGroup>
                        )}
                    </CommandList>
                </Command>
            </PopoverContent>
        </Popover>
    );
}
