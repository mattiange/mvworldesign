<?php
$this->title = "Graphic Design".Yii::$app->name;
//$this->params['breadcrumbs'][] = 'Graphic Design';
$this->registerMetaTag([
    'name' => 'description',
    'content' => 'Realizziamo il tuo logo aziendale con presentazione e immagine coordinata.  Vuoi aprire un giornale? Noi facciamo al caso tuo,scrivici info@mvworldesign.com',
]);
?>
<h1 class="text-center"><?= Yii::t('app', 'Graphic Design') ?></h1>

<div id="services" class="wrapper margin-0-a">
    <div class="container margin-0-a">
        <div class="row margin-0-a">
            <?php foreach ($model as $k => $v): ?>
            <div class="col-sm-6 col-md-6 col-lg-6">
                <div class="cover col-sm-2">
                    <img src="<?= $v['cover'] ?>" src="" alt="" />
                </div>
                <div class="category col-sm-8">
                    <h3> <a href=""><?= $v['service'] ?></a></h3>
                    <p class="intro_text"><?= $v['intro_text'] ?></p>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>