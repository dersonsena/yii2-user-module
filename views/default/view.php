<?php
/* @var $this yii\web\View */
/* @var $model \app\modules\backend\models\Usuario */

use app\common\controller\ControllerBase;
use yii\widgets\DetailView;

$this->params['breadcrumbs'][] = [
    'label' => $this->context->controllerDescription,
    'url' => [$this->context->id . '/index']
];

$this->params['breadcrumbs'][] = $this->context->actionDescription;
?>

<div class="box form-actions">
    <div class="box-body">
        <?= $this->render('@backend/views/partials/crud/view-default-buttons') ?>
    </div>
</div>

<div class="box box-primary">

    <div class="box-body">

        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                'id',
                'nome',
                'email:email',
                'grupo.nome:text:'. $model->getAttributeLabel('grupo_id'),
                [
                    'attribute' => 'status',
                    'format' => 'raw',
                    'value' => ControllerBase::getYesNoLabel($model->status),
                ],
                'created_at',
                'updated_at',
                'usuarioIns.nome:text:' . $model->getAttributeLabel('usuario_ins_id'),
            ],
        ]) ?>

    </div>

</div>