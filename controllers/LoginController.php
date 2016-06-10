<?php

namespace dersonsena\userModule\controllers;

use Yii;
use app\modules\backend\forms\ForgotPasswordForm;
use app\modules\backend\forms\LoginForm;
use app\modules\backend\forms\RenewPasswordForm;
use app\modules\backend\models\Usuario;
use yii\base\Exception;
use yii\base\UserException;
use yii\web\Controller;

class LoginController extends Controller
{
    public $layout = '@backend/views/layouts/login';
    public $controllerDescription = 'Autenticação';

    /**
     * @inheritdoc
     */
    protected function getModel()
    {
        return;
    }

    /**
     * @inheritdoc
     */
    protected function getModelSearch()
    {
        return;
    }

    /**
     * Página de login.
     * @return string|\yii\web\Response
     */
    public function actionLogin()
    {
        if(!$this->getUser()->isGuest)
            return $this->redirect($this->getUser()->returnUrl);

        $model = new LoginForm;

        try {

            if ($model->load($this->getRequest()->post()) && $model->validate()) {

                if ($model->login())
                    return $this->redirect($this->getUser()->returnUrl);
            }

            return $this->render('login', [
                'model' => $model,
            ]);

        } catch (UserException $e) {

            $model->password = '';
            $this->getSession()->setFlash('invalid_data', $e->getMessage());
            return $this->redirect($this->getUser()->returnUrl);

        } catch (Exception $e) {

            $model->password = '';
            $this->getSession()->setFlash('invalid_data', $e->getMessage());
            return $this->redirect($this->getUser()->returnUrl);

        }
    }

    /**
     * Pagina para recuperacao de senha
     * @return string
     */
    public function actionForgot()
    {
        $this->controllerDescription = 'Esqueci minha Senha';

        try {

            $form = new ForgotPasswordForm;

            if ($form->load($this->getPost()) && $form->validate()) {
                $form->sendForgotEmail();
                $this->getSession()->setFlash('success', 'Foi encaminhado uma mensagem para a caixa de entrada <strong>'. $form->email .'</strong>');
                return $this->refresh();
            }

            return $this->render('forgot', [
                'formModel' => $form
            ]);

        } catch(Exception $e) {
            $this->getSession()->setFlash('warning', $e->getMessage());
            return $this->refresh();
        }
    }

    public function actionRenewPassword($token)
    {
        $this->controllerDescription = 'Alterar senha de Acesso';

        try {

            if(empty($token) || is_null($token))
                throw new Exception('Não foi informado o seu token de alteração de senha.');

            /** @var Usuario $user */
            $user = Usuario::findOne(['token' => $token]);

            if (!$user)
                throw new Exception('O Token informado é inválido e/ou está fora de validade.');

            $form = new RenewPasswordForm;

            if($form->load($this->getPost()) && $form->validate()) {
                $form->generateNewPassword($user);
                $this->getSession()->setFlash('success', 'Sua senha de acesso foi alterada com sucesso! Entre no sistema com sua nova senha.');
                return $this->redirect(Yii::$app->user->loginUrl);
            }

            return $this->render('renew-password', [
                'formModel' => $form
            ]);

        } catch(Exception $e) {
            $this->getSession()->setFlash('warning', $e->getMessage());
            return $this->redirect(['forgot']);
        }
    }

    /**
     * Usuário desloga de sua conta e é redirecionado para a página de login.
     * @return \yii\web\Response
     */
    public function actionLogout()
    {
        if ($this->getUser()->logout())
            return $this->redirect($this->getUser()->loginUrl);
    }
}
