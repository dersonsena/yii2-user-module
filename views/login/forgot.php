<?php
/* @var $this yii\web\View */
/* @var $formModel \app\modules\frontend\forms\ForgotPasswordForm */

use yii\bootstrap\ActiveForm;
use yii\bootstrap\Html;
?>

<div class="login-box">

    <div class="login-logo">
        <?= Html::img('@web/images/logo.png', ['width'=>'350', 'alt'=>Yii::$app->name]) ?>
    </div>

    <div class="login-box-body">

        <h3 class="box-title no-margin text-center">
            <?= Html::icon('question-sign') ?> Esqueci minha senha
        </h3>

        <hr />

        <?php $form = ActiveForm::begin(['id' => 'login-form', 'validateOnBlur'=>false]); ?>

            <?= $form->field($formModel, 'email', [
                'options' => ['class' => 'form-group has-feedback'],
                'template' => "{input}\n{hint}\n{error}\n<span class='glyphicon glyphicon-envelope form-control-feedback'></span>"
            ])->textInput([
                'type' => 'email',
                'placeholder' => 'Digite aqui o seu e-mail de cadastro...'
            ]) ?>

            <div class="row" style="margin-bottom: 10px">
                <div class="col-xs-12">
                    <?= Html::submitButton('<i class="fa fa-envelope-o"></i> Enviar', ['class' => 'btn btn-primary btn-flat btn-block pull-right']) ?>
                </div>
            </div>

        <div class="row">
            <div class="col-xs-12">
                <?= Html::a('<i class="fa fa-chevron-left"></i> Voltar para Login', ['/login']) ?>
            </div>
        </div>

        <?php ActiveForm::end() ?>

    </div>

    <small class="text-center" style="margin-top: 20px; display: block;">
        <?= $this->render('/partials/login-footer') ?>
    </small>
</div>