<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "{{%registration}}".
 *
 * @property int $id
 * @property int $registration_type
 * @property string $registration_date
 * @property string $registration_region
 * @property string $registration_city
 * @property string $registration_district
 * @property string $registration_locality
 * @property string $registration_street
 * @property string $registration_house
 * @property string $registration_building
 * @property string $registration_apartment
 * @property string $registration_department_name
 * @property int $document_id
 *
 * @property Document $document
 */
class Registration extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%registration}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['registration_type', 'registration_date', 'registration_region', 'registration_department_name', 'document_id'], 'required'],
            [['registration_type', 'document_id'], 'integer'],
            [['registration_date'], 'safe'],
            [['registration_region', 'registration_city', 'registration_district', 'registration_locality', 'registration_street', 'registration_house', 'registration_building'], 'string', 'max' => 100],
            [['registration_apartment'], 'string', 'max' => 10],
            [['registration_department_name'], 'string', 'max' => 300],
            [['document_id'], 'exist', 'skipOnError' => true, 'targetClass' => Document::className(), 'targetAttribute' => ['document_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'registration_type' => 'Registration Type',
            'registration_date' => 'Registration Date',
            'registration_region' => 'Registration Region',
            'registration_city' => 'Registration City',
            'registration_district' => 'Registration District',
            'registration_locality' => 'Registration Locality',
            'registration_street' => 'Registration Street',
            'registration_house' => 'Registration House',
            'registration_building' => 'Registration Building',
            'registration_apartment' => 'Registration Apartment',
            'registration_department_name' => 'Registration Department Name',
            'document_id' => 'Document ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDocument()
    {
        return $this->hasOne(Document::className(), ['id' => 'document_id']);
    }

    /**
     * {@inheritdoc}
     * @return \frontend\models\query\RegistrationQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \frontend\models\query\RegistrationQuery(get_called_class());
    }
}
