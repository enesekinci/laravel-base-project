import { slugify } from '@/lib/slugify';
import { useRef } from 'react';

/**
 * Name değiştiğinde otomatik slug üreten hook
 * Kullanıcı slug'ı manuel düzenlediyse otomatik güncellemeyi durdurur
 * Slug yazma bitince (onBlur) otomatik formatlar
 */
export function useAutoSlug(
    name: string,
    slug: string,
    onSlugChange: (slug: string) => void,
) {
    // Slug başlangıçta name'den türetilmişse false, değilse true
    const isManuallyEdited = useRef(
        slug ? slug !== slugify(name) : false,
    );

    // Slug manuel olarak düzenlendi mi kontrol et
    const handleSlugChange = (newSlug: string) => {
        isManuallyEdited.current = true;
        onSlugChange(newSlug);
    };

    // Slug yazma bitince otomatik formatla
    const handleSlugBlur = () => {
        if (slug) {
            const formattedSlug = slugify(slug);
            onSlugChange(formattedSlug);
            // Formatlandıktan sonra, eğer slug name'den türetilmişse manuel düzenlenmiş sayma
            if (formattedSlug === slugify(name)) {
                isManuallyEdited.current = false;
            }
        }
    };

    // Name değiştiğinde otomatik slug üret
    const handleNameChange = (newName: string) => {
        // Eğer slug manuel düzenlenmemişse, otomatik slug üret
        if (!isManuallyEdited.current) {
            const autoSlug = slugify(newName);
            onSlugChange(autoSlug);
        }
    };

    return {
        handleNameChange,
        handleSlugChange,
        handleSlugBlur,
    };
}
