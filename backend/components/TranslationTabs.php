<?php
namespace backend\components;

use yii\bootstrap\Widget;
use yii\bootstrap\Tabs ;
use yii\helpers\Html;
use common\models\Language ;
/**
 * Description of TranslationTabs
 *
 * @author muhammad wardany
 */
class TranslationTabs  extends Widget{
    public $translation_view = "_translation";
    public $model;
    public $form ;
    /**
     * Renders the widget.
     */
    public function run()
    {
        $view = $this->getView();
        $languages = Language::find()->all() ;
        if(count($languages)===1)
        {
            $language = $languages[0];
            return $this->render("//{$view->context->id}/{$this->translation_view}",['model'=>$this->model,'form'=>$this->form,'language_code'=>$language->code]);
        }
        else
        {
            $items = [];
            foreach ($languages as $language) {
                $items[]=[
                    'label' => $language->title,
                    'content' => Html::tag("div", $this->render("//{$view->context->id}/{$this->translation_view}",['model'=>$this->model,'form'=>$this->form,'language_code'=>$language->code]),['class'=>'panel-body'])
                ];
            }
            return Tabs::widget(['items' => $items]).Html::tag("hr");
        }
        
    }
}
