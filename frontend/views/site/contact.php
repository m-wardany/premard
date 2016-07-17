<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Contact';
$this->params['breadcrumbs'][] = $this->title;

$footer_id =  Yii::$app->params['pages']['footer']['id'];

?>
<div class="contact-us-mainTitle">
    <?= Yii::$app->content->getContent($footer_id,"top_title") ?>
</div><!--contact-us-mainTitle-->
<div class="contact-us-items">
    <div class="address-block col-lg-4 col-md-4 col-sm-4">
        <div class="iconBox">
                <img src="<?= $this->theme->baseUrl ?>/images/address-icon.png">
        </div>
        <div class="contact-us-title">
                Address
        </div>
        <p>
            <?= Yii::$app->formatter->asNText(Yii::$app->content->getContent($footer_id,"address")) ?>
        </p>
    </div><!--address-block-->
    <div class="col-lg-4 col-md-4 col-sm-4">
            <div class="iconBox">
                    <img src="<?= $this->theme->baseUrl ?>/images/phones-icon.png">
            </div>
            <div class="contact-us-title">
                    Phones
            </div>
            <p>
                <?php foreach (explode(",", Yii::$app->content->getContent($footer_id,"phones")) as $phone) {
                    echo Html::encode($phone)."<br/>";
                } ?>
            </p>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-4">
            <div class="iconBox">
                <img src="<?= $this->theme->baseUrl ?>/images/email.png">
            </div>
            <div class="contact-us-title">
                    E-mail
            </div>
            <p>
                <?php foreach (explode(",", Yii::$app->content->getContent($footer_id,"emails")) as $email) {
                    echo Html::a($email,"mailto:{$email}",['class'=>"e-mail-link"])."<br/>";
                } ?>
            </p>
    </div>
</div><!--contact-us-items-->
<div class="contact-us-form">
    <?php $form = ActiveForm::begin(['id' => 'contact-form','action'=>['/site/index']]); ?>
        <div class="form-group">
            <div class="col-sm-12">
                <?= Html::errorSummary($model) ?>
            </div>
            <?= Html::activeTextInput($model, 'name',['placeHolder' => $model->getAttributeLabel("name"),"class"=>"col-lg-4 form-control full-field full_name"]) ?>
                
            <?= Html::activeTextInput($model, 'email',['placeHolder' => $model->getAttributeLabel("email"),"class"=>"col-lg-4 form-control full-field full_name"]) ?>
                
            <?= Html::activeTextInput($model, 'subject',['placeHolder' => $model->getAttributeLabel("subject"),"class"=>"col-lg-4 form-control full-field full_name"]) ?>
                
            <?= Html::activeTextarea($model, 'body',['placeHolder' => $model->getAttributeLabel("body"),"class"=>"col-lg-12 form-control full-field full_name text_area"]) ?>
            <div class="button">
                <input type="submit" value="SUBMIT" class="btn btn-success btn-send">
            </div>
        </div>
    <?php ActiveForm::end(); ?>
</div><!--contact-us-form-->
    