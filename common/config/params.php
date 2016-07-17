<?php

use backend\searchmodels\ExpertsIn;
use common\models\Page;
use yii\helpers\ArrayHelper;
return [
    'adminEmail' => 'admin@example.com',
    'supportEmail' => 'support@example.com',
    'user.passwordResetTokenExpire' => 3600,
    'pages'=>[
        'invention_experts'=>[
            'id'=>1,
            'title'=>'Team up with the Invention Experts',
        ],
        'experts_in'=>[
            'id'=>2,
            'title'=>'WE ARE EXPERTS IN',
            'class'=> ExpertsIn::className(),
            'controller'=>  'experts',
        ],
        'how_to_do_it'=>[
            'id'=>3,
            'title'=>'how we do it',
        ],
        'goals'=>[
            'id'=>4,
            'title'=>'our Goals',
            'page'=> Page::className()
        ],
        'strength'=>[
            'id'=>5,
            'title'=>'our STRENGTH',
            'page'=> Page::className()
        ],
        'added_values'=>[
            'id'=>6,
            'title'=>'Our Added Value',
            'page'=> Page::className()
        ],
        'footer'=>[
            'id'=>7,
            'title'=>'Footer',
        ],
    ]
];
