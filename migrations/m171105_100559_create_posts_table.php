<?php

use yii\db\Migration;

/**
 * Handles the creation of table `posts`.
 */
class m171105_100559_create_posts_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('posts', [
            'id' => $this->primaryKey(),
            'title' => $this->string(128),
            'slug' => $this->string(255),
            'content' => $this->text(),
            'user_id' => $this->integer(11)->notNull(),
            'created_at' => $this->dateTime(),
        ]);

        $this->addForeignKey('fk-post-user-id', 'posts', 'user_id', 'users', 'id', 'CASCADE', 'CASCADE');
        $this->createIndex('index-post-title', 'posts', 'title', true);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('posts');
    }
}
