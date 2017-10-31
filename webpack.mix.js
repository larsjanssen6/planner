let mix = require('laravel-mix');

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

//mix.js('resources/assets/js/popup.fadeout.js', 'public/js').version();

mix.js('resources/assets/js/app.js', 'public/js')
    .fastSass('resources/assets/stylus/bulma.scss', 'public/css')
    .stylus('resources/assets/stylus/app.styl', 'public/css')
    .combine([
        'resources/assets/stylus/libraries/animations.css'
    ], 'public/css/packages.css')
    .version();

// jQuery
mix.scripts([
    'node_modules/jquery/dist/jquery.min.js'
], 'public/js/jquery.js')
    .version();

// custom Javascripts
mix.scripts([
    'resources/assets/js/popup.fadeout.js'
], 'public/js/custom.js')
    .version();