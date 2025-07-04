import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.vue',
         "./node_modules/flowbite/**/*.js"
    ],

    theme: {
        extend: {
            screens: {
                'lg-laptop': '1366px',
              },
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            backgroundImage: {
                'cloud-bg': "url('/images/clouds_bg.webp')",
                'plwc-bg': "url('/images/bg1.jpg')",
                'worship-bg': "url('/images/worship_bg.jpg')",
            }
        },
    },

    plugins: [
        forms,
        require('flowbite/plugin')
    ],
};
