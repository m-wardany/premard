<?php

use yii\helpers\Html;
use yii\bootstrap\Tabs;
use yii\helpers\ArrayHelper ;

/* @var $this yii\web\View */
/* @var $model common\models\Content */
$title = ArrayHelper::index(Yii::$app->params['pages'],"id")[$_GET['id']]['title']; 
$this->title = "View : ".$title;
//$this->params['breadcrumbs'][] = ['label' => Yii::t('page', 'Contents'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $title;

?>
<div class="page-view">
<div class="box">
    <div class="box-body no-padding">
        <table class="table table-condensed">
            <?php
                if($image){
                    echo "<tr>";
                    echo "<td><b>Image</b></td>";
                    echo "<td>".Html::img($image->getThumbUploadUrl('image', 'thumb'), ['class' => 'img-thumbnail'])."</td>";
                    echo "</tr>";
                }
            ?>
            <tr>
                <td style="width: 200px;"><b>Translations</b></td>
                <td>
                    <?php
                    // start translations
                    if($translation_models){
                        $translation_tabs = [];
                        $translation_items = ArrayHelper::getColumn($translation_models, function ($element) {
                            return [$element->language->title=>"<tr><td><b>{$element->label} : </b> </td><td> <p>{$element->content}</p></td></tr>"];
                        });

                        foreach (call_user_func_array('array_merge_recursive', $translation_items) as $language=>$item) {
                            $item= is_array($item)?implode("\n", $item):$item ;
                            $translation_tabs[]=[
                                'label'=>$language,
                                'content'=>  "<div class='col-sm-12'><table>".  $item."</table></div>"
                            ];
                        }


                        echo Tabs::widget(['items' => $translation_tabs]);

                        echo '<div class="clear clearfix"></div>';
                        echo "<hr/>";
                    }
                    // end translations 
                    ?>
                </td>
            </tr>
            <?php foreach($models as $model): ?>
            <tr>
                <td style="width: 200px;"><b><?= Html::encode($model->label) ?></b></td>
                <td>
                    <?= $model->getContent() ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    </div><!-- /.box-body -->
</div>

<?php  if($related_model): ?>
      <hr/>
        <p>
            <?= $related_model['create_link'] ?>
        </p>
        <?= $this->render("//{$related_model['view']}/_index",['dataProvider'=>$related_model['dataProvider']]); ?>
<?php endif; ?>

</div>
