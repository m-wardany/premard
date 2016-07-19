<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Page */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Pages', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container">
    <div class="page-header">
        <center>
            <?= Html::img($model->getThumbUploadUrl("image","header")) ?>
        </center>
        
    </div>
    <h2><?= $model->title ?></h2>
    <p>
        <?= $model->body ?>
    </p>
</div>
