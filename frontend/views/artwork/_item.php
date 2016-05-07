<?php

use yii\helpers\Html;
use frontend\models\Category;
use frontend\models\Author;

/* @var $this yii\web\View */
/* @var $model app\models\Product */
/*
$tagLinks = [];
foreach ($model->tags as $tag) {
    $tagLinks[] = Html::a(Html::encode($tag->name), ['tag', 'tag' => $tag->name]);
}
*/
?>
<div class="panel panel-default col-md-5" style="margin-right: 10px">

    <div class="panel-body col-md-6">
        <p> <?= Html::a(Html::img($model->artwork_thumb_path, ['alt' => $model->artwork_title, 'style' => 'width: 200px; height: 200px']), ['view', 'id' => $model->artwork_id]) ?> </p>
    </div>

    <div class="panel-body col-md-6">
        <p> <?= Yii::t('app', 'Artwork Title') ?>: <?= Html::a(Html::encode($model->artwork_title), ['view', 'id' => $model->artwork_id]) ?> </p>
        <p> <?= Yii::t('app', 'Author') ?>:<br> <?= Html::a(Html::encode($model->idAuthor->author_name), ['author/view', 'id' => $model->idAuthor->author_id]) ?></p>
        <p> <?= Yii::t('app', 'Category') ?>: <?= Html::encode($model->idCategory->category_name) ?></p>
        <p> <?= Yii::t('app', 'Price') ?>: <?= Html::encode($model->artwork_price) ?></p>
    </div>
</div>