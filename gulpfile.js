var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Less
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {
    mix.less('app.less');
    mix.scriptsIn("public/js/some/directory");
    mix.copy(
        'react-bootstrap-treeview/src/react-bootstrap-treeview.js',
        'public/js/react-bootstrap-treeview.js'
    ).copy(
        'react-bootstrap-treeview/src/react-bootstrap-treeview.css',
        'public/css/react-bootstrap-treeview.js'
    );
});
