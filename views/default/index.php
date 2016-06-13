<?php
/* @var $this yii\web\View */
/* @var $searchModel \dersonsena\userModule\models\search\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

use dersonsena\commonClasses\controller\ControllerBase;
use dersonsena\userModule\models\Group;
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
                    'attribute' => 'email',
                    'format' => 'email',
                    'headerOptions' => ['style' => 'width: 250px'],
                ],
                [
                    'attribute' => 'group_id',
                    'filter' => (new Group)->getDropdownOptions('name'),
                    'headerOptions' => ['style' => 'width: 150px', 'class' => 'text-center'],
                    'contentOptions' => ['class' => 'text-center'],
                    'value' => 'group.name'
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