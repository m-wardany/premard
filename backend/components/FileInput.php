<?php
namespace backend\components;

use backend\assets\JasnyAsset;
use yii\bootstrap\InputWidget;
use yii\helpers\Html;

class FileInput extends InputWidget{
   
    public $thumbnail ;
    public $label = "Select file";
    public $accept ="image/*" ;
    public function run()
    {
        parent::run();
        JasnyAsset::register($this->getView());
        
        $input = Html::activeFileInput($this->model, $this->attribute,['accept'=>  $this->accept]);
        $label = $this->model->generateAttributeLabel($this->attribute);
        return "<br/>
                <div class='fileinput fileinput-new' data-provides='fileinput'>
                    <div class='fileinput-new thumbnail' style='width: 200px; height: 150px;'>
                        <img src='{$this->thumbnail}'>
                    </div>
                    <div class='fileinput-preview fileinput-exists thumbnail' style='max-width: 200px; max-height: 150px;'></div>
                    <div>
                        <span class='btn btn-default btn-file'>
                            <span class='fileinput-new'>{$this->label}</span>
                            <span class='fileinput-exists'>Change</span>
                            {$input}
                        </span>
                        <a href='#' class='btn btn-default fileinput-exists' data-dismiss='fileinput'>Remove</a>
                    </div>
                </div>";
    }   
    
}
