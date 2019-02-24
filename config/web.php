<?php

return [
    'id' => 'buses',
    'basePath' => realpath(__DIR__.'/../'),
    'name'=>'Расписание автобусов в Зеленогорске',
    'language' => 'ru-RU',
    'bootstrap' => [
        'debug',
        'gii'
    ],
    'components' => [
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            //'enableStrictParsing' => true,
            'rules' => [ // правила формирования ссылок
                    '' => 'site/index',
					//'blog' => 'site/blog', // = строке 27
                    //'blog/post?id=<id:\d+>' => 'site/post',
                    'sitemap.xml' => 'site/sitemap',
                
                    '<module:admin>' => 'admin/default/index',
                    '<module:admin>/<action>' => 'admin/default/<action>',
                
                    '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
                    '<action>' => 'site/<action>',

                    /*'<module:admin>/<controller:\w+>/<id:\d+>' => '<module>/<controller>/view',
                    '<module:admin>/<controller:\w+>/<action:\w+>/<id:\d+>' => '<module>/<controller>/<action>',
                    '<module:admin>/<controller:\w+>/<action:\w+>' => '<module>/<controller>/<action>',*/
            ],
        ],
        'request' => [
            'cookieValidationKey' => 'gh93La69Qka2Rb91lsd9Wm07Z',
            'baseUrl' => '/buses'    // убрать web из url, на хостинге - ''
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'db' => require(__DIR__.'/db.php'),
        'user' => [ // подключаем текущую логику аутентификации
                'identityClass' => 'app\models\Users',
                'enableAutoLogin' => true,
            ],
        'errorHandler' => [
            'errorAction' => 'site/error'
        ],
        'mailer' => [ // подключаем swiftmailer
                'class' => 'yii\swiftmailer\Mailer',
                'useFileTransport' => true, // send to file in runtime\mail
                'transport' => [
                    'class' => 'Swift_SmtpTransport',
                    'host' => 'smtp.mail.ru',
                    'username' => 'mail@mail.ru',
                    'password' => '123456',
                    'port' => '465', // Port 25 is a very common port too
                    'encryption' => 'ssl', // It is often used, check your provider or mail server specs
                ],
            ],
    ],
    'modules' => [
        'debug' => 'yii\debug\Module',
        'gii' => [  // настройки Gii
            'class' => 'yii\gii\Module',
            'allowedIPs' => ['*']
        ],
        'admin' => [
            'class' => 'app\modules\admin\Module',
            'layout' => '@app/modules/admin/views/layouts/main',
        ]
    ],
    // подключить extensions.php для: Gii
    'extensions' => require(__DIR__.'/../vendor/yiisoft/extensions.php')
];

