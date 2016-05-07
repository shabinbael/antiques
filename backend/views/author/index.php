<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\AuthorSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Authors');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="author-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Author'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            // ['class' => 'yii\grid\SerialColumn'],

            'author_id',
            'author_name',
            // 'author_bio:ntext',
            // 'author_image_path',
            [
                'label' => Yii::t('app', 'Portrait'),
                'format' => 'raw',
                'value' => function($model){
                    return Html::img($model->author_image_path, ['style' => 'width:50px;']);
                },
            ],
            // 'author_active',
            [
                'attribute' => 'author_active',
                'filter' => [0 => Yii::t('app', 'No'), 1 => Yii::t('app', 'Yes')],
                'content'=> function($model){
                    if($model->author_active == '0') { return Yii::t('app', 'No'); } 
                    if($model->author_active == '1') { return Yii::t('app', 'Yes'); }
                    },
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
