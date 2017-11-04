<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>
<div class="row">
    <div class="col-md-6 col-md-offset-3">

        <?php $form = ActiveForm::begin(); ?>

        <?=$form->field($model, 'code');?>
        <?=$form->field($model, 'name');?>
        <?=$form->field($model, 'population');?>

        <div class="form-group">
            <?=Html::submitButton('Create', ['class' => 'btn btn-primary'])?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>
</div>