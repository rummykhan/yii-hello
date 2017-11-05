<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

$this->context->layout = 'auth';
$this->title = 'Register';
?>

<div class="panel panel-default">
    <div class="panel-heading">
        <?=$this->title?>
    </div>
    <div class="panel-body">

        <?=$this->render('../errors/error', compact('error'))?>

        <?php $form = ActiveForm::begin(); ?>

        <?=$form->field($user, 'name')?>
        <?=$form->field($user, 'email')?>
        <?=$form->field($user, 'password')->passwordInput()?>

        <p class="help-block">
            Already have an account? Goto <a href="<?=Url::to('/blog/auth/login');?>">Login</a> Page.
        </p>

        <div class="form-group">
            <?=Html::submitButton('Register', ['class' => 'btn btn-primary btn-block'])?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>