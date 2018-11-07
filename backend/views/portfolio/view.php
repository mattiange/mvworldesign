<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Portfolio */

$this->title = "Portfolio #".$model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Portfolios'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$this->params['infoImg'] = 'file-2';
?>
<div class="portfolio-view">
    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            //'picture',
            [
                'attribute' => 'picture',
                'format' => 'html',
                'value' => function ($model) {
                    $img = "<img src='".$model->picture."' />";
                    
                    return $img;
                },
            ],
            'description',
            'client',
            'evidence',
            'service_category_id',
            'type',
        ],
    ]) ?>

</div>
