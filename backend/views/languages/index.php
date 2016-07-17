<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\searchmodels\Language */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Languages';
$this->params['breadcrumbs'][] = $this->title;

$this->params['actions'][] = ['label'=>'Add Language', 'url'=>['create']];
?>
<div class="language-index">

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'code',
            'title',
            [
                'attribute'=>'flag',
                'value'=>function($model){return $model->getThumbUploadUrl('flag');},
                'format'=>'image'
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
