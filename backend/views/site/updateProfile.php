<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Update profile data';
$this->params['breadcrumbs'][] = $this->title;

$this->params['actions'][] = ['label'=>'<i class="icon-user"></i> View profile','url'=>['profile']];
$this->params['actions'][] = ['label'=>'<i class="icon-lock-open"></i> Change password','url'=>['change-password']];

?>
<div class="site-signup">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Please fill out the following fields to update your profile data:</p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data'],'id' => 'form-signup']); ?>
                <?= $form->field($model, 'admin_password',['inputOptions'=>['autocomplete'=>'off']])->passwordInput() ?>
                <hr/>
                <?= $form->field($model, 'admin_username')->textInput(['value'=>Yii::$app->user->identity->username]) ?>
                <?= $form->field($model, 'admin_email')->textInput(['value'=>Yii::$app->user->identity->email]) ?>
                
                <?= Html::img(Yii::$app->user->identity->getThumbUploadUrl('image'), ['class' => 'img-thumbnail']) ?>
                <?= $form->field($model, 'image')->fileInput(['accept' => "image/*"]) ?>
                <div class="form-group">
                    <?= Html::submitButton('Update', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
