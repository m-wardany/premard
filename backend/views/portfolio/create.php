<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Portfolio */

$this->title = 'Create Home Slider';
$this->params['breadcrumbs'][] = ['label' => 'Portfolio', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="home-slider-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
