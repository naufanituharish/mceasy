const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

// Bootstrap JS Wrapper
mix.js('resources/js/app.js', 'public/assets/js/core.js').webpackConfig(require('./webpack.config'));
// Alpine Js Wrapper
mix.js('resources/js/alpine.js', 'public/assets/vendor/alpinejs/alpine.js').webpackConfig(require('./webpack.config'));
mix.combine(['node_modules/pace-js/pace.min.js',
    'resources/js/main.js'], 'public/assets/js/main.js').sourceMaps();

// main css
mix.sass('resources/sass/styles.scss', 'public/assets/css/app.css');
mix.styles([
    'node_modules/@fortawesome/fontawesome-free/css/all.min.css',
    'node_modules/jquery-ui-dist/jquery-ui.min.css',
    'node_modules/animate.css/animate.min.css',
    'node_modules/pace-js/themes/black/pace-theme-flash.css',
    'node_modules/bootstrap-select/dist/css/bootstrap-select.min.css',
    'node_modules/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css',
], 'public/assets/css/vendor.css');
mix.copy('resources/sass/images/', 'public/assets/css/images/');
mix.copy('node_modules/@fortawesome/fontawesome-free/webfonts/', 'public/assets/webfonts/');

if (mix.inProduction()) {
    mix.version();
}
