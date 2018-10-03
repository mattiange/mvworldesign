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


$mainmenu = MenuItem::find()->where('menu_id=1')->asArray()->all();
foreach ($mainmenu as $k_mn => $v_mn){
    $menuItems[] = ['label' => $v_mn['menu_item'], 'url' => [$v_mn['controller'].'/'.$v_mn['model']]];
}
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
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

                <!-- Logo Image -->
                <a class="navbar-brand" href="<?= Url::home(); ?>">
                    <img src="<?= Yii::getAlias('@web') ?>/images/ico/credits/vera-bracco-graphic-designer.png" alt="logo" role="banner" alt="Vera Bracco Graphic Designer" />
                </a>

            </div>
            <!-- Navigation Menu -->
            <?php
            NavBar::begin([
                'brandLabel' => 'M&V World Design',
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
        <?= $content ?>
    </div>
    
    <footer id="footer">
        <div class="container">
            <div class="breadcrumbs">
                <?= Breadcrumbs::widget([
                    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                ]) ?>
                <?= Alert::widget() ?>
            </div>
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
                    <p><?= date('Y') ?> &copy; <span>Vera Bracco - Graphic Designer</span>.  All Rights Reserved.</p>	
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
            <!-- FOOTER CREDITS -->
            <div class="row">
                <div id="footer_credits" class="col-sm-12 text-center">
                    <h2 class="bottom_line-gold">Credits</h2>
                    <div class="row">
                        <div class="col-sm-6 vera-graphic">
                            <div class="row">
                                <div class="img col-sm-4">
                                    <a href="<?= Yii::getAlias('@web').'/images/ico/credits/vera-bracco-grapgic-designer.png' ?>" target="_blank">
                                        <img src="<?= Yii::getAlias('@web').'/images/ico/credits/vera-bracco-graphic-designer.png' ?>" alt="Vera Bracco Graphic Designer" />
                                    </a>
                                </div>
                                <div class="description col-sm-8">
                                    <div class="row">
                                        <div class="col-sm-3 text-right">Facebook:</div>
                                        <div class="col-sm-9 text-left"><a href="https://www.facebook.com/Vera-Bracco-Graphic-Design-1589578704479826/" target="_blank">Vera Bracco - Graphic Designer</a></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-3 text-right">Instagam:</div>
                                        <div class="col-sm-9 text-left"><a href="" target="_blank"></a></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-3 text-right">Email:</div>
                                        <div class="col-sm-9 text-left"><a href="mailto: verabracco.official@gmail.com">verabracco.official@gmail.com</a></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-3 text-right">Telefono:</div>
                                        <div class="col-sm-9 text-left"><a href="tel: 3889738229">388 973 8229</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 mattia-webmaster">
                            <div class="row">
                                <div class="img col-sm-5">
                                    <a href="<?= Yii::getAlias('@web').'/images/ico/credits/mattia-angelillo-web-designer.jpg' ?>" target="_blank">
                                        <img src="<?= Yii::getAlias('@web').'/images/ico/credits/mattia-angelillo-web-designer.jpg' ?>" alt="Mattia Angelillo Web Designer" />
                                    </a>
                                </div>
                                <div class="description col-sm-7">
                                    <div class="row">
                                        <div class="col-sm-3 text-right">Facebook:</div>
                                        <div class="col-sm-9 text-left"><a href="https://www.facebook.com/mattia.angelillo" target="_blank">Mattia L- Angelillo - Web Designer</a></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-3 text-right">Instagam:</div>
                                        <div class="col-sm-9 text-left"><a href="https://www.instagram.com/mattiangelillo/" target="_blank">@mattiangelillo</a></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-3 text-right">Email:</div>
                                        <div class="col-sm-9 text-left"><a href="mailto: mattia.angelillo@gmail.com">mattia.angelillo@gmail.com</a></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-3 text-right">Telefono:</div>
                                        <div class="col-sm-9 text-left"><a href="tel: 3348768832">334 876 8832</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END FOOTER CREDITS -->
        </div>
        <!-- End container -->							
    </footer>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
