<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\searchmodels\ExpertsIn */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Experts Ins';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="experts-in-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Experts In', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'attribute'=>'image',
                'value'=>function($model){
                    return $model->getUploadUrl("image");
                },
                'format'=>'image'
            ],
            'title',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
