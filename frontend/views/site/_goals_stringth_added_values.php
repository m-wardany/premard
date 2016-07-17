<?php
    use yii\helpers\Html;
    
    /* @var $this yii\web\View */
?>
<?php $goals_id =  Yii::$app->params['pages']['goals']['id'];?>
<?php $strength_id =  Yii::$app->params['pages']['strength']['id'];?>
<?php $values_id =  Yii::$app->params['pages']['added_values']['id'];?>

<div class="our-content col-lg-4">
    <div class="our-title"><?= Yii::$app->content->getContent($goals_id,"title") ?></div>
    <div class="blocks-items">
            <p class="item-one"><?= Yii::$app->content->getContent($goals_id,"first_goal") ?></p>
            <p class="item-two"><?= Yii::$app->content->getContent($goals_id,"second_goal") ?> </p>
            <p class="item-three"><?= Yii::$app->content->getContent($goals_id,"third_goal") ?></p>
    </div>
    <?php if(!empty(Yii::$app->content->getContent($goals_id,"page"))): ?>
    <div class="more-link"><?= Html::a("sss",["/pages/view",'id'=>Yii::$app->content->getContent($goals_id,"page")]) ?></div>
    <?php endif; ?>
</div>
<div class="our-content col-lg-4">
    <div class="our-title"><?= Yii::$app->content->getContent($strength_id,"title") ?></div>
    <p>
        <?= Yii::$app->content->getContent($strength_id,"text") ?>
    </p>
    <div class="chrtsBox">
        <div class="container noPadding">
            <ul class='skills'>
            <li class='progressbar1'   data-width='<?= Yii::$app->content->getContent($strength_id,"first_value") ?>' data-target='0'><?= Yii::$app->content->getContent($strength_id,"first_title") ?></li>
            <li class='progressbar2'   data-width='<?= Yii::$app->content->getContent($strength_id,"second_value") ?>' data-target='0'><?= Yii::$app->content->getContent($strength_id,"second_title") ?></li>
            <li class='progressbar3'   data-width='<?= Yii::$app->content->getContent($strength_id,"third_value") ?>' data-target='0'><?= Yii::$app->content->getContent($strength_id,"third_title") ?></li>
            </ul>
        </div>
    </div><!--chrtsBox-->
    <?php if(!empty(Yii::$app->content->getContent($strength_id,"page"))): ?>
        <div class="more-link"><?= Html::a("sss",["/pages/view",'id'=>Yii::$app->content->getContent($strength_id,"page")]) ?></div>
    <?php endif; ?>
</div>
                        
<div class="our-content col-lg-4">
    <div class="our-title"><?= Yii::$app->content->getContent($values_id,"title") ?></div>
        <p>
            <?= Yii::$app->content->getContent($values_id,"text") ?>
        </p>
        <?php if(!empty(Yii::$app->content->getContent($values_id,"page"))): ?>
            <div class="more-link"><?= Html::a("sss",["/pages/view",'id'=>Yii::$app->content->getContent($values_id,"page")]) ?></div>
        <?php endif; ?>
</div>