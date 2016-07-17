<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Content */

$this->title = "Content of ".$model->getCategories(true)." ".$model->label;
$this->params['breadcrumbs'][] = ['label' => 'Contents', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="content-view">
    <p>
        <?= Html::a('Add new content', ['create'], ['class' => 'btn btn-success']) ?>
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
              'attribute'=>'category_id',
              'value'=>$model->getCategories(true)
            ],
            'label',
            'content:ntext',
            [
              'attribute'=>'content_type',
              'value'=>$model->getContentTypes(true)
            ],
            'order',
            'max',
            'is_required:boolean',
            'is_multi_lang:boolean',
        ],
    ]) ?>

</div>
