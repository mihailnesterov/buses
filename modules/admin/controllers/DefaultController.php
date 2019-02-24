<?php

namespace app\modules\admin\controllers;

use Yii;
use yii\web\Controller;
use app\modules\admin\models\Login;

/**
 * Default controller for the `admin` module
 */
class DefaultController extends Controller
{
    
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        $this->view->title = 'Личный кабинет';
        $this->view->params['breadcrumbs'][] = $this->view->title;
        return $this->render('index');
    }

    
    /**
     * Renders the login view for the module
     * @return string
     */
    public function actionLogin()
    {
        $this->view->title = 'Войти в кабинет';
        $this->view->params['breadcrumbs'][] = $this->view->title;
        
        if (!Yii::$app->user->isGuest) 
        {
            return $this->redirect(Yii::$app->urlManager->createUrl('/admin'));
        }
        $model = new Login();

        if ($model->load(Yii::$app->request->post()) 
            && $model->login()) 
        {
            
            Yii::$app->view->registerJs(
            "
                $.gritter.add({
                    title: '".$model->login.",',
                    text: 'Добро пожаловать в кабинет!',
                    image: '".Yii::$app->homeUrl."images/logo.png',
                    sticky: 'false',
                    time: '5000'
                });
            "
            );
            
            return $this->redirect(Yii::$app->urlManager->createUrl('/admin'));
        }
        
        $this->layout = 'login';

        return $this->render('login', [
            'model' => $model,
        ]);
    }
    
    /*
     * Logout user method
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();
        return $this->redirect(Yii::$app->urlManager->createUrl('/admin/login'));
    }
}
