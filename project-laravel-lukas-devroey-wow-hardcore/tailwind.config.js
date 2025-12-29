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
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
                wow: ['Cinzel', 'serif'], // Fantasy font
            },
            colors: {
                wow: {
                    dark: '#0a0a0a',      // Deep background
                    panel: '#151515',     // Card background
                    border: '#2a2a2a',    // Dark borders
                    gold: '#c7b377',      // Text accents/borders
                    red: '#8a0b0b',       // Hardcore death red
                    text: '#d1d5db',      // Main text (gray-300)
                }
            },
            backgroundImage: {
                'hardcore-gradient': 'linear-gradient(to bottom, #1a0505, #0a0a0a)',
            }
        },
    },

    plugins: [forms],
};
