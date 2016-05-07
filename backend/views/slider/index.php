<?php

use yii\helpers\Html;
use yii\grid\GridView;

use backend\models\Artwork;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\SliderSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Sliders');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="slider-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Slider'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            // ['class' => 'yii\grid\SerialColumn'],

            'slider_id',
            [
                'label' => Yii::t('app', 'Photo'),
                'format' => 'raw',
                'value' => function($model){
                    return Html::img($model->slider_image_path, ['style' => 'width:150px;']);
                },
            ],
            // 'slider_image_path',
            [
                'attribute' => 'id_artwork',
                'format' => 'raw',
                'filter' => Artwork::find()
                    ->select(['artwork_title', 'artwork_id'])
                    ->indexBy('artwork_id')->column(),
                // 'value' => 'idArtwork.artwork_title',
                'value' => function($model){
                    return Html::a($model->idArtwork->artwork_title, ['artwork/view', 'id' => $model->idArtwork->artwork_id]);
                }
            ],
            // 'id_artwork',
            
            'slider_title',
            // 'slider_text:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
