/**
 * Variant kombinasyonlarını oluşturan utility fonksiyonları
 */

interface VariationValue {
    variation_id: number;
    value_id: number;
    label: string;
    template_value_id: number | null;
    tempId?: string;
}

interface VariantCombination {
    variation_id: number;
    value_id: number;
    label: string;
    template_value_id: number | null;
    tempId?: string;
}

/**
 * Kartezien çarpım - tüm kombinasyonları oluştur
 */
export function generateCombinations(
    arrays: VariationValue[][],
): VariantCombination[][] {
    if (arrays.length === 0) return [];
    if (arrays.length === 1) {
        return arrays[0].map((item) => [item]);
    }

    const [first, ...rest] = arrays;
    const restCombinations = generateCombinations(rest);

    const result: VariantCombination[][] = [];

    for (const item of first) {
        for (const combination of restCombinations) {
            result.push([item, ...combination]);
        }
    }

    return result;
}
