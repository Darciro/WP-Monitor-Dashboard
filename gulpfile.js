const elixir = require('laravel-elixir');

// require('laravel-elixir-vue-2');
require('laravel-elixir-livereload');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for your application as well as publishing vendor resources.
 |
 */

elixir((mix) => {
    mix.sass('app.scss')
       .webpack('app.js');

    /*mix.scripts([
        'Chart.js',
        'dashboard.js',
    ], 'public/js/dashboard.js');*/

    mix.scripts([
        'app.js',
        'material.min.js',
        'chartist.min.js',
        'arrive.min.js',
        'perfect-scrollbar.jquery.min.js',
        'bootstrap-notify.js',
        'material-dashboard.js',
        'Chart.js',
        'dashboard.js',
    ], 'public/js/app.js');

    mix.copy('node_modules/bootstrap-sass/assets/fonts/bootstrap/','public/fonts/bootstrap');

});

elixir(function(mix) {
    mix.livereload();
});