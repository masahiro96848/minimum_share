const mix = require('laravel-mix');
const glob = require('glob');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */


// sassディレクトリ直下のscssファイルを全てコンパイル
mix.webpackConfig({
    module: {
        rules: [{
            test: /\.scss/,
            enforce: "pre",
            loader: 'import-glob-loader'
        }]
    }
})
    .js('resources/js/app.js', 'public/js').version()
    .js('resources/js/bootstrap.js', 'public/js')
    .js('resources/js/main.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css').sourceMaps();

// jsファイルを連結・圧縮  
// mix.scripts(glob.sync('resources/assets/js/modules/vendors/*.js'), 'public/assets/js/vendors.js');