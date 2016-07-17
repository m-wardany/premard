<?php

use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\searchmodels\Experts */
/* @var $dataProvider yii\data\ActiveDataProvider */

?>
<div class="solution-slider-translation-index">

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            
            'title',

            ['class' => 'yii\grid\ActionColumn','controller'=>"experts"],
        ],
    ]); ?>
</div>
