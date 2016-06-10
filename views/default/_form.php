<?php
/* @var yii\web\View $this */
/* @var \dersonsena\userModule\models\User $model */

use dersonsena\userModule\models\Group;
use kartik\form\ActiveForm;
use kartik\password\PasswordInput;
use yii\bootstrap\Html;

?>

<?php $form = ActiveForm::begin() ?>

    <?= $form->field($model, 'id', ['template' => '{input}'])->hiddenInput() ?>

    <div class="box form-actions">
        <div class="box-body">
            <?= $this->render('@backend/views/partials/crud/form-default-buttons') ?>
        </div>
    </div>

    <div class="box box-primary">

        <div class="box-header with-border">
            <h3 class="box-title">Formulário</h3>
        </div>

        <div class="box-body">

            <div class="row">

                <div class="col-md-4">
                    <?= $form->field($model, 'nome') ?>
                </div>

                <div class="col-md-4">
                    <?= $form->field($model, 'email', [
                        'addon' => Yii::$app->params['defaultAddons']['email']
                    ]) ?>
                </div>

                <div class="col-md-4">
                    <?= $form->field($model, 'grupo_id', ['template'=>"{label}{input}{error}{hint}"])
                        ->dropDownList((new Group)->getDropdownOptions('nome'), [
                            'prompt' => 'Selecione um Grupo de Usuário...'
                        ]) ?>
                </div>

            </div>

            <div class="row">
                <div class="col-md-4">
                    <?= $form->field($model, 'senha')
                        ->passwordInput(['maxlength' => true])
                        ->hint($model->isNewRecord ? null : 'Mantenha o campo vazio para que a senha atual não seja alterada.')
                        ->widget(PasswordInput::classname(), [
                            'language' => 'pt-BR'
                        ])
                    ?>
                </div>
            </div>

            <div class="row">
                <div class="col-md-3">
                    <?= $form->field($model, 'repeatPassword')->passwordInput(['maxlength' => true]) ?>
                </div>
            </div>

            <?= $form->field($model, 'status')->checkbox() ?>

        </div>

    </div>

<?php ActiveForm::end() ?>