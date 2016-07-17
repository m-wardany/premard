<?php

/* @var $this yii\web\View */
/* @var $model common\models\PortfolioTranslation */
/* @var $form yii\widgets\ActiveForm */
?>

<?= $form->field($model, "{$language_code}_title")->textInput(['maxlength' => true]) ?>

<?= $form->field($model, "{$language_code}_text")->textInput(['maxlength' => true]) ?>
<?= $form->field($model, "{$language_code}_link_text")->textInput(['maxlength' => true]) ?>
