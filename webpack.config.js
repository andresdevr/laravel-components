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
        alpine: path.resolve(__dirname, 'assets/alpine.ts'),
    },
    output: {
        path: path.resolve(__dirname, 'dist'),
        filename: '[name].dist.js'
    }
};