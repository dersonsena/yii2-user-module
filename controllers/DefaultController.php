<?php

namespace dersonsena\userModule\controllers;

use Yii;
use app\modules\backend\models\Usuario;
use app\modules\backend\models\UsuarioSearch;
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
        return new Usuario;
    }

    /**
     * @inheritdoc
     */
    protected function getModelSearch()
    {
        return new UsuarioSearch;
    }
}