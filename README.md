# lazy-image
## Widget for Yii2 framework projects. To lazyload big images.
`composer require ziya/ziya-lazy-image "^0.2"`
## Examples
```
 <?php
    echo LazyImage::widget([
            'options' => [          
                'alt'=>'Just image'                
            ], 
            'preloadImage' => 'https://link-to-thumb-image', // if null will be replaced with svg animation
            'src' => 'https://link-to-big-images',            
    ]);
```
