<?php

namespace app\models;

use yii\db\ActiveRecord;

class Country extends ActiveRecord
{
    static function tableName()
    {
        return 'countries';
    }

    public function rules()
    {
        return [
            [['code', 'name', 'population'], 'required'],
            ['code', 'string', 'length' => 2],
            ['population', 'integer'],
        ];
    }
}