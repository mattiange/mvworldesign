<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    
    <link rel="apple-touch-icon" sizes="57x57" href="<?= Yii::getAlias('@web') ?>/images/ico/favicon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="<?= Yii::getAlias('@web') ?>/images/ico/favicon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="<?= Yii::getAlias('@web') ?>/images/ico/favicon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="<?= Yii::getAlias('@web') ?>/images/ico/favicon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="<?= Yii::getAlias('@web') ?>/images/ico/favicon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="<?= Yii::getAlias('@web') ?>/images/ico/favicon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="<?= Yii::getAlias('@web') ?>/images/ico/favicon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="<?= Yii::getAlias('@web') ?>/images/ico/favicon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="<?= Yii::getAlias('@web') ?>/images/ico/favicon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="<?= Yii::getAlias('@web') ?>/images/ico/favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?= Yii::getAlias('@web') ?>/images/ico/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="<?= Yii::getAlias('@web') ?>/images/ico/favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= Yii::getAlias('@web') ?>/images/ico/favicon/favicon-16x16.png">
    
    <link rel="manifest" href="<?= Yii::getAlias('@web') ?>/images/ico/favicon/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="<?= Yii::getAlias('@web') ?>/images/ico/favicon/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <?= $this->registerCssFile(Yii::getAlias('@web').'/css/login.css', [
        'depends' => ['yii\bootstrap\BootstrapAsset']
    ]); ?>
    
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="login">
<?php $this->beginBody() ?>
    <div class="container">
        <div id="content">
            <?= $content ?>
        </div>
    </div>
    
    <?php
    NavBar::begin([
        'options' => [
            'class'=>'navbar navbar-fixed-bottom hidden-phone'
        ]
    ]);
    echo Nav::widget([
        'options' => ['class' => ''],
        'items' => [
            [
                'label' => 'Torna alla home page del sito',
                'url' => '/',
                'linkOptions' => ['target' => '_blank'],
                'options' => ['class'=>'pull-left'],
            ],
            [
                'label' => '© '.date('Y').' M&V World Design',
                'options'=>['class'=>'pull-right']
            ]
        ]
    ]);
    NavBar::end();
    ?>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
