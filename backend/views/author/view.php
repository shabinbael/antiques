<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model backend\models\Author */

$this->title = $model->author_name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Authors'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="author-view">

    <h3><?= Html::encode($this->title) ?></h3>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->author_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->author_id], [
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
                'label' => Yii::t('app', 'Portrait'),
                'format' => 'raw',
                'value' => Html::img($model->author_image_path, ['style' => 'width:150px;']),
            ],
            'author_name',
            'author_bio:ntext',
            [
                'attribute' => 'author_active',
                'value' => $model->author_active == 0 ? 'Нет' : 'Да'
            ],
            // 'author_active',
            'author_image_path',
            'author_id',
        ],
    ]) ?>

</div>
