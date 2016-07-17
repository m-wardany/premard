<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Page */
$title = isset($models[0])?$models[0]->getCategories(true):""; 
  
        
$this->title = Yii::t('page', 'Update {modelClass} : '.$title, [
    'modelClass' => 'Page',
]) ;
//$this->params['breadcrumbs'][] = ['label' => Yii::t('page', 'Pages'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="page-update">

    <?= $this->render("_edit", [
        'models' => $models, 'translation_models'=>$translation_models, 'image'=>$image,'errors'=>$errors
    ]) ?>

</div>
