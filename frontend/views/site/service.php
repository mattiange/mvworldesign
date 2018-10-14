<?php
$this->title = $model[0]['service'].Yii::$app->name;
$this->params['breadcrumbs'][] = $model[0]['service'];
$this->params['breadcrumbs'][] = 'Web Design';
$this->registerMetaTag([
    'name' => 'description',
    'content' => $model[0]['meta_description'],
]);
?>
<h1 class="text-center"><?= $model[0]['service'] ?></h1>
<div id="services" class="wrapper margin-0-a">
    <?= $model[0]['text'] ?>
</div>