<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

use backend\models\Artwork;

/* @var $this yii\web\View */
/* @var $model backend\models\Slider */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="slider-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'id_artwork')->dropDownList(Artwork::find()->select(['artwork_title', 'artwork_id'])->indexBy('artwork_id')->column()) ?>

    <?= $form->field($model, 'photo')->fileInput(); ?>
    <p> (<?= Yii::t('app', 'Image size should be') ?> 1200 x 300 px)</p>

    <?= $form->field($model, 'slider_title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'slider_text')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
