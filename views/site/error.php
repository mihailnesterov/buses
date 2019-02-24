<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;

$this->title = $name;
?>
<div class="site-error container">
    <div class="row">
		<h1><?= Html::encode($this->title) ?></h1>
		<hr>
		<div class="alert alert-danger">
			<?= Html::encode($message) ?>
		</div>
		
		
		<div class="bg-info">
			<?= Html::a('<i class="fa fa-caret-left"></i> Вернуться на предыдущую страницу', 'javascript:history.go(-1)', ['class' => 'btn btn-link']) ?>
		</div>
    </div>
	<hr>
</div>
