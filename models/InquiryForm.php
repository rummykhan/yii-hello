<?php

namespace app\models;

use yii\base\Model;

class InquiryForm extends Model
{
    public $name;

    public $email;

    public $subject;

    public $message;

    public function rules()
    {
        return [
            [['name', 'email', 'subject', 'message'], 'required'],
        ];
    }
}