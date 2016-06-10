<?php
/* @var yii\web\View $this */
/* @var \dersonsena\userModule\models\Group $model */

use yii\bootstrap\ActiveForm;
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
            <h3 class="box-title">Formulário</h3>
        </div>

        <div class="box-body">

            <div class="row">

                <div class="col-md-4">
                    <?= $form->field($model, 'name') ?>
                </div>

            </div>

            <?= $form->field($model, 'status')->checkbox() ?>

        </div>

    </div>

<?php ActiveForm::end() ?>