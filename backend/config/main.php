<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-backend',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    
    // For languagepicker: begin
    'language' => 'en-US',
    'bootstrap' => ['languagepicker'],
    // For languagepicker: end
    
    // 'bootstrap' => ['log'], // my ru-only
    // 'language' => 'ru_RU', // my ru-only
    // 'sourceLanguage' => 'en_US', // my ru-only 
    'modules' => [],
    'components' => [
        
        'languagepicker' => [ // minimal config
            'class' => 'lajax\languagepicker\Component',
            'languages' => ['en', 'ru'] // List of available languages (icons only)
            ],
        
        /*
        'languagepicker' => [ // max config
            'class' => 'lajax\languagepicker\Component',
            'languages' => function () { // List of available languages (icons and text)
                return \lajax\translatemanager\models\Language::getLanguageNames(true);
                },
            'cookieName' => 'language',  // Name of the cookie.
            'expireDays' => 64,          // The expiration time of the cookie is 64 days.
            'callback' => function() {
                if (!\Yii::$app->user->isGuest) {
                    $user = \Yii::$app->user->identity;
                    $user->language = \Yii::$app->language;
                    $user->save();
                    }
                }
            ],
        */
        
        'i18n' => [
            'translations' => [
                'app*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@app/messages',
                    'sourceLanguage' => 'en-US',
                    'fileMap' => [
                        'app'       => 'app.php',
                        'app/error' => 'error.php',
                        ],
                    ],
                ],
            ],
        /*
        'i18n' => [
            'translations' => [
                'app' => [
                    'class' => 'yii\l18n\PhpMessageSource',
                    'basePath' => '@app/messages',
                    'sourceLanguage' => 'en_US',
                    'fileMap' => [
                        'app' => 'app.php',
                        'app/error' => 'error.php',
                    ],
                ],
            ],
        ],
        */
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        /*
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                '<controller:\w+>/<id:\d+>' => '<controller>/view',
                '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
            ],
        ],
        */
    ],
    'params' => $params,
];
