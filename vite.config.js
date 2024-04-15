import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
<<<<<<< HEAD
            input: ['resources/css/app.css', 'resources/js/app.js'],
=======
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
            ],
>>>>>>> e0e52116a513c334aa5bf04915070437adae30de
            refresh: true,
        }),
    ],
});
