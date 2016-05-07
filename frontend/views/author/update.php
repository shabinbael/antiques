<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Author */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Author',
]) . $model->author_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Authors'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->author_id, 'url' => ['view', 'id' => $model->author_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="author-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
