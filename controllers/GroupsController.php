<?php

namespace dersonsena\userModule\controllers;

use yii\base\Controller;
use app\modules\backend\models\Grupo;
use app\modules\backend\models\GrupoSearch;

class GroupsController extends Controller
{
    public $controllerDescription = 'Grupos de Usuário';
    
    /**
     * @inheritdoc
     */
    protected function getModel()
    {
        return new Grupo;
    }

    /**
     * @inheritdoc
     */
    protected function getModelSearch()
    {
        return new GrupoSearch;
    }
}