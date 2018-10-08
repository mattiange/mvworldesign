<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;
use frontend\models\MenuItem;

AppAsset::register($this);


$mainmenu = MenuItem::find()->where('menu_id=1')->orderBy('position')->asArray()->all();
foreach ($mainmenu as $k_mn => $v_mn){
    $menuItems[] = ['label' => $v_mn['menu_item'], 'url' => [$v_mn['controller'].'/'.$v_mn['view']]];
}
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
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/solid.css" integrity="sha384-VGP9aw4WtGH/uPAOseYxZ+Vz/vaTb1ehm1bwx92Fm8dTrE+3boLfF1SpAtB1z7HW" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/regular.css" integrity="sha384-ZlNfXjxAqKFWCwMwQFGhmMh3i89dWDnaFU2/VZg9CvsMGA7hXHQsPIqS+JIAmgEq" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/brands.css" integrity="sha384-rf1bqOAj3+pw6NqYrtaE1/4Se2NBwkIfeYbsFdtiR6TQz0acWiwJbv1IM/Nt/ite" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/fontawesome.css" integrity="sha384-1rquJLNOM3ijoueaaeS5m+McXPJCGdr5HcA03/VHXxcp2kX2sUrQDmFc3jR5i/C7" crossorigin="anonymous">
</head>
<body>
<?php $this->beginBody() ?>
    
    <div id="loading" style="display: none;"><img src="<?= Yii::getAlias('@web'); ?>/images/ico/gif/loading.gif" /></div>
    
    <header id="header">
        <!-- Navigation bar -->
        <div class="navbar navbar-default navbar-fixed-top">
            <div class="navbar-header">			
                <!-- Responsive Menu Button -->
                <button type="button" id="nav-toggle" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navigation-menu" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span> 
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                </button>
            </div>
            <!-- Navigation Menu -->
            <?php
            NavBar::begin([
                'brandLabel' => Html::img('@web/images/ico/logo/png/logo-MV-bianco-su-sfondo-nero__100x71.png', ['alt'=>'Logo M&V World Design', 'title' => 'M&V World Design']),
                'brandUrl' => Yii::$app->homeUrl,
                'options' => [
                    'class' => 'navbar-inverse navbar-fixed-top',
                ],
            ]);
            if (Yii::$app->user->isGuest) {
                //$menuItems[] = ['label' => 'Signup', 'url' => ['/site/signup']];
                //$menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
            } else {
                $menuItems[] = '<li>'
                    . Html::beginForm(['/site/logout'], 'post')
                    . Html::submitButton(
                        'Logout (' . Yii::$app->user->identity->username . ')',
                        ['class' => 'btn btn-link logout']
                    )
                    . Html::endForm()
                    . '</li>';
            }
            echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-right'],
                'items' => $menuItems,
            ]);
            NavBar::end();
            ?>
            <!-- End Navigation Menu -->
        </div>
    </header>
    
    <div id="content_wrapper">
        <div class="breadcrumbs">
            <?= Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) ?>
        </div>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
    
    <footer id="footer">
        <div class="container">
            <?php if(!Yii::$app->user->isGuest) : ?>
            <!-- FOOTER ADMIN MENU -->
            <div class="row">
                <div id="footer_adminmenu" class="col-sm-12">
                    <div class="title"><?= Yii::t('app', 'Amministra') ?>: </div>
                    <div class="">
                        <a href="<?= Url::to(['slideshow/slideshow']) ?>"><?= Yii::t('app', 'Slideshow'); ?></a>
                    </div>
                    <div class="">
                        <a href="<?= Url::to(['categorie/index']) ?>"><?= Yii::t('app', 'Servizi'); ?></a>
                    </div>
                    <div class="">
                        <?php
                        echo Html::beginForm(['/site/l'], 'post');
                        echo Html::submitButton(
                            Yii::t('app', 'Esci'),
                            ['class' => 'btn btn-link logout']
                        );
                        echo Html::endForm();
                        ?>
                    </div>
                </div>
            </div>
            <!-- END FOOTER ADMIN MENU -->
            <?php endif; ?>
            
            <!-- FOOTER COPYRIGHT -->
            <div class="row">						
                <div id="footer_copyright" class="col-sm-12 text-center">		
                    <p><?= date('Y') ?> &copy; <span>M&V World Design</span>.  All Rights Reserved.</p>	
                </div>
            </div>
                
            <!-- FOOTER SOCIALS -->
            <div class="row">
                <div id="footer_socials" class="col-sm-12 text-center">
                    <div id="contact_icons">																	
                        <ul class="contact-socials clearfix">
                            <li><a class="foo_social ico-facebook" href="http://facebook.com/graficanexus6."><i class="fa fa-facebook"></i></a></li>
                            <li><a class="foo_social ico-instagram" href="https://www.instagram.com/vera_graphicdesigner/" target="_blank"><i class="fa fa-instagram"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- END FOOTER SOCIALS -->
        </div>
        <!-- End container -->							
    </footer>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
