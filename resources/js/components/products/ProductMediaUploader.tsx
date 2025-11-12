import { Card, CardContent, CardHeader, CardTitle } from '@/components/ui/card';
import { Trash2 } from 'lucide-react';

interface MediaItem {
    file?: File;
    preview?: string;
    url?: string;
    type?: 'image' | 'video';
    path?: string;
    alt?: string;
    sort_order?: number;
}

interface ProductMediaUploaderProps {
    media: MediaItem[];
    onAdd: (files: File[]) => void;
    onRemove: (index: number) => void;
}

export function ProductMediaUploader({
    media,
    onAdd,
    onRemove,
}: ProductMediaUploaderProps) {
    const handleFileChange = (e: React.ChangeEvent<HTMLInputElement>) => {
        const files = Array.from(e.target.files || []);
        if (files.length > 0) {
            onAdd(files);
        }
        // Reset input so same file can be selected again
        e.target.value = '';
    };

    return (
        <Card>
            <CardHeader>
                <CardTitle>Media</CardTitle>
            </CardHeader>
            <CardContent>
                <div className="space-y-4">
                    <input
                        type="file"
                        id="media-upload"
                        multiple
                        accept="image/*,video/*"
                        className="hidden"
                        onChange={handleFileChange}
                    />
                    <label
                        htmlFor="media-upload"
                        className="flex h-48 cursor-pointer items-center justify-center rounded-md border-2 border-dashed hover:bg-accent"
                    >
                        <div className="text-center">
                            <div className="mb-2 text-4xl">📷</div>
                            <p className="text-sm text-muted-foreground">
                                Click to upload
                            </p>
                        </div>
                    </label>
                    {media && media.length > 0 && (
                        <div className="grid grid-cols-4 gap-4">
                            {media.map((item, index) => (
                                <div key={index} className="relative">
                                    {item.type === 'image' ||
                                    (!item.type && item.preview) ? (
                                        <img
                                            src={item.preview || item.url || ''}
                                            alt={
                                                item.alt || `Media ${index + 1}`
                                            }
                                            className="h-24 w-full rounded-md object-cover"
                                        />
                                    ) : (
                                        <div className="flex h-24 w-full items-center justify-center rounded-md bg-muted">
                                            <span className="text-xs text-muted-foreground">
                                                Video
                                            </span>
                                        </div>
                                    )}
                                    <button
                                        type="button"
                                        onClick={() => onRemove(index)}
                                        className="absolute top-1 right-1 rounded-full bg-red-500 p-1 text-white hover:bg-red-600"
                                    >
                                        <Trash2 className="h-3 w-3" />
                                    </button>
                                </div>
                            ))}
                        </div>
                    )}
                </div>
            </CardContent>
        </Card>
    );
}
