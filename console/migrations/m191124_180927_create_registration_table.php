<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%registration}}`.
 */
class m191124_180927_create_registration_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%registration}}', [
            'id' => $this->primaryKey(),
            'registration_type' => $this->smallInteger()->notNull(),
            'registration_date' => $this->date()->notNull(),
            'registration_region' => $this->string(100)->notNull(),
            'registration_city' => $this->string(100),
            'registration_district' => $this->string(100),
            'registration_locality' => $this->string(100),
            'registration_street' => $this->string(100),
            'registration_house' => $this->string(100),
            'registration_building' => $this->string(100),
            'registration_apartment' => $this->string(10),
            'registration_department_name' => $this->string(300)->notNull(),
            'document_id' => $this->integer()->notNull()
        ]);

        $this->addForeignKey(
            'fk_registration_in_document',
            '{{%registration}}',
            'document_id',
            '{{%document}}',
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
            'fk_registration_in_document',
            '{{%registration}}'
        );
        $this->dropTable('{{%registration}}');
    }
}
