<?php

/*
 * This file is part of the Dektrium project.
 *
 * (c) Dektrium project <http://github.com/dektrium>
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

use dektrium\user\widgets\Connect;
use dektrium\user\models\LoginForm;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;


/**
 * @var yii\web\View $this
 * @var dektrium\user\models\LoginForm $model
 * @var dektrium\user\Module $module
 */

$this->title = Yii::t('user', 'Sign in');
$this->params['breadcrumbs'][] = $this->title;
$fieldOptions1 = [
    'options' => ['class' => 'form-group has-feedback'],
    'inputTemplate' => "{input}<span class='glyphicon glyphicon-user form-control-feedback'></span>"
];
$fieldOptions2 = [
    'options' => ['class' => 'form-group has-feedback'],
    'inputTemplate' => "{input}<span class='glyphicon glyphicon-lock form-control-feedback'></span>"
];
?>
<?= $this->render('/_alert', ['module' => Yii::$app->getModule('user')]) ?>

<div class="login-box">
    <div class="login-logo">
        <a href="#"><b>Admin</b>LTE</a>
    </div>
        <div class="login-box-body">
        <p class="login-box-msg">Войдите на сайт, чтобы начать сеанс</p>
        <?php $form = ActiveForm::begin([
            'id' => 'login-form',
            'enableAjaxValidation' => true,
            'enableClientValidation' => false,
            'validateOnBlur' => false,
            'validateOnType' => false,
            'validateOnChange' => false,
        ]) ?>

        <?= $form
            ->field($model, 'login', $fieldOptions1)
            ->label(false)
            ->textInput(['autofocus' => true, 'placeholder' => $model->getAttributeLabel('Логин')]) ?>

        <?= $form
            ->field($model, 'password', $fieldOptions2)
            ->label(false)
            ->passwordInput(['placeholder' => $model->getAttributeLabel('password')]) ?>

        <div class="row">
            <div class="col-xs-6">
                <?= $form->field($model, 'rememberMe')->checkbox(['tabindex' => '3']) ?>
            </div>
            <!-- /.col -->
            <div class="col-xs-6">
                <?= Html::submitButton(
                    Yii::t('user', 'Sign in'),
                    ['class' => 'btn btn-primary btn-block', 'tabindex' => '4']
                ) ?>
            </div>
            <!-- /.col -->
        </div>
        <?php ActiveForm::end(); ?>
        <div class="social-auth-links text-center">
            <a href="/admin/user/security/auth?authclient=facebook" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Войти с помощью Facebook</a>
            <a href="/admin/user/security/auth?authclient=vkontakte" class="btn btn-block btn-social btn-vk btn-flat"><i class="fa fa-vk"></i> Войти с помощью Vk</a>
        </div>
        <!-- /.social-auth-links -->
        <p class="text-left">
            <?= Html::a(
                Yii::t('user', 'Forgot password?'),
                ['/user/recovery/request'],
                ['tabindex' => '5'])?><br>
        </p>
        <?php if ($module->enableConfirmation): ?>
            <p class="text-left">
                <?= Html::a(Yii::t('user', 'Didn\'t receive confirmation message?'), ['/user/registration/resend']) ?>
            </p>
        <?php endif ?>
        <?php if ($module->enableRegistration): ?>
            <p class="text-left">
                <?= Html::a(Yii::t('user', 'Don\'t have an account? Sign up!'), ['/user/registration/register']) ?>
            </p>
        <?php endif ?>
<!--        --><?//= Connect::widget([
//            'baseAuthUrl' => ['/user/security/auth'],
//        ]) ?>
    </div>
</div>