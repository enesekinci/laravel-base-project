import { Combobox } from '@/components/combobox';
import { SortableTableRow } from '@/components/SortableTableRow';
import { Button } from '@/components/ui/button';
import { Card, CardContent, CardHeader, CardTitle } from '@/components/ui/card';
import { Checkbox } from '@/components/ui/checkbox';
import { Label } from '@/components/ui/label';
import {
    Popover,
    PopoverContent,
    PopoverTrigger,
} from '@/components/ui/popover';
import {
    Table,
    TableBody,
    TableCell,
    TableHead,
    TableHeader,
    TableRow,
} from '@/components/ui/table';
import {
    closestCenter,
    DndContext,
    KeyboardSensor,
    PointerSensor,
    useSensor,
    useSensors,
    type DragEndEvent,
} from '@dnd-kit/core';
import {
    SortableContext,
    sortableKeyboardCoordinates,
    verticalListSortingStrategy,
} from '@dnd-kit/sortable';
import { Plus, Trash2 } from 'lucide-react';

interface Attribute {
    id: number;
    name: string;
    attributeSet?: {
        id: number;
        name: string;
    } | null;
    values?: Array<{
        id: number;
        value: string;
    }>;
}

interface ProductAttribute {
    attribute_id: number;
    attribute_value_ids: number[];
    tempId?: string;
}

interface ProductAttributesFormProps {
    attributes: Attribute[];
    productAttributes: ProductAttribute[];
    onAdd: () => void;
    onRemove: (index: number) => void;
    onUpdate: (
        index: number,
        field: 'attribute_id' | 'attribute_value_ids',
        value: number | number[],
    ) => void;
    onDragEnd: (event: DragEndEvent) => void;
}

export function ProductAttributesForm({
    attributes,
    productAttributes,
    onAdd,
    onRemove,
    onUpdate,
    onDragEnd,
}: ProductAttributesFormProps) {
    const sensors = useSensors(
        useSensor(PointerSensor),
        useSensor(KeyboardSensor, {
            coordinateGetter: sortableKeyboardCoordinates,
        }),
    );

    return (
        <Card>
            <CardHeader>
                <CardTitle>Attributes</CardTitle>
            </CardHeader>
            <CardContent className="space-y-4">
                <DndContext
                    sensors={sensors}
                    collisionDetection={closestCenter}
                    onDragEnd={onDragEnd}
                >
                    <SortableContext
                        items={productAttributes
                            .map((attr) => attr.tempId)
                            .filter((id): id is string =>
                                Boolean(id && id !== ''),
                            )}
                        strategy={verticalListSortingStrategy}
                    >
                        <Table>
                            <TableHeader>
                                <TableRow>
                                    <TableHead className="w-12"></TableHead>
                                    <TableHead>Attribute</TableHead>
                                    <TableHead>Values</TableHead>
                                    <TableHead className="w-12"></TableHead>
                                </TableRow>
                            </TableHeader>
                            <TableBody>
                                {productAttributes.map((attr, index) => {
                                    const selectedAttribute = attributes.find(
                                        (a) => a.id === attr.attribute_id,
                                    );

                                    return (
                                        <SortableTableRow
                                            key={attr.tempId || `attr-${index}`}
                                            id={attr.tempId || `attr-${index}`}
                                        >
                                            <TableCell>
                                                <Combobox
                                                    options={
                                                        attributes &&
                                                        attributes.length > 0
                                                            ? attributes
                                                                  .filter(
                                                                      (
                                                                          attribute,
                                                                      ) =>
                                                                          attribute.id !=
                                                                              null &&
                                                                          attribute.id !==
                                                                              undefined &&
                                                                          // Zaten eklenmiş attribute'ları filtrele
                                                                          !productAttributes.some(
                                                                              (
                                                                                  pa,
                                                                              ) =>
                                                                                  pa.attribute_id ===
                                                                                      attribute.id &&
                                                                                  pa.tempId !==
                                                                                      attr.tempId,
                                                                          ),
                                                                  )
                                                                  .map(
                                                                      (
                                                                          attribute,
                                                                      ) => ({
                                                                          value: String(
                                                                              attribute.id,
                                                                          ),
                                                                          label: attribute.name,
                                                                          group:
                                                                              attribute
                                                                                  .attributeSet
                                                                                  ?.name ||
                                                                              'Other',
                                                                      }),
                                                                  )
                                                                  .filter(
                                                                      (opt) =>
                                                                          opt.value &&
                                                                          opt.value.trim() !==
                                                                              '',
                                                                  )
                                                            : []
                                                    }
                                                    value={
                                                        attr.attribute_id &&
                                                        attr.attribute_id > 0
                                                            ? String(
                                                                  attr.attribute_id,
                                                              )
                                                            : undefined
                                                    }
                                                    onValueChange={(value) =>
                                                        onUpdate(
                                                            index,
                                                            'attribute_id',
                                                            value &&
                                                                value !== ''
                                                                ? Number(value)
                                                                : 0,
                                                        )
                                                    }
                                                    placeholder="Please Select"
                                                    searchPlaceholder="Search attributes..."
                                                    emptyMessage="No attributes found."
                                                />
                                            </TableCell>
                                            <TableCell>
                                                {!selectedAttribute ? (
                                                    <span className="text-sm text-muted-foreground">
                                                        Select an attribute
                                                        first
                                                    </span>
                                                ) : (
                                                    <Popover>
                                                        <PopoverTrigger asChild>
                                                            <Button
                                                                variant="outline"
                                                                className="w-full justify-start text-left font-normal"
                                                            >
                                                                {attr
                                                                    .attribute_value_ids
                                                                    .length > 0
                                                                    ? `${attr.attribute_value_ids.length} selected`
                                                                    : 'Select values'}
                                                            </Button>
                                                        </PopoverTrigger>
                                                        <PopoverContent
                                                            className="w-[300px] p-0"
                                                            align="start"
                                                        >
                                                            <div className="max-h-64 overflow-y-auto p-2">
                                                                {selectedAttribute.values?.map(
                                                                    (value) => (
                                                                        <div
                                                                            key={
                                                                                value.id
                                                                            }
                                                                            className="flex items-center space-x-2 rounded-sm px-2 py-1.5 hover:bg-accent"
                                                                        >
                                                                            <Checkbox
                                                                                id={`attr-value-${index}-${value.id}`}
                                                                                checked={attr.attribute_value_ids.includes(
                                                                                    value.id,
                                                                                )}
                                                                                onCheckedChange={(
                                                                                    checked,
                                                                                ) => {
                                                                                    const currentIds =
                                                                                        attr.attribute_value_ids;
                                                                                    const newIds =
                                                                                        checked
                                                                                            ? [
                                                                                                  ...currentIds,
                                                                                                  value.id,
                                                                                              ]
                                                                                            : currentIds.filter(
                                                                                                  (
                                                                                                      id,
                                                                                                  ) =>
                                                                                                      id !==
                                                                                                      value.id,
                                                                                              );
                                                                                    onUpdate(
                                                                                        index,
                                                                                        'attribute_value_ids',
                                                                                        newIds,
                                                                                    );
                                                                                }}
                                                                            />
                                                                            <Label
                                                                                htmlFor={`attr-value-${index}-${value.id}`}
                                                                                className="flex-1 cursor-pointer text-sm font-normal"
                                                                            >
                                                                                {value.value ||
                                                                                    `Value ${value.id}`}
                                                                            </Label>
                                                                        </div>
                                                                    ),
                                                                )}
                                                            </div>
                                                        </PopoverContent>
                                                    </Popover>
                                                )}
                                            </TableCell>
                                            <TableCell>
                                                <Button
                                                    type="button"
                                                    variant="ghost"
                                                    size="icon"
                                                    onClick={() =>
                                                        onRemove(index)
                                                    }
                                                >
                                                    <Trash2 className="h-4 w-4" />
                                                </Button>
                                            </TableCell>
                                        </SortableTableRow>
                                    );
                                })}
                            </TableBody>
                        </Table>
                    </SortableContext>
                </DndContext>
                <Button type="button" variant="outline" onClick={onAdd}>
                    <Plus className="mr-2 h-4 w-4" />
                    Add Attribute
                </Button>
            </CardContent>
        </Card>
    );
}
