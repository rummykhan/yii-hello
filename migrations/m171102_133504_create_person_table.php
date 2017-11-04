<?php

use yii\db\Migration;

/**
 * Handles the creation of table `person`.
 */
class m171102_133504_create_person_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('person', [
            'id' => $this->primaryKey(),
            'name' => $this->string(25),
            'age' => $this->smallInteger(),
            'city' => $this->string(64),
            'country' => $this->string(64),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('person');
    }
}
