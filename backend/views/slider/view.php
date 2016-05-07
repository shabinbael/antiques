<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Slider */

$this->title = Yii::t('app', 'Slider') . ': ' . $model->slider_title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Sliders'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="slider-view">

    <h3><?= Html::encode($this->title) ?></h3>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->slider_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->slider_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'options' => ['class' => 'table'],
        'attributes' => [
            'slider_id',
            [
                'attribute' => 'id_artwork',
                'format' => 'raw',
                'value' => Html::a($model->idArtwork->artwork_title, ['artwork/view', 'id' => $model->idArtwork->artwork_id]),
            ],
            [
                'attribute' => 'photo',
                'format' => 'raw',
                'value' => Html::img($model->slider_image_path, ['style' => 'width:600px;']),
            ],
            'slider_title',
            'slider_text:ntext',
        ],
    ]) ?>

</div>
