import type {
    ProductVariant,
    ProductVariation,
    Variation,
} from '@/types/product';
import { generateCombinations } from '@/utils/variant-generator';
import { findMatchingVariant } from '@/utils/variant-matcher';
import { useCallback, useEffect, useRef, useState } from 'react';

interface UseProductVariantsProps {
    productVariations: ProductVariation[];
    variations: Variation[];
    baseSku: string;
    initialVariants?: ProductVariant[];
}

export function useProductVariants({
    productVariations,
    variations,
    baseSku,
    initialVariants = [],
}: UseProductVariantsProps) {
    const tempIdCounter = useRef(0);
    const [productVariants, setProductVariants] =
        useState<ProductVariant[]>(initialVariants);

    const generateTempId = useCallback(() => {
        tempIdCounter.current += 1;
        return `variant-${tempIdCounter.current}`;
    }, []);

    // initialVariants'ı ref ile sakla, sadece ilk render'da kullan
    const initialVariantsRef = useRef(initialVariants);

    useEffect(() => {
        // initialVariants değiştiğinde ref'i güncelle
        if (
            initialVariants.length > 0 &&
            initialVariantsRef.current.length === 0
        ) {
            initialVariantsRef.current = initialVariants;
        }
        if (productVariations.length === 0) {
            // Eğer variation yoksa ama initialVariants varsa, onları koru
            if (initialVariantsRef.current.length > 0) {
                setProductVariants(initialVariantsRef.current);
            } else {
                setProductVariants([]);
            }
            return;
        }

        // Her variation için seçilen value'ları hazırla
        const variationArrays = productVariations
            .filter(
                (v) => v.variation_id > 0 && v.variation_value_ids.length > 0,
            )
            .map((variation) => {
                const variationData = variations.find(
                    (v) => v.id === variation.variation_id,
                );
                if (!variationData) {
                    return [];
                }

                return variation.variation_value_ids
                    .map((valueId) => {
                        const variationValue = variationData.values?.find(
                            (v) => v.id === valueId,
                        );
                        if (!variationValue) return null;

                        return {
                            variation_id: variation.variation_id,
                            value_id: variationValue.id,
                            label: variationValue.label || `Value ${valueId}`,
                            template_value_id: null as number | null,
                        };
                    })
                    .filter(
                        (
                            item,
                        ): item is {
                            variation_id: number;
                            value_id: number;
                            label: string;
                            template_value_id: number | null;
                        } => item !== null,
                    );
            })
            .filter((arr) => arr.length > 0);

        if (variationArrays.length === 0) {
            // Eğer kombinasyon oluşturulamıyorsa ama initialVariants varsa, onları koru
            if (initialVariantsRef.current.length > 0) {
                setProductVariants(initialVariantsRef.current);
            } else {
                setProductVariants([]);
            }
            return;
        }

        // Kombinasyonları oluştur
        const combinations = generateCombinations(variationArrays);

        // Mevcut variant'ları koru (variation_values'a göre eşleştir)
        setProductVariants((prevVariants) => {
            const variantsToIndex =
                prevVariants.length > 0
                    ? prevVariants
                    : initialVariantsRef.current;

            const newVariants: ProductVariant[] = combinations.map(
                (combination, idx) => {
                    const name = combination.map((c) => c.label).join(' / ');
                    const defaultSku = `${baseSku || 'PROD'}-${combination
                        .map((c) => c.value_id || idx)
                        .join('-')}`;

                    const combinationValues = combination.map((c) => ({
                        variation_id: c.variation_id,
                        variation_value_id: c.value_id,
                    }));

                    // Mevcut variant'ı bul (tam eşleşme veya subset kontrolü)
                    const existingVariant = findMatchingVariant(
                        variantsToIndex,
                        combinationValues,
                    );

                    // Mevcut variant varsa, değerlerini koru (SKU, fiyat, stok vb.)
                    if (existingVariant) {
                        return {
                            ...existingVariant,
                            name, // Name'i güncelle (variation değişmiş olabilir)
                            sku: existingVariant.sku || defaultSku, // SKU korunur
                            variation_values: combinationValues, // Yeni variation_values'ları kullan
                        };
                    }

                    // Yeni variant oluştur
                    return {
                        name,
                        sku: defaultSku,
                        barcode: '',
                        price: 0,
                        stock: 0,
                        is_active: true,
                        variation_values: combinationValues,
                        tempId: `${generateTempId()}-${idx}`,
                    };
                },
            );

            return newVariants;
        });
    }, [
        productVariations,
        variations,
        baseSku,
        generateTempId,
        initialVariants,
    ]);

    const updateVariant = useCallback(
        (
            index: number,
            field:
                | 'sku'
                | 'barcode'
                | 'price'
                | 'stock'
                | 'image'
                | 'is_active',
            value: number | string | File | boolean,
        ) => {
            setProductVariants((prev) => {
                const updated = [...prev];
                if (field === 'image' && value instanceof File) {
                    updated[index] = {
                        ...updated[index],
                        image: value,
                        imagePreview: URL.createObjectURL(value),
                    };
                } else if (field === 'image' && value === '') {
                    updated[index] = {
                        ...updated[index],
                        image: undefined,
                        imagePreview: undefined,
                    };
                } else {
                    updated[index] = {
                        ...updated[index],
                        [field]: value,
                    };
                }
                return updated;
            });
        },
        [],
    );

    const removeVariant = useCallback((index: number) => {
        setProductVariants((prev) => prev.filter((_, i) => i !== index));
    }, []);

    return {
        productVariants,
        updateVariant,
        removeVariant,
    };
}
