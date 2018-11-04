<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\ServiceCategories */

$this->title = Yii::t('app', 'Create Service Categories');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Service Categories'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="service-categories-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
