<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\ListView;
use yii\grid\GridView;
use yii\data\ActiveDataProvider;

use frontend\models\Author;
use frontend\models\Artwork;

/* @var $this yii\web\View */
/* @var $model frontend\models\Author */
/* @var $model frontend\models\AuthorSearch */
/* @var $model frontend\models\Artwork */
/* @var $model frontend\models\ArtworkSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = $model->author_name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Authors'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="author-view">
<div class="col-md-12">
    <?= DetailView::widget([
        'model' => $model,
        'options' => ['class' => 'table'],
        'attributes' => [
            [
                'attribute' => '',
                'format' => 'raw',
                'value' => Html::img($model->author_image_path, ['style' => 'width: 150px; height: 150px']),
            ],
            
            'author_name',
            'author_bio:ntext',
        ],
    ]) ?>
</div>
<div class="col-md-12">
    <h4> <?= Yii::t('app', 'Artworks of the Author') ?> </h3>

    <?= ListView::widget([
            'dataProvider' => new ActiveDataProvider(['query' => $model->getArtworks()]),
            'itemOptions' => ['class' => 'item'],
            'itemView' => '_work',
        ]) ?>
</div>
<div class="col-md-12">
    <h4> <?= Yii::t('app', 'Articles of the Author') ?> </h3>

    <?= ListView::widget([
            'dataProvider' => new ActiveDataProvider(['query' => $model->getArticles()]),
            'itemOptions' => ['class' => 'item'],
            'itemView' => '_article',
        ]) ?>
</div>
</div>
