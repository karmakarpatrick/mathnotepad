<?php

namespace karmakarpatrick\mathnotepad;
use yii\base\Widget;
/**
 * This is just an example.
 */
class MathNotepad extends Widget
{
    public function init()
    {
        if ($this->jsFile === null) {
            $file = dirname(__FILE__) . DIRECTORY_SEPARATOR . 'tabview.css';

            $this->cssFile = \Yii::app()->getAssetManager()->publish($file);
        }
        parent::init();
    }

    public function run()
    {
        return $this->render('index');
    }
}
