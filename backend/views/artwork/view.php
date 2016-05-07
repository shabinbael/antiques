<?php

use yii\helpers\Html;
use backend\models\Category;
use backend\models\Author;

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Artwork */

$this->title = ('«' . $model->artwork_title . '»');

$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Artworks'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="artwork-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->artwork_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->artwork_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
        <?= Html::a(Yii::t('app', 'Create Artwork'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'options' => ['class' => 'table'],
        'attributes' => [
            [
                'attribute' => 'image',
                'format' => 'raw',
                'value' => Html::img($model->artwork_image_path, ['style' => 'width:200px;']),
            ],
            // 'artwork_image_path',
            // 'artwork_thumb_path',
            
            [
                'attribute' => 'id_author',
                'value' => $model->idAuthor->author_name,
            ],
            // 'id_author',
            
            'artwork_title',
            'artwork_description:ntext',
            'artwork_year_created',
            [
                'attribute' => 'id_category',
                'label' => Yii::t('app', 'Category'),
                'value' => $model->idCategory->category_name,
            ],
            // 'id_category',
            'artwork_price',
            [
                'attribute' => 'artwork_active',
                'value' => $model->artwork_active == 0 ? Yii::t('app', 'No') : Yii::t('app', 'Yes')
            ],
            // 'artwork_active',
            'artwork_id',
        ],
    ]) ?>

</div>
