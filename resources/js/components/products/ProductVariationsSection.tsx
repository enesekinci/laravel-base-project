import { Combobox } from '@/components/combobox';
import { SortableTableRow } from '@/components/SortableTableRow';
import { Button } from '@/components/ui/button';
import { Card, CardContent, CardHeader, CardTitle } from '@/components/ui/card';
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
import {
    Table,
    TableBody,
    TableCell,
    TableHead,
    TableHeader,
    TableRow,
} from '@/components/ui/table';
import type { ProductVariation, Variation } from '@/types/product';
import { DndContext, closestCenter, type DragEndEvent } from '@dnd-kit/core';
import {
    SortableContext,
    verticalListSortingStrategy,
} from '@dnd-kit/sortable';
import { ChevronDown, GripVertical, Plus, Trash2 } from 'lucide-react';
import { useState } from 'react';

// Variation Value Select Component - Seçim yapıldıktan sonra reset olması için
function VariationValueSelect({
    availableValues,
    onSelect,
}: {
    availableValues: Array<{
        id: number;
        label?: string;
        value?: string;
    }>;
    onSelect: (valueId: number) => void;
}) {
    const [selectedValue, setSelectedValue] = useState<string>('');

    return (
        <Select
            value={selectedValue}
            onValueChange={(value) => {
                if (value && value !== '') {
                    onSelect(Number(value));
                    // Seçim yapıldıktan sonra reset et
                    setSelectedValue('');
                }
            }}
        >
            <SelectTrigger className="w-[180px]">
                <SelectValue placeholder="Değer Seç" />
            </SelectTrigger>
            <SelectContent>
                {availableValues.map((val) => (
                    <SelectItem key={val.id} value={String(val.id)}>
                        {val.label || val.value || `Value ${val.id}`}
                    </SelectItem>
                ))}
            </SelectContent>
        </Select>
    );
}

interface ProductVariationsSectionProps {
    productVariations: ProductVariation[];
    variations: Variation[];
    selectedTemplateId?: string;
    onAddVariation: (variationId?: number) => void;
    onRemoveVariation: (index: number) => void;
    onUpdateVariation: (
        index: number,
        field: 'variation_id' | 'variation_value_ids' | 'name' | 'type',
        value: number | number[] | string,
    ) => void;
    onRemoveVariationValue: (
        variationIndex: number,
        valueIndex: number,
    ) => void;
    onAddVariationValue?: (variationIndex: number, valueId?: number) => void;
    onVariationDragEnd: (event: DragEndEvent) => void;
    onVariationValueDragEnd: (
        variationIndex: number,
        event: DragEndEvent,
    ) => void;
    onTemplateIdChange: (value: string | undefined) => void;
    sensors: ReturnType<typeof import('@dnd-kit/core').useSensors>;
}

export function ProductVariationsSection({
    productVariations,
    variations,
    selectedTemplateId,
    onAddVariation,
    onRemoveVariation,
    onUpdateVariation,
    onRemoveVariationValue,
    onAddVariationValue,
    onVariationDragEnd,
    onVariationValueDragEnd,
    onTemplateIdChange,
    sensors,
}: ProductVariationsSectionProps) {
    return (
        <Card>
            <CardHeader>
                <CardTitle>
                    Variations <span className="text-red-500">*</span> (min 1)
                </CardTitle>
            </CardHeader>
            <CardContent className="space-y-4">
                <DndContext
                    sensors={sensors}
                    collisionDetection={closestCenter}
                    onDragEnd={onVariationDragEnd}
                >
                    <SortableContext
                        items={productVariations
                            .map((variation) => variation.tempId)
                            .filter((id): id is string =>
                                Boolean(id && id !== ''),
                            )}
                        strategy={verticalListSortingStrategy}
                    >
                        {productVariations.map((variation, index) => {
                            const variationData = variations.find(
                                (v) => v.id === variation.variation_id,
                            );

                            return (
                                <Collapsible
                                    key={variation.tempId || index}
                                    defaultOpen
                                    className="mb-4"
                                >
                                    <Card>
                                        <CardHeader>
                                            <div className="flex items-center justify-between">
                                                <div className="flex items-center gap-2">
                                                    <CollapsibleTrigger asChild>
                                                        <Button
                                                            variant="ghost"
                                                            className="flex items-center space-x-2"
                                                        >
                                                            <GripVertical className="h-4 w-4 text-muted-foreground" />
                                                            <span>
                                                                {variation.name ||
                                                                    variationData?.name ||
                                                                    'New Variation'}
                                                            </span>
                                                            <ChevronDown className="h-4 w-4" />
                                                        </Button>
                                                    </CollapsibleTrigger>
                                                </div>
                                                <Button
                                                    type="button"
                                                    variant="ghost"
                                                    size="icon"
                                                    onClick={() =>
                                                        onRemoveVariation(index)
                                                    }
                                                >
                                                    <Trash2 className="h-4 w-4" />
                                                </Button>
                                            </div>
                                        </CardHeader>
                                        <CollapsibleContent>
                                            <CardContent className="space-y-4">
                                                <div className="grid grid-cols-2 gap-4">
                                                    <div className="space-y-2">
                                                        <Label>
                                                            Name{' '}
                                                            <span className="text-red-500">
                                                                *
                                                            </span>
                                                        </Label>
                                                        <Input
                                                            value={
                                                                variation.name ||
                                                                ''
                                                            }
                                                            onChange={(e) =>
                                                                onUpdateVariation(
                                                                    index,
                                                                    'name',
                                                                    e.target
                                                                        .value,
                                                                )
                                                            }
                                                            placeholder="Variation name"
                                                        />
                                                    </div>
                                                    <div className="space-y-2">
                                                        <Label>
                                                            Type{' '}
                                                            <span className="text-red-500">
                                                                *
                                                            </span>
                                                        </Label>
                                                        <Select
                                                            value={
                                                                variation.type ||
                                                                'text'
                                                            }
                                                            onValueChange={(
                                                                value,
                                                            ) =>
                                                                onUpdateVariation(
                                                                    index,
                                                                    'type',
                                                                    value as
                                                                        | 'text'
                                                                        | 'color'
                                                                        | 'image',
                                                                )
                                                            }
                                                        >
                                                            <SelectTrigger>
                                                                <SelectValue placeholder="Select type" />
                                                            </SelectTrigger>
                                                            <SelectContent>
                                                                <SelectItem value="text">
                                                                    Text
                                                                </SelectItem>
                                                                <SelectItem value="color">
                                                                    Color
                                                                </SelectItem>
                                                                <SelectItem value="image">
                                                                    Image
                                                                </SelectItem>
                                                            </SelectContent>
                                                        </Select>
                                                    </div>
                                                </div>
                                                <div className="space-y-2">
                                                    <div className="flex items-center justify-between">
                                                        <Label>Values</Label>
                                                        {onAddVariationValue &&
                                                            variationData &&
                                                            variationData.values &&
                                                            (() => {
                                                                // Seçilmemiş value'ları bul
                                                                const selectedValueIds =
                                                                    variation.variation_value_ids ||
                                                                    [];
                                                                const availableValues =
                                                                    variationData.values.filter(
                                                                        (v) =>
                                                                            !selectedValueIds.includes(
                                                                                v.id,
                                                                            ),
                                                                    );
                                                                return (
                                                                    availableValues.length >
                                                                        0 && (
                                                                        <VariationValueSelect
                                                                            availableValues={
                                                                                availableValues
                                                                            }
                                                                            onSelect={(
                                                                                valueId,
                                                                            ) => {
                                                                                onAddVariationValue(
                                                                                    index,
                                                                                    valueId,
                                                                                );
                                                                            }}
                                                                        />
                                                                    )
                                                                );
                                                            })()}
                                                    </div>
                                                    {variation.localValues &&
                                                    variation.localValues
                                                        .length > 0 ? (
                                                        <div className="overflow-x-auto">
                                                            <DndContext
                                                                sensors={
                                                                    sensors
                                                                }
                                                                collisionDetection={
                                                                    closestCenter
                                                                }
                                                                onDragEnd={(
                                                                    e,
                                                                ) =>
                                                                    onVariationValueDragEnd(
                                                                        index,
                                                                        e,
                                                                    )
                                                                }
                                                            >
                                                                <Table>
                                                                    <TableHeader>
                                                                        <TableRow>
                                                                            <TableHead className="w-12"></TableHead>
                                                                            <TableHead>
                                                                                Label{' '}
                                                                                <span className="text-red-500">
                                                                                    *
                                                                                </span>
                                                                            </TableHead>
                                                                            {variation.type ===
                                                                                'color' && (
                                                                                <TableHead>
                                                                                    Color
                                                                                </TableHead>
                                                                            )}
                                                                            {variation.type ===
                                                                                'image' && (
                                                                                <TableHead>
                                                                                    Image
                                                                                </TableHead>
                                                                            )}
                                                                            <TableHead className="w-12"></TableHead>
                                                                        </TableRow>
                                                                    </TableHeader>
                                                                    <TableBody>
                                                                        <SortableContext
                                                                            items={variation.localValues.map(
                                                                                (
                                                                                    v,
                                                                                ) =>
                                                                                    v.tempId ||
                                                                                    '',
                                                                            )}
                                                                            strategy={
                                                                                verticalListSortingStrategy
                                                                            }
                                                                        >
                                                                            {variation.localValues.map(
                                                                                (
                                                                                    value,
                                                                                    valueIndex,
                                                                                ) => (
                                                                                    <SortableTableRow
                                                                                        key={
                                                                                            value.tempId ||
                                                                                            valueIndex
                                                                                        }
                                                                                        id={
                                                                                            value.tempId ||
                                                                                            String(
                                                                                                valueIndex,
                                                                                            )
                                                                                        }
                                                                                    >
                                                                                        <TableCell>
                                                                                            <div className="flex items-center gap-2">
                                                                                                <span className="text-sm font-medium">
                                                                                                    {
                                                                                                        value.label
                                                                                                    }
                                                                                                </span>
                                                                                                {variation.type ===
                                                                                                    'color' &&
                                                                                                    value.color && (
                                                                                                        <div
                                                                                                            className="h-6 w-6 rounded border"
                                                                                                            style={{
                                                                                                                backgroundColor:
                                                                                                                    value.color,
                                                                                                            }}
                                                                                                        />
                                                                                                    )}
                                                                                            </div>
                                                                                        </TableCell>
                                                                                        {variation.type ===
                                                                                            'color' && (
                                                                                            <TableCell>
                                                                                                <div className="flex items-center gap-2">
                                                                                                    {value.color && (
                                                                                                        <>
                                                                                                            <div
                                                                                                                className="h-6 w-6 rounded border"
                                                                                                                style={{
                                                                                                                    backgroundColor:
                                                                                                                        value.color,
                                                                                                                }}
                                                                                                            />
                                                                                                            <span className="text-sm text-muted-foreground">
                                                                                                                {
                                                                                                                    value.color
                                                                                                                }
                                                                                                            </span>
                                                                                                        </>
                                                                                                    )}
                                                                                                </div>
                                                                                            </TableCell>
                                                                                        )}
                                                                                        {variation.type ===
                                                                                            'image' && (
                                                                                            <TableCell>
                                                                                                {value.image && (
                                                                                                    <img
                                                                                                        src={
                                                                                                            value.image.startsWith(
                                                                                                                'http',
                                                                                                            ) ||
                                                                                                            value.image.startsWith(
                                                                                                                '/',
                                                                                                            )
                                                                                                                ? value.image
                                                                                                                : `/storage/variations/${value.image}`
                                                                                                        }
                                                                                                        alt={
                                                                                                            value.label
                                                                                                        }
                                                                                                        className="h-16 w-16 rounded border object-cover"
                                                                                                    />
                                                                                                )}
                                                                                            </TableCell>
                                                                                        )}
                                                                                        <TableCell className="text-center">
                                                                                            <Button
                                                                                                type="button"
                                                                                                variant="ghost"
                                                                                                size="sm"
                                                                                                onClick={() =>
                                                                                                    onRemoveVariationValue(
                                                                                                        index,
                                                                                                        valueIndex,
                                                                                                    )
                                                                                                }
                                                                                            >
                                                                                                <Trash2 className="h-4 w-4 text-destructive" />
                                                                                            </Button>
                                                                                        </TableCell>
                                                                                    </SortableTableRow>
                                                                                ),
                                                                            )}
                                                                        </SortableContext>
                                                                    </TableBody>
                                                                </Table>
                                                            </DndContext>
                                                        </div>
                                                    ) : (
                                                        <div className="py-8 text-center text-sm text-muted-foreground">
                                                            Bu varyasyon için
                                                            henüz değer yok.
                                                        </div>
                                                    )}
                                                </div>
                                            </CardContent>
                                        </CollapsibleContent>
                                    </Card>
                                </Collapsible>
                            );
                        })}
                    </SortableContext>
                </DndContext>
                <div className="flex items-center gap-2">
                    <Combobox
                        options={
                            variations && variations.length > 0
                                ? variations
                                      .filter(
                                          (v) =>
                                              v.id != null &&
                                              v.id !== undefined,
                                      )
                                      // Zaten eklenmiş varyasyonları filtrele
                                      .filter(
                                          (v) =>
                                              !productVariations.some(
                                                  (pv) =>
                                                      pv.variation_id === v.id,
                                              ),
                                      )
                                      .map((variation) => ({
                                          value: String(variation.id),
                                          label: variation.name,
                                      }))
                                      .filter(
                                          (opt) =>
                                              opt.value &&
                                              opt.value.trim() !== '',
                                      )
                                : []
                        }
                        value={selectedTemplateId}
                        onValueChange={(value) => {
                            onTemplateIdChange(
                                value && value !== '' ? value : undefined,
                            );
                        }}
                        placeholder="Varyasyon Seçin"
                        searchPlaceholder="Varyasyon ara..."
                        emptyMessage="Varyasyon bulunamadı."
                    />
                    <Button
                        type="button"
                        variant="outline"
                        onClick={() => {
                            if (
                                selectedTemplateId &&
                                selectedTemplateId !== ''
                            ) {
                                onAddVariation(Number(selectedTemplateId));
                                onTemplateIdChange(undefined);
                            }
                        }}
                        disabled={
                            !selectedTemplateId || selectedTemplateId === ''
                        }
                    >
                        <Plus className="mr-2 h-4 w-4" />
                        Ekle
                    </Button>
                </div>
            </CardContent>
        </Card>
    );
}
