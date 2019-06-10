<?php


namespace ziya\LazyImage;


use yii\base\Widget;
use yii\helpers\Html;
use yii\web\View;

class LazyImage extends Widget implements LazyImageInterface
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
            $this->defaultImage =self::IMAGE_INFINITY;
        }
    }
    public function run()
    {
        $this->getView()->registerJs('
            $(document).ready(function(){
                lazyload();
            });
        ',View::POS_END);
        return Html::img($this->defaultImage,[
            'options' => array_merge(
                [
                    "class"=>"lazyload ".$this->options['class']??'',
                    "data-src"=>$this->path
                ],
                $this->options
            )
        ]);
    }
}