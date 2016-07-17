<?php

/* @var $this yii\web\View */
$this->title = 'PremaR&D';
$footer_id =  Yii::$app->params['pages']['footer']['id'];
use common\widgets\Alert;
?>
<div class="row">
    <div class="container-fluid">
        <div class="mainSlider">
            <?= $this->render("_main_slider",['model'=>$main_slider]) ?>
        </div><!--mainSlider-->
    </div><!--container-fluid-->
</div><!--row-->

<div class="row">
    <div class="container">
          <?= $this->render("_invention_experts") ?>                  
    </div><!--container-->
</div>
<div class="row">
    <div class="container-fluid bg-gray-color">
        <div class="container">
            <?= $this->render("_experts_in",['model'=>$experts_in]) ?>
        </div><!--container-->
    </div><!--container-fluid-->
</div><!--row-->
<div class="row">
    <div class="container-fluid how-we-do-itColor">
        <?= $this->render("_how_we_do_it") ?> 
    </div><!--container-fluid-->
</div><!--row-->
<div class="row">
    <div class="container-fluid">
        <?= $this->render("_portfolio",['model'=>$portfolio]) ?>
    </div><!--container-fluid-->
</div><!--row-->
<div class="row">
    <div class="container">
        <div class="our-blocks">
        <?= $this->render("_goals_stringth_added_values") ?> 
        </div><!--our-blocks-->
    </div><!--container-->
</div><!--row-->
<div class="row">
    <div class="container-fluid">
        <?= $this->render("_clients",['model'=>$clients]) ?>
    </div><!--container-fluid-->
</div><!--row-->
<div class="row contact-us-bg">
    <div class="container"> 
        <div class="contact-us-block">
            <?= Alert::widget() ?>
            <?= $this->render('contact',['model'=>$contact]) ?>
        </div><!--contact-us-block-->
    </div>
</div>
		