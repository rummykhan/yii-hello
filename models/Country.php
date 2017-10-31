<?php

namespace app\models;

use yii\db\ActiveRecord;

class Country extends ActiveRecord
{
    static function tableName()
    {
        return 'country';
    }
}