<?php

use backend\assets\MiniMapAsset;
use backend\assets\TagAsset;
use yii\bootstrap\Tabs;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

MiniMapAsset::register($this);
TagAsset::register($this);

/* @var $this yii\web\View */
/* @var $model common\models\Content */
/* @var $translation_model common\models\ContentTrannslation */

$title = ArrayHelper::index(Yii::$app->params['pages'],"id")[$_GET['id']]['title']; 
  
        
$this->title = Yii::t('page', 'Edit : '.$title) ;
//$this->params['breadcrumbs'][] = ['label' => Yii::t('page', 'Pages'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $title;
?>
<?php
echo Html::errorSummary($models);


$form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]);
    
    // start translations
    if($translation_models){
        $translation_tabs = [];
        $translation_items = ArrayHelper::getColumn($translation_models, function ($element) {
            return [$element->language->title=>$element->input];
        });

        foreach (call_user_func_array('array_merge_recursive', $translation_items) as $language=>$item) {
            $item= is_array($item)?implode("\n", $item):$item ;
            $translation_tabs[]=[
                'label'=>$language,
                'content'=>  "<div class='col-sm-12'>".  $item."</div>"
            ];
        }


        echo Tabs::widget(['items' => $translation_tabs]);

        echo '<div class="clear clearfix"></div>';
        echo "<hr/>";
    }
    // end translations 
    
    if($image){
        echo $form->field($image, 'image')->widget(backend\components\FileInput::className(),['thumbnail'=>$image->getThumbUploadUrl("image")]);
        echo !empty($image->width) || !empty($image->height)?"<p class='alert alert-info'>Best size {$image->width}px * {$image->height}px</p>":"";
    }
    
    foreach ($models as $model) {
            echo $model->input;
    }

    ?>
    <div class="form-group">
        <?= Html::submitButton('Update',['class'=>'btn btn-primary']); ?>
    </div>

<?php ActiveForm::end(); ?>

<?php  if($related_model): ?>
      <hr/>
        <p>
            <?= $related_model['create_link'] ?>
        </p>
        <?= $this->render("//{$related_model['view']}/_index",['dataProvider'=>$related_model['dataProvider']]); ?>
<?php endif; ?>
