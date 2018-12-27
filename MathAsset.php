<?php

namespace karmakarpatrick\mathnotepad;

use yii\web\AssetBundle;
use yii\web\View;


class MathAsset extends AssetBundle
{

    public $sourcePath = '@karmakarpatrick/mathnotepad/assets';

    public $depends = [
        'yii\bootstrap\BootstrapAsset',
    ];
    public $jsOptions = ['position' => View::POS_HEAD];
    public function init()
    {
        $this->js[] = YII_DEBUG ? 'js/math.min.js' : 'js/math.min.js';
    }
}
