import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

export default {
    content: [
        './resources/views/**/*.blade.php',
        './resources/js/**/*.js',
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
    ],
    theme: {
        extend: {
            colors: {
                leaf: { DEFAULT: '#8CC63F', dark: '#5F9A24', light: '#B4DD7F' },
                earth: { DEFAULT: '#6B4226', dark: '#4A2D17', light: '#9C8878' },
                sun: { DEFAULT: '#F2A03D', dark: '#D4821F' },
                cream: '#FAF7F2',
            },
            fontFamily: {
                sans: ['Nunito Sans', ...defaultTheme.fontFamily.sans],
                display: ['Poppins', 'sans-serif'],
                serif: ['Playfair Display', 'serif'],
            },
            boxShadow: {
                soft: '0 16px 40px rgba(107, 66, 38, 0.12)',
            },
        },
    },
    plugins: [forms],
};
