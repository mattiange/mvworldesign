<?php
use yii\helpers\Html;

/* @var $this \yii\web\View view component instance */
/* @var $message \yii\mail\MessageInterface the message being composed */
/* @var $content string main view render result */
?>
<?php $this->beginPage() ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=<?= Yii::$app->charset ?>" />
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <style type="text/css">
        #html-email{
        }
        #html-email .logo{
            background-image: url(../../../frontend/web/images/ico/logo/jpg/logo-MV-oro-su-sfondo-bianco-.jpg);
            background-size: 100%;
            background-repeat: no-repeat;
            width: 500px;
            height: 500px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <?php $this->beginBody() ?>
    <div id="html-email">
        <div class="logo"></div>
        <div class="content">
            <?= $content ?>
        </div>
    </div>
    <?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
