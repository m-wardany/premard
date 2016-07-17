<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\HomeSlider */

$this->title = $model->en_title;
$this->params['breadcrumbs'][] = ['label' => 'Home Sliders', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="home-slider-view">
    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            [
                'attribute'=>'page_id',
                'value'=>$model->page?$model->page->title:""
            ],
            'en_title',
            [
                'attribute'=>'image',
                'value'=>$model->getThumbUploadUrl("image","preview"),
                'format'=>'image'
            ]
        ],
    ]) ?>

</div>
