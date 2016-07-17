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
class MiniMapAsset extends AssetBundle
{
    public $basePath = '@webroot/map';
    public $baseUrl = '@web/map';
    public $js = [
        'https://maps.googleapis.com/maps/api/js?key=AIzaSyCU6ZFf7PEY3RexfO5_HhPSJKuMzvx89NQ&libraries=geometry,places',
        'map-latlng.js'
    ];
    public $depends = [
        'yii\web\YiiAsset'
    ];
}
