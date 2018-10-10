<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\MenuItem */

$this->title = Yii::t('app', 'Update Menu Item: ' . $model->id, [
    'nameAttribute' => '' . $model->id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Menu Items'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id, 'menu_id' => $model->menu_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="menu-item-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
