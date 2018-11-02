<?php
$this->title = "Web Marketing".Yii::$app->name;
//$this->params['breadcrumbs'][] = 'Web Marketing';
$this->registerMetaTag([
    'name' => 'description',
    'content' => 'Fai pubblicità su internet, fatti strada nel web con campagne adwords per promuovere la tua attività, grazie a facebook e Google Adwords',
]);
$this->registerMetaTag([
    'name' => 'keywords',
    'content' => 'web agency, adv facebook, fare pubblicità su internet, campagna adwords, come fare pubblicità su internet',
]);
?>
<h1 class="text-center"><?= Yii::t('app', 'Web Marketing') ?></h1>

<div id="services" class="wrapper margin-0-a">
    <div class="container margin-0-a">
        <div class="row margin-0-a">
            <?php foreach ($model as $k => $v): ?>
            <div class="col-sm-6 col-md-6 col-lg-6 animated">
                <div class="cover col-sm-2">
                    <img src="<?= $v['cover'] ?>" src="" alt="" />
                </div>
                <div class="category col-sm-8">
                    <h3> <a href="#"><?= $v['service'] ?></a></h3>
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