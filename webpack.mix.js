const mix = require('laravel-mix')
const path = require('path')

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

mix.alias({
  '@': path.resolve('resources/js'),
  'helpers': path.resolve('resources/js/helpers'),
  'ziggy': path.resolve('vendor/tightenco/ziggy/dist'),
})

mix
  .js('resources/js/app.js', 'public/js')
  .js('resources/js/admin.js', 'public/js/admin.js')
  .sass('resources/sass/app.scss', 'public/css/admin.css')
  .sass('resources/sass/fontawesome.scss', 'public/css')
  .postCss('resources/css/app.css', 'public/css/app.css', [
    require('tailwindcss'),
  ])
