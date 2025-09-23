const defaultTheme = require('tailwindcss/defaultTheme');

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
         "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    plugins: [require("daisyui")],
    theme: {
        extend: {
            colors: {
                 primary: {
                    500: '#4F46E5', // Indigo
                    600: '#4338CA',
                }
            }
        },
    },

    plugins: [require('@tailwindcss/forms')],
};
