<?php

use yii\helpers\Html;
use yii\grid\GridView;
use backend\models\Author;
use backend\models\ArticleAuthor;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ArticleSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Articles');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="article-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Article'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            // ['class' => 'yii\grid\SerialColumn'],

            // 'article_id',
            [
                'attribute' => 'id_author',
                'filter' => Author::find()
                    ->select(['author_name', 'author_id'])
                    ->indexBy('author_id')->column(),
                'value' => 'idAuthor.author_name',
            ],
            // 'id_author',
            'article_title',
            // 'article_text:ntext',
            [
                'label' => Yii::t('app', 'Illustration'),
                'format' => 'raw',
                'value' => function($model){
                    return Html::img($model->article_image_path, ['style' => 'width:100px;']);
                },
            ],
            // 'article_image_path',
            'article_date_added:date',
            [
                'attribute' => 'article_active',
                'filter' => [0 => Yii::t('app', 'No'), 1 => Yii::t('app', 'Yes')],
                'content'=> function($model){
                    if($model->article_active == '0') { return Yii::t('app', 'No'); } 
                    if($model->article_active == '1') { return Yii::t('app', 'Yes'); }
                    },
            ],
            //'article_active',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
