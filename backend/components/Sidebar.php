<?php
namespace backend\components;

use yii\helpers\ArrayHelper ;
use yii\helpers\Html ;
use yii\helpers\Url ;
use common\models\Content ;

class Sidebar extends \yii\widgets\Menu {

    public function items($items=[]) {
        
        return [
            ['label'=>'<div class="sidebar-toggler"></div>','options'=>['class'=>'sidebar-toggler-wrapper']],
            ['label'=>'home','url'=>['/site/index'], 'class'=>'icon-home'],
            ['label'=>'languages', 'class'=>'icon-home','items'=>[
                    ['label'=>'view','url'=>['/languages/index'], 'class'=>'icon-eye'],
                    ['label'=>'add new','url'=>['/languages/create'], 'class'=>'icon-pencil']
                ]],
            ['label'=>'home slider', 'class'=>'icon-home','items'=>[
                    ['label'=>'view','url'=>['/home-slider/index'], 'class'=>'icon-eye'],
                    ['label'=>'add new','url'=>['/home-slider/create'], 'class'=>'icon-pencil']
                ]],
            ['label'=>'Contents', 'class'=>'icon-paper-clip', 'items'=>$this->pages()],
            ['label'=>'Portflio', 'class'=>'icon-home','items'=>[
                    ['label'=>'view','url'=>['/portfolio/index'], 'class'=>'icon-eye'],
                    ['label'=>'add new','url'=>['/portfolio/create'], 'class'=>'icon-pencil']
                ]],
            ['label'=>'dynamic pages', 'class'=>'icon-home','items'=>[
                    ['label'=>'view','url'=>['/pages/index'], 'class'=>'icon-eye'],
                    ['label'=>'add new','url'=>['/pages/create'], 'class'=>'icon-pencil']
                ]],
            ['label'=>'clients', 'class'=>'icon-home','items'=>[
                    ['label'=>'view','url'=>['/clients/index'], 'class'=>'icon-eye'],
                    ['label'=>'add new','url'=>['/clients/create'], 'class'=>'icon-pencil']
                ]],
            
            
        ];
    }

    private function pages(){
        $pages =[];
        $model = new Content;
        foreach ($model->getCategories() as $category_id=>$page){
            $pages[]=['label'=>  ucwords($page),'items'=>[
                ['label'=>'View','url'=>['/contents/view-page','id'=>$category_id],'class'=>'icon-eye'],
                ['label'=>'Edit','url'=>['/contents/edit','id'=>$category_id],'class'=>'icon-pencil'],
            ]];
        }
        return $pages;
    }
    
    protected function renderItem($item) {
        parent::renderItem($item);
        $_items = ['{label}' => $item['label']];



        if (isset($item['url'])) {
            $template = ArrayHelper::getValue($item, 'template', $this->linkTemplate);
            $_items['{url}'] = Html::encode(Url::to($item['url']));

            if (isset($item['class']))
                $_items['{class}']= $item['class'] ;

            return strtr($template, $_items);
        } else {
            if(isset($item['options']['class']) && $item['options']['class'] == "sidebar-toggler-wrapper")
            {
                return $item['label'];
            }
            else {
                $template = ArrayHelper::getValue($item, 'template', $this->labelTemplate);
                $_items = ['{label}' => $item['label']];
                if (isset($item['class']))
                    $_items['{class}']= $item['class'] ;
                return strtr($template, $_items);
            }
            

        }
    }

}
