<?php
    use yii\helpers\Html;
    use app\assets\AppAsset;
    use yii\widgets\Pjax;
    
    $directoryAsset = Yii::$app->assetManager->getPublishedUrl(Yii::$app->homeUrl.'web');   
    $metrika = \Yii::$app->controller->getYandexMetrika('metrika');
    
    $currencies = \Yii::$app->controller->getCurrencies();
    
    //$order = \Yii::$app->controller->getOrderFromCookies('order');
    
    $this->beginPage();
?>

<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">

        <base href="<?= Yii::$app->homeUrl ?>">

        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?> | <?= Html::encode(Yii::$app->name) ?></title>
        
        <?php $this->head(); ?>
        
        <!--[if IE]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
        
        <?= $this->registerLinkTag(['rel' => 'icon', 'type' => 'image/png', 'href' => $directoryAsset . 'favicon.ico']) ?>
        
        <?php            
            AppAsset::register($this);
        ?>
        
    </head>
    <body>
        <?php $this->beginBody(); ?>
        
        <div id="wrapper">
            <header id="header">
                <div id="top" class="container-fluid hidden-xs">
                        <div class="container">
                                <div class="row">
                                        <div id="logo-block" class="col-md-5">
                                                <div class="row">
                                                        <div class="col-sm-12">
                                                                <p id="site-name"><a href="<?= Yii::$app->urlManager->createUrl('/admin') ?>">sbt24.ru</a></p>
                                                                <p id="slogan">кабинет администратора</p>
                                                        </div>
                                                </div>
                                        </div>
                                        <div id="schedule-block-admin" class="col-md-4 text-center">
                                                <p>Курс USD = <?= $currencies['USD'] ?></p>
                                                <p>Курс EUR = <?= $currencies['EUR'] ?></p>
                                        </div>
                                        <div id="top-phone-block" class="col-md-3">
                                                <div id="top-user" class="text-right">
                                                    <i class="fa fa-user-o" aria-hidden="true"></i><a href="<?= Yii::$app->urlManager->createUrl('/admin/login') ?>" id="user-menu">userlogin</a>
                                                    / 
                                                    <a href="<?= Yii::$app->urlManager->createUrl('/admin/logout') ?>">Выйти</a>
                                                </div>
                                        </div>
                                </div>	<!-- end row -->
                        </div>	<!-- end container -->
                </div>

            
            <?= $content ?>
            
            <footer class="container-fluid">
                <div class="row">
                    <div class="container">
                        1232
                        <div class="row">
                                <p id="copyright" class="col-12 text-center"> <?= date('Y') ?> &copy <?= Html::a(Yii::$app->controller->getCompany('company')->name.' | Интернет-магазин', ['/']) ?> <?= Yii::$app->controller->getCompany('company')->phone1 ?> Красноярск</p>
                        </div>      <!-- end row -->
                    </div>      <!-- end container -->
                </div>      <!-- end row -->
            </footer>   <!-- end footer-->
        </div>      <!-- end wrapper-->
         
        
        <div id="toTop"><i class="fa fa-chevron-up" aria-hidden="true"></i></div>
        <!--<script>ActiveLinksMain('main-menu')</script>-->
        <?= $metrika ?>
        <?php $this->endBody(); ?>
    </body>
</html>
<?php $this->endPage(); ?>
