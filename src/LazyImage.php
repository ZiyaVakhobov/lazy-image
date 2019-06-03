<?php


namespace ziya\LazyImage;


use yii\base\Widget;
use yii\web\View;

class LazyImage extends Widget
{
    public $id;
    public $defaultImage;
    public $path;
    public $options;
    public $alt;


    public function init()
    {
        parent::init();
        $view = $this->getView();
        LazyImageAssets::register($view);
        if ($this->defaultImage === null) {
            $this->defaultImage =\Yii::getAlias('@vendor').'/ziya/ziya-lazy-image/src/assets/images/infinity.svg';
        }
    }
    public function run()
    {
        $this->getView()->registerJs('
            $(document).ready(function(){
                lazyload();
            });
        ',View::POS_END);
        return "<img class=\"lazyload\" src=\"{$this->defaultImage}\" data-src=\"{$this->path}\" />";
    }
}