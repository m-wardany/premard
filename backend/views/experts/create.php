<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\ExpertsIn */

$this->title = 'Create Experts In';
$this->params['breadcrumbs'][] = ['label' => 'Experts Ins', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="experts-in-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
