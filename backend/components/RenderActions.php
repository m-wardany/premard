<?php
namespace backend\components;

use yii\jui\Widget;
use yii\widgets\Menu ;

/**
 * Description of RenderActions
 *
 * @author mwardany
 */
class RenderActions  extends Widget{
    public $actions = [];
    
    public function run()
    {
        return count($this->actions)? "<button type='button' class='btn btn-fit-height grey-salt dropdown-toggle' data-toggle='dropdown' data-hover='dropdown' data-delay='1000' data-close-others='true'>
                    Actions <i class='fa fa-angle-down'></i>
                    </button>
                    {$this->renderActions()}
                    ":"";
    }
    
    private function renderActions(){
        return Menu::widget([
            'items' => $this->actions,
            'options'=>['class'=>'dropdown-menu pull-right'],
            'encodeLabels'=>false
        ]);
    }
}
