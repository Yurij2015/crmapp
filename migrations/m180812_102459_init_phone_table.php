<?php

use yii\db\Migration;

/**
 * Class m180812_102459_init_phone_table
 */
class m180812_102459_init_phone_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable(
            'phone',
            [
                'id' => $this->primaryKey(),
                'customer_id' => $this->integer()->unique(),
                'number' => $this->string(),
            ],
            'ENGINE=InnoDB'
        );

        $this->addForeignKey('customer_phone_numbers', 'phone', 'customer_id', 'customer', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('customer_phone_numbers', 'phone');
        $this->dropTable('phone');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180812_102459_init_phone_table cannot be reverted.\n";

        return false;
    }
    */
}
