<?php

use yii\helpers\Html;
use yii\grid\GridView;
/* @var $this yii\web\View */
/* @var $searchModel backend\searchmodels\HomeSlider */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Home Sliders';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="home-slider-index">


    <p>
        <?= Html::a('Create Home Slider', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            
            [
                'attribute'=>'image',
                'value'=>function($model){
                    return $model->getThumbUploadUrl("image","preview");
                },
                'format'=>'image'
            ],
            'title',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
