<?php
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;

NavBar::begin([
    'options' => [
        'class' => 'navbar navbar-inverse navbar-fixed-top',
    ],
]);
echo Nav::widget([
    'options' => ['class' => 'navbar-nav navbar-left'],
    'items' => [
        ['label' => Yii::t('app', 'Home'), 'url' => ['site/index']],
        [
            'label' => Yii::t('app', 'Portfolio'), 'url' => ['portfolio/index'],
            'items' => [
                ['label' => Yii::t('app', 'Visualizza il portfolio'), 'url' => ['portfolio/index']],
                ['label' => Yii::t('app', 'Nuova voce'), 'url' => ['portfolio/create']],
            ],
        ],
        [
            'label' => Yii::t('app', 'Servizi'),
            'items' => [
                ['label' => Yii::t('app', 'Tutte le categorie'), 'url' => ['service-categories/index']],
                ['label' => Yii::t('app', 'Nuova categoria'), 'url' => ['service-categories/create']],
                '<hr  />',
                ['label' => Yii::t('app', 'Tutti i servizi'), 'url' => ['services/index']],
                ['label' => Yii::t('app', 'Nuovo servizio'), 'url' => ['services/create']],
            ],
        ],
        [
            'label' => Yii::t('app', 'Utenti'), 'url' => ['users/index'],
            'items' => [
                ['label' => Yii::t('app', 'Tutti gli utenti'), 'url' => ['users/index']],
                ['label' => Yii::t('app', 'Nuovo utente'), 'url' => ['users/create']],
            ],
        ],
    ]
]);
NavBar::end();