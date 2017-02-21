<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/**
 * @var yii\web\View              $this
 * @var yii\widgets\ActiveForm    $form
 * @var dektrium\user\models\User $user
 */

$this->title = Yii::t('user', 'Sign up');
$this->params['breadcrumbs'][] = $this->title;

$fieldOptions1 = [
    'options' => ['class' => 'form-group has-feedback'],
    'inputTemplate' => "{input}<span class='glyphicon glyphicon-user form-control-feedback'></span>"
];
$fieldOptions2 = [
    'options' => ['class' => 'form-group has-feedback'],
    'inputTemplate' => "{input}<span class='glyphicon glyphicon-envelope form-control-feedback'></span>"
];
$fieldOptions3 = [
    'options' => ['class' => 'form-group has-feedback'],
    'inputTemplate' => "{input}<span class='glyphicon glyphicon-lock form-control-feedback'></span>"
];
?>
<div class="register-box">
    <div class="register-logo">
        <a href="#"><b>Admin</b>LTE</a>
    </div>
    <div class="register-box-body">
        <p class="login-box-msg">Регистрация нового пользователя</p>
        <?php $form = ActiveForm::begin([
            'id' => 'registration-form',
        ]); ?>
            <?= $form->field($model, 'username', $fieldOptions1)
                     ->label(false)
                     ->textInput(['autofocus' => true, 'placeholder' => $model->getAttributeLabel('username')]) ?>

            <?= $form->field($model, 'email', $fieldOptions2)
                     ->label(false)
                     ->textInput(['placeholder' => $model->getAttributeLabel('email')]) ?>

            <?= $form->field($model, 'password', $fieldOptions3)
                      ->label(false)
                      ->passwordInput(['placeholder' => $model->getAttributeLabel('password')]) ?>

        <div class="row">
            <div class="col-xs-5">

            </div>
            <div class="col-xs-7">
                <?= Html::submitButton(Yii::t('user', 'Sign up'), ['class' => 'btn btn-primary btn-block']) ?>
            </div>
            <?php ActiveForm::end(); ?>
        </div>
        <div class="social-auth-links text-center">
        </div>
        <?= Html::a(Yii::t('user', 'Already registered? Sign in!'), ['/user/security/login']) ?>
    </div>
</div>