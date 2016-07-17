<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace backend\assets;

use yii\web\AssetBundle;


class SortableAsset extends AssetBundle
{
    public $basePath = '@app/web/sortable';
    public $baseUrl = '@web/sortable';
    public $js = [
        'sortable.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\jui\JuiAsset',
    ];
}
