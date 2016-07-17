<?php 
use yii\helpers\Html;

    /* @var $this yii\web\View */
?>

<?php $id =  Yii::$app->params['pages']['invention_experts']['id'];?>
<?= $this->registerJsFile("{$this->theme->baseUrl}/js/_loader.js",['depends'=>'frontend\assets\FrontAsset']) ?>
<div class="teamUp-block">
    <div class="title col-lg-12"><?= Yii::$app->content->getContent($id,"title") ?></div>
    <div class="charts-block col-lg-8">
        <div class="charts-list">
            <ul>
                <li>
                    <?= Html::hiddenInput("loader_0",Yii::$app->content->getContent($id,"programmers_value"),['id'=>'loader_0']) ?>
                    <div class="chart-img"><canvas width="200" height="200" class="loader"></canvas></div>
                    <div class="chart-name"><?= Yii::$app->content->getContent($id,"programmers_title") ?> </div>
                </li>
                <li>
                    <?= Html::hiddenInput("loader_1",Yii::$app->content->getContent($id,"marketers_value"),['id'=>'loader_1']) ?>
                    <div class="chart-img"><canvas class="loader2"></canvas></div>
                    <div class="chart-name"><?= Yii::$app->content->getContent($id,"marketers_title") ?> </div>
                </li>
                <li>
                    <?= Html::hiddenInput("loader_2",Yii::$app->content->getContent($id,"business_analysts_value"),['id'=>'loader_2']) ?>
                    <div class="chart-img"><canvas class="loader1"></canvas></div>
                    <div class="chart-name"><?= Yii::$app->content->getContent($id,"business_analysts_title") ?> </div>
                </li>
                <li>
                    <?= Html::hiddenInput("loader_3",Yii::$app->content->getContent($id,"ui_ux_experts_value"),['id'=>'loader_3']) ?>
                    <div class="chart-img"><canvas class="loader3"></canvas></div>
                    <div class="chart-name"><?= Yii::$app->content->getContent($id,"ui_ux_experts_title") ?>  </div>
                </li>
            </ul>
        </div><!--charts-list-->
    </div><!--charts-block-->
    <div class="description-block col-lg-4">
        <p>
            <?= Yii::$app->content->getContent($id,"text") ?>
        </p>
    </div><!--charts-block-->
</div><!--teamUp-block-->