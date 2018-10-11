<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ContactForm */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

$this->title = 'Contact'.Yii::$app->name;
$this->params['breadcrumbs'][] = 'Contattaci';
$this->registerMetaTag([
    'name' => 'description',
    'content' => 'Siti web,SEO,loghi,grafica pubblicitaria e editoriale.Affidati alla nostra professionalità,richiedi un preventivo gratuito 3348768832,info@mvworldesign.com',
]);
$this->registerMetaTag([
    'name' => 'keywords',
    'content' => 'social media marketing, loghi, siti web, grafica editoriale, grafica pubblicitaria, immagine coordinata, fotoritocco',
]);
?>

<section id="contacts">
    <div class="wrapper margin-0-a">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="margin-b-50">
                    <div class="row">
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <h3 class="widget-title style1"><?= Yii::t('app', 'Contatti') ?></h3>
                            <p></p>
                            <ul class="clearfix contact">
                                <li><p><span class="foo ico-email f-left"></span>Email: <a href="mailto:info@mvworldesign.com">info@mvworldesign.com</a></p></li>
                                <li><p><span class="foo ico-whatsapp f-left"></span>Cellulare: <a href="callto: 3358768832">(+39) 335 8768832</a> - <a href="callto: 3889738229">(+39) 388 9738229</a></p></li>
                                <li><p><span class="foo ico-facebook f-left"></span><a href="" rel="noindex" target="_blank">Facebook</a></p></li>
                                <li><p><span class="foo ico-instagram f-left"></span><a href="" rel="noindex" target="_blank">Instagram</a></p></li>
                                <li><p><span class="foo ico-pinterest f-left"></span><a href="" rel="noindex" target="_blank">Pinterest</a></p></li>
                            </ul>
                        </div>  
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <h3 class="widget-title style1"><?= Yii::t('app', 'Richiedici un preventivo') ?></h3>
                            <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>

                                <?= $form->field($model, 'name')->textInput(['autofocus' => true]) ?>

                                <?= $form->field($model, 'email') ?>

                                <?= $form->field($model, 'subject') ?>

                                <?= $form->field($model, 'body')->textarea(['rows' => 6]) ?>

                                <?= $form->field($model, 'verifyCode')->widget(Captcha::className(), [
                                    'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-6">{input}</div></div>',
                                ]) ?>
                                
                                Proseguendo accetti la nostra <a href="<?= Url::to(['site/privacy']) ?>" target="_blank" rel="noindex">Privacy Policy</a>
                                
                                <div class="form-group">
                                    <?= Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
                                </div>

                            <?php ActiveForm::end(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
