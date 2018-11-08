<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Portfolio */

$this->title = Yii::t('app', 'Aggiungi voce al portfolio');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Portfolios'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$this->params['infoImg'] = 'file-add';
?>
<div class="portfolio-create">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
