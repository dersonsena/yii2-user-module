<?php
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \app\modules\backend\forms\LoginForm */

use yii\bootstrap\Html;
use yii\bootstrap\ActiveForm;
use yii\widgets\MaskedInput;

$this->title = 'Login';

$fieldOptionsCnpj = [
    'options' => ['class' => 'form-group has-feedback'],
    'template' => "{input}\n{hint}\n{error}\n<span class='fa fa-briefcase form-control-feedback'></span>"
];

$fieldOptionsEmail = [
    'options' => ['class' => 'form-group has-feedback'],
    'template' => "{input}\n{hint}\n{error}\n<span class='glyphicon glyphicon-envelope form-control-feedback'></span>"
];

$fieldOptionsPassword = [
    'options' => ['class' => 'form-group has-feedback'],
    'template' => "{input}\n{hint}\n{error}\n<span class='glyphicon glyphicon-lock form-control-feedback'></span>"
];
?>

<div class="login-box">
    <div class="login-logo">
        <?= Html::img('@web/images/logo.png', ['alt'=>Yii::$app->name]) ?>
    </div>

    <?php if (Yii::$app->session->hasFlash('invalid_data')) : ?>
        <div class="alert alert-danger">
            <h3 style="margin: 0 0 8px">
                <?= Html::icon('exclamation-sign') ?> Ocorreu um erro
            </h3>
            <p><?= Yii::$app->session->getFlash('invalid_data') ?></p>
        </div>
    <?php endif; ?>

    <div class="login-box-body">

        <?php $form = ActiveForm::begin([
            'id' => 'login-form',
            'validateOnBlur' => false,
            'validateOnChange' => false
        ]); ?>

            <?= $form->field($model, 'email', $fieldOptionsEmail)
                ->textInput(['type'=>'email', 'placeholder' => 'Informe seu e-mail...']) ?>

            <?= $form->field($model, 'password', $fieldOptionsPassword)
                ->passwordInput(['placeholder' => 'Informe sua senha de acesso...']) ?>

            <div class="row">
                <div class="col-xs-8">
                    <?= $form->field($model, 'rememberMe')->checkbox() ?>
                </div>
                <div class="col-xs-4">
                    <?= Html::submitButton('Login ' . Html::icon('log-in'), ['class' => 'btn btn-primary btn-block btn-flat', 'name' => 'login-button']) ?>
                </div>
            </div>

        <?php ActiveForm::end() ?>

        <div class="row">
            <div class="col-xs-12 col-md-12"><hr/></div>
        </div>

        <?= Html::a(Html::icon('chevron-right') . ' Esqueceu sua senha? Clique aqui!', ['forgot']) ?>
    </div>

    <small class="text-center" style="margin-top: 20px; display: block;">
        <?= $this->render('/partials/login-footer') ?>
    </small>
</div>
