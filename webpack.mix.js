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

mix.js('resources/assets/js/app.js', 'public/js')
    .fastSass('resources/assets/stylus/bulma.scss', 'public/css')
    .stylus('resources/assets/stylus/app.styl', 'public/css')
    .combine([
        'resources/assets/stylus/libraries/animations.css',
        './node_modules/vue-multiselect/dist/vue-multiselect.min.css',
        './node_modules/font-awesome/css/font-awesome.min.css'
    ], 'public/css/packages.css')
    .version()
    .copy('./node_modules/font-awesome/fonts', 'public/fonts');

// vendors
mix.scripts([
    'node_modules/jquery/dist/jquery.min.js'
], 'public/js/vendor.js')
    .version();

// custom Javascripts
mix.scripts([
    'resources/assets/js/popup.fadeout.js'
], 'public/js/custom.js')
    .version();