const postcssConfig = {
    plugins: [
        require('postcss-import'),
        require('tailwindcss'),
        require('postcss-nested'),
        require('autoprefixer'),
    ]
};

if (process.env.NODE_ENV === 'production') {
    postcssConfig.plugins.push(
        require('cssnano')({
            preset: 'default',
        })
    );

    postcssConfig.plugins.push(
        require('@fullhuman/postcss-purgecss')({
            content: [
                './**/*.html',
                './assets/js/**/*.js',
            ],
            defaultExtractor: content => content.match(/[\w-/:]+(?<!:)/g) || []
        })
    );

    postcssConfig.plugins.push(
        require("css-mqpacker")
    );
}

module.exports = postcssConfig;
