- git clone ...
- git checkout cmsapply
- composer global require "fxp/composer-asset-plugin:~1.1.1"
- composer install
- composer update
- php init
    choose dev
    overwrite all
- set DB connection string in /common/config/main-local.php
- php yii migrate
- enable sending emails in /common/config/main-local.php
    set "useFileTransport" to false
    
- Add baseUrl in /frontend/config/main-local.php

        $config = [
            'components' => [
                'request' => [
                    ...
                    'baseUrl'=>"/premard", //Onlyif project in sub directory , if not leave empty string ""
    
                ],
            ];
                
- Add baseUrl and frontUrl in /backend/config/main-local.php e.g.:

        $config = [
            'components' => [
                'request' => [
                    ...
                    'baseUrl'=>"/premard/admin",//if project in sub directory , if not "/admin"
                ],
                'urlManagerFrontEnd' => [
                    'class' => 'yii\web\urlManager',
                    'baseUrl'=>"/premait", //if project in sub directory , if not leave empty string ""
                    'enablePrettyUrl' => true,
                    'showScriptName' => false,
                ],
            ],
        ];
        
- Access admin panel URL/admin
    - username : admin
    - password : prema1234
