<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

use backend\models\Author;

/* @var $this yii\web\View */
/* @var $model backend\models\Article */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="article-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'id_author')->dropDownList(Author::find()->select(['author_name', 'author_id'])->indexBy('author_id')->column()) ?>
 
    <?= $form->field($model, 'article_title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'article_text')->textarea(['rows' => 6]) ?>

    <?php echo Yii::t('app', 'Size') . ' 400 x 200 px:'; ?>
    <?= $form->field($model, 'illustration')->fileInput(); ?>
 
    <?= $form->field($model, 'article_active')->dropDownList(['1' => Yii::t('app', 'Yes'), '0' => Yii::t('app', 'No')]) ?>
 
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
