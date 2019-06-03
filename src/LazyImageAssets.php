<?php


namespace ziya\LazyImage;


use yii\web\AssetBundle;

class LazyImageAssets extends AssetBundle
{
    public $sourcePath = '@vendor/ziya/LazyImage/assets';
    public $js =[
        'lazy-loading.2.0.0.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];

}