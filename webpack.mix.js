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
    .sass('resources/assets/sass/app.scss', 'public/css')
<<<<<<< HEAD
    // .sass('resources/assets/sass/main.scss', 'public/css/main');  //necessary?
=======
    .sass('resources/assets/sass/main.scss', 'public/css/main');
>>>>>>> 70f932f42bdc72a47746eadc50ab34f20070a39c
