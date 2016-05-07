<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Users');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php // Html::a('Create User', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            // ['class' => 'yii\grid\SerialColumn'],

            'id',
            'username',
            // 'auth_key',
            // 'password_hash',
            // 'password_reset_token',
            'email:email',
            [
                'attribute' => 'status',
                'filter' => [10 => Yii::t('app', 'Active'), 0 => Yii::t('app', 'Deleted')],
                'content'=> function($model){
                    if($model->status == '10') { return Yii::t('app', 'Active'); } 
                    if($model->status == '0') { return Yii::t('app', 'Deleted'); }
                    },
            ],
            // 'status',
            [
                'attribute' => 'role',
                'filter' => [10 => Yii::t('app', 'Admin'), 5 => Yii::t('app', 'Trusted'), 1 => Yii::t('app', 'Common')],
                'content'=> function($model){
                    if($model->role == '10') { return Yii::t('app', 'Admin'); } 
                    if($model->role == '5') { return Yii::t('app', 'Trusted'); }
                    if($model->role == '1') { return Yii::t('app', 'Common'); }
                    },
            ],
            'created_at:date',
            'updated_at:date',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
