<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;

?>

<!-- BEGIN LOGIN FORM -->

        <h3 class="form-title"><?= Html::encode($this->title) ?></h3>
        <?php $form = ActiveForm::begin(['id' => 'login-form','options'=>['class'=>'login-form"']]); ?>

                <?= $form->field($model, 'username',['inputOptions'=>['placeHolder'=>"Username"]])->textInput()->label(false) ?>

                <?= $form->field($model, 'password',['inputOptions'=>['placeHolder'=>"Password"]])->passwordInput()->label(false) ?>

                
                <?= $form->field($model, 'reCaptcha')->widget(\himiklab\yii2\recaptcha\ReCaptcha::className(),['widgetOptions' => ['data-theme'=>'dark']])->label(false) ?>

                <div class="form-actions">
                    <?= Html::submitButton('Login', ['class' => 'btn btn-success uppercase', 'name' => 'login-button']) ?>
                    <?= $form->field($model, 'rememberMe',['options' => ['tag'=>false]])->checkbox(['template'=>'<label class="rememberme check">{input}{label}</label>']) ?>
                    <?= Html::a('Forgot Password?', ['site/request-password-reset'],['class'=>'forget-password']) ?>
                </div>
                
        
            <?php ActiveForm::end(); ?>
        
        
<!-- END LOGIN FORM -->


