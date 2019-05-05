<?php

namespace app\assets;

use yii\web\AssetBundle;
use yii\web\View;

class YandexmapAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
    ];
    public $js = [
        'https://api-maps.yandex.ru/2.1/?apikey=e44f02d7-5ab4-4a5b-a382-ca2665e3825e&lang=ru_RU'
    ];
    public $depends = [
    ];
    public $jsOptions = [
        'position' => View::POS_HEAD
    ];

}