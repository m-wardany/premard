<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Language */

$this->title = 'Create Language';
$this->params['breadcrumbs'][] = ['label' => 'Languages', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

$this->params['actions'][] = ['label' => 'All languages', 'url' => ['index']];
?>
<div class="language-create">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
