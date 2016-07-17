<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\components\FileInput ;
use backend\components\TranslationTabs ;

/* @var $this yii\web\View */
/* @var $model common\models\ExpertsIn */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="experts-in-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'image')->widget(FileInput::className(),['thumbnail'=>$model->getThumbUploadUrl('image')])?>

    <?= TranslationTabs::widget(['model'=>$model, 'form'=>$form]) ?>
    
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
