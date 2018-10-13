<?php

use yii\db\Migration;

/**
 * Handles the creation of table `user`.
 */
class m181012_195951_create_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('user', [
            'id' => $this->primaryKey(),
            'username' => $this->string()->unique()->comment('User'),
            'password' => $this->string()->comment('Password'),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('user');
    }
}
