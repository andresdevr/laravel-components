const path = require('path');

module.exports = {
    mode: 'production',
    module: {
        rules: [
            {
                test: /\.tsx?$/,
                use: 'ts-loader',
                exclude: /node_modules/,
            },
        ],
    },
    resolve: {
        extensions: ['.tsx', '.ts', '.js'],
    },
    entry: {
        alpinejs: path.resolve(__dirname, 'resources/assets/alpinejs.ts'),
    },
    output: {
        path: path.resolve(__dirname, 'dist'),
        filename: 'js/[name].dist.js'
    }
};