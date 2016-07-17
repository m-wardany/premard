<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\HomeSlider */

$this->title = 'Create Home Slider';
$this->params['breadcrumbs'][] = ['label' => 'Home Sliders', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="home-slider-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
