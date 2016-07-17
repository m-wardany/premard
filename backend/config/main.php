<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'name'=>'PremaR&D',
    'language'=>'en',
    'id' => 'app-backend',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    'modules' => [],
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
        'view'=>[
            'theme' => [
                'basePath' => '@app/web/themes/metronic',
                'baseUrl' => '@web/themes/metronic',
                'pathMap' => [
                    '@app/views' => '@app/web/themes/metronic',
                ],
            ],
        ],        
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules'=>[
                '' => 'site/index',
                '<action:(login|logout|lock|request-password-reset|reset-password|update-profile|change-password|profile)>' => 'site/<action>',
                '<controller:[\w\-]+>'=>'<controller>/index',
                '<controller:[\w\-]+>/<id:\d+>'=>'<controller>/view',
                '<controller:[\w\-]+>/<action:[\w\-]+>/<id:\d+>/<sub_category:\d+>'=>'<controller>/<action>',
                '<controller:[\w\-]+>/<action:[\w\-]+>/<id:\d+>'=>'<controller>/<action>',
                '<controller:[\w\-]+>/<action:[\w\-]+>'=>'<controller>/<action>',
            ]
        ],
        'sidebar'=>[
            'class'=>'backend\components\Sidebar'
        ],
    ],
    'params' => $params,
];
