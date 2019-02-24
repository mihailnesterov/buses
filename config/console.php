<?php

return [
    'id' => 'sbt24-console',
    'basePath' => dirname(__DIR__),
    'components' => [
        'db' => require(__DIR__.'/db.php'), // добавить в config/web.php!!!
    ]
];
