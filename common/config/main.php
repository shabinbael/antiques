<?php
return [
	// 'language' => 'ru-RU',
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',

    'language' => 'en-US',
    'bootstrap' => ['languagepicker'],
    
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'languagepicker' => [ // minimal config
            'class' => 'lajax\languagepicker\Component',
            'languages' => ['en', 'ru', 'fr'] // List of available languages (icons only)
            ],
        
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
    ],
];
