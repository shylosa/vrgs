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

mix.styles([
    'resources/assets/front/css/bootstrap.min.css',
    'resources/assets/front/css/all.min.css',
    'resources/assets/front/css/style.css'
],'public/css/front.css');

mix.scripts([
    'resources/assets/front/js/jquery.min.js',
    'resources/assets/front/js/popper.min.js',
    'resources/assets/front/js/bootstrap.min.js',
    'resources/assets/front/js/all.min.js',
    'resources/assets/front/js/scripts.js',
], 'public/js/front.js');

mix.js('resources/js/app.js', 'public/js')
   .sass('resources/sass/app.scss', 'public/css');

mix.copy('resources/assets/front/fonts', 'public/fonts');
mix.copy('resources/assets/front/webfonts', 'public/webfonts');
mix.copy('resources/assets/front/images', 'public/images');
