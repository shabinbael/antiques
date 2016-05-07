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
<div class="panel panel-default col-md-2" style="margin-right: 10px; display: block; height: 190px;">

    <div class="panel-body">
        <p> <?= Html::a(Html::img($model->artwork_thumb_path, ['style' => 'width: 100px; height: 100px']), ['artwork/view', 'id' => $model->artwork_id]) ?> </p>
        <p> <?= Html::a(Html::encode($model->artwork_title), ['artwork/view', 'id' => $model->artwork_id]) . ', ' . Html::encode($model->artwork_year_created) ?> </p>
    </div>
</div>