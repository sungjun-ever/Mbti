module.exports = {
    purge: [
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
    ],
    darkMode: false, // or 'media' or 'class'
    theme: {
        extend: {
            transitionProperty: {
                'width': 'width',
            }
        },
    },
    variants: {
        extend: {
            transitionProperty: ['hover', 'focus'],
        },
    },
    plugins: [],
}
