<?php
$config['app'] = [
    'service'=>[
        // 'HtmlHelper'
        HtmlHelper::class
    ],
    'routeMiddleware'=>[
        'san-pham' => AuthMiddleware::class,
    ],
    'globalMiddleware' =>[
        ParamsMiddleware::class,
    ],
    'boot' => [
        AppServiceProvider::class,
    ]
];
?>