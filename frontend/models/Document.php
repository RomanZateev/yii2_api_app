<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "{{%document}}".
 *
 * @property int $id
 * @property string $series
 * @property string $number
 * @property string $date_of_receiving
 * @property string $document_issuing_locality
 * @property string $department_name
 * @property string $department_code
 * @property int $type
 * @property int $person_id
 *
 * @property Person $person
 * @property Registration[] $registrations
 */
class Document extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%document}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['series', 'number', 'date_of_receiving', 'department_name', 'department_code', 'type', 'person_id'], 'required'],
            [['date_of_receiving'], 'safe'],
            [['type', 'person_id'], 'integer'],
            [['series'], 'string', 'max' => 4],
            [['number'], 'string', 'max' => 6],
            [['document_issuing_locality', 'department_name'], 'string', 'max' => 50],
            [['department_code'], 'string', 'max' => 7],
            [['person_id'], 'exist', 'skipOnError' => true, 'targetClass' => Person::className(), 'targetAttribute' => ['person_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'series' => 'Series',
            'number' => 'Number',
            'date_of_receiving' => 'Date Of Receiving',
            'document_issuing_locality' => 'Document Issuing Locality',
            'department_name' => 'Department Name',
            'department_code' => 'Department Code',
            'type' => 'Type',
            'person_id' => 'Person ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPerson()
    {
        return $this->hasOne(Person::className(), ['id' => 'person_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRegistrations()
    {
        return $this->hasMany(Registration::className(), ['document_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return \frontend\models\query\DocumentQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \frontend\models\query\DocumentQuery(get_called_class());
    }
}
