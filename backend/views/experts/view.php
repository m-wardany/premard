<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\ExpertsIn */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Experts Ins', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="experts-in-view">

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
            'title',
            [
                'attribute'=>'image',
                'value'=>$model->getUploadUrl("image"),
                'format'=>'image'
            ],
        ],
    ]) ?>

</div>
