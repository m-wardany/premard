<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'language'=>'en',
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'components' => [
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
       'urlManager' => [
//            'class'=>'common\components\MultiLangUrl',
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules'=>[
                '' => 'site/index',
                '<action:(contact|login|logout|about)>' => 'site/<action>',
                '<controller:[\w\-]+>'=>'<controller>/index',
                '<controller:[\w\-]+>/<id:\d+>'=>'<controller>/view',
                '<controller:[\w\-]+>/<action:[\w\-]+>/<id:\d+>/<sub_category:\d+>'=>'<controller>/<action>',
                '<controller:[\w\-]+>/<action:[\w\-]+>/<id:\d+>'=>'<controller>/<action>',
                '<controller:[\w\-]+>/<action:[\w\-]+>'=>'<controller>/<action>',
            ]
        ], 
         'view'=>[
            'theme' => [
                'basePath' => '@app/web/themes/front',
                'baseUrl' => '@web/themes/front',
                'pathMap' => [
                    '@app/views' => '@app/web/themes/front',
                ],
            ],
        ],   
    ],
    'params' => $params,
];
