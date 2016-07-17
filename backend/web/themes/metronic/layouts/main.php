<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\components\MetronicAsset;
use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use backend\components\RenderActions;
use backend\components\Sidebar ;

MetronicAsset::register($this);

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
<link rel="shortcut icon" href="<?= $this->theme->baseUrl ?>/favicon-back.ico"/>
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="page-header-fixed page-quick-sidebar-over-content ">
<?php $this->beginBody() ?>
<!-- BEGIN HEADER -->
<div class="page-header navbar navbar-fixed-top">
	<!-- BEGIN HEADER INNER -->
	<div class="page-header-inner">
		<!-- BEGIN LOGO -->
		<div class="page-logo">
			<a href="<?= Yii::$app->urlManager->baseUrl ?>">
			<img src="<?= $this->theme->baseUrl ?>/assets/admin/layout/img/PremaCMS.png" alt="premaitcms" class="logo-default logo-prema"/>
			</a>
			<div class="menu-toggler sidebar-toggler hide">
				<!-- DOC: Remove the above "hide" to enable the sidebar toggler button on header -->
			</div>
		</div>
		<!-- END LOGO -->
		<!-- BEGIN RESPONSIVE MENU TOGGLER -->
		<a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
		</a>
		<!-- END RESPONSIVE MENU TOGGLER -->
		<!-- BEGIN TOP NAVIGATION MENU -->
		<div class="top-menu">
			<ul class="nav navbar-nav pull-right">
                                <li class="dropdown dropdown-user">
                                    <a data-close-others="true" class="dropdown-toggle" target="_blank_prema" href="<?= Yii::$app->urlManagerFrontEnd->createAbsoluteUrl(['/site/index']) ?>">
                                        <span class="username"><i class="icon-eye"></i> View Website &nbsp; &nbsp;</span>
                                    </a>
                                </li>
				<!-- END TODO DROPDOWN -->
				<!-- BEGIN USER LOGIN DROPDOWN -->
				<!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
				                                
                                <li class="dropdown dropdown-user">
                                    <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
					<img alt="" class="img-circle" src="<?= Yii::$app->user->identity->getThumbUploadUrl('image','icon') ?>"/>
                                        <span class="username username-hide-on-mobile">
					<?= Yii::$app->user->identity->username ?> </span>
					<i class="fa fa-angle-down"></i>
					</a>
					<ul class="dropdown-menu dropdown-menu-default ">
						<li>
                                                    <?= Html::a('<i class="icon-user"></i> My Profile',['/site/profile']) ?>
						</li>
						<li>
                                                    <?= Html::a('<i class="icon-lock-open"></i> Change password',['/site/change-password']) ?>
						</li>
						<li class="divider">
						</li>
						<li>
                                                    <?= Html::a('<i class="icon-lock"></i> Lock Screen',['/site/lock']) ?>
						</li>
						<li>
                                                    <?= Html::a('<i class="icon-logout"></i> Log Out',['/site/logout'],['data-method' => 'post']) ?>
						</li>
					</ul>
				</li>
				<!-- END USER LOGIN DROPDOWN -->    
			</ul>
		</div>
		<!-- END TOP NAVIGATION MENU -->
	</div>
	<!-- END HEADER INNER -->
</div>
<!-- END HEADER -->
<div class="clearfix">
</div>
<!-- BEGIN CONTAINER -->
<div class="page-container">
	<!-- BEGIN SIDEBAR -->
	<div class="page-sidebar-wrapper">
		<div class="page-sidebar navbar-collapse collapse">
                    <?= Sidebar::widget([
                            'options' => ['class' => 'page-sidebar-menu','data-keep-expanded'=>"false", 'data-auto-scroll'=>"true", "data-slide-speed"=>"200"],
                            'activateParents'=>true,
                            'linkTemplate'=>'<a href="{url}"><i class="{class}"></i> <span class="title">{label}</span></a> ',
                            'labelTemplate'=>'<a href="javascript:void(0);"><i class="{class}"></i> <span class="title">{label}</span> <span class="arrow"></span></a>',
                            'submenuTemplate'=>"\n<ul class='sub-menu'>\n{items}\n</ul>\n",
                            'items' => Yii::$app->sidebar->items(),
                            'encodeLabels'=>false
                        ]);
                  
                    ?>
			
		</div>
	</div>
	<!-- END SIDEBAR -->
	<!-- BEGIN CONTENT -->
	<div class="page-content-wrapper">
		<div class="page-content">
			<!-- BEGIN PAGE HEADER-->
			<h3 class="page-title">
			<?= $this->title ?>
			</h3>
                        <?php if(isset($this->params['breadcrumbs']) && count($this->params['breadcrumbs'])): ?>
                            <div class="page-bar">
                                <?= Breadcrumbs::widget([
                                    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                                    'options'=>['class'=>'page-breadcrumb'],
                                    'itemTemplate'=>"<li>{link}<i class='fa fa-angle-right'></i></li>\n",
                                    'homeLink' => ['label' => '<i class="fa fa-home"></i> Home',
                                    'url' => Yii::$app->getHomeUrl()],
                                    'encodeLabels'=>false
                                ]) ?>
                                
                                <div class="page-toolbar">
                                        <div class="btn-group pull-right">
                                            <?= RenderActions::widget([
                                                'actions' => isset($this->params['actions']) ? $this->params['actions'] : [],
                                                
                                            ]) ?>
                                        </div>
                                </div>
                            </div>
                        <?php endif; ?>
			<!-- END PAGE HEADER-->
			<div class="row inbox">
                            <div class="col-sm-12">
                                <?= $content ?>
                            </div>
			</div>
		</div>
	</div>
	<!-- END CONTENT -->
</div>
<!-- END CONTAINER -->
<!-- BEGIN FOOTER -->
<div class="page-footer">
	<div class="page-footer-inner">
            <?= date("Y") ?> © Premait Solutions.  All rights reserved.
	</div>
	<div class="scroll-to-top">
		<i class="icon-arrow-up"></i>
	</div>
</div>
<!-- END FOOTER -->
<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<!-- BEGIN CORE PLUGINS -->
<!--[if lt IE 9]>
<script src="<?= $this->theme->baseUrl ?>/assets/global/plugins/respond.min.js"></script>
<script src="<?= $this->theme->baseUrl ?>/assets/global/plugins/excanvas.min.js"></script> 
<![endif]-->
<!-- END CORE PLUGINS -->
<!--[if (gte IE 8)&(lt IE 10)]>
    <script src="<?= $this->theme->baseUrl ?>/assets/global/plugins/jquery-file-upload/js/cors/jquery.xdr-transport.js"></script>
<![endif]-->
<?php $this->endBody() ?>
</body>
<!-- END BODY -->
</html>
<?php $this->endPage() ?>