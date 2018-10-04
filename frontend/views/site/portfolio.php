<?php
$cont = 1;

$this->title = 'Portfolio | Vera Bracco';
?>
<ul id="portfolio">
    <?php foreach($model->find()->all() as $k => $v) : ?>
    <li class="<?= ($cont == 1  || ($cont%5)==0)?'col-md-6':'col-md-3' ?> col-xs-6 col-sm-4 portfolio-item" style="display: inline-block;  opacity: 1;" data-click="fullsize">
    <!--<li class="col-xs-6 col-sm-4 col-md-3 portfolio-item" style="display: inline-block;  opacity: 1;" data-click="fullsize">-->
        <div class="hover-overlay">
            <img src="<?= Yii::getAlias('@web') ?>/images/uploads\portfolio/<?= $v->picture ?>" alt="<?= $v->description ?>"  title="<?= $v->description ?>" />
            
            <a class="image_zoom" title="<?= $v->description ?>">
                <div class="item-overlay">										
                    <div class="overlay-content">
                        <h4><?= $v->description ?></h4>
                        <h5><?= Yii::t('app', 'Cliente') ?>: <?= $v->client ?></h5>
                    </div>
                </div>	  
            </a>
        </div>
    </li>
    <?php $cont ++; ?>
    <?php endforeach; ?>
</ul>

<div id="showpicture" style="display: none;">
    <div class="wrapper-img">
        <div class="exit glyphicon glyphicon-remove"></div>

        <img src="" alt="" src="" />
    </div>
</div>
<!--
<pre>
    <?php print_r($model) ?>
</pre>-->
<?php
$this->registerCssFile(Yii::getAlias('@web').'/css/showpicture.css');
$this->registerJsFile(Yii::getAlias('@web').'/js/portfolio.js',  [
    'depends' => [yii\web\JqueryAsset::className()]
]);
$this->registerJsFile(Yii::getAlias('@web').'/js/showpicture.js',  [
    'depends' => [yii\web\JqueryAsset::className()]
]);