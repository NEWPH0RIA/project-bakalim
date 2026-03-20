<?php


return[
'~^hello/(.*)$~' => [\src\controllers\MainController::class, 'sayHello'],
'~^$~' => [\src\controllers\MainController::class, 'main'],
'~^test/$~'=> [\src\controllers\TestController::class, 'view'],
];

    ?>