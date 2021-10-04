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

// mix.js('resources/js/app.js', 'public/js')
//     .sass('resources/sass/app.scss', 'public/css');


mix.browserSync('http://medpravda.loc/');


// mix.js('resources/js/ManageBox/Media/media.js', 'public/js/ManageBox')
//     .sass('resources/sass/ManageBox/basic-reactive.scss', 'public/css/ManageBox');

mix.sass('resources/sass/update-style.scss', 'public/css/FrontBox')
mix.js('resources/js/Web/launch.js', 'public/Web/js')


//
// mix.sass('resources/sass/ManageBox/basic-manage.scss', 'public/css/ManageBox')
//     .sass('resources/sass/ManageBox/basic-reactive.scss', 'public/css/ManageBox')
//     .sass('resources/sass/ManageBox/gallery.scss', 'public/css/ManageBox')
//     .js('resources/js/ManageBox/Administration/administration.js', 'public/js/ManageBox')
//     .js('resources/js/ManageBox/Dependency/dependency.js', 'public/js/ManageBox')
//     .js('resources/js/ManageBox/Manual/manual.js', 'public/js/ManageBox');

// mix.sass('resources/sass/FrontBox/basic-page.scss', 'public/css/FrontBox')
//     .js('resources/js/FrontBox/reactive.js', 'public/js/FrontBox');
//
// mix.sass('resources/sass/FrontBox/medpravda-mobile.scss', 'public/css/FrontBox');

// mix.js('resources/js/ManageBox/Media/media.js', 'public/js/ManageBox')
//     .sass('resources/sass/ManageBox/basic-reactive.scss', 'public/css/ManageBox');
