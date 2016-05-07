<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = Yii::t('app', 'About');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about col-lg-8">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
    	<?= Yii::t('app', 'Gallery') ?> Antiques lorem ipsum dolor sit amet, 
    	consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
    </p>
    <p>
    	Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
    	Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. 
    	Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
    </p>

</div>

<div class="site-about col-lg-4 text-warning">
	<h1> <?= Yii::t('app', 'Address') ?> </h1>
    <p>
    	Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
    	Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. 
    	Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
    </p>

    <p>
        <script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?sid=Fk__xdEJ6gN4OdCmPKA66N8wYbP-JoG4&width=350&height=250&lang=ru_RU&sourceType=constructor&scroll=true"></script>
    </p>
</div>
