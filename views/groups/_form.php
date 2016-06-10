<?php
/* @var yii\web\View $this */
/* @var \app\modules\backend\models\Grupo $model */

use yii\bootstrap\ActiveForm;
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

            </div>

            <?= $form->field($model, 'status')->checkbox() ?>

        </div>

    </div>

<?php ActiveForm::end() ?>