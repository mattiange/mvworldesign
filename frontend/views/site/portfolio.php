<?php
use frontend\models\ServiceCategories;

$cont = 1;

$this->title = 'Portfolio'.Yii::$app->name;
?>
<ul id="portfolio">
    <li class="category">
        <div class="btn-toolbar">
            <div class="btn-group">
                <div class="btn" data-filter="all">Tutto</div>
                <?php foreach(ServiceCategories::find()->all() as $k => $v) : ?>
                <div class="btn" data-filter="<?= $v->id ?>">
                    <?= $v->service ?>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </li>
    <?php foreach($model->find()->all() as $k => $v) : ?>
    <?php $service_category_id = ServiceCategories::find()->where(['id' => $v->service_category_id])->asArray()->one() ?>
    
    <li class="filter col-md-3 col-xs-6 col-sm-4 portfolio-item" style="display: inline-block;  opacity: 1;" 
        data-click="fullsize" data-category="<?= $service_category_id['id'] ?>">
        <div class="hover-overlay">
            <img src="<?= Yii::getAlias('@web') ?>/images/uploads/portfolio/<?= $v->picture ?>" alt="<?= $v->description ?>"  title="<?= $v->description ?>" data-max-height="412" />
            
            <a class="image_zoom" title="<?= $v->description ?>">
                <div class="item-overlay">										
                    <div class="overlay-content">
                        <h4><?= $v->description ?>
                        
                        <?= ($v->client != "") ? '<h5><strong>'. Yii::t('app', 'Cliente') .':</strong> ' . $v->client . '</h5>': '' ?>
                    </div>
                </div>	  
            </a>
        </div>
    </li>
    <?php $cont ++; ?>
    <?php endforeach; ?>
</ul>

<div id="showpicture" style="display: none;">
    <div class="exit glyphicon glyphicon-remove"></div>
    <div class="wrapper-img text-center"><img src="" alt="" src="" /></div>
</div>
<?php
$this->registerCssFile(Yii::getAlias('@web').'/css/showpicture.css');
$this->registerJsFile(Yii::getAlias('@web').'/js/portfolio.js',  [
    'depends' => [yii\web\JqueryAsset::className()]
]);
$this->registerJsFile(Yii::getAlias('@web').'/js/showpicture.js',  [
    'depends' => [
        yii\web\JqueryAsset::className(),
        yii\jui\JuiAsset::className()
    ]
]);