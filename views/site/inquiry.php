<?php

use yii\captcha\Captcha;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>

<?php $form = ActiveForm::begin(['enableClientValidation' => false]); ?>

<div class="row">
    <div class="col-md-6 col-md-offset-3">

        <?=$form->field($model, 'name');?>
        <?=$form->field($model, 'email');?>
        <?=$form->field($model, 'subject');?>

        <?=$form->field($model, 'message')->textarea(['rows' => '6']);?>

        <?=$form->field($model, 'captcha')->widget(Captcha::className(), [
            'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-6">{input}</div></div>',
        ])?>

        <div class="form-group">
            <?=Html::submitButton('Submit', ['class' => 'btn btn-primary'])?>
        </div>

    </div>
</div>

<?php ActiveForm::end(); ?>
