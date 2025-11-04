/**
 * Metni slug formatına çevirir (genel karakterler için)
 * Türkçe, İngilizce ve diğer dillerdeki özel karakterleri destekler
 */
export function slugify(text: string): string {
    // Genel karakter dönüşümleri (Türkçe, İspanyolca, Fransızca, vs.)
    // Duplicate key'ler önemli değil, ilk tanımlanan kullanılır
    const charMap: Record<string, string> = {
        // Türkçe
        ç: 'c',
        Ç: 'C',
        ğ: 'g',
        Ğ: 'G',
        ı: 'i',
        İ: 'I',
        ö: 'o',
        Ö: 'O',
        ş: 's',
        Ş: 'S',
        ü: 'u',
        Ü: 'U',
        // İspanyolca
        á: 'a',
        é: 'e',
        í: 'i',
        ó: 'o',
        ú: 'u',
        ñ: 'n',
        Á: 'A',
        É: 'E',
        Í: 'I',
        Ó: 'O',
        Ú: 'U',
        Ñ: 'N',
        // Fransızca
        à: 'a',
        è: 'e',
        ù: 'u',
        â: 'a',
        ê: 'e',
        î: 'i',
        ô: 'o',
        û: 'u',
        ë: 'e',
        ï: 'i',
        // Almanca
        ä: 'a',
        ß: 'ss',
        // Diğer
        æ: 'ae',
        ø: 'o',
        å: 'a',
    };

    return text
        .toString()
        .toLowerCase()
        .split('')
        .map((char) => charMap[char] || char)
        .join('')
        .trim()
        .replace(/[^\w\s-]/g, '') // Özel karakterleri kaldır
        .replace(/[\s_-]+/g, '-') // Boşluk ve alt çizgileri tire ile değiştir
        .replace(/^-+|-+$/g, ''); // Baş ve sondaki tireleri kaldır
}
