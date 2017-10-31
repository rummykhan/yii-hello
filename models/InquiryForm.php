<?php

namespace app\models;

use yii\base\Model;

class InquiryForm extends Model
{
    public $name;

    public $email;

    public $subject;

    public $message;

    public $captcha;

    public function rules()
    {
        return [
            [['name', 'email', 'subject', 'message'], 'required'],
            ['email', 'email'],
            ['captcha', 'captcha'],
        ];
    }

    public function attributeLabels()
    {
        return [
          'captcha' => "Prove you're a human."
        ];
    }
}