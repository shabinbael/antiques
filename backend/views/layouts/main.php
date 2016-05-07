<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;

use kartik\sidenav\SideNav;
use yii\helpers\Url;
use backend\models\User;

use \lajax\languagepicker\Component;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => Yii::t('app', 'Admin'),
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
            'encodeLabels' => false,
        ],
    ]);

    if (Yii::$app->user->isGuest) {
        $menuItems[] = ['label' => '<span class="glyphicon glyphicon-log-in"></span> Login', 'url' => ['/site/login']];
    } else {
        $menuItems[] = '<li>'
            . Html::beginForm(['/site/logout'], 'post')
            . Html::submitButton(
                Yii::t('app', 'Logout') . ' (' . Yii::$app->user->identity->username . ')',
                ['class' => 'btn btn-link']
            )
            . Html::endForm()
            . '</li>';
    }
    ?>

    <div class="navbar-text pull-right">
        <?=
        \lajax\languagepicker\widgets\LanguagePicker::widget([
            'skin' => \lajax\languagepicker\widgets\LanguagePicker::SKIN_BUTTON,
            'size' => \lajax\languagepicker\widgets\LanguagePicker::SIZE_SMALL
        ]);
        ?>
    </div>

    <?php echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $menuItems,
        'encodeLabels' => false,
    ]);
    ?>
    
    <?php NavBar::end(); ?>

    <div class="container">
    <div class="row">
    <div class="col-sm-3">
    <?php

    if (!Yii::$app->user->isGuest) {
        // info
        echo '<p class="alert alert-info"> ' 
            . Yii::t('app', 'Your') . ' ID: ' . ' ' . Yii::$app->user->identity->id 
            . ', ' . Yii::t('app', 'status') . ' ' . Yii::$app->user->identity->status 
            . ', ' . Yii::t('app', 'role') . ' ' . Yii::$app->user->identity->role . '</p>';
        
        // show to admin only:
        if ((Yii::$app->user->identity->status == 10) && (Yii::$app->user->identity->role == 10)) {
        echo SideNav::widget([
            'type' => SideNav::TYPE_DEFAULT,
            'heading' => Yii::t('app', 'Admin'),
            'items' => [
                [
                    'url' => ['/site/index'],
                    'label' => Yii::t('app', 'Home'),
                    'icon' => 'home'
                ],
                [
                    'url' => ['/category/index'],
                    'label' => Yii::t('app', 'Categories'),
                    'icon' => 'tags'
                ],
                [
                    'url' => ['/artwork/index'],
                    'label' => Yii::t('app', 'Artworks'),
                    'icon' => 'briefcase'
                ],
                [
                    'url' => ['/author/index'],
                    'label' => Yii::t('app', 'Authors'),
                    'icon' => 'pencil'
                ],
                [
                    'url' => ['/article/index'],
                    'label' => Yii::t('app', 'Articles'),
                    'icon' => 'file'
                ],
                [
                    'url' => ['/slider/index'],
                    'label' => Yii::t('app', 'Slider'),
                    'icon' => 'film'
                ],
                [
                    'url' => ['/user/index'],
                    'label' => Yii::t('app', 'Users'),
                    'icon' => 'user'
                ],
                /*
                [
                    'url' => ['/site/upload'],
                    'label' => 'Загрузка картинок',
                    'icon' => 'upload'
                ],
                */
            ],
        ]);
    }}
    ?>
    </div>

    <div class="col-sm-9">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>

        <?php Alert::widget() ?>
        <?= $content ?>
    </div>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; ANTIQUES <?= date('Y') ?></p>

        <p class="pull-right"> 
            <?php 
            ?>
        </p>

    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
