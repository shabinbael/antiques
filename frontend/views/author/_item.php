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
<div class="panel panel-default col-md-3" style="margin-right: 10px; display: block; height: 145px;">

    <div class="panel-body">
        <p> <?= Html::a(Html::img($model->author_image_path, ['alt' => $model->author_name, 'style' => 'width: 50px; height: 50px']), ['view', 'id' => $model->author_id]) ?> </p>
        <p> <?= Html::a(Html::encode($model->author_name), ['view', 'id' => $model->author_id]) ?></p>
    </div>
</div>