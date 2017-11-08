<?php

namespace app\modules\blog;

use Yii\Base\Module as BaseModule;

class Module extends BaseModule
{
    public function init()
    {
        parent::init();
        \Yii::configure($this, require __DIR__ . '/config.php');
    }
}