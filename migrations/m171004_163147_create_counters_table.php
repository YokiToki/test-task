<?php

use yii\db\Migration;

/**
 * Handles the creation of table `Counters`.
 */
class m171004_163147_create_counters_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('Counters', [
            'Counter_id' => $this->primaryKey(),
            'Serial_number' => $this->string()->notNull(),
            'Name' => $this->string()->defaultValue(null),
            'Date_install' => $this->timestamp()->notNull(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('Counters');
    }
}
