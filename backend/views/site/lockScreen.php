<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Lock';
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="lock-head">
    Locked
</div>
<div class="lock-body">
    <div class="col-12">
        <div class="pull-left lock-avatar-block">
                <img class="lock-avatar" src="<?= $avatar ?>">
        </div>
        <?php $form = ActiveForm::begin(['id' => 'login-form','options'=>['class'=>'lock-form pull-left']]); ?>

        <h4><?= $model->username ?></h4>
        <?= Html::activeHiddenInput($model, 'username') ?>

        <?= $form->field($model, 'password',['inputOptions'=>['placeHolder'=>"Password"]])->passwordInput()->label(false) ?>



        <div class="form-actions">
            <?= Html::submitButton('Login', ['class' => 'btn btn-success uppercase', 'name' => 'login-button']) ?>
        </div>
    </div>
    <div class="clear clearfix"></div>
        
    <?php if($model->scenario == "captchaRequired"){
        echo '<br/>';
        echo $form->field($model, 'reCaptcha')->widget(
                \himiklab\yii2\recaptcha\ReCaptcha::className(),
                ['siteKey' => '6LfiRB4TAAAAAOrNGMi89HXfjRE6JW6THpujC0TW','widgetOptions' => ['data-theme'=>'dark']]
            )->label(false);

    } ?>
    <?php ActiveForm::end(); ?>
</div>
<div class="lock-bottom">
    <?= Html::a("Not {$model->username} ?",['/site/login']) ?>
</div>
	
        


