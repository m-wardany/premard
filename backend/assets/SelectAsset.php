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
class SelectAsset extends AssetBundle
{
    public $basePath = '@app/web/select2';
    public $baseUrl = '@web/select2';
    public $css = [
        'dist/css/select2.min.css',
    ];
    public $js = [
        'dist/js/select2.full.min.js',
        'select2.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
