<?php
use yii\helpers\Url;

$this->title = "Web Design".Yii::$app->name;
//$this->params['breadcrumbs'][] = 'Web Design';
$this->registerMetaTag([
    'name' => 'description',
    'content' => 'Vuoi un sito web visualizzabile su ogni dispostivo? La nostra web agency fa al caso tuo, contattaci 3348768832, info@mvworldesign.com',
]);
$this->registerMetaTag([
    'name' => 'keywords',
    'content' => 'siti web, realizzare un ecommerce, registrare un sito, come si fa un sito, siti responsive',
]);
?>
<h1 class="text-center"><?= Yii::t('app', 'Web Design') ?></h1>

<div id="services" class="wrapper margin-0-a">
    <div class="container margin-0-a">
        <div class="row margin-0-a">
            <?php foreach ($model as $k => $v): ?>
            <div class="col-sm-6 col-md-6 col-lg-6 animated">
                <div class="cover col-sm-2">
                    <img src="<?= $v['cover'] ?>" src="" alt="" />
                </div>
                <div class="category col-sm-8">
                    <h3> <a href="<?= ($v['text']!="")?Url::to(['site/service', 'id'=>$v['id']]):'#' ?>"><?= $v['service'] ?></a></h3>
                    <p class="intro_text"><?= $v['intro_text'] ?></p>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<?php
$this->registerJsFile(Yii::getAlias('@web').'/js/fx.jquery.js',  [
    'depends' => [
        yii\web\JqueryAsset::className(),
        yii\jui\JuiAsset::className()
    ]
]);
$this->registerJs("
    jQuery(document).ready(function(){
        $('.home-widget').slider({});
        $('.animated').fx({
            fx : {
                duration: 150,
                fx : [
                    'blind',
                    'bounce',
                    'clip',
                    'drop',
                    'explode',
                    'pulsate',
                    'shake',
                    'slide'
                ]
            }
        });
    });
");