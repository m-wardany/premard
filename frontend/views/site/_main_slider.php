<?php
    use yii\helpers\Html;
    
    /* @var $this yii\web\View */
    
    $this->registerCss(".buttons-block a {
        background: hsl(0, 0%, 100%) none repeat scroll 0 0;
        border: 0 none;
        border-radius: 6px;
        font-size: 20px;
        margin-bottom: 6px;
        padding: 8px 15px;}
        .buttons-block a:hover {text-decoration:none;}");
    
?>

<div class="one-time">
    <?php foreach ($model as $slide): ?>
        <div class="main-block-slider">
                <?= Html::img($slide->getUploadUrl('image')) ?>
                <div class="topCont-block">
                        <div class="title"><?= Html::encode($slide->title) ?></div><!--title-->
                        <?php if($slide->page_id): ?>
                            <div class="buttons-block">
                                <div class="button-one"><?= Html::a(Html::encode($slide->text),['/pages/view','id'=>$slide->page_id]) ?></div>
                            </div><!--buttons-block-->
                        <?php endif; ?>
                </div><!--topCont-block-->
        </div>
    <?php endforeach; ?>
</div>