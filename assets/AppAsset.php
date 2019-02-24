<?php

namespace app\assets;

use yii\web\AssetBundle;

/**
 * Main application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        //'https://fonts.googleapis.com/css?family=Roboto:300,400,400i,500,500i,700,900&amp;subset=cyrillic',
        'css/font-awesome.min.css',
        'css/animate.css',
        'plugins/gritter/css/jquery.gritter.css',
        'css/style.css'
    ];
    public $js = [
        'plugins/gritter/js/jquery.gritter.js',
        'js/js.cookie.js',
        'js/vue.js',
        'js/scripts.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapPluginAsset',
        'yii\web\JqueryAsset',
    ];
}
