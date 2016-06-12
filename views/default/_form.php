<?php
/* @var yii\web\View $this */
/* @var \dersonsena\userModule\models\User $model */

use dersonsena\userModule\models\Group;
use kartik\form\ActiveForm;
use kartik\password\PasswordInput;
?>

<?php $form = ActiveForm::begin() ?>

    <?= $form->field($model, 'id', ['template' => '{input}'])->hiddenInput() ?>

    <div class="box form-actions">
        <div class="box-body">
            <?= $this->render('@common-classes/views/crud/form-default-buttons') ?>
        </div>
    </div>

    <div class="box box-primary">

        <div class="box-header with-border">
            <h3 class="box-title">
                <?= Yii::t('user', 'Form') ?>
            </h3>
        </div>

        <div class="box-body">

            <div class="row">

                <div class="col-md-4">
                    <?= $form->field($model, 'name') ?>
                </div>

                <div class="col-md-4">
                    <?= $form->field($model, 'email', [
                        'addon' => Yii::$app->params['defaultAddons']['email']
                    ]) ?>
                </div>

                <div class="col-md-4">
                    <?= $form->field($model, 'group_id', ['template'=>"{label}{input}{error}{hint}"])
                        ->dropDownList((new Group)->getDropdownOptions('name'), [
                            'prompt' => Yii::t('user', ':: Select a User Group ::')
                        ]) ?>
                </div>

            </div>

            <div class="row">
                <div class="col-md-4">
                    <?= $form->field($model, 'password')
                        ->passwordInput(['maxlength' => true])
                        ->hint($model->isNewRecord ? null : Yii::t('user', 'Password message'))
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