<?php

namespace dersonsena\userModule\controllers;

use dersonsena\commonClasses\controller\CrudController;
use dersonsena\userModule\models\Group;
use dersonsena\userModule\models\search\GroupSearch;

class GroupsController extends CrudController
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