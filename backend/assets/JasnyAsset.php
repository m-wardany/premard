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
class JasnyAsset extends AssetBundle
{
    public $basePath = '@app/web/jasny-bootstrap';
    public $baseUrl = '@web/jasny-bootstrap';
    public $css = [
        'css/jasny-bootstrap.min.css',
    ];
    public $js = [
        'js/jasny-bootstrap.min.js',
        'jasny.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
        'yii\bootstrap\BootstrapPluginAsset',
    ];
}
