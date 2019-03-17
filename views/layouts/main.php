<?php
	
	use yii\helpers\Html;
	use yii\bootstrap\Nav;
	use yii\bootstrap\NavBar;
	use yii\widgets\Breadcrumbs;
	use app\assets\AppAsset;

	AppAsset::register($this);

    
    $directoryAsset = Yii::$app->assetManager->getPublishedUrl(Yii::$app->homeUrl.'web');
  
    $this->beginPage();
?>

<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        
        <meta property="og:type" content="website" />
        <meta property="og:url" content="<?= Yii::$app->request->url ?>" />
        <meta property="og:title" content="<?= $this->title ?> | <?= Yii::$app->name ?>" />
        <meta property="og:description" content="<?= $this->title ?>" />
        <meta property="og:image" content="<?= Yii::$app->homeUrl ?>web/images/logo.png" />
        <meta name="twitter:card" content="summary" />
        <meta name="twitter:title" content="<?= $this->title ?> | <?= Yii::$app->name ?>" />
        <meta name="twitter:image:src" content="<?= Yii::$app->homeUrl ?>web/images/logo.png" />
        <meta name="twitter:description" content="<?= $this->title ?>" />
        <link rel="image_src" href="<?= Yii::$app->homeUrl ?>web/images/logo.png" />

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
        
    </head>
    <body>
        <?php $this->beginBody(); ?>
        
        <div id="wrapper" class="container">
			<div class="row">
				
				<header id="head" class="container" role="banner">
					<div class="row">
                        <div class="hidden-xs col-md-3 text-left">
                            <p></p>
						</div> <!-- end col -->
						<div class="col-xs-12  col-md-6 text-center">
							<p>{{ headTitle }}</p>
						</div> <!-- end col -->
                        <div class="hidden-xs col-xs-3 col-md-3 text-right">
							<p></p>
						</div> <!-- end col -->
					</div> <!-- end row -->
				</header> <!-- end header -->
				
				<?= $content ?>
				

				<footer role="contentinfo" class="container">
					<div class="row">
						<div class="container">
							<div class="row">
								
								<div id="copyright" class="footer-block col-xs-12 text-center">
									<p>{{ thisYear }} &copy {{ headTitle }}</p>
								</div> <!-- end col -->
							</div> <!-- end row -->
						</div> <!-- end container -->
					</div> <!-- end row -->
				</footer> <!-- end footer -->
			
			</div> <!-- end row -->

		</div> <!-- end wrapper container -->

        <?php $this->endBody(); ?>
    </body>
</html>
<?php $this->endPage(); ?>
