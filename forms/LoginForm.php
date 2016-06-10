<?php

namespace dersonsena\userModule\forms;

use Yii;
use dersonsena\userModule\models\User;
use yii\base\Model;
use yii\base\UserException;

class LoginForm extends Model
{
    /**
     * @var string E-mail do usuario
     */
    public $email;

    /**
     * @var string Senha de acesso do usuario
     */
    public $password;

    /**
     * @var bool Flag para memorizar o login do usuario
     */
    public $rememberMe = false;

    public function rules()
    {
        return [
            [['email','password'], 'required'],
            ['email', 'email'],
            ['rememberMe', 'boolean'],
            [['email', 'password'], 'string', 'max' => 60]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'email' => 'E-mail',
            'password' => 'Senha',
            'rememberMe' => 'Mater-me conectado neste PC'
        ];
    }

    /**
     * @return bool
     * @throws UserException
     */
    public function login()
    {
        /** @var User $user */
        $user = User::findOne([
            'email' => $this->email,
            'status' => Yii::$app->params['active']
        ]);

        $user->senha = $user->currentPassword;

        if (!$user)
            throw new UserException('E-mail e/ou senha são invalidos.');

        if (!Yii::$app->getSecurity()->validatePassword($this->password, $user->senha))
            throw new UserException('E-mail e/ou senha são invalidos.');

        $identity = User::findIdentity($user->id);

        return Yii::$app->user->login($identity, ((bool)$this->rememberMe ? 3600*24*30 : 0));
    }
}