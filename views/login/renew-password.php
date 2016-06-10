<?php
/* @var $this yii\web\View */
/* @var $formModel \app\modules\frontend\forms\RenewPasswordForm */

use yii\bootstrap\ActiveForm;
use yii\bootstrap\Html;

$fieldTemplate = "{input}\n{hint}\n{error}\n<span class='glyphicon glyphicon-lock form-control-feedback'></span>";
?>

<div class="login-box">

    <div class="login-logo">
        <?= Html::img('@web/images/logo.png', ['width'=>'350', 'alt'=>Yii::$app->name]) ?>
    </div>

    <div class="login-box-body">

        <h3 class="box-title no-margin text-center">
            <?= Html::icon('lock') ?> Alterar Senha de Acesso
        </h3>

        <hr />

        <?php $form = ActiveForm::begin(['id' => 'login-form', 'validateOnBlur'=>false]); ?>

            <?= $form->field($formModel, 'password', [
                'options' => ['class' => 'form-group has-feedback'],
                'template' => $fieldTemplate
            ])->passwordInput([
                'placeholder' => 'Digite aqui sua nova senha de acesso...'
            ]) ?>

            <?= $form->field($formModel, 'retypePassword', [
                'options' => ['class' => 'form-group has-feedback'],
                'template' => $fieldTemplate
            ])->passwordInput([
                'placeholder' => 'Repita a mesma senha acima...'
            ]) ?>

            <div class="row" style="margin-bottom: 10px">
                <div class="col-xs-12">
                    <?= Html::submitButton('<i class="fa fa-save"></i> Alterar minha Senha', ['class' => 'btn btn-primary btn-flat btn-block pull-right']) ?>
                </div>
            </div>

        <?php ActiveForm::end() ?>

    </div>

    <small class="text-center" style="margin-top: 20px; display: block;">
        <?= $this->render('/partials/login-footer') ?>
    </small>
</div>