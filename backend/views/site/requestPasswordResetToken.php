<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\PasswordResetRequestForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\bootstrap\Alert ;
$this->title = 'Request password reset';
$this->params['breadcrumbs'][] = $this->title;

\backend\assets\LaddaAsset::register($this);
?>
<div class="login-box-body">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Please fill out your email. A link to reset password will be sent there.</p>

    <div class="row">
        <div class="col-lg-12">
            
            <div class="reset-password-request-result"></div>
            <?php $form = ActiveForm::begin(['id' => 'request-password-reset-form']); ?>

                <?= $form->field($model, 'email') ?>
                
                <?= $form->field($model, 'reCaptcha')->widget(
                            \himiklab\yii2\recaptcha\ReCaptcha::className(),
                            ['siteKey' => '6LfiRB4TAAAAAOrNGMi89HXfjRE6JW6THpujC0TW','widgetOptions' => ['data-theme'=>'dark']]
                        )->label(false);
                ?>
                <div class="form-group">
                    <?= Html::submitButton('<span class="ladda-label"> Send', ['class' => 'btn btn-primary ladda-button', 'data-style'=>'expand-right']) ?>
                    <?= Html::a('Back to login', ['/site/login'],['class' => 'btn btn-success']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
<?php
$error = json_encode( Alert::widget(['body' => "Sorry, we are unable to reset password for email provided.","options"=>["class"=>"alert-danger"]]));
?>
<?= $this->registerJs("
jQuery(document).on('click','.ladda-button',function(e){
    e.preventDefault();
    var l = Ladda.create(this);
    
    $.ajax({
        url:$('#request-password-reset-form').attr('action'),
        data:$('#request-password-reset-form').serialize(),
        type:'post',
        beforeSend:function(){
        $('.reset-password-request-result').html(null);
            l.start();
        },
        success:function(data){
            $('.reset-password-request-result').html(data);
            l.stop();
        },
        error:function(error){
            $('.reset-password-request-result').html({$error});
            l.stop();
        }
    });
    return false ;
});
", yii\web\View::POS_END); ?>