<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\HomeSlider */

$this->title = 'Update Home Slider: ' . $model->en_title;
$this->params['breadcrumbs'][] = ['label' => 'Home Sliders', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $this->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="home-slider-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
