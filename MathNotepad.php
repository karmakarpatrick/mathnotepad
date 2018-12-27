<?php

namespace karmakarpatrick\mathnotepad;
use yii\base\Widget;
use yii\web\AssetManager;

/**
 * This is just an example.
 */
class MathNotepad extends Widget
{
//    public function init()
//    {
//        if ($this->jsFile === null) {
//            $file = dirname(__FILE__) . DIRECTORY_SEPARATOR . 'tabview.css';
//
//            $this->cssFile = \Yii::app()->getAssetManager()->publish($file);
//        }
//        parent::init();
//    }
    public function init(){
        $assetManager = new AssetManager();
        $assetManager->forceCopy = YII_ENV_DEV ? true : false;
        $assetManager->linkAssets = true;
        $assetManager->publish('@app/vendor/karmakarpatrick/yii2-mathnotepad/assets');
        parent::init();

    }
    public function run()
    {
        return $this->render('index');
    }
}
