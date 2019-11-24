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
            'date_of_issue' => $this->date()->notNull(),
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
