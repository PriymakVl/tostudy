<?php

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;

NavBar::begin([
    'brandLabel' => Yii::$app->name,
    'brandUrl' => Yii::$app->homeUrl,
    'options' => [
        'class' => 'navbar-inverse navbar-fixed-top',
    ],
]);
echo Nav::widget([
    'options' => ['class' => 'navbar-nav navbar-right'],

    'items' => [
        ['label' => 'Забронировали курс', 'url' => ['/orders']],
        ['label' => 'Обратная связь', 'url' => ['/feedback']],
        [
            'label' => 'Модули',
            'items' => [
                 ['label' => 'Программы', 'url' => '/programs'],
                 '<li class="divider"></li>',
                 ['label' => 'Языки', 'url' => '/admin/languages'],
                 '<li class="divider"></li>',
                 ['label' => 'Страны', 'url' => '/admin/countries'],
                 '<li class="divider"></li>',
                 ['label' => 'Города', 'url' => '/admin/cities'],
                 '<li class="divider"></li>',
                 ['label' => 'Школы', 'url' => '/admin/schools'],
                 '<li class="divider"></li>',
                 ['label' => 'Курсы', 'url' => '/admin/courses'],
                 '<li class="divider"></li>',
                 ['label' => 'Жилье ', 'url' => '/accommodation'],
            ],
        ],

        [
            'label' => 'Разное',
            'items' => [
                ['label' => 'Подписчики', 'url' => ['/admin/subscribe']],
                '<li class="divider"></li>',
                ['label' => 'Новости', 'url' => ['/admin/news']],
                '<li class="divider"></li>',
                ['label' => 'Акции', 'url' => ['/admin/offers']],
                '<li class="divider"></li>',
                ['label' => 'Отзывы', 'url' => ['/admin/reviews']],
                '<li class="divider"></li>',
                ['label' => 'Страницы', 'url' => ['/pages']],
                '<li class="divider"></li>',
                ['label' => 'С нами работают', 'url' => '/partners'],
                '<li class="divider"></li>',
                ['label' => 'Вопросы и ответы', 'url' => '/faq'],
                '<li class="divider"></li>',
                ['label' => 'Полезная информация', 'url' => '/admin/info'],
                '<li class="divider"></li>',
                ['label' => 'Настройки', 'url' => '/settings'],
            ],
        ],

        //user account
        Yii::$app->user->isGuest ? (
            ['label' => 'Войти', 'url' => ['/site/login']]
        ) : (
            '<li>'
            . Html::beginForm(['/site/logout'], 'post')
            . Html::submitButton(
                'Выйти',
                ['class' => 'btn btn-link logout']
            )
            . Html::endForm()
            . '</li>'
        )
    ],
]);
NavBar::end();
?>