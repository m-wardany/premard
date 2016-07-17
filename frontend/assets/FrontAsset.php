<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class FrontAsset extends AssetBundle
{
    public $basePath = '@webroot/themes/front';
    public $baseUrl = '@web/themes/front';
    public $css = [        
	"css/slick.css",
	"css/slick-theme.css",
	"css/documentation.css",
        "http://fortawesome.github.io/Font-Awesome/assets/font-awesome/css/font-awesome.css",
	"css/progressbar.css",
	"css/style-to-top.css",
	"css/style.css",
    ];
    public $js = [
        "js/jquery-migrate-1.2.1.min.js",
	"js/slick.min.js",
	"js/jquery.classyloader.min.js",
	"js/progressbar.js",
	"js/main.js",
	"js/modernizr.js",
	"js/script.js",
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
        'yii\bootstrap\BootstrapPluginAsset',
    ];
}
