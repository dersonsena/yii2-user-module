<?php

namespace dersonsena\userModule\forms;

use Yii;
use dersonsena\userModule\models\User;
use yii\base\Model;

class RenewPasswordForm extends Model
{
    public $password;
    public $retypePassword;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['password', 'retypePassword'], 'required'],
            ['retypePassword', 'compare', 'compareAttribute' => 'password'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'password' => 'Sua nova Senha',
            'retypePassword' => 'Repita sua senha'
        ];
    }

    /**
     * Metodo que faz a alteracao da senha de acesso de um determinado usuario
     * @param User $user
     * @return bool
     * @throws \yii\base\Exception
     */
    public function generateNewPassword(User $user)
    {
        $user->senha = Yii::$app->getSecurity()->generatePasswordHash($this->password);
        $user->token = null;
        return $user->save();
    }
}