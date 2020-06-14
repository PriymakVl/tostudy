<?php

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';

$config = [
    'id' => 'basic',
    'name' => 'tostudy',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'modules' => [
        'school' => [
            'class' => 'app\modules\school\Module',
        ],
        'language' => [
            'class' => 'app\modules\language\Module',
        ],
        'country' => [
            'class' => 'app\modules\country\Module',
        ],
        'city' => [
            'class' => 'app\modules\city\Module',
        ],
        'course' => [
            'class' => 'app\modules\course\Module',
        ],
    ],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'CZBaFc5axh7kxy-NorBVNxpWpPYsFaQv',
            'baseUrl' => '',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
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
        'db' => $db,

        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                //alias
                '<alias:|contacts|about|insurance|order|reviews|admin|login|>' => 'site/<alias>',

                'news' => 'news/index',
                'article' => 'news/view',

                'schools' => 'school/school/index', 
                'school' => 'school/school/view',
                'school/<action:\w+>' => 'school/school/<action>', 

                'languages' => 'language/language/index', 
                'countries' => 'country/country/index', 
                'cities' => 'city/city/index', 
                'course/<action:\w+>' => 'course/course/<action>', 

                //admin
                'admin/languages' => 'language/language-admin/index',
                'admin/language/<action:\w+>' => 'language/admin-language/<action>',
                'admin/countries' => 'country/country-admin/index',
                'admin/country/<action:\w+>' => 'country/admin-country/<action>',
                'admin/cities' => 'city/city-admin/index',
                'admin/city/<action:\w+>' => 'city/admin-city/<action>',
                'admin/courses' => 'course/course-admin/index',
                'admin/course/<action:\w+>' => 'course/admin-course/<action>',
                'admin/schools' => 'school/school-admin/index',
                'admin/school/<action:\w+>' => 'school/admin-school/<action>',

                'pages' => 'page/index',
                'admin/news' => 'news-admin/index',
                'admin/reviews' => 'review/index',
                'partners' => 'partner/index',
                'settings' => 'setting/view',
                'orders' => 'order/index',

            ],
        ],
        'svg' => [ 'class' => 'app\components\Svg', ],
        //get settings from table settings database
        'setting' => ['class' => 'app\components\SettingComponent'],
        //get programs educations
        'program' => ['class' => 'app\components\ProgramComponent'],
        
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];
}

return $config;
