<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%person}}`.
 */
class m191123_091927_create_person_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%person}}', [
            'id' => $this->primaryKey(),
            'first_name' => $this->string(50)->notNull(),
            'last_name' => $this->string(50)->notNull(),
            'patronymic' => $this->string(50),
            'date_of_birth' => $this->date()->notNull(),
            'country_of_birth' => $this->string(100),
            'region_of_birth' => $this->string(100),
            'city_of_birth' => $this->string(100),
            'district_of_birth' => $this->string(100),
            'locality_of_birth' => $this->string(100),
            'sex' => $this->boolean()->notNull()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%person}}');
    }
}
