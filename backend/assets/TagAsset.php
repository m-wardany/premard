<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace backend\assets;

use yii\web\AssetBundle;
/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class TagAsset extends AssetBundle
{
    public $basePath = '@webroot/tags_input';
    public $baseUrl = '@web/tags_input';
    public $css = [
        'jquery.tagsinput.css'
    ];
    public $js = [
        'jquery.tagsinput.js',
        'init.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapPluginAsset',
    ];
}
