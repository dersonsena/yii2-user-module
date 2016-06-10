<?php

namespace dersonsena\userModule\controllers;

use dersonsena\commonClasses\ControllerBase;
use dersonsena\userModule\models\Group;
use dersonsena\userModule\models\search\GroupSearch;

class GroupsController extends ControllerBase
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