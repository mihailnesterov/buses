<?php

namespace app\modules\admin;

/**
 * admin module definition class
 */
class Module extends \yii\base\Module
{
    /**
     * {@inheritdoc}
     */
    public $controllerNamespace = 'app\modules\admin\controllers';

    /**
     * {@inheritdoc}
     */
    public function init()
    {
        parent::init();
        // custom initialization code goes here
        
        // login page url
        //\Yii::$app->user->loginUrl = \Yii::$app->urlManager->createUrl('/admin/login');
    }
    
    /*
     * Access Control Filter (ACF) - доступ к админке только авторизованным
     * пользователям - @
     */
    public function behaviors(){
        return [
            /*'access' => [
            'class' => \yii\filters\AccessControl::className(),
            'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],*/
        ];
   }
}
