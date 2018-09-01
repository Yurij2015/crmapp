<?php

use yii\db\Migration;

/**
 * Class m180901_104504_init_service_table
 */
class m180901_104504_init_service_table extends Migration
{
    public function up()
    {
        $this->createTable('service', [
           'id' => $this->primaryKey(),
           'name' => $this->string()->unique(),
           'hourly_rate' => $this->integer(),
        ]);
    }

    public function down()
    {
        $this->dropTable('service');
    }
}
