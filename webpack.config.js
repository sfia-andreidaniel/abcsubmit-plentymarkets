const path = require("path");

module.exports = (env) => {

    env = env || {};

    return {
        entry: './resources/js/maps.js',
        output: {
            filename: "maps-component" + (env.prod ? "-min" : "") + ".js",
            path: path.resolve(__dirname, './resources/js/dist')
        },
        mode: env.prod ? "production" : "development",
        devtool: "source-map",
        module: {
            rules: [
                {
                    test: /\.m?js$/,
                    exclude: /(node_modules)/,
                    use: {
                        loader: "babel-loader",
                        options: {
                            presets: ["@babel/preset-env"]
                        }
                    }
                },
                {
                    test: /\.scss$/,
                    exclude: /node_modules/,
                    use:
                    [
                        {
                            loader: 'style-loader'
                        },
                        {
                            loader: 'css-loader'
                        },
                        {
                            loader: 'sass-loader'
                        }
                    ]
                },
            ]
        }
    }
};
