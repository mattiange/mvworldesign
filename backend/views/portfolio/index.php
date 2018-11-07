<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\PortfolioSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Portfolios');
$this->params['breadcrumbs'][] = $this->title;
$this->params['infoImg'] = 'file-2';
?>
<div class="portfolio-index">
    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Portfolio'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    
    <pre>
        <?php print_r($dataProvider->query->one()->picture )?>
    </pre>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            'id',
            //'picture',
            [
                'attribute' => 'picture',
                'format' => 'html',
                'value' => function ($model) {
                    //return $model->picture;
                    $return = "<img src='";
                    $return .= Yii::getAlias('@frontend').'/web/images/uploads/portfolio/';
                    $return .= $model->picture;
                    $return .= "' alt='".$model->picture."' />";
                    
                    return "<img src='".Yii::getAlias('@frontend')."/web/images/uploads/portfolio/"."' alt='mmm' />";
                },
            ],
            'description:html',
            'client',
            'evidence',
            //'service_category_id',
            //'type',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
