<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

use backend\models\Category;
use backend\models\Author;
use backend\models\ArtworkAuthor;

/* @var $this yii\web\View */
/* @var $model backend\models\Artwork */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="artwork-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'image')->fileInput(); ?>
    <?php echo Yii::t('app', 'Size 200 x 200') . ':'; ?>
    <?= $form->field($model, 'thumb')->fileInput(); ?>

    <?= $form->field($model, 'id_author')->dropDownList(Author::find()->select(['author_name', 'author_id'])->indexBy('author_id')->column()) ?>

    <?= $form->field($model, 'artwork_title')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'artwork_year_created')->textInput() ?>
    
    <?= $form->field($model, 'id_category')->dropDownList(Category::find()->
        select(['category_name', 'category_id'])->indexBy('category_id')->column()) ?>

    <?= $form->field($model, 'artwork_description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'artwork_price')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'artwork_active')->dropDownList(['1' => Yii::t('app', 'Yes'), '0' => Yii::t('app', 'No')]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
