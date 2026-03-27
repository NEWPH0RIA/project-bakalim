<?php


return [
    '~^articles/add$~' => [src\controllers\ArticleController::class, 'add'],
    '~^articles/$~' => [src\controllers\ArticleController::class, 'index'],
    '~^article/(\d+)$~' => [src\controllers\ArticleController::class, 'view'],
    '~^article/(\d+)/edit$~' => [src\controllers\ArticleController::class, 'edit'],
    '~^article/(\d+)/delete$~' => [src\controllers\ArticleController::class, 'delete'],
    '~^hello/(.*)$~' => [src\controllers\MainController::class, 'sayHello'],
    '~^test/$~' => [src\controllers\TestController::class, 'view'],
    '~^$~' => [src\controllers\MainController::class, 'main'],
];


?>