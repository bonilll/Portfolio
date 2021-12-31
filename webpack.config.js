const ExtractTextPlugin = require('extract-text-webpack-plugin');
const BrowserSyncPlugin = require('browser-sync-webpack-plugin');

const browserSync = process.env.NODE_ENV === 'development' ?
    new BrowserSyncPlugin({
        // browse to http://localhost:3000/ during development,
        // ./public directory is being served
        notify: false,
        host: 'localhost',
        port: 3000,
        files: ['./**/*.html']
    }) : () => null;

module.exports = {
    entry: {
        app: './assets/js/app.js'
    },
    mode: process.env.NODE_ENV,
    module: {

        rules: [{
                test: /\.css$/,
                use: ExtractTextPlugin.extract({
                    fallback: 'style-loader',
                    use: [{
                            loader: 'css-loader',
                            options: { importLoaders: 1 }
                        },
                        'postcss-loader',
                    ],
                }),
            },
            {
                test: /\.(js)$/,
                loader: 'babel-loader'
            },
            {
                test: /\.svg/,
                use: {
                    loader: 'svg-url-loader',
                    options: {}
                }
            }
        ],

    },
    plugins: [
        new ExtractTextPlugin('app.css', {
            disable: process.env.NODE_ENV === 'development',
        }),
        browserSync
    ],
    watch: process.env.NODE_ENV === 'development'
};