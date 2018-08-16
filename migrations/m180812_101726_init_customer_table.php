<?php

use yii\db\Migration;

/**
 * Class m180812_101726_init_customer_table
 */
class m180812_101726_init_customer_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable(
            'customer',
            [
                'id' => $this->primaryKey(),
                'name' => $this->string(),
                'birth_date' => $this->dateTime(),
                'notes' => $this->text(),
            ],
            'ENGINE=InnoDB'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('customer');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180812_101726_init_customer_table cannot be reverted.\n";

        return false;
    }
    */
}
