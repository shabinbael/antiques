<?php

use yii\helpers\Html;
use yii\widgets\ListView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel frontend\models\ArtworkSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Gallery');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="artwork-index">

    <?php echo $this->render('_search', ['model' => $searchModel]); ?>
    <p></p>

    <?php Pjax::begin(); ?>    <?= ListView::widget([
            'dataProvider' => $dataProvider,
            'itemOptions' => ['class' => 'item'],
            'itemView' => '_item',
        ]) ?>
    <?php Pjax::end(); ?>
    
</div>
