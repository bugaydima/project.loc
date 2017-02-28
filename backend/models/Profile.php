<?php
namespace app\models;

use dektrium\user\models\Profile as BaseProfile;

class Profile extends BaseProfile
{
    public function getAvatarUrl($size = 200)
    {
        $user_id = \Yii::$app->user->identity->getId();
        $gravatar_id = Profile::findOne($user_id)->gravatar_id;
        return '//gravatar.com/avatar/' . $gravatar_id . '?s=' . $size;
    }
}