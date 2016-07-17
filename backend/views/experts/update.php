<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\ExpertsIn */

$this->title = 'Update Experts In: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Experts Ins', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' =>$this->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="experts-in-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
