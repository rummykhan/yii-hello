<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

$this->context->layout = 'auth';
$this->title = 'Login';

?>
<div class="panel panel-primary">
    <div class="panel-heading">
        <?=$this->title?>
    </div>
    <div class="panel-body">

        <?=$this->render('../messages/message', compact('message'))?>
        <?=$this->render('../errors/error', compact('error'))?>

        <?php $form = ActiveForm::begin(); ?>

        <?=$form->field($user, 'email');?>
        <?=$form->field($user, 'password');?>

        <p class="help-block">
            Don't have an account? goto <a href="<?=Url::to('/blog/auth/register');?>">Register</a> page.
        </p>

        <div class="form-group">
            <?=Html::submitButton('Login', ['class' => 'btn btn-primary btn-block'])?>
        </div>

        <?php ActiveForm::end(); ?>


    </div>
</div>