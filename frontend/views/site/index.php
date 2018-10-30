<?php
use frontend\models\Services;
use yii\helpers\Url;

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
    
    <div class="col-sm-12">
        <section class="services">
            <div class="auto-box">
                <h1 class="border-line-center text-center">
                    <?= Yii::t('app', 'I nostri servizi') ?>
                </h1>

                <div class="row clearfix">
                    <?php foreach (Services::find()->all() as $k_cat => $cat) : ?>
                    <div class="box col-lg-4 col-md-4 col-sm-6 col-xs-12 anim-3-all animated pulse animated-delay-2" 
                         data-delay="0" 
                         data-animation="pulse">
                        <span class="icon">
                            <img src="<?= Yii::getAlias('@web').'/uploads/'.$cat->cover ?>" alt="" />
                        </span>

                        <h3>
                            <!--<a href="<?= Url::toRoute(['site/category', 'id' => $cat->id]); ?>">
                                <?= $cat->service ?>
                            </a>-->
                            <a href="#">
                                <?= $cat->service ?>
                            </a>
                        </h3>

                        <div class="content"><?= $cat->intro_text ?></div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
    </div>
</section>
<?php
$this->registerCssFile(Yii::getAlias('@web').'/css/home-widget.css', [
    'depends' => 'yii\bootstrap\BootstrapAsset',
]);
$this->registerCssFile(Yii::getAlias('@web').'/css/services.css', [
    'depends' => 'yii\bootstrap\BootstrapAsset',
]);
$this->registerJsFile(Yii::getAlias('@web').'/js/home-widget.jquery.js',  [
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