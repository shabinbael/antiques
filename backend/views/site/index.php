<?php

/* @var $this yii\web\View */

$this->title = Yii::t('app', 'Admin');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-index">

    <div class="jumbotron">

    	<p>
    		<?= Yii::t('app', 'Welcome') . ', ' . Yii::$app->user->identity->username . '!' ?>
    	</p>

    </div>

    <div class="body-content">

        <div class="row">

        </div>

    </div>
</div>
