<?php

namespace dersonsena\userModule\controllers;

use dersonsena\commonClasses\controller\CrudController;
use dersonsena\userModule\models\Group;
use dersonsena\userModule\models\search\GroupSearch;
use Yii;

class GroupsController extends CrudController
{
    public function init()
    {
        parent::init();
        $this->controllerDescription = Yii::t('user', 'User Group');
    }

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