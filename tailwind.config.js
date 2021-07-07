const colors = require('tailwindcss/colors');

module.exports = {
    purge: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],
    theme: {
        fontFamily: {
            'sans': ['Raleway', 'system-ui'],
            'mono': ['ui-monospace', 'SFMono-Regular']
        },
        extend: {
            colors: {
                teal: colors.teal,
                cyan: colors.cyan,
            }
        },
    },
    plugins: [
        require('@tailwindcss/forms'),
        require('@tailwindcss/aspect-ratio')
    ],
};
