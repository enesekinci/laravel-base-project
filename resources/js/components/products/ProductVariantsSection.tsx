import { Button } from '@/components/ui/button';
import { Card, CardContent, CardHeader, CardTitle } from '@/components/ui/card';
import { Input } from '@/components/ui/input';
import { Label } from '@/components/ui/label';
import { Switch } from '@/components/ui/switch';
import {
    Table,
    TableBody,
    TableCell,
    TableHead,
    TableHeader,
    TableRow,
} from '@/components/ui/table';
import type { ProductVariant } from '@/types/product';
import { Edit, Trash2, Upload } from 'lucide-react';
import { useState } from 'react';
import { VariantBulkEditModal } from './VariantBulkEditModal';

interface ProductVariantsSectionProps {
    variants: ProductVariant[];
    onUpdateVariant: (
        index: number,
        field: 'sku' | 'barcode' | 'price' | 'stock' | 'image' | 'is_active',
        value: number | string | File | boolean,
    ) => void;
    onRemoveVariant: (index: number) => void;
    showSkuProtectionInfo?: boolean;
}

export function ProductVariantsSection({
    variants,
    onUpdateVariant,
    onRemoveVariant,
    showSkuProtectionInfo = false,
}: ProductVariantsSectionProps) {
    const [isBulkEditOpen, setIsBulkEditOpen] = useState(false);

    const handleBulkEdit = (updates: {
        sku?: string;
        barcode?: string;
        price?: number;
        stock?: number;
    }) => {
        // Tüm variant'ları güncelle
        variants.forEach((_, index) => {
            if (updates.sku !== undefined) {
                onUpdateVariant(index, 'sku', updates.sku);
            }
            if (updates.barcode !== undefined) {
                onUpdateVariant(index, 'barcode', updates.barcode);
            }
            if (updates.price !== undefined) {
                onUpdateVariant(index, 'price', updates.price);
            }
            if (updates.stock !== undefined) {
                onUpdateVariant(index, 'stock', updates.stock);
            }
        });
    };

    if (variants.length === 0) {
        return (
            <Card>
                <CardHeader>
                    <CardTitle>Variants</CardTitle>
                </CardHeader>
                <CardContent>
                    <div className="rounded-md bg-blue-50 p-4 text-sm text-blue-800">
                        Varyasyon seçerek variant kombinasyonlarını otomatik
                        oluşturun
                    </div>
                </CardContent>
            </Card>
        );
    }

    return (
        <>
            <Card>
                <CardHeader>
                    <div className="flex items-center justify-between">
                        <CardTitle>Variants</CardTitle>
                        <Button
                            type="button"
                            variant="outline"
                            onClick={() => setIsBulkEditOpen(true)}
                        >
                            <Edit className="mr-2 h-4 w-4" />
                            Toplu Düzenleme
                        </Button>
                    </div>
                </CardHeader>
                <CardContent>
                    <div className="space-y-4">
                        {showSkuProtectionInfo && (
                            <div className="rounded-md bg-blue-50 p-3 text-sm text-blue-800">
                                <strong>SKU Koruma:</strong> Mevcut variant'ların SKU, fiyat ve stok
                                bilgileri korunur. Yeni variation eklendiğinde mevcut variant'lar
                                güncellenir, yeni satır oluşturulmaz. Örnek: "13 inç / Siyah / 128 GB"
                                variant'ına "Beden" variation'ı eklendiğinde, aynı variant "13 inç /
                                Siyah / 128 GB / XS" olarak güncellenir.
                            </div>
                        )}
                        <div className="text-sm text-muted-foreground">
                            {variants.length} variant oluşturuldu
                        </div>
                    <Table>
                        <TableHeader>
                            <TableRow>
                                <TableHead className="w-24">Resim</TableHead>
                                <TableHead>Name</TableHead>
                                <TableHead>SKU</TableHead>
                                <TableHead>Barcode</TableHead>
                                <TableHead>Price</TableHead>
                                <TableHead>Stock</TableHead>
                                <TableHead className="w-20">Aktif</TableHead>
                                <TableHead className="w-12"></TableHead>
                            </TableRow>
                        </TableHeader>
                        <TableBody>
                            {variants.map((variant, index) => (
                                <TableRow
                                    key={variant.tempId || `variant-${index}`}
                                >
                                    <TableCell>
                                        <div className="flex items-center gap-2">
                                            {variant.imagePreview ||
                                            (typeof variant.image ===
                                                'string' &&
                                                variant.image) ? (
                                                <div className="group relative">
                                                    <img
                                                        src={
                                                            variant.imagePreview ||
                                                            (typeof variant.image ===
                                                            'string'
                                                                ? variant.image.startsWith(
                                                                      'http',
                                                                  ) ||
                                                                  variant.image.startsWith(
                                                                      '/',
                                                                  )
                                                                    ? variant.image
                                                                    : `/storage/${variant.image}`
                                                                : '')
                                                        }
                                                        alt={variant.name}
                                                        className="h-12 w-12 rounded border object-cover"
                                                    />
                                                    <Button
                                                        type="button"
                                                        variant="ghost"
                                                        size="icon"
                                                        className="absolute -top-1 -right-1 h-5 w-5 rounded-full bg-destructive text-destructive-foreground opacity-0 transition-opacity group-hover:opacity-100 hover:bg-destructive/90"
                                                        onClick={() =>
                                                            onUpdateVariant(
                                                                index,
                                                                'image',
                                                                '',
                                                            )
                                                        }
                                                    >
                                                        <Trash2 className="h-3 w-3" />
                                                    </Button>
                                                </div>
                                            ) : (
                                                <div className="relative">
                                                    <input
                                                        type="file"
                                                        id={`variant-image-${index}`}
                                                        className="hidden"
                                                        accept="image/*"
                                                        onChange={(e) => {
                                                            const file =
                                                                e.target
                                                                    .files?.[0];
                                                            if (file) {
                                                                onUpdateVariant(
                                                                    index,
                                                                    'image',
                                                                    file,
                                                                );
                                                            }
                                                            e.target.value = '';
                                                        }}
                                                    />
                                                    <Button
                                                        type="button"
                                                        variant="outline"
                                                        size="icon"
                                                        className="h-12 w-12"
                                                        onClick={() => {
                                                            const input =
                                                                document.getElementById(
                                                                    `variant-image-${index}`,
                                                                ) as HTMLInputElement;
                                                            input?.click();
                                                        }}
                                                    >
                                                        <Upload className="h-4 w-4" />
                                                    </Button>
                                                </div>
                                            )}
                                        </div>
                                    </TableCell>
                                    <TableCell>{variant.name}</TableCell>
                                    <TableCell>
                                        <Input
                                            value={variant.sku || ''}
                                            onChange={(e) =>
                                                onUpdateVariant(
                                                    index,
                                                    'sku',
                                                    e.target.value,
                                                )
                                            }
                                            placeholder="SKU"
                                        />
                                    </TableCell>
                                    <TableCell>
                                        <Input
                                            value={variant.barcode || ''}
                                            onChange={(e) =>
                                                onUpdateVariant(
                                                    index,
                                                    'barcode',
                                                    e.target.value,
                                                )
                                            }
                                            placeholder="Barcode"
                                        />
                                    </TableCell>
                                    <TableCell>
                                        <Input
                                            type="number"
                                            step="0.01"
                                            value={variant.price || 0}
                                            onChange={(e) =>
                                                onUpdateVariant(
                                                    index,
                                                    'price',
                                                    parseFloat(
                                                        e.target.value,
                                                    ) || 0,
                                                )
                                            }
                                            placeholder="Price"
                                        />
                                    </TableCell>
                                    <TableCell>
                                        <Input
                                            type="number"
                                            value={variant.stock || 0}
                                            onChange={(e) =>
                                                onUpdateVariant(
                                                    index,
                                                    'stock',
                                                    parseInt(
                                                        e.target.value,
                                                        10,
                                                    ) || 0,
                                                )
                                            }
                                            placeholder="Stock"
                                        />
                                    </TableCell>
                                    <TableCell>
                                        <Switch
                                            checked={
                                                variant.is_active !== false
                                            }
                                            onCheckedChange={(checked) =>
                                                onUpdateVariant(
                                                    index,
                                                    'is_active',
                                                    checked,
                                                )
                                            }
                                        />
                                    </TableCell>
                                    <TableCell>
                                        <Button
                                            type="button"
                                            variant="ghost"
                                            size="icon"
                                            onClick={() =>
                                                onRemoveVariant(index)
                                            }
                                        >
                                            <Trash2 className="h-4 w-4" />
                                        </Button>
                                    </TableCell>
                                </TableRow>
                            ))}
                        </TableBody>
                    </Table>
                </div>
            </CardContent>
        </Card>

        <VariantBulkEditModal
            isOpen={isBulkEditOpen}
            onClose={() => setIsBulkEditOpen(false)}
            onApply={handleBulkEdit}
            variantCount={variants.length}
        />
    </>
    );
}
