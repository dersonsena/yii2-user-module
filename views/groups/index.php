<?php
/* @var $this yii\web\View */
/* @var $searchModel \dersonsena\userModule\models\search\GroupSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

use dersonsena\commonClasses\controller\ControllerBase;
use yii\grid\GridView;
use yii\widgets\Pjax;

$this->params['breadcrumbs'][] = $this->context->controllerDescription;
?>
<div class="box box-primary">

    <div class="box-body">

        <section class="well well-sm">
            <?= $this->render('@common-classes/views/crud/index-default-actions') ?>
        </section>

        <?php Pjax::begin() ?>
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                [
                    'attribute' => 'id',
                    'headerOptions' => ['class' => 'text-right', 'style' => 'width: 50px'],
                    'contentOptions' => ['class' => 'text-right'],
                ],
                [
                    'attribute' => 'name',
                    'class' => 'dersonsena\commonClasses\components\grid\LinkDataColumn',
                ],
                [
                    'attribute' => 'status',
                    'class' => 'dersonsena\commonClasses\components\grid\YesNoDataColumn',
                    'filter' => ControllerBase::getStatus()
                ],
                ['class' => 'dersonsena\commonClasses\components\grid\ActionGridColumn'],
            ],
        ]) ?>
        <?php Pjax::end() ?>

    </div>

</div>