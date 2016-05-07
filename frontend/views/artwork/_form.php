<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Artwork */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="artwork-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_category')->textInput() ?>

    <?= $form->field($model, 'id_author')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'artwork_year_created')->textInput() ?>

    <?= $form->field($model, 'artwork_title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'artwork_description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'artwork_price')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'artwork_image_path')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'artwork_thumb_path')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'artwork_active')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
