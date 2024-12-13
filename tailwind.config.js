import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

// const usedColors = ['blue', 'red', 'green', 'yellow', 'gray', 'slate']
// const usedColorDensities = ['50', '100', '200', '300', '400', '500', '600', '700', '800', '900']

/** @type {import('tailwindcss').Config} */ 
export default {
    safelist: [
        // ...usedColors.map(function (c) { return usedColorDensities.map(function (d) { return `text-${c}-${d}`; } ) }),
        
        { pattern: /(text|bg)-(red|green|blue|yellow|gray|slate)-(50|100|200|300|400|500|600|700|800|900)/, },
    ],
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php', 
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
        },
    },

    plugins: [forms],
};
