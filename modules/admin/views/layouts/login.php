<?php
    use yii\helpers\Html;
    use app\assets\AppAsset;
    
    $directoryAsset = Yii::$app->assetManager->getPublishedUrl('zgrboard/web');
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
        
        <div id="login-wrapper" style="margin-top:8%;">

             <?= $content ?>               

        </div> 	<!-- end wrapper-->

        
        <?php $this->endBody(); ?>
        
    </body>
</html>
<?php $this->endPage(); ?>