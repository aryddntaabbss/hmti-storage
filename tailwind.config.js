import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: [ 'Figtree', ...defaultTheme.fontFamily.sans ],
            },
        },
    },

    // Menambahkan dark mode menggunakan class
    darkMode: 'class', // Mengaktifkan dark mode dengan class .dark pada elemen root

    plugins: [ forms ],
};
