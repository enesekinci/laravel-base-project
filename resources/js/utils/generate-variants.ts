/**
 * Varyasyon değerlerinden variant kombinasyonlarını üretir
 */

export interface VariationValue {
    variation_id: number;
    value_id: number;
    label: string;
    template_value_id: number | null;
}

export interface VariationData {
    variation_id: number;
    name: string;
    type: 'text' | 'color' | 'image';
    variation_value_ids: number[];
    tempId?: string;
}

export interface VariationTemplate {
    id: number;
    name: string;
    type: 'text' | 'color' | 'image';
    values?: Array<{
        id: number;
        label: string;
        value?: string;
        color?: string;
        image?: string;
    }>;
}

export interface Variation {
    id: number;
    name: string;
    type: 'text' | 'color' | 'image';
    values?: Array<{
        id: number;
        label: string;
        value?: string;
        color?: string;
        image?: string;
    }>;
}

/**
 * Kartezien çarpım - tüm kombinasyonları oluştur
 */
function generateCombinations(
    arrays: Array<VariationValue[]>,
): VariationValue[][] {
    if (arrays.length === 0) return [];
    if (arrays.length === 1) {
        return arrays[0].map((item) => [item]);
    }

    const [first, ...rest] = arrays;
    const restCombinations = generateCombinations(rest);

    const result: VariationValue[][] = [];

    for (const item of first) {
        for (const combination of restCombinations) {
            result.push([item, ...combination]);
        }
    }

    return result;
}

/**
 * Variation değişikliklerinde variant kombinasyonlarını güncelle
 * Mevcut variant'ları korur, sadece yeni kombinasyonları ekler
 */
export function updateVariantsFromVariations(
    variationsList: VariationData[],
    variations: Variation[],
    variationTemplates: VariationTemplate[],
    existingVariants: Array<{
        name: string;
        sku?: string;
        price?: number;
        stock?: number;
        variation_values: Array<{
            variation_id: number;
            variation_value_id: number;
        }>;
        tempId?: string;
    }>,
): Array<{
    name: string;
    sku?: string;
    price?: number;
    stock?: number;
    variation_values: Array<{
        variation_id: number;
        variation_value_id: number;
    }>;
    tempId?: string;
}> {
    if (variationsList.length === 0) {
        return [];
    }

    // Her variation için seçilen value'ları hazırla
    const variationArrays = variationsList
        .filter((v) => v.variation_id > 0 && v.variation_value_ids.length > 0)
        .map((variation) => {
            // Önce variation'ı bul
            const variationData = variations.find(
                (v) => v.id === variation.variation_id,
            );
            if (!variationData) {
                return [];
            }

            // Template'i bul (variation name ve type'a göre)
            const template = variationTemplates.find(
                (t) =>
                    t.name === variationData.name &&
                    t.type === variationData.type,
            );
            if (!template || !template.values) {
                return [];
            }

            // Template value'larını kullan (VariationTemplateValue)
            return variation.variation_value_ids
                .map((valueId) => {
                    // Önce variation value'da ara, sonra template value'da ara
                    const variationValue = variationData.values?.find(
                        (v) => v.id === valueId,
                    );
                    const templateValue = template.values?.find(
                        (v) => v.id === valueId,
                    );

                    if (!variationValue && !templateValue) {
                        return null;
                    }

                    const value = variationValue || templateValue;
                    if (!value) {
                        return null;
                    }

                    return {
                        variation_id: variation.variation_id,
                        value_id: variationValue?.id || 0,
                        label: value.label || '',
                        template_value_id: templateValue?.id || null,
                    } as VariationValue;
                })
                .filter((v): v is VariationValue => v !== null);
        })
        .filter((arr) => arr.length > 0);

    if (variationArrays.length === 0) {
        return [];
    }

    // Tüm kombinasyonları oluştur
    const combinations = generateCombinations(variationArrays);

    // Mevcut variant'ları koru (tempId'ye göre)
    const existingVariantsMap = new Map(
        existingVariants.map((v) => [
            v.tempId || '',
            {
                ...v,
                variation_values: v.variation_values.map((vv) => ({
                    variation_id: vv.variation_id,
                    variation_value_id: vv.variation_value_id,
                })),
            },
        ]),
    );

    // Yeni variant'ları oluştur
    const newVariants = combinations.map((combination) => {
        // Variant name: "Red - Large" gibi
        const name = combination
            .map((c) => c.label)
            .filter(Boolean)
            .join(' - ');

        // Mevcut variant'ı bul (variation_values'a göre)
        const existingVariant = Array.from(existingVariantsMap.values()).find(
            (ev) => {
                if (ev.variation_values.length !== combination.length) {
                    return false;
                }
                return combination.every((c) =>
                    ev.variation_values.some(
                        (vv) =>
                            vv.variation_id === c.variation_id &&
                            vv.variation_value_id ===
                                (c.template_value_id || c.value_id),
                    ),
                );
            },
        );

        // Eğer mevcut variant varsa, onu kullan (fiyat, stok vb. korunur)
        if (existingVariant) {
            return {
                ...existingVariant,
                name, // Name'i güncelle
            };
        }

        // Yeni variant oluştur
        return {
            name,
            sku: '',
            price: 0,
            stock: 0,
            variation_values: combination.map((c) => ({
                variation_id: c.variation_id,
                variation_value_id: c.template_value_id || c.value_id,
            })),
            tempId: `variant-${Date.now()}-${Math.random()}`,
        };
    });

    return newVariants;
}
