<?php

/* @var $this yii\web\View */

$this->title = Yii::t('app', 'Siti web, SEO, loghi').Yii::$app->name;
?>
<section>
    <div class="wrapper margin-0-a">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="widget home-widget">
                    <div class="slider-content">
                        <div class="fraction-slider">
                            <div class="slide" data-step="1">
                                <img src="<?= Yii::getAlias('@web') ?>/images/uploads/homepage/1.png" data-delay="0" />
                                <img src="<?= Yii::getAlias('@web') ?>/images/uploads/homepage/2.png" data-delay="500" />
                                <img src="<?= Yii::getAlias('@web') ?>/images/uploads/homepage/3.png" data-delay="1000" />
                                <img src="<?= Yii::getAlias('@web') ?>/images/uploads/homepage/4.png" data-delay="1500" />
                                <span class="text-right" data-delay="2000" data-top="10" data-right="0">Web Design, realizzazione siti e portali web in ottica SEO</span>
                                <span class="text-right" data-delay="2500" data-top="60" data-right="0">Grafica, immagine, comunicazione, pubblicità</span>
                                <span class="text-right" data-delay="2500" data-top="110" data-right="0">Facebook Advertising, Google Adword e pey per click</span>
                            </div>
                        </div>
                    </div>
                </div>  
            </div>
        </div>
    </div>
</section>
<?php
$this->registerCssFile(Yii::getAlias('@web').'/css/home-widget.css', [
    'depends' => 'yii\bootstrap\BootstrapAsset',
]);
$this->registerJsFile(Yii::getAlias('@web').'/js/home-widget.jquery.js',  [
    'depends' => [
        yii\web\JqueryAsset::className(),
        yii\jui\JuiAsset::className()
    ]
]);