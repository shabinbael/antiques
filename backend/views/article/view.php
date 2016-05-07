<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;
use backend\models\Author;

/* @var $this yii\web\View */
/* @var $model backend\models\Article */

$this->title = $model->article_title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Articles'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="article-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->article_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->article_id], [
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
            
            [
                'attribute' => 'id_author',
                'value' => $model->idAuthor->author_name,
            ],
            // 'id_author',
            'article_title',
            [
                'attribute' => 'illustration',
                'format' => 'raw',
                'value' => Html::img($model->article_image_path, ['style' => 'width:200px;']),
            ],
            // 'article_image_path',
            'article_text:ntext',
            'article_date_added',
            [
                'attribute' => 'article_active',
                'value' => $model->article_active == 0 ? Yii::t('app', 'No') : Yii::t('app', 'Yes')
            ],
            // 'article_active',
            'article_id',
        ],
    ]) ?>

</div>
