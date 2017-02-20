<?php
namespace app\controllers\user;

use dektrium\user\controllers\RegistrationController as BaseRegistrationController;
use dektrium\user\Finder;
use dektrium\user\models\RegistrationForm;
use dektrium\user\models\ResendForm;
use dektrium\user\models\User;
use dektrium\user\traits\AjaxValidationTrait;
use dektrium\user\traits\EventTrait;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class RegistrationController extends BaseRegistrationController
{
    public $layout = '@app/views/layouts/auth_layout';
}