<?php 
use yii\helpers\Html;
use common\models\Content ; 
$id =  Yii::$app->params['pages']['how_to_do_it']['id'];
?>
<div class="container">
        <div class="how-we-do-it">
                <div class="title"><?= Yii::$app->content->getContent($id,"title") ?></div>
                <a href="#">
                    <?= Html::img(Content::getImageByCategory($id),['class'=>'img-responsive']) ?>
                </a>
        </div><!--how-we-do-it-->
</div><!--container-->