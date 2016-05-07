<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\bootstrap\Modal;

/* @var $this yii\web\View */
/* @var $model frontend\models\Artwork */

$this->registerJs("$(function() {
   $('#popupModal').click(function(e) {
     e.preventDefault();
     $('#modal').modal('show').find('.modal-body').load($(this).attr('href'));
   });
});");

// opens an img
// $('#modal').modal('show').find('.modal-body').load($(this).html($imgPath));
// opens modal with abrakadabra
// $('#modal').modal('show').find('.modal-body').load($(this).attr('href'));

$this->title = $model->artwork_title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Gallery'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="artwork-view">

    <div class="table">
    <div class="col-md-9">

    <?= DetailView::widget([
        'model' => $model,
        'options' => ['class' => 'table'],
        'attributes' => [
            [
                'attribute' => '',
                'format' => 'raw',
                'value' => Html::img($model->artwork_image_path, ['style' => 'height: 200px']),
            ],

            'artwork_title',
            [
                'attribute' => 'id_author',
                'format' => 'raw',
                'value' => Html::a($model->idAuthor->author_name, ['author/view', 'id' => $model->idAuthor->author_id]),
            ],
            'artwork_year_created',
            [
                'attribute' => 'id_category',
                'label' => Yii::t('app', 'Category'),
                'value' => $model->idCategory->category_name,
            ],
            'artwork_description:ntext',
            'artwork_price',
        ],
    ]) ?>
    </div>
    </div>
    <div class="col-md-3">

        <?php
            yii\bootstrap\Modal::begin([
                'header' => $model->idAuthor->author_name . ', «' . $model->artwork_title . '», ' . $model->artwork_year_created,
                'id' => 'modal',
            ]);
            echo Html::img($model->artwork_image_path);
            yii\bootstrap\Modal::end();
        ?>
        <p><a class="btn btn-lg btn-default" id="popupModal"> <?= Yii::t('app', 'Enlarge Image') ?> </a></p>

    </div>
</div>
