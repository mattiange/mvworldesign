<?php
$this->title = 'Portfolio | Vera Bracco';
?>
<ul id="portfolio">
    <?php foreach($model->find()->all() as $k => $v) : ?>
    <li class="col-xs-6 col-sm-4 col-md-3 portfolio-item graphic_design mix_all" data-cat="5" style="display: inline-block;  opacity: 1;">
        <div class="hover-overlay">
            <img src="<?= Yii::getAlias('@web') ?>/images/uploads\portfolio/<?= $v->picture ?>" />
            
            <a class="prettyPhoto image_zoom" title="Brochure aziendale realizzata come pieghevole a tre ante. La parte esterna, con la copertina che riprende uno storico disegno che ha accompagnato l'impresa nei 30 anni di attività rivisto in chiave più moderna. Sul retro i riferimenti aziendali e nell'altra facciata la descrizione aziendale." alt="brochure aziendale">									
                            <div class="item-overlay">										
                                    <div class="overlay-content">
                                            <h4><?= $v->description ?></h4>
                                            <h5><?= Yii::t('app', 'Cliente') ?>: <?= $v->client ?></h5>
                                    </div>
                            </div>	  
                    </a>
        </div>
    </li>
    <?php endforeach; ?>
</ul>
<!--
<pre>
    <?php print_r($model) ?>
</pre>-->
<?php
$this->registerJsFile(Yii::getAlias('@web').'/js/portfolio.js',  [
    'depends' => [yii\web\JqueryAsset::className()]
]);