<?php
namespace backend\components;

use yii\web\AssetBundle;

/**
 * @author Muhammad Wardany <muhammad.wardany@gmail.com>
 */
class MetronicAsset extends AssetBundle
{
    public $basePath = '@webroot/themes/metronic/';
    public $baseUrl = '@web/themes/metronic/';
    public $css = [
        "http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all",
        "assets/global/plugins/font-awesome/css/font-awesome.min.css",
        "https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.3.1/css/simple-line-icons.css",
        "assets/global/plugins/uniform/css/uniform.default.css",
        "assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css",
        "assets/global/css/components.css",
        "assets/global/css/plugins.css",
        "assets/admin/layout/css/layout.css",
        "assets/admin/layout/css/themes/darkblue.css",
        "assets/admin/layout/css/custom.css",
        "assets/admin/layout/css/dev.css",
    ];
    public $js = [
        "assets/global/plugins/jquery-migrate.min.js",
        "assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js",
        "assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js",
        "assets/global/plugins/jquery.blockui.min.js",
        "assets/global/plugins/jquery.cokie.min.js",
        "assets/global/plugins/uniform/jquery.uniform.min.js",
        "assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js",
        "assets/global/plugins/jqvmap/jqvmap/jquery.vmap.js",
        "assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.russia.js",
        "assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.world.js",
        "assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.europe.js",
        "assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.germany.js",
        "assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.usa.js",
        "assets/global/plugins/jqvmap/jqvmap/data/jquery.vmap.sampledata.js",
        "assets/global/plugins/flot/jquery.flot.min.js",
        "assets/global/plugins/flot/jquery.flot.resize.min.js",
        "assets/global/plugins/flot/jquery.flot.categories.min.js",
        "assets/global/plugins/jquery.pulsate.min.js",
        "assets/global/plugins/bootstrap-daterangepicker/moment.min.js",
        "assets/global/plugins/bootstrap-daterangepicker/daterangepicker.js",
        "assets/global/plugins/fullcalendar/fullcalendar.min.js",
        "assets/global/plugins/jquery-easypiechart/jquery.easypiechart.min.js",
        "assets/global/plugins/jquery.sparkline.min.js",
        "assets/global/scripts/metronic.js",
        "assets/admin/layout/scripts/layout.js",
        "assets/admin/layout/scripts/quick-sidebar.js",
        "assets/admin/layout/scripts/demo.js",
        "assets/admin/pages/scripts/index.js",
        "assets/admin/pages/scripts/tasks.js",
        "assets/init.js",
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
        'yii\bootstrap\BootstrapPluginAsset',
        'yii\jui\JuiAsset',
    ];
}
