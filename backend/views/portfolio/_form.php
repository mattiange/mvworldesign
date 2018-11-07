<?php
use backend\models\ServiceCategories;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model backend\models\Portfolio */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="portfolio-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>

    <!--<?= $form->field($model, 'picture')->textInput(['maxlength' => true]) ?>-->
    
        <?= $form->field($model, 'picture')->fileInput() ?>

    <?= $form->field($model, 'description')->textarea(['maxlength' => true]) ?>

    <?= $form->field($model, 'client')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'evidence')->dropDownList([
        'no'  => Yii::t('app', 'No'),
        'yes' => Yii::t('app', 'Yes')
    ]) ?>

    <!--<?= $form->field($model, 'service_category_id')->textInput(['maxlength' => true]) ?>-->
    
            
    <?= $form->field($model, 'service_category_id')
            ->dropDownList(ArrayHelper::map(ServiceCategories::find()->asArray()->all(), 'id', 'service'))
            ->label(Yii::t('app', 'Categoria'))?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>
