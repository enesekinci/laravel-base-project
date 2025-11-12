/**
 * Media upload için hook
 * CSRF token'ı otomatik alır ve upload işlemini yönetir
 */

export interface UploadedMedia {
    path: string;
    type: 'image' | 'video';
    alt?: string;
    sort_order?: number;
}

/**
 * Media dosyasını upload eder
 */
export async function uploadMediaFile(
    file: File,
    endpoint: string = '/admin/media/upload',
): Promise<UploadedMedia> {
    // CSRF token'ı al
    const csrfToken =
        document
            .querySelector('meta[name="csrf-token"]')
            ?.getAttribute('content') || '';

    if (!csrfToken) {
        throw new Error('CSRF token bulunamadı');
    }

    // FormData oluştur
    const formData = new FormData();
    formData.append('file', file);

    // Upload et
    const response = await fetch(endpoint, {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': csrfToken,
        },
        body: formData,
    });

    if (!response.ok) {
        throw new Error(`Upload başarısız: ${response.statusText}`);
    }

    const data = await response.json();

    return {
        path: data.path || data.url || '',
        type: file.type.startsWith('image') ? 'image' : 'video',
        alt: data.alt || file.name,
        sort_order: data.sort_order || 0,
    };
}

/**
 * Variation image upload için özel fonksiyon
 */
export async function uploadVariationImage(
    file: File,
): Promise<{ path: string }> {
    const csrfToken =
        document
            .querySelector('meta[name="csrf-token"]')
            ?.getAttribute('content') || '';

    if (!csrfToken) {
        throw new Error('CSRF token bulunamadı');
    }

    const formData = new FormData();
    formData.append('image', file);

    const response = await fetch('/admin/variations/upload-image', {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': csrfToken,
        },
        body: formData,
    });

    if (!response.ok) {
        throw new Error(`Upload başarısız: ${response.statusText}`);
    }

    const data = await response.json();

    return {
        path: data.path || data.url || '',
    };
}
