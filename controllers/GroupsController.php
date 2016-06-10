<?php

namespace dersonsena\userModule\controllers;

use dersonsena\userModule\models\Group;
use dersonsena\userModule\models\search\GroupSearch;
use yii\base\Controller;

class GroupsController extends Controller
{
    public $controllerDescription = 'Grupos de Usuário';
    
    /**
     * @inheritdoc
     */
    protected function getModel()
    {
        return new Group;
    }

    /**
     * @inheritdoc
     */
    protected function getModelSearch()
    {
        return new GroupSearch;
    }
}