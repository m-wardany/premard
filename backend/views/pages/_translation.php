<?php

use dosamigos\ckeditor\CKEditor ;
/* @var $this yii\web\View */
/* @var $model common\models\PageTranslation */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="page-translation-form">


    <?= $form->field($model, "{$language_code}_title")->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, "{$language_code}_body")->widget(CKEditor::className(), [
        'options' => ['rows' => 6],
        'preset' => 'full',
        'clientOptions' => [
            'filebrowserUploadUrl' => Yii::$app->urlManager->createUrl(['/site/url'])
        ]
    ]) ?>

</div>
