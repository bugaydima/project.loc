<?php
namespace app\controllers\user;

use dektrium\user\controllers\RecoveryController as BaseRecoveryController;
use dektrium\user\Finder;
use dektrium\user\models\RecoveryForm;
use dektrium\user\models\Token;
use dektrium\user\traits\AjaxValidationTrait;
use dektrium\user\traits\EventTrait;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class RecoveryController extends BaseRecoveryController
{
    public $layout = '@app/views/layouts/auth_layout';
}