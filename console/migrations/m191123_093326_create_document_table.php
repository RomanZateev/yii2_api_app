<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%document}}`.
 */
class m191123_093326_create_document_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%document}}', [
            'id' => $this->primaryKey(),
            'series' => $this->string(4)->notNull(),
            'number' => $this->string(6)->notNull(),
            'date_of_receiving' => $this->date()->notNull(),
            'document_issuing_locality' => $this->string(50),
            'department_name' => $this->string(50)->notNull(),
            'department_code' => $this->string(7)->notNull(),
            'type' => $this->smallInteger()->notNull(),
            'person_id' => $this->integer()->notNull()
        ]);

        $this->addForeignKey(
            'fk_document_of_person',
            '{{%document}}',
            'person_id',
            '{{%person}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey(
            'fk_document_of_person',
            '{{%document}}'
        );
        $this->dropTable('{{%document}}');
    }
}
