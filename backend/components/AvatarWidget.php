<?php
namespace app\components;

use yii\base\Widget;
use app\models\Profile;

class AvatarWidget extends Widget
{
    public $size = 50;

    public function run()
    {
        $user_id = \Yii::$app->user->identity->getId();
        $gravatar_id = Profile::findOne($user_id)->gravatar_id;
        return '//gravatar.com/avatar/' . $gravatar_id . '?s=' . $this->size;
    }
}