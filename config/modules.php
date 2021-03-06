<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Module Namespace
    |--------------------------------------------------------------------------
    |
    | Default module namespace.
    |
    */

    'namespace' => 'Modules',

    /*
    |--------------------------------------------------------------------------
    | Module Stubs
    |--------------------------------------------------------------------------
    |
    | Default module stubs.
    |
    */

    'stubs' => [
        'enabled' => false,
        'path' => base_path() . '/packages/nwidart/laravel-modules/src/Commands/stubs',
        'files' => [

            'start' => 'start.php',
            'routes' => 'Http/routes.php',
            'breadcrumb' => 'Http/breadcrumb.php',
            'json' => 'module.json',
            'views/index'  => 'Resources/views/index.blade.php',
            'views/create' => 'Resources/views/create.blade.php',
            'views/edit'   => 'Resources/views/edit.blade.php',
            'views/show'   => 'Resources/views/show.blade.php',
            'views/header-buttons'=> 'Resources/views/partials/header-buttons.blade.php',
            'language/alerts'     => 'Resources/lang/en/alerts.php',
            'language/exceptions' => 'Resources/lang/en/exceptions.php',
            'language/labels'     => 'Resources/lang/en/labels.php',
            'language/menus'      => 'Resources/lang/en/menus.php',
            'scaffold/config'     => 'Config/config.php',
            'composer' => 'composer.json',
        ],
        'replacements' => [
            'start'  => ['LOWER_NAME'],
            'routes' => ['LOWER_NAME', 'STUDLY_NAME', 'MODULE_NAMESPACE'],
            'json'   => ['LOWER_NAME', 'STUDLY_NAME', 'MODULE_NAMESPACE'],
            'breadcrumb' => ['LOWER_NAME'],
            'views/index' => ['LOWER_NAME'],
            'views/create'=> ['LOWER_NAME'],
            'views/edit'  => ['LOWER_NAME'],
            'views/show'  => ['LOWER_NAME'],
            'language/alerts'    => ['LOWER_NAME', 'STUDLY_NAME'],
            'language/exceptions'=> ['LOWER_NAME', 'STUDLY_NAME'],
            'language/labels'    => ['LOWER_NAME', 'STUDLY_NAME'],
            'language/menus'     => ['LOWER_NAME', 'STUDLY_NAME'],
            'views/header-buttons' => ['LOWER_NAME'],
            'scaffold/config'      => ['STUDLY_NAME'],
            'composer' => [
                'LOWER_NAME',
                'STUDLY_NAME',
                'VENDOR',
                'AUTHOR_NAME',
                'AUTHOR_EMAIL',
                'MODULE_NAMESPACE',
            ],
        ],
    ],
    'paths' => [
        /*
        |--------------------------------------------------------------------------
        | Modules path
        |--------------------------------------------------------------------------
        |
        | This path used for save the generated module. This path also will be added
        | automatically to list of scanned folders.
        |
        */

        'modules' => base_path('Modules'),
        /*
        |--------------------------------------------------------------------------
        | Modules assets path
        |--------------------------------------------------------------------------
        |
        | Here you may update the modules assets path.
        |
        */

        'assets' => public_path('modules'),
        /*
        |--------------------------------------------------------------------------
        | The migrations path
        |--------------------------------------------------------------------------
        |
        | Where you run 'module:publish-migration' command, where do you publish the
        | the migration files?
        |
        */

        'migration' => base_path('database/migrations'),
        /*
        |--------------------------------------------------------------------------
        | Generator path
        |--------------------------------------------------------------------------
        |
        | Here you may update the modules generator path.
        |
        */

        'generator' => [
            'assets' => 'Assets',
            'config' => 'Config',
            'command' => 'Console',
            'event' => 'Events',
            'listener' => 'Listeners',
            'migration' => 'Database/Migrations',
            'model' => 'Entities',
            'repository' => 'Repositories',
            'seeder' => 'Database/Seeders',
            'controller' => 'Http/Controllers',
            'filter' => 'Http/Middleware',
            'request' => 'Http/Requests',
            'provider' => 'Providers',
            'lang' => 'Resources/lang',
            'views' => 'Resources/views',
            'test' => 'Tests',
            'jobs' => 'Jobs',
            'emails' => 'Emails',
            'notifications' => 'Notifications',
        ],
    ],
    /*
    |--------------------------------------------------------------------------
    | Scan Path
    |--------------------------------------------------------------------------
    |
    | Here you define which folder will be scanned. By default will scan vendor
    | directory. This is useful if you host the package in packagist website.
    |
    */

    'scan' => [
        'enabled' => false,
        'paths' => [
            base_path('vendor/*/*'),
        ],
    ],
    /*
    |--------------------------------------------------------------------------
    | Composer File Template
    |--------------------------------------------------------------------------
    |
    | Here is the config for composer.json file, generated by this package
    |
    */

    'composer' => [
        'vendor' => 'zawmyolatt',
        'author' => [
            'name' => 'Zaw Myo Latt',
            'email' => 'zawmyolatt.ucsy@gmail.com',
        ],
    ],
    /*
    |--------------------------------------------------------------------------
    | Caching
    |--------------------------------------------------------------------------
    |
    | Here is the config for setting up caching feature.
    |
    */
    'cache' => [
        'enabled' => false,
        'key' => 'laravel-modules',
        'lifetime' => 60,
    ],
    /*
    |--------------------------------------------------------------------------
    | Choose what laravel-modules will register as custom namespaces.
    | Setting one to false will require to register that part
    | in your own Service Provider class.
    |--------------------------------------------------------------------------
    */
    'register' => [
        'translations' => true,
    ],
];
