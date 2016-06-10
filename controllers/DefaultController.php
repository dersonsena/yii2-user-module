<?php

namespace dersonsena\userModule\controllers;

use Yii;
use dersonsena\commonClasses\controller\CrudController;
use dersonsena\commonClasses\ControllerBase;
use dersonsena\userModule\models\User;
use dersonsena\userModule\models\search\UserSearch;

class DefaultController extends CrudController
{
    public $controllerDescription = 'Usuários';
    protected $createScenario = 'create';

    /**
     * @inheritdoc
     */
    protected function getModel()
    {
        return new User;
    }

    /**
     * @inheritdoc
     */
    protected function getModelSearch()
    {
        return new UserSearch;
    }
}