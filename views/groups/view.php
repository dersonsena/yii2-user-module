<?php
/* @var $this yii\web\View */
/* @var $model \dersonsena\userModule\models\Group */

use dersonsena\commonClasses\controller\ControllerBase;
use yii\widgets\DetailView;

$this->params['breadcrumbs'][] = [
    'label' => $this->context->controllerDescription,
    'url' => [$this->context->id . '/index']
];

$this->params['breadcrumbs'][] = $this->context->actionDescription;
?>

<div class="box form-actions">
    <div class="box-body">
        <?= $this->render('@common-classes/views/crud/view-default-buttons') ?>
    </div>
</div>

<div class="box box-primary">

    <div class="box-body">

        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                'id',
                'name',
                [
                    'attribute' => 'status',
                    'format' => 'raw',
                    'value' => ControllerBase::getYesNoLabel($model->status),
                ],
                'created_at',
                'updated_at',
                'createdBy.name:text:' . $model->getAttributeLabel('created_by'),
            ],
        ]) ?>

    </div>

</div>