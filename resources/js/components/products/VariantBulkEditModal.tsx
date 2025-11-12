import { Button } from '@/components/ui/button';
import {
    Dialog,
    DialogContent,
    DialogDescription,
    DialogFooter,
    DialogHeader,
    DialogTitle,
} from '@/components/ui/dialog';
import { Input } from '@/components/ui/input';
import { Label } from '@/components/ui/label';
import { useState } from 'react';

interface VariantBulkEditModalProps {
    isOpen: boolean;
    onClose: () => void;
    onApply: (updates: {
        sku?: string;
        barcode?: string;
        price?: number;
        stock?: number;
    }) => void;
    variantCount: number;
}

export function VariantBulkEditModal({
    isOpen,
    onClose,
    onApply,
    variantCount,
}: VariantBulkEditModalProps) {
    const [sku, setSku] = useState('');
    const [barcode, setBarcode] = useState('');
    const [price, setPrice] = useState<number | ''>('');
    const [stock, setStock] = useState<number | ''>('');

    const handleApply = () => {
        const updates: {
            sku?: string;
            barcode?: string;
            price?: number;
            stock?: number;
        } = {};

        // Sadece doldurulan alanları ekle
        if (sku.trim() !== '') {
            updates.sku = sku.trim();
        }
        if (barcode.trim() !== '') {
            updates.barcode = barcode.trim();
        }
        if (price !== '' && typeof price === 'number') {
            updates.price = price;
        }
        if (stock !== '' && typeof stock === 'number') {
            updates.stock = stock;
        }

        // En az bir alan doldurulmuş olmalı
        if (Object.keys(updates).length === 0) {
            return;
        }

        onApply(updates);
        handleClose();
    };

    const handleClose = () => {
        setSku('');
        setBarcode('');
        setPrice('');
        setStock('');
        onClose();
    };

    return (
        <Dialog open={isOpen} onOpenChange={(open) => !open && handleClose()}>
            <DialogContent className="sm:max-w-md">
                <DialogHeader>
                    <DialogTitle>Toplu Düzenleme</DialogTitle>
                    <DialogDescription>
                        {variantCount} variant için toplu düzenleme yapın.
                        Doldurduğunuz alanlar tüm variant'lara uygulanacaktır.
                    </DialogDescription>
                </DialogHeader>

                <div className="space-y-4 py-4">
                    <div className="space-y-2">
                        <Label htmlFor="bulk-sku">SKU</Label>
                        <Input
                            id="bulk-sku"
                            value={sku}
                            onChange={(e) => setSku(e.target.value)}
                            placeholder="Tüm variant'lara uygulanacak SKU"
                        />
                        <p className="text-xs text-muted-foreground">
                            Boş bırakılırsa güncellenmez
                        </p>
                    </div>

                    <div className="space-y-2">
                        <Label htmlFor="bulk-barcode">Barcode</Label>
                        <Input
                            id="bulk-barcode"
                            value={barcode}
                            onChange={(e) => setBarcode(e.target.value)}
                            placeholder="Tüm variant'lara uygulanacak barcode"
                        />
                        <p className="text-xs text-muted-foreground">
                            Boş bırakılırsa güncellenmez
                        </p>
                    </div>

                    <div className="space-y-2">
                        <Label htmlFor="bulk-price">Price</Label>
                        <Input
                            id="bulk-price"
                            type="number"
                            step="0.01"
                            value={price}
                            onChange={(e) =>
                                setPrice(
                                    e.target.value === ''
                                        ? ''
                                        : parseFloat(e.target.value) || 0,
                                )
                            }
                            placeholder="Tüm variant'lara uygulanacak fiyat"
                        />
                        <p className="text-xs text-muted-foreground">
                            Boş bırakılırsa güncellenmez
                        </p>
                    </div>

                    <div className="space-y-2">
                        <Label htmlFor="bulk-stock">Stock</Label>
                        <Input
                            id="bulk-stock"
                            type="number"
                            value={stock}
                            onChange={(e) =>
                                setStock(
                                    e.target.value === ''
                                        ? ''
                                        : parseInt(e.target.value, 10) || 0,
                                )
                            }
                            placeholder="Tüm variant'lara uygulanacak stok"
                        />
                        <p className="text-xs text-muted-foreground">
                            Boş bırakılırsa güncellenmez
                        </p>
                    </div>
                </div>

                <DialogFooter>
                    <Button type="button" variant="outline" onClick={handleClose}>
                        İptal
                    </Button>
                    <Button type="button" onClick={handleApply}>
                        Uygula
                    </Button>
                </DialogFooter>
            </DialogContent>
        </Dialog>
    );
}

