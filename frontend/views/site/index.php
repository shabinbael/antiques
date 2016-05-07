<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap\Carousel;

use yii\db\ActiveRecord;

use frontend\models\Artwork;
use frontend\models\Slider;

/* @var $this yii\web\View */

$this->title = 'ANTIQUES';
?>

<div class="site-index">

    <?php
        $carouselItems = [];
        $query = Slider::find()
            ->orderBy(['slider_id' => SORT_ASC])
            ->all();
        foreach ($query as $k => $cItem) {
            if ($cItem->slider_image_path) {
                $carouselItems[$k]['content'] = Html::img($cItem->slider_image_path);
            }
            if ($cItem->id_artwork) {
                $linkedArtwork = Artwork::find()
                    ->where(['artwork_id' => $cItem->id_artwork])
                    ->one();
                $carouselItems[$k]['content'] = Html::a($carouselItems[$k]['content'], 
                    ['artwork/view', 'id' => $linkedArtwork->artwork_id], ['target'=>'_blank']);
            }
            if ($cItem->slider_title && $cItem->slider_text) {
                $carouselItems[$k]['caption'] = '<h2>' . $cItem->slider_title . '</h2><p>' 
                                                        . $cItem->slider_text . '</p>';
            }
        }
        echo Carousel::widget ([
            'items' => $carouselItems,
                   'options' => [
                   'style' => 'width: 1200px; height: 300px' // container size
                ]
            ]);
    ?>

    <div class="jumbotron">
        <h2> <?= Yii::t('app', 'Welcome') ?>! </h2>
        <p class="lead text-warning">Галерея Antiques: произведения искусства и предметы старины</span> </p>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-4">
                
                <h3> <?= Yii::t('app', 'Section') . ': ' . Yii::t('app', 'Gallery') ?> </h3>
                <p class="text-warning"><small>Lorem ipsum dolor sit amet, consectetur adipisicing elit, 
                sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</small></p>
                <?= Html::a(Yii::t('app', 'Gallery'), ['/artwork/index'], ['class'=>'btn btn-default']) ?>

            </div>
            <div class="col-lg-4">
                
                <h3> <?= Yii::t('app', 'Section') . ': ' . Yii::t('app', 'Authors') ?> </h3>
                <p class="text-warning"><small>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip 
                ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit 
                esse cillum dolore eu fugiat nulla pariatur.</small></p>
                <?= Html::a(Yii::t('app', 'Authors'), ['/author/index'], ['class'=>'btn btn-default']) ?>

            </div>
            <div class="col-lg-4">
                
                <h3> <?= Yii::t('app', 'Section') . ': ' . Yii::t('app', 'Articles') ?> </h3>
                <p class="text-warning"><small>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia 
                deserunt mollit anim id est laborum.</small></p>
                <?= Html::a(Yii::t('app', 'Articles'), ['/article/index'], ['class'=>'btn btn-default']) ?>

            </div>

        </div>

    </div>
</div>
