<?php
namespace backend\components;

use yii\web\AssetBundle;

/**
 * @author Muhammad Wardany <muhammad.wardany@gmail.com>
 */
class MetronicLockAsset extends AssetBundle
{
    public $basePath = '@webroot/themes/metronic/';
    public $baseUrl = '@web/themes/metronic/';
    public $css = [
        "http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all",
        "assets/global/plugins/font-awesome/css/font-awesome.min.css",
        "assets/global/plugins/simple-line-icons/simple-line-icons.min.css",
        "assets/global/plugins/uniform/css/uniform.default.css",
        "assets/admin/pages/css/lock.css",
        "assets/global/css/components.css",
        "assets/global/css/plugins.css",
        "assets/admin/layout/css/layout.css",
        "assets/admin/layout/css/themes/darkblue.css",
        "assets/admin/layout/css/custom.css",
        "assets/admin/layout/css/guest.css" ,
    ];
    public $js = [
        "assets/global/plugins/uniform/jquery.uniform.min.js" ,
        "assets/global/scripts/metronic.js" ,
        "assets/admin/layout/scripts/demo.js",
        "assets/admin/layout/scripts/layout.js",
        "assets/guest.js",
    ];
    
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
