<?php

use yii\db\Migration;

/**
 * Handles the creation of table `countries`.
 */
class m171106_150718_create_countries_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('countries', [
            'code' => $this->string(2),
            'name' => $this->string(64),
            'population' => $this->integer(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('countries');
    }
}
