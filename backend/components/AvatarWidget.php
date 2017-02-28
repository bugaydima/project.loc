<?php
namespace app\components;

use yii\base\Widget;
use app\models\Profile;

class AvatarWidget extends Widget
{
    public $size = 50;

//    public function init()
//    {
//        parent::init();
//
//    }

    public function run()
    {
        $a = new Profile();
        $model = $a->getAvatarUrl($this->size);
        return $model;
    }
}