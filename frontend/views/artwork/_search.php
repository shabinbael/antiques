<?php

use yii\helpers\Html;
// use yii\widgets\ActiveForm;
use yii\bootstrap\ActiveForm;
use frontend\models\Category;
use frontend\models\Author;
use frontend\models\Artwork;

/* @var $this yii\web\View */
/* @var $model frontend\models\ArtworkSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="artwork-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'layout' => 'inline',
    ]); ?>

    <?php // $form->field($model, 'artwork_id') ?>

    <?php echo Yii::t('app', 'Category') . ': ' ?>

    <?= $form->field($model, 'id_category')->dropDownList(Category::find()->
        select(['category_name', 'category_id'])->indexBy('category_id')->column()) ?>

    <?php // $form->field($model, 'id_author')->dropDownList(Author::find()->select(['author_name', 'author_id'])->indexBy('author_id')->column()) ?>
    <?php // $form->field($model, 'artwork_price')->dropDownList(Artwork::find()->select(['artwork_price', 'artwork_id'])->indexBy('artwork_price')->orderBy('artwork_price')->column()) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-default']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
