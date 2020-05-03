<?php

namespace app\modules\order\assets;

use app\assets\AppAsset;
use yii\web\AssetBundle;

class OrderAsset extends AssetBundle
{
    public $sourcePath = __DIR__;

    public $css = [
        'css/custom.css',
        'css/bootstrap.min.css',
    ];

    public $js = [
        'js/jquery.min.css',
        'js/bootstrap.min.js',
    ];

    public $depends = [
        AppAsset::class
    ];
}