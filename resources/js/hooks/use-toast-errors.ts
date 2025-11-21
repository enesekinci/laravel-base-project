import { useToast } from '@/components/ui/use-toast';
import { usePage } from '@inertiajs/react';
import { useEffect, useRef } from 'react';

interface PageProps {
    flash?: {
        success?: string;
        error?: string;
    };
    errors?: Record<string, string | string[]>;
    [key: string]: unknown;
}

/**
 * Flash messages ve form errors'ları toast ile gösteren hook
 */
export function useToastErrors(errors: Record<string, string | string[]> = {}) {
    const page = usePage<PageProps>();
    const { toast } = useToast();
    const previousErrorsStringRef = useRef<string>('');
    const previousPageUrlRef = useRef<string>('');
    const lastToastTimeRef = useRef<number>(0);

    // Flash messages'ı toast ile göster
    useEffect(() => {
        const flash = page.props.flash;
        if (flash?.success) {
            toast({
                title: 'Başarılı',
                description: flash.success,
                variant: 'default',
            });
        }
        if (flash?.error) {
            toast({
                title: 'Hata',
                description: flash.error,
                variant: 'destructive',
            });
        }
    }, [page.props, toast]);

    // Form errors'ları toast ile göster
    // Inertia'dan gelen errors prop'unu kullan (daha güvenilir)
    useEffect(() => {
        // Inertia'dan gelen errors prop'unu al
        const pageErrors = page.props.errors || {};
        const currentErrors =
            Object.keys(pageErrors).length > 0 ? pageErrors : errors;

        // Hataları stringify ederek karşılaştır
        const currentErrorsString = JSON.stringify(currentErrors);
        const currentUrl = page.url;
        const currentTime = Date.now();

        // Hatalar varsa toast göster
        // Her form submit'inde yeni bir Inertia response geldiği için
        // page.props değişir ve useEffect tekrar çalışır
        if (Object.keys(currentErrors).length > 0) {
            // Hatalar değiştiyse, yeni sayfa ise veya ilk render ise toast göster
            // Aynı hatalar aynı sayfada tekrar geldiğinde de göster (kullanıcı tekrar submit etmiş olabilir)
            const hasDifferentErrors =
                currentErrorsString !== previousErrorsStringRef.current;
            const isNewPage = currentUrl !== previousPageUrlRef.current;
            const isFirstRender = previousErrorsStringRef.current === '';
            const timeSinceLastToast = currentTime - lastToastTimeRef.current;

            // Her submit'te toast göster
            // Aynı render cycle içinde tekrar gösterilmemesi için zaman kontrolü yapıyoruz
            if (
                hasDifferentErrors ||
                isNewPage ||
                isFirstRender ||
                timeSinceLastToast > 1000 // Son toast'tan 1 saniye geçtiyse tekrar göster
            ) {
                // Her hatayı ayrı satırda göster
                const errorMessages = Object.entries(currentErrors)
                    .map(([, value]) => {
                        if (Array.isArray(value)) {
                            return value.map((v) => `• ${v}`).join('\n');
                        }
                        return `• ${value}`;
                    })
                    .join('\n');

                toast({
                    title: 'Form Hataları',
                    description: errorMessages,
                    variant: 'destructive',
                    duration: 5000, // 5 saniye göster
                });

                // Son toast zamanını güncelle
                lastToastTimeRef.current = currentTime;
            }

            // Her submit'te ref'leri güncelle
            previousErrorsStringRef.current = currentErrorsString;
            previousPageUrlRef.current = currentUrl;
        } else {
            // Hatalar temizlendiğinde ref'leri temizle
            // Böylece tekrar hata geldiğinde toast gösterilir
            previousErrorsStringRef.current = '';
            previousPageUrlRef.current = currentUrl;
            lastToastTimeRef.current = 0;
        }
    }, [page.props, page.url, errors, toast]);
}
