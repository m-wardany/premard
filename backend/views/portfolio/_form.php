<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\Page;
use yii\helpers\ArrayHelper ;

/* @var $this yii\web\View */
/* @var $model common\models\Portfolio */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="portfolio-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'page_id')->dropDownList(ArrayHelper::map(Page::find()->all(),'id','title'),['prompt'=>'Choose page']) ?>

    <?= $form->field($model, 'image')->widget(\backend\components\FileInput::className(),['thumbnail' => $model->getThumbUploadUrl('image')]) ?>
    
    <?= backend\components\TranslationTabs::widget(['form'=>$form,'model'=>$model]) ?>    
       
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
