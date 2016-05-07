<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\User */

$this->title = Yii::t('app', 'User') . ': ' . $model->username;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Users'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
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
            'id',
            'username',
            'auth_key',
            'password_hash',
            'password_reset_token',
            'email:email',
            [
                'attribute' => 'status',
                'value' => $model->status == 10 ? Yii::t('app', 'Active') : ($model->status == 0 ? Yii::t('app', 'Deleted') : Yii::t('app', 'Неизвестен')),
            ],
            [
                'attribute' => 'role',
                'value' => $model->role == 10 ? Yii::t('app', 'Admin') : ($model->role == 5 ? Yii::t('app', 'Trusted') : Yii::t('app', 'Common')),
            ],
            'created_at:date',
            'updated_at:date',
        ],
    ]) ?>

</div>
