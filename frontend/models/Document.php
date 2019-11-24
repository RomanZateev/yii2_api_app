<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "{{%document}}".
 *
 * @property int $id
 * @property int $series
 * @property int $number
 * @property string $date_of_issue
 * @property int $type
 * @property int $person_id
 *
 * @property Person $person
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
            [['series', 'number', 'date_of_issue', 'type', 'person_id'], 'required'],
            [['series', 'number', 'type', 'person_id'], 'integer'],
            [['date_of_issue'], 'safe'],
            [['person_id'], 'exist', 'skipOnError' => true, 'targetClass' => Person::className(), 'targetAttribute' => ['person_id' => 'id']],
        ];
    }

    public function fields()
    {
        return [
            'id', 'series', 'number', 'date_of_issue', 'type'
        ];
    }

    public function extraFields()
    {
        return [
           'person_id' 
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'series' => 'Серия',
            'number' => 'Номер',
            'date_of_issue' => 'Дата выдачи',
            'type' => 'Тип',
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
     * {@inheritdoc}
     * @return \frontend\models\query\DocumentQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \frontend\models\query\DocumentQuery(get_called_class());
    }
}
