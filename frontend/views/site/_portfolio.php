<?php
    use yii\helpers\Html;
    
    /* @var $this yii\web\View */
   
    
?>
<div class="write-in-Arabic-slider">
    <div class="arabic-slider">
        <?php foreach ($model as $slide): ?>
            <div class="write-inArabic-block">
                    <?= Html::img($slide->getUploadUrl('image')) ?>
                    <div class="write-inArabic">
                            <div class="write-inArabic-title"><?= Html::encode($slide->title) ?></div>
                            <p><?= Yii::$app->formatter->asNText($slide->text) ?></p>
                            <?php if($slide->page_id): ?>
                                <button>
                                    <?= Html::a(Html::encode($slide->link_text),['/pages/view','id'=>$slide->page_id]) ?>
                                </button><!--buttons-block-->
                            <?php endif; ?>
                    </div><!--write-inArabic-->
            </div>
        <?php endforeach; ?>
    </div>
</div><!--write-in-Arabic-slider-->