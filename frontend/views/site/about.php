<?php
use frontend\models\Users;

$users = Users::find()->all();
$cont = -1;

$this->title = 'I nostri designer | M&V World Design';
?>
<div id="about">
    <div class="wrapper margin-0-a container">
        <div class="row">
            <h1 class="title text-center bottom_line-gold"><?= Yii::t('app', 'Chi Siamo') ?></h1>
        </div>
        
        <?php foreach($users as $k_u => $v_u) : ?>
            <div class="row">
                <?php $cont ++ ?>
                
                <?php if($cont%2 == 0) : ?>
                <div class="col-sm-3 cover-photo">
                    <img src="<?= Yii::getAlias('@web') ?>/images/uploads/about/<?= $v_u->picture ?>" alt="<?= $v_u->name ?>" />
                </div>
                <?php endif; ?>

                <div class="col-sm-9 text-justify background-w-08">
                    <h2 class="bottom_smalline-red f-left"><?= $v_u->name ?></h2>
                    <p class="c-left" style="margin-top: 80px;"><?= $v_u->description ?></p>
                </div>
                
                <?php if($cont%2 != 0) : ?>
                <div class="col-sm-3 cover-photo">
                    <img src="<?= Yii::getAlias('@web') ?>/images/uploads/about/<?= $v_u->picture ?>" alt="<?= $v_u->name ?>" />
                </div>
                <?php endif; ?>
            </div>
        <?php endforeach; ?>
    </div>
</div>