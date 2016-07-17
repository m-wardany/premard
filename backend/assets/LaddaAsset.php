<?php
/** 
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace backend\assets;

use yii\web\AssetBundle;
//use yii\bootstrap\BootstrapPluginAsset
/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class LaddaAsset extends AssetBundle
{
    public $basePath = '@webroot/ladda';
    public $baseUrl = '@web/ladda';
    public $css = [
        'ladda.min.css'
    ];
    public $js = [
        'spin.min.js',
        'ladda.min.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
        'yii\bootstrap\BootstrapPluginAsset'
    ];
}
