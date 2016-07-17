<?php
    use yii\helpers\Html;
    
    /* @var $this yii\web\View */
    $backgrounds = "";
?>
<?php $id =  Yii::$app->params['pages']['experts_in']['id'];?>
<div class="we-are-Epxerts-in">
    <div class="title"><?= Yii::$app->content->getContent($id,"title") ?></div>
    <div class="we-areEpxerts-sliderBlock">
        <div class="we-areEpxerts_slider">
            <?php foreach ($model as $expert): ?>
                <?php  
                    $backgrounds.= ".expert-{$expert->id} p {
                        background-image: url('{$expert->getUploadUrl('image')}');
                    }";
                ?>
                <div class="expert-<?= $expert->id ?>">
                    <p><?= $expert->title ?></p>
                    <div class="title-slider"><?= str_replace(" ", "<br/>", Html::encode($expert->title)) ?></div><!--title-slider-->
                </div>
            <?php endforeach; ?>
        </div>
    </div><!--we-areEpxerts-slider-->
</div><!--we-are-Epxerts-in-->

<?= $this->registerCss($backgrounds) ?>