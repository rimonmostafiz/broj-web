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
    var bootstrapPath = 'bower_components/bootstrap/';
    var jqueryPath = 'bower_components/jquery/';
    var fontAwesomePath = 'bower_components/font-awesome/';

    mix.sass('app.scss');
    mix.copy(bootstrapPath + 'dist/css/bootstrap.min.css', 'public/css/vendor/bootstrap.min.css');
    mix.copy(bootstrapPath + 'dist/js/bootstrap.js', 'public/js/vendor/bootstrap.js');
    mix.copy(bootstrapPath + 'dist/js/bootstrap.min.js', 'public/js/vendor/bootstrap.min.js');
    mix.copy(jqueryPath + 'dist/jquery.js', 'public/js/vendor/jquery.js');
    mix.copy(fontAwesomePath + 'css/font-awesome.css', 'public/css/font-awesome.css');
    mix.copy(fontAwesomePath + 'css/font-awesome.min.css', 'public/css/font-awesome.min.css');
    mix.copy(fontAwesomePath + 'fonts', 'public/fonts');

    mix.copy('resources/assets/css/styles.css', 'public/css/styles.css');
    mix.copy('resources/assets/js/custom.js', 'public/js/custom.js');
});

elixir(function(mix) {
    mix.sass('common.scss');
});

elixir(function(mix) {
    mix.sass('sidebar.scss');
});

elixir(function(mix) {
    mix.sass('adminLogin.scss');
});
