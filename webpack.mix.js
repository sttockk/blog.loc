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

mix.styles([
    'resources/assets/admin/plugins/fontawesome-free/css/all.min.css',
    'resources/assets/admin/plugins/select2/css/select2.css',
    'resources/assets/admin/plugins/select2-bootstrap4-theme/select2-bootstrap4.css',
    'resources/assets/admin/css/adminlte.min.css',
], 'public/assets/admin/css/admin.css');

mix.scripts([
    'resources/assets/admin/plugins/jquery/jquery.min.js',
    'resources/assets/admin/plugins/bootstrap/js/bootstrap.bundle.min.js',
    'resources/assets/admin/plugins/select2/js/select2.full.js',
    'resources/assets/admin/plugins/bs-custom-file-input/bs-custom-file-input.js',
    'resources/assets/admin/js/adminlte.min.js',
    'resources/assets/admin/js/demo.js',

], 'public/assets/admin/js/admin.js');

mix.copyDirectory(['resources/assets/admin/plugins/fontawesome-free/webfonts'], 'public/assets/admin/webfonts' );
mix.copyDirectory(['resources/assets/admin/img'], 'public/assets/admin/img');

mix.copy(['resources/assets/admin/css/adminlte.min.css.map'], 'public/assets/admin/css');
mix.copy(['resources/assets/admin/js/adminlte.min.js.map'], 'public/assets/admin/js');
mix.copy(['resources/assets/admin/plugins/bs-custom-file-input/bs-custom-file-input-init.js'], 'public/assets/admin/js');

mix.styles([
    'resources/assets/front/css/bootstrap.css',
    'resources/assets/front/css/animate.css',
    'resources/assets/front/css/owl.carousel.min.css',
    'resources/assets/front/fonts/fontawesome/css/font-awesome.min.css',
    'resources/assets/front/fonts/flaticon/font/flaticon.css',
    'resources/assets/front/css/style.css',
], 'public/assets/front/css/front.css');

mix.scripts([
    'resources/assets/front/js/jquery-3.2.1.min.js',
    'resources/assets/front/js/jquery-migrate-3.0.0.js',
    'resources/assets/front/js/popper.min.js',
    'resources/assets/front/js/bootstrap.min.js',
    'resources/assets/front/js/owl.carousel.min.js',
    'resources/assets/front/js/jquery.waypoints.min.js',
    'resources/assets/front/js/jquery.stellar.min.js',
    'resources/assets/front/js/main.js',
], 'public/assets/front/js/front.js');

mix.copyDirectory('resources/assets/front/fonts', 'public/assets/front/fonts');
mix.copyDirectory('resources/assets/front/images', 'public/assets/front/images');

mix.copy(['resources/assets/front/map/bootstrap.min.css.map'], 'public/assets/front/css');
mix.copy(['resources/assets/front/map/bootstrap.min.js.map'], 'public/assets/front/js');

