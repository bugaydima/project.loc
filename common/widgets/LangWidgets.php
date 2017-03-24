<?php
namespace common\widgets;

class LangWidgets extends \yii\bootstrap\Widget
{
    public function init(){}

    public function run()
    {
        return $this->render('lang');
    }
}