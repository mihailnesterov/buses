<?php

namespace app\controllers;

use Yii;
use yii\helpers\Html;
use yii\filters\AccessControl;
use yii\web\Controller;
use app\models\Buses;
use app\models\Stations;
use app\models\Routes;
use app\models\Days;
use app\models\Seasons;
use app\models\Taxi;
use yii\filters\VerbFilter;
use yii\web\NotFoundHttpException;
use yii\base\Event;
use yii\web\View;
use yii\data\Pagination;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }
    

    public function actionIndex()
    {
        $this->view->title = 'Автобусы, Остановки, Заказ авто, Такси в Зеленогорске';
        
        Yii::$app->view->registerMetaTag([
            'name' => 'keywords',
            'content' => 'расписание астобусов, такси, Зеленогорск, Красноярский край'
        ]);
        Yii::$app->view->registerMetaTag([
            'name' => 'description',
            'content' => 'Расписание автобусов, такси, заказ авто в Зеленогорске'
        ]);

        $buses = Buses::find()->orderby(['num'=>SORT_ASC])->all();
        $stations = Stations::find()->orderby(['id'=>SORT_ASC])->all();
        $taxi = Taxi::find()->orderby(['id'=>SORT_ASC])->all();
        $seasons = Seasons::find()->orderby(['id'=>SORT_ASC])->all();
        $days = Days::find()->orderby(['id'=>SORT_ASC])->all();
        $routes = Routes::find()->orderby(['id'=>SORT_ASC])->all();

        return $this->render('index', [
            'buses' => $buses,
            'stations' => $stations,
            'taxi' => $taxi,
            'seasons' => $seasons,
            'days' => $days,
            'routes' => $routes,
        ]);
    }
    
	
    /*
     * Error page (404...) - страница вывода ошибок в url
     */
    public function actionError()
    {
        $exception = Yii::$app->errorHandler->exception;
        if ($exception != null) {
            if ($exception instanceof HttpException) {
                return $this->redirect(['404/'])->send();
            }
        }
        return $this->render('error',['exception' => $exception]);
    }    

    protected function findBusesModel($id)
    {
        if (($model = Buses::findOne($id)) !== null) {
            return $model;
        }
        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionDeleteBuses($id)
    {
        $this->findBusesModel($id)->delete();

        return $this->redirect(['/']);
    }

}
