const mix = require('laravel-mix');

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

mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css')
    .sourceMaps();

mix.scripts([
    "node_modules/popper.js/dist/umd/popper.js",
    "node_modules/jquery/dist/jquery.js",
    "node_modules/bootstrap/dist/js/bootstrap.js",
], 'public/js/bootstrap-mix.js')

mix.scripts([
    "node_modules/sweetalert2/dist/sweetalert2.js",
    "resources/js/scripts.js"
], 'public/js/scripts.js')
    .copy('node_modules/sweetalert2/dist/sweetalert2.css', 'public/css');



