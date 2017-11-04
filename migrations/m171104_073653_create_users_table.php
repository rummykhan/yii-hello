<?php

use yii\db\Migration;

/**
 * Handles the creation of table `users`.
 */
class m171104_073653_create_users_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('users', [
            'id' => $this->primaryKey(),
            'name' => $this->string(64),
            'email' => $this->string(128)->unique(),
            'password' => $this->string(60),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('users');
    }
}
