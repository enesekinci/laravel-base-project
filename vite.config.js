import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                'resources/js/alpine.js',
                'resources/js/admin/init.js',
                'resources/js/storefront/init.js',
            ],
            refresh: true,
        }),
        tailwindcss(),
    ],
});
