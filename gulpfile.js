const elixir = require('laravel-elixir');

require('laravel-elixir-vue-2');

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
    mix.sass('app.scss')



        .styles([

            'libs/blog-post.css',
            'libs/bootstrap.css',
            'libs/font-awesome.css',
            'libs/metisMenu.css',
            'libs/sb-admin-2.css',
            'libs/styles.css',
             'libs/bootstrap-material-design.css',
            'libs/ripples.css',
            'libs/custom.css',

        ], './public/css/libs.css')






        .scripts([


            'libs/jquery.js',
            'libs/bootstrap.js',
            'libs/metisMenu.js',
            'libs/sb-admin-2.js',
            'libs/ripples.js',
            'libs/material.js',
            'libs/scripts.js'


        ], './public/js/libs.js')


});
