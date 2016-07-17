<?php 
use yii\helpers\Html ;
use frontend\assets\FrontAsset;

FrontAsset::register($this);
?>

<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php $this->head() ?>        
    </head>
    <body>
        <?php $this->beginBody() ?>
            <div class="mianBlock-cont">
		<div class="row">
                    <div class="container-fluid">
                        <header>
                            <div class="container">
                                <div class="logo col-lg-3 col-md-3 col-sm-3 col-xs-3"><?= Html::a("<img src='{$this->theme->baseUrl}/images/logo.png'>",['/site/index']) ?></div>
                                <div class="topMenu col-lg-9 col-md-9 col-sm-9 col-xs-9">
                                    <ul class="topnav">
                                        <li><a href="#home">Home</a></li>
                                        <li><a href="#news">News</a></li>
                                        <li><a href="#contact">Contact</a></li>
                                        <li><a href="#about">About</a></li>
                                        <li><a href="#news">News</a></li>
                                        <li><a href="#contact">Contact</a></li>
                                        <li><a href="#about">About</a></li>
                                        <li class="icon">
                                            <a href="javascript:void(0);" onclick="myFunction()">&#9776;</a>
                                        </li>
                                    </ul>
                                </div><!--topMenu-->
                            </div><!--container-->
                        </header>
                    </div><!--container-fluid-->
		</div><!--row-->
		
                <?= $content ?>
                <?php $footer_id =  Yii::$app->params['pages']['footer']['id'];?>
                <div class="row contact-us-bg">
                    <div class="container"> 
                        <div class="row">
                            <div class="container">
				<div class="social-media">
                                    <ul>
                                        <?php if(!empty(Yii::$app->content->getContent($footer_id,"facebook_url"))): ?>
                                            <li><a href="<?= Yii::$app->content->getContent($footer_id,"facebook_url")?>"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                        <?php endif; ?>
                                        <?php if(!empty(Yii::$app->content->getContent($footer_id,"twitter_url"))): ?>
                                            <li><a href="<?= Yii::$app->content->getContent($footer_id,"twitter_url")?>"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                        <?php endif; ?>
                                        <?php if(!empty(Yii::$app->content->getContent($footer_id,"pinterest_url"))): ?>
                                            <li><a href="<?= Yii::$app->content->getContent($footer_id,"pinterest_url")?>"><i class="fa fa-pinterest-p" aria-hidden="true"></i></a></li>
                                        <?php endif; ?>
                                        <?php if(!empty(Yii::$app->content->getContent($footer_id,"google_plus_url"))): ?>
                                            <li><a href="<?= Yii::$app->content->getContent($footer_id,"google_plus_url")?>"><i class="fa fa-google" aria-hidden="true"></i></a></li>
                                        <?php endif; ?>
                                        <?php if(!empty(Yii::$app->content->getContent($footer_id,"instagram_url"))): ?>
                                            <li><a href="<?= Yii::$app->content->getContent($footer_id,"instagram_url")?>"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                                        <?php endif; ?>
                                    </ul>
				</div><!--social-media-->
				<div class="title-of-footer col-lg-12">
					<?= Yii::$app->content->getContent($footer_id,"bottom_title") ?>
				</div><!--title-of-footer-->
				<div class="footerBlock">
                                    <div class="copyright col-lg-12">
                                            <p>Copyright premar&d <?= date("Y") ?> | All Rights Reserved</p>
                                    </div><!--copyright-->
				</div><!--footerBlock-->
                            </div><!--container-->
                        </div><!--row-->
                    </div><!--container-->
		</div><!--row-->

		<a href="#0" class="cd-top">Top</a>
	
            </div><!--mianBlock-cont-->
        <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>