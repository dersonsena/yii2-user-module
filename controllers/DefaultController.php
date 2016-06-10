<?php

namespace dersonsena\userModule\controllers;

use Yii;
use dersonsena\userModule\models\User;
use dersonsena\userModule\models\search\UserSearch;
use yii\web\Controller;

class DefaultController extends Controller
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