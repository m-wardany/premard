<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\components\MetronicLockAsset;
use yii\helpers\Html;
use common\widgets\Alert;

MetronicLockAsset::register($this);
    
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<!-- 
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 3.3.4
Version: 4.0.1
Author: KeenThemes
-->
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
<meta charset="<?= Yii::$app->charset ?>"/>
<title><?= Html::encode($this->title) ?></title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<?= Html::csrfMetaTags() ?>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<meta http-equiv="Content-type" content="text/html; charset=utf-8">
<?php $this->head() ?>
<link rel="shortcut icon" href="<?= $this->theme->baseUrl ?>/favicon.ico"/>
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="login">
    <?php $this->beginBody() ?>
    <div class="page-lock">
	<div class="page-logo">
            <a href="<?= Yii::$app->urlManager->createUrl(['/site/index']) ?>">
            <img src="<?= $this->theme->baseUrl  ?>/assets/admin/layout/img/PremaCMS.png" class="logo-prema"/>
            </a>
        </div>
        <div class="page-body">
            <?= Alert::widget() ?>
            <?= $content ?>
        </div>
        <div class="page-footer-custom">
            <?= date("Y") ?> © Premait Solutions.  All rights reserved.
	</div>
    </div>
   
    
    <!-- END LOGIN -->
    
    <?php $this->endBody() ?>
</body>
<!-- END BODY -->
</html>
<?php $this->endPage() ?>