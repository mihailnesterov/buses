<?php

use yii\helpers\Html;
use yii\widgets\LinkPager;
use yii\widgets\Breadcrumbs;
?>

<main role="main">

        <div id="breadcrumbs-container" class="container-fluid hidden-xs">
                <div class="container">
                        <div class="row">
                                <div class="col-xs-12">
                                    <br>
                                </div>
                        </div>	 <!-- end row -->
                </div> <!-- end container -->
        </div> <!-- end container-fluid -->

        <div id="page-container" class="container">

                <div class="row">

                        <?php
                            // aside
                            echo $this->render('_aside');
                        ?>

                        <div class="col-sm-7 col-md-8">
                                <div id="content-container">

   
                                        <div class="content-block">
                                                <header>
                                                        <h1><?= Html::encode($this->title) ?></h1>
                                                </header>

                                                <div class="goods-container">	
                                                        <div class="row">

                                                                

                                                        </div>	<!-- end row -->
                                                </div>	<!-- end goods-container -->
                                        </div>	<!-- end content-block -->

                                        

                                </div>	<!-- end content-container -->
                        </div>	<!-- end col -->

                </div>	<!-- end row -->
        </div>	<!-- end page-container -->
</main>