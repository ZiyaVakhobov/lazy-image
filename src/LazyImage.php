<?php


namespace ziya\LazyImage;


use yii\base\Widget;
use yii\helpers\Html;
use yii\web\View;

class LazyImage extends Widget implements LazyImageInterface
{
    public $id;
    public $preloadImage;
    public $src;
    public $options =[

    ];

    public function init()
    {
        parent::init();
        $view = $this->getView();
        LazyImageAssets::register($view);
        if ($this->preloadImage === null) {
            $this->preloadImage =self::IMAGE_INFINITY;
        }
    }
    public function run()
    {
        $class = $this->options['class'] ?? '';
        $this->options = array_merge(
            $this->options,
            [
                "class"=>"lazyload ".$class,
                "data-src"=>$this->src
            ]);
        $this->getView()->registerJs('
            $(document).ready(function(){
                lazyload();
            });
        ',View::POS_END);
        return Html::img($this->preloadImage,$this->options);
    }
}