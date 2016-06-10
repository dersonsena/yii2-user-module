<?php

namespace dersonsena\userModule;

use Yii;

class Module extends \yii\base\Module
{
    public function init()
    {
        parent::init();
        Yii::setAlias('@user-module', '@vendor/dersonsena/yii2-user-module');
    }
}