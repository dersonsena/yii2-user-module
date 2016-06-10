<?php
/* @var $this yii\web\View */
/* @var $searchModel \app\modules\backend\models\UsuarioSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

use app\common\controller\ControllerBase;
use app\modules\backend\models\Grupo;
use app\modules\backend\models\Usuario;
use yii\grid\DataColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;

$this->params['breadcrumbs'][] = $this->context->controllerDescription;
?>
<div class="box box-primary">

    <div class="box-body">

        <section class="well well-sm">
            <?= $this->render('@backend/views/partials/crud/index-default-actions') ?>
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
                    'attribute' => 'nome',
                    'class' => 'app\common\components\LinkDataColumn',
                ],
                [
                    'attribute' => 'email',
                    'format' => 'email',
                    'headerOptions' => ['style' => 'width: 250px'],
                ],
                [
                    'attribute' => 'grupo_id',
                    'filter' => (new Grupo)->getDropdownOptions('nome'),
                    'headerOptions' => ['style' => 'width: 150px'],
                    'value' => 'grupo.nome'
                ],
                [
                    'attribute' => 'status',
                    'class' => 'app\common\components\YesNoDataColumn',
                    'filter' => ControllerBase::getStatus()
                ],
                ['class' => 'app\common\components\ActionGridColumn'],
            ],
        ]) ?>
        <?php Pjax::end() ?>

    </div>

</div>