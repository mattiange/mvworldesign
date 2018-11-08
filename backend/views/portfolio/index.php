<?php
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\PortfolioSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Voci del portfolio');
$this->params['breadcrumbs'][] = $this->title;
$this->params['infoImg'] = 'file-2';
?>
<div class="portfolio-index container">
    <div class="search row" data-open="true" data-effect="slide">
        <span class="col-sm-3 icon icon-search" data-click="true"></span>
        <div class="col-sm-9 d-none" data-show="true">
            <?= $this->render('_search', ['model' => $searchModel]); ?>
        </div>
    </div>
    
    <br />
    
    <p>
        <?= Html::a(Yii::t('app', 'Create Portfolio'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    
    <div class="table-responsive">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'tableOptions' => ['class' => 'table table-striped table-bordered table-responsive'],
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            'id',
            //'picture',
            [
                'attribute' => 'picture',
                'format' => 'html',
                'value' => function ($model) {
                    $path = '/backend/web/images/uploads/portfolio/'.$model->picture;
                    
                    $img = Html::img("https://www.mvworldesign.com/backend/web/images/uploads/portfolio/teatralmente_gioia_website.jpg");
                    $img .= Html::beginTag('div', [
                        'id' => 'modal', 'class' => 'modal'
                    ]);
                    $img .= Html::img("https://www.mvworldesign.com/backend/web/images/uploads/portfolio/teatralmente_gioia_website.jpg");
                    $img .= Html::endTag('div');
                    
                    return $img;
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
</div>
<a href="create.php"></a>

<?php
$this->registerCssFile(Yii::getAlias('@web').'/css/search.css');
$this->registerJsFile(Yii::getAlias('@web').'/js/open.js',  [
    'depends' => [
        yii\web\JqueryAsset::className(),
    ]
]);