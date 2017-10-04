<?php

use yii\db\Migration;

/**
 * Handles the creation of table `Values`.
 */
class m171004_165434_create_values_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('Values', [
            'Value_id' => $this->primaryKey(),
            'Counter_id' => $this->integer()->notNull(),
            'Value' => $this->double()->notNull(),
            'Date' => $this->timestamp()->notNull(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('Values');
    }
}
