<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Users */
/* @var $form ActiveForm */

?>
<br>
<div class="site-login container" style="margin: 0 auto; max-width: 480px;">
    <div id="content-container">
        <div class="content-block" style="padding: 2em;">
            <header>
                    <h1><?= Html::encode($this->title) ?></h1>
            </header>

            <div class="goods-container" style="padding: 2em;">	
                    <div class="row">

                        <?php $form = ActiveForm::begin(); ?>

                            <?= $form->field($model, 'login', [
                                'template' => '{input}{error}',
                                'inputOptions' => [
                                    'autofocus' => 'autofocus',
                                    'tabindex' => '1',
                                    'placeholder' => 'Логин',
                                    'class'=>'form-control input-lg',
                                    //'pattern'=>'\D+([a-zA-Z0-9._@])$'
                                ]
                            ])->label(false) ?>


                            <?= $form->field($model, 'password', [
                                'template' => '{input}{error}',
                                'inputOptions' => [
                                    'tabindex' => '2',
                                    'placeholder' => 'Пароль',
                                    'class'=>'form-control input-lg'
                                ]
                            ])->passwordInput()->label(false) ?>

                            <?= $form->field($model, 'rememberMe', [
                                'template' => '{input}{error}',
                                'inputOptions' => [
                                    'tabindex' => '3',
                                    'class'=>'form-control input-lg'
                                ]
                            ])->checkbox(['value' => 0, 'checked' => false]) ?>

                            <div class="form-group  text-center">
                                <?= Html::submitButton('Войти', ['class' => 'btn btn-primary btn-lg btn-orange btn-login']) ?>
                            </div>
                        <?php ActiveForm::end(); ?>

                        <div class="login-links  text-center">
                            У меня нет аккаунта <a href="<?=Yii::$app->urlManager->createUrl(['/admin/signup'])?>" >Регистрация</a>
                        </div>

                        <div class="login-links  text-center">
                            <a href="<?=Yii::$app->urlManager->createUrl(['/admin/password-restore'])?>" >Забыли пароль?</a>
                        </div>

                    </div>	<!-- end row -->
            </div>	<!-- end goods-container -->
        </div>	<!-- end content-block -->
    </div>	<!-- end content-container -->
</div><!-- site-login -->