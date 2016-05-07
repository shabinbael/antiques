<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Artwork */

$this->title = Yii::t('app', 'Update Artwork') . ': ' . $model->artwork_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Artworks'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->artwork_id, 'url' => ['view', 'id' => $model->artwork_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="artwork-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
