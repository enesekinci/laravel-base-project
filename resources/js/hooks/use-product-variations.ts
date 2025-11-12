import type {
    ProductVariation,
    ProductVariationLocalValue,
    Variation,
} from '@/types/product';
import { useCallback, useEffect, useRef, useState } from 'react';

interface UseProductVariationsProps {
    variations: Variation[];
    initialVariations?: ProductVariation[];
}

interface UseProductVariationsReturn {
    productVariations: ProductVariation[];
    addVariation: (variationId?: number) => void;
    removeVariation: (index: number) => void;
    updateVariation: (
        index: number,
        field: 'variation_id' | 'variation_value_ids' | 'name' | 'type',
        value: number | number[] | string,
    ) => void;
    addVariationValue: (variationIndex: number, valueId?: number) => void;
    removeVariationValue: (variationIndex: number, valueIndex: number) => void;
    updateVariationValue: (
        variationIndex: number,
        valueIndex: number,
        field: 'label' | 'value' | 'color' | 'image',
        value: string,
    ) => void;
    toggleVariationActive: (index: number) => void;
}

export function useProductVariations({
    variations,
    initialVariations = [],
}: UseProductVariationsProps): UseProductVariationsReturn {
    const tempIdCounter = useRef(0);
    const [productVariations, setProductVariations] = useState<
        ProductVariation[]
    >(initialVariations);
    const [isInitialized, setIsInitialized] = useState(false);

    // initialVariations değiştiğinde state'i güncelle (sadece ilk kez)
    useEffect(() => {
        if (!isInitialized && initialVariations.length > 0) {
            setProductVariations(initialVariations);
            setIsInitialized(true);
        }
    }, [initialVariations, isInitialized]);

    const generateTempId = useCallback(() => {
        tempIdCounter.current += 1;
        return `temp-${tempIdCounter.current}`;
    }, []);

    const addVariation = useCallback(
        (variationId?: number) => {
            if (!variationId || variationId === 0) {
                const newVariation: ProductVariation = {
                    variation_id: 0,
                    name: '',
                    type: 'text',
                    variation_value_ids: [],
                    localValues: [],
                    tempId: generateTempId(),
                };
                setProductVariations((prev) => [...prev, newVariation]);
                return;
            }

            const variation = variations.find((v) => v.id === variationId);
            if (!variation) return;

            setProductVariations((prev) => {
                // Aynı variation zaten eklenmiş mi kontrol et
                const existingVariation = prev.find(
                    (v) => v.variation_id === variationId,
                );
                if (existingVariation) {
                    // Zaten eklenmiş, ekleme
                    return prev;
                }

                const valueIds = variation.values?.map((v) => v.id) || [];
                const localValues: ProductVariationLocalValue[] =
                    variation.values?.map((v, idx) => ({
                        label: v.label || '',
                        value: v.value || '',
                        color: v.color || '',
                        image: v.image || '',
                        sort_order: idx,
                        tempId: generateTempId(),
                    })) || [];

                // İlk value'yu varsayılan olarak seç (eğer varsa)
                const defaultValueIds = valueIds.length > 0 ? [valueIds[0]] : [];
                const defaultLocalValues =
                    localValues.length > 0 ? [localValues[0]] : [];

                const newVariation: ProductVariation = {
                    variation_id: variationId,
                    name: variation.name,
                    type: variation.type as 'text' | 'color' | 'image',
                    variation_value_ids: defaultValueIds,
                    localValues: defaultLocalValues,
                    tempId: generateTempId(),
                };

                return [...prev, newVariation];
            });
        },
        [variations, generateTempId],
    );

    const removeVariation = useCallback((index: number) => {
        setProductVariations((prev) => prev.filter((_, i) => i !== index));
    }, []);

    const updateVariation = useCallback(
        (
            index: number,
            field: 'variation_id' | 'variation_value_ids' | 'name' | 'type',
            value: number | number[] | string,
        ) => {
            setProductVariations((prev) => {
                const updated = [...prev];

                if (field === 'variation_id') {
                    const variationData = variations.find(
                        (v) => v.id === (value as number),
                    );
                    updated[index] = {
                        ...updated[index],
                        variation_id: value as number,
                        name: updated[index].name || variationData?.name || '',
                        type:
                            (variationData?.type as
                                | 'text'
                                | 'color'
                                | 'image') ||
                            updated[index].type ||
                            'text',
                        variation_value_ids:
                            variationData?.values?.map((v) => v.id) || [],
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
        [variations],
    );

    const addVariationValue = useCallback(
        (variationIndex: number, valueId?: number) => {
            setProductVariations((prev) => {
                const updated = [...prev];
                const variation = updated[variationIndex];
                const localValues = variation.localValues || [];
                const variationData = variations.find(
                    (v) => v.id === variation.variation_id,
                );

                if (!variationData) {
                    return prev;
                }

                // Eğer valueId verilmişse, o value'yu bul ve ekle
                if (valueId) {
                    const variationValue = variationData.values?.find(
                        (v) => v.id === valueId,
                    );
                    if (!variationValue) {
                        return prev;
                    }

                    // Zaten eklenmiş mi kontrol et
                    if (variation.variation_value_ids.includes(valueId)) {
                        return prev;
                    }

                    const newValue: ProductVariationLocalValue = {
                        label: variationValue.label || '',
                        value: variationValue.value || '',
                        color: variationValue.color || '',
                        image: variationValue.image || '',
                        sort_order: localValues.length,
                        tempId: generateTempId(),
                    };

                    const newLocalValues = [...localValues, newValue];
                    const newVariationValueIds = [
                        ...variation.variation_value_ids,
                        valueId,
                    ];

                    updated[variationIndex] = {
                        ...updated[variationIndex],
                        localValues: newLocalValues,
                        variation_value_ids: newVariationValueIds,
                    };

                    return updated;
                }

                // Eğer valueId verilmemişse, boş satır ekle (eski davranış)
                const newValue: ProductVariationLocalValue = {
                    label: '',
                    value: '',
                    color: '',
                    image: '',
                    sort_order: localValues.length,
                    tempId: generateTempId(),
                };

                const newLocalValues = [...localValues, newValue];

                const newVariationValueIds = newLocalValues
                    .filter((lv) => lv.label && lv.label.trim() !== '')
                    .map((lv) => {
                        const variationValue = variationData?.values?.find(
                            (v) => v.label === lv.label,
                        );
                        return variationValue?.id;
                    })
                    .filter((id): id is number => id !== undefined);

                updated[variationIndex] = {
                    ...updated[variationIndex],
                    localValues: newLocalValues,
                    variation_value_ids: newVariationValueIds,
                };

                return updated;
            });
        },
        [variations, generateTempId],
    );

    const removeVariationValue = useCallback(
        (variationIndex: number, valueIndex: number) => {
            setProductVariations((prev) => {
                const updated = [...prev];
                const variation = updated[variationIndex];
                const localValues = variation.localValues || [];
                const variationData = variations.find(
                    (v) => v.id === variation.variation_id,
                );

                const newLocalValues = localValues.filter(
                    (_, i) => i !== valueIndex,
                );

                const newVariationValueIds = newLocalValues
                    .filter((lv) => lv.label && lv.label.trim() !== '')
                    .map((lv) => {
                        const variationValue = variationData?.values?.find(
                            (v) => v.label === lv.label,
                        );
                        return variationValue?.id;
                    })
                    .filter((id): id is number => id !== undefined);

                updated[variationIndex] = {
                    ...updated[variationIndex],
                    localValues: newLocalValues,
                    variation_value_ids: newVariationValueIds,
                };

                return updated;
            });
        },
        [variations],
    );

    const updateVariationValue = useCallback(
        (
            variationIndex: number,
            valueIndex: number,
            field: 'label' | 'value' | 'color' | 'image',
            value: string,
        ) => {
            setProductVariations((prev) => {
                const updated = [...prev];
                const variation = updated[variationIndex];
                const localValues = [...(variation.localValues || [])];
                const variationData = variations.find(
                    (v) => v.id === variation.variation_id,
                );

                localValues[valueIndex] = {
                    ...localValues[valueIndex],
                    [field]: value,
                };

                let newVariationValueIds = variation.variation_value_ids;
                if (field === 'label') {
                    newVariationValueIds = localValues
                        .filter((lv) => lv.label && lv.label.trim() !== '')
                        .map((lv) => {
                            const variationValue = variationData?.values?.find(
                                (v) => v.label === lv.label,
                            );
                            return variationValue?.id;
                        })
                        .filter((id): id is number => id !== undefined);
                }

                updated[variationIndex] = {
                    ...updated[variationIndex],
                    localValues,
                    variation_value_ids: newVariationValueIds,
                };

                return updated;
            });
        },
        [variations],
    );

    return {
        productVariations,
        addVariation,
        removeVariation,
        updateVariation,
        addVariationValue,
        removeVariationValue,
        updateVariationValue,
    };
}
