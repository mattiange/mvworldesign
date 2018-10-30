<?php
/*use yii2tech\sitemap\File;
$siteMapFile = new File();
$siteMapFile->writeUrl(['site/index'], ['priority' => '0.9']);
$siteMapFile->writeUrl(['site/web'], ['priority' => '0.8', 'changeFrequency' => File::CHECK_FREQUENCY_DAILY]);
$siteMapFile->writeUrl(['site/graphic'], ['priority' => '0.7', 'changeFrequency' => File::CHECK_FREQUENCY_DAILY]);
$siteMapFile->writeUrl(['site/marketing'], ['priority' => '0.7', 'changeFrequency' => File::CHECK_FREQUENCY_DAILY]);
$siteMapFile->writeUrl(['site/portfolio'], ['priority' => '0.7', 'changeFrequency' => File::CHECK_FREQUENCY_DAILY]);
$siteMapFile->writeUrl(['site/contact'], ['priority' => '0.7', 'changeFrequency' => File::CHECK_FREQUENCY_DAILY]);

$siteMapFile->close();*/


/* @var $this yii\web\View */

$this->title = Yii::t('app', 'Siti web, SEO, loghi').Yii::$app->name;
//$this->params['breadcrumbs'][] = null;
$this->registerMetaTag([
    'name' => 'description',
    'content' => 'Offriamo servizi quali realizzazione di siti web vetrina, e-commerce, loghi, impaginazione di riviste e giornali e  web marketing',
]);
?>
<section>
    <div class="wrapper margin-0-a">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="widget home-widget" data-max-height="530px" data-max-width="1100px">
                    <div class="slider-content">
                        <div class="slider">
                            <div class="fraction-slider">
                                <div class="slide" data-step="1">
                                    <img src="<?= Yii::getAlias('@web') ?>/images/uploads/homepage/1.png" data-effect="left to right" data-bottom="0" data-delay="0" />
                                    <img src="<?= Yii::getAlias('@web') ?>/images/uploads/homepage/2.png" data-effect="left to right" data-bottom="0" data-delay="100" />
                                    <img src="<?= Yii::getAlias('@web') ?>/images/uploads/homepage/3.png" data-effect="left to right" data-bottom="0" data-delay="200" />
                                    <img src="<?= Yii::getAlias('@web') ?>/images/uploads/homepage/4.png" data-effect="left to right" data-bottom="0" data-delay="300" />
                                    <span class="text-right" data-delay="400" data-top="10" data-effect="top to bottom" data-right="0">Web Design, realizzazione siti e portali web in ottica SEO</span>
                                    <span class="text-right" data-delay="500" data-top="60" data-effect="top to bottom" data-right="0">Grafica, immagine, comunicazione, pubblicità</span>
                                    <span class="text-right" data-delay="600" data-top="110" data-effect="top to bottom" data-right="0">Facebook Advertising, Google Adword e pay per click</span>
                                </div>
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
$this->registerJsFile(Yii::getAlias('@web').'/js/home-widget.jquery.js?v=1',  [
    'depends' => [
        yii\web\JqueryAsset::className(),
        yii\jui\JuiAsset::className()
    ]
]);
$this->registerJs("
    jQuery(document).ready(function(){
        $('.home-widget').slider({});
    });
");
