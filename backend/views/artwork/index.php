<?php

use yii\helpers\Html;
use yii\grid\GridView;
use backend\models\Category;
use backend\models\Author;
use backend\models\ArtworkAuthor;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;


/* @var $this yii\web\View */
/* @var $searchModel backend\models\ArtworkSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Artworks');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="artwork-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Artwork'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            // ['class' => 'yii\grid\SerialColumn'],
            // 'artwork_id',
            [
                'label' => Yii::t('app', 'Photo'),
                'format' => 'raw',
                'value' => function($model){
                    return Html::img($model->artwork_thumb_path, ['style' => 'width:50px;']);
                },
            ],
            [
                'attribute' => 'id_author',
                'filter' => Author::find()
                    ->select(['author_name', 'author_id'])
                    ->indexBy('author_id')->column(),
                'value' => 'idAuthor.author_name',
            ],
            'artwork_title',
            [
                'attribute' => 'artwork_year_created',
                'value' => 'artwork_year_created',
                'contentOptions' => ['style' => 'max-width: 100px;'],
            ],
            
            // 'artwork_description:ntext',
            // 'artwork_price',
            // 'artwork_image_path',
            // 'artwork_thumb_path',
            [
                'attribute' => 'id_category',
                'label' => Yii::t('app', 'Category'),
                'filter' => Category::find()
                    ->select(['category_name', 'category_id'])
                    ->indexBy('category_id')->column(),
                'value' => 'idCategory.category_name',
            ],
            [
                'attribute' => 'artwork_active',
                'filter' => [0 => Yii::t('app', 'No'), 1 => Yii::t('app', 'Yes')],
                'content'=> function($model){
                    if($model->artwork_active == '0') { return Yii::t('app', 'No'); } 
                    if($model->artwork_active == '1') { return Yii::t('app', 'Yes'); }
                    },
            ],
            // 'artwork_active',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
