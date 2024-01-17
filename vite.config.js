import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import axios from 'axios'; 


export default defineConfig({
    plugins: [
        laravel({
            input: [
                 'resources/sass/app.scss',
                 'resources/js/app.js',
                'resources/css/app.css',
            ],
            refresh: true,
        }),
    ],
});
