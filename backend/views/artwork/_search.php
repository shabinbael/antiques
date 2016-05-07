<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\ArtworkSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="artwork-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'artwork_id') ?>

    <?= $form->field($model, 'id_category') ?>

    <?= $form->field($model, 'id_author') ?>

    <?= $form->field($model, 'artwork_year_created') ?>

    <?= $form->field($model, 'artwork_title') ?>

    <?php // echo $form->field($model, 'artwork_description') ?>

    <?php // echo $form->field($model, 'artwork_price') ?>

    <?php // echo $form->field($model, 'artwork_image_path') ?>

    <?php // echo $form->field($model, 'artwork_thumb_path') ?>

    <?php // echo $form->field($model, 'artwork_active') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
