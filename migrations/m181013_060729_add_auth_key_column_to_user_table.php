<?php

use yii\db\Migration;

/**
 * Handles adding auth_key to table `user`.
 */
class m181013_060729_add_auth_key_column_to_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('user', 'auth_key', $this->string()->unique()->comment('Authorisation Key'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
    }
}
