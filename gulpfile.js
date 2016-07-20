var elixir = require('laravel-elixir');


/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {
    mix.sass(['app.scss'])
       .version('css/app.css')
       .copy('node_modules/bootstrap-sass/assets/fonts/bootstrap/', 'public/build/fonts/bootstrap')

       .styles([
            'libs/sweetalert.css',
            'libs/dropzone.css'
        ], 'public/css/all.css')
       .scripts([
            'libs/jquery-2.2.4.js',
            'libs/bootstrap-3.3.6.js',
            'libs/sweetalert-dev.js',
            'libs/dropzone.js'
        ], 'public/js/all.js');
});
