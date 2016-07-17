<?php

/* @var $this yii\web\View */
/* @var $model common\models\ExpertsInTranslation */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="experts-in-translation-form">

    <?= $form->field($model, "{$language_code}_title")->textInput(['maxlength' => true]) ?>

</div>
