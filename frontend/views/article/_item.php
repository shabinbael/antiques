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
<div class="panel panel-default col-md-3" style="margin-right: 10px; display: block; height: 250px;">

    <div class="panel-body">
        <p> <?= Html::a(Html::img($model->article_image_path, ['alt' => $model->article_title, 'style' => 'width: 200px; height: 100px']), ['view', 'id' => $model->article_id]) ?> </p>

        <p> <?= Html::a(Html::encode($model->article_title), ['view', 'id' => $model->article_id]) ?> </p>
        <p> <?= Yii::t('app', 'Author') ?>:<br> <?= Html::a(Html::encode($model->idAuthor->author_name), ['author/view', 'id' => $model->idAuthor->author_id]) ?></p>
  
    </div>
</div>