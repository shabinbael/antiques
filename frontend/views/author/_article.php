<?php

use yii\helpers\Html;
use frontend\models\Artwork;
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
<div class="panel panel-default col-md-2" style="margin-right: 10px">

    <div class="panel-body">
        <p> <?= Html::a(Html::img($model->article_image_path, ['style' => 'width: 100px; height: 100px']), ['article/view', 'id' => $model->article_id]) ?> </p>
        <p> <?= Html::a(Html::encode($model->article_title), ['article/view', 'id' => $model->article_id]) ?> </p>
    </div>
</div>