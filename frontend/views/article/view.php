<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Article */

$this->title = $model->article_title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Articles'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="article-view">

    <h2><?= Html::encode($this->title) ?></h2>
    <p></p>
    
    <div class="col-md-8">

    <?= DetailView::widget([
        'model' => $model,
        'options' => ['class' => 'table'],
        'attributes' => [
            /*
            [
                'attribute' => '',
                'format' => 'raw',
                'value' => Html::img($model->article_image_path, ['style' => 'width: 400px; height: 200px;']),
            ],
            */
            [
                'attribute' => '',
                'format' => 'ntext',
                'value' => $model->article_text,
            ],
            [
                'attribute' => '',
                'format' => 'raw',
                'value' => Html::a($model->idAuthor->author_name, ['author/view', 'id' => $model->idAuthor->author_id]),
            ],
            [
                'attribute' => '',
                'value' => $model->article_date_added,
            ],
        ],
    ]) ?>

    </div>
    <div class="col-md-4">

    <?= Html::img($model->article_image_path, ['style' => 'width: 400px; height: 200px;']) ?>

    </div>

</div>
