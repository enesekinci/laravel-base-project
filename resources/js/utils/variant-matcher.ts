/**
 * Variant eşleştirme utility fonksiyonları
 * Mevcut variant'ları yeni kombinasyonlarla eşleştirmek için kullanılır
 */

export interface VariationValue {
    variation_id: number;
    variation_value_id: number;
}

/**
 * İki variation_values array'inin eşit olup olmadığını kontrol et
 */
export function areVariationValuesEqual(
    v1: VariationValue[],
    v2: VariationValue[],
): boolean {
    if (v1.length !== v2.length) return false;

    const normalize = (values: VariationValue[]): string => {
        return [...values]
            .sort((a, b) => {
                if (a.variation_id !== b.variation_id) {
                    return a.variation_id - b.variation_id;
                }
                return a.variation_value_id - b.variation_value_id;
            })
            .map((v) => `${v.variation_id}-${v.variation_value_id}`)
            .join('|');
    };

    return normalize(v1) === normalize(v2);
}

/**
 * v1, v2'nin subset'i mi kontrol et (v1'in tüm elemanları v2'de var mı?)
 * Örnek: [{1, 1}, {2, 2}] -> [{1, 1}, {2, 2}, {3, 3}] = true
 */
export function isVariationValuesSubset(
    subset: VariationValue[],
    superset: VariationValue[],
): boolean {
    if (subset.length === 0) return true;
    if (subset.length > superset.length) return false;

    const supersetSet = new Set(
        superset.map((v) => `${v.variation_id}-${v.variation_value_id}`),
    );

    return subset.every((v) =>
        supersetSet.has(`${v.variation_id}-${v.variation_value_id}`),
    );
}

/**
 * Mevcut variant'ları yeni kombinasyonla eşleştir
 * Önce tam eşleşme, sonra subset kontrolü yapar
 */
export function findMatchingVariant<
    T extends { variation_values: VariationValue[] },
>(existingVariants: T[], combinationValues: VariationValue[]): T | undefined {
    // 1. Tam eşleşme kontrolü
    const exactMatch = existingVariants.find((variant) =>
        areVariationValuesEqual(variant.variation_values, combinationValues),
    );

    if (exactMatch) {
        return exactMatch;
    }

    // 2. Subset kontrolü (eski variant'ın variation_values'ları yeni kombinasyonun subset'i ise)
    return existingVariants.find((variant) =>
        isVariationValuesSubset(variant.variation_values, combinationValues),
    );
}
