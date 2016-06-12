<?php

namespace dersonsena\userModule;

use Yii;

class Module extends \dersonsena\commonClasses\Module
{
    public function init()
    {
        $this->msgCat = 'user';

        parent::init();
        Yii::setAlias('@user-module', '@vendor/dersonsena/yii2-user-module');
    }
}