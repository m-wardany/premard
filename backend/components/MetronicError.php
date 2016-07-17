<?php

namespace backend\components;

/**
 * Description of MetronicError
 *
 * @author mwardany
 */
class MetronicError extends \yii\web\ErrorAction{
    public function run() {
        $this->controller->layout = "guest";
        return parent::run();
    }
}
