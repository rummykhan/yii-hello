<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>

<?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-md-6 col-md-offset-3">

            <?=$form->field($model, 'code');?>
            <?=$form->field($model, 'name');?>
            <?=$form->field($model, 'population');?>

            <div class="form-group">
                <?=Html::submitButton('Update', ['class' => 'btn btn-primary']);?>
            </div>
        </div>
    </div>

<?php ActiveForm::end(); ?>