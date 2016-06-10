<?php

namespace dersonsena\userModule\forms;

use Yii;
use dersonsena\userModule\models\User;
use yii\base\Exception;
use yii\base\Model;

class ForgotPasswordForm extends Model
{
    public $email;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'trim']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'email' => 'Seu e-mail de cadastro'
        ];
    }

    public function sendForgotEmail()
    {
        /** @var User $user */
        $user = User::findOne(['email' => $this->email]);

        if (!$user)
            throw new Exception('Não foi identificado usuário com o e-mail informado: ' . $this->email);

        $user->setScenario('forgot');

        if(!$user->generateToken())
            throw new Exception('Houve um erro ao tentar gerar o seu Token de acesso.');

        return Yii::$app->mailer
            ->compose(['html' => 'layouts/reset-password'], [
                'token' => $user->token,
            ])
            ->setFrom(['noreply@imobsoft.com.br' => Yii::$app->name])
            ->setTo($user->email)
            ->setSubject('Recuperação de Senha - ' . Yii::$app->name)
            ->send();
    }
}