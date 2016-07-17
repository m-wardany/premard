<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\searchmodels\Content */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Contents';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="content-index">

    <p>
        <?= Html::a('Create Content', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute'=>"category_id",
                'value'=>  function ($model){
                    return $model->getCategories(true);
                },
                'filter'=>  Yii::$app->content->getCategories()
            ],  
            'label',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
