import { useSortable } from '@dnd-kit/sortable';
import { CSS } from '@dnd-kit/utilities';
import { GripVertical } from 'lucide-react';
import { ReactNode } from 'react';

interface SortableTableRowProps {
    id: string;
    children: ReactNode;
}

export function SortableTableRow({ id, children }: SortableTableRowProps) {
    const {
        attributes,
        listeners,
        setNodeRef,
        transform,
        transition,
        isDragging,
    } = useSortable({ id });

    const style = {
        transform: CSS.Transform.toString(transform),
        transition,
        opacity: isDragging ? 0.5 : 1,
    };

    return (
        <tr ref={setNodeRef} style={style}>
            <td className="text-center">
                <div
                    {...attributes}
                    {...listeners}
                    className="flex cursor-grab items-center justify-center text-muted-foreground active:cursor-grabbing"
                >
                    <GripVertical className="h-4 w-4" />
                </div>
            </td>
            {children}
        </tr>
    );
}
