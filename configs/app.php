<?php

$config['app'] = [
    'service'=>[
        // 'HtmlHelper'
        HtmlHelper::class
    ],
    'routeMiddleware'=>[
        'admin/dashboard' => AuthMiddleware::class,
        'admin/users' => AuthMiddleware::class,
        'admin/categories' => AuthMiddleware::class,
    ],
    'globalMiddleware' =>[
        ParamsMiddleware::class,
    ],
    'boot' => [
        AppServiceProvider::class,
    ]
];
?>

