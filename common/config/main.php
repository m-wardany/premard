<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'reCaptcha' => [
            'name' => 'reCaptcha',
            'class' => 'himiklab\yii2\recaptcha\ReCaptcha',
            'siteKey' => '6LcYJyQTAAAAAJ4mgGqg-OX5SKuPNSs-m5NnLSdZ',
            'secret' => '6LcYJyQTAAAAAFuycUGpGHuYa58h8UtNx3rPMlu1',
        ],
        'i18n' => [
            'translations' => [
                '*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@frontend/messages', // if advanced application, set @frontend/messages
                    'sourceLanguage' => 'en',
                    'fileMap' => [],
                ],
            ],
        ],
        'content'=>[
            'class'=>'common\models\Content'
        ],
        'langs'=>[
            'class'=>'common\models\Language'
        ],
    ],
];
