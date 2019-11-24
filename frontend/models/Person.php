<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "{{%person}}".
 *
 * @property int $id
 * @property string $first_name
 * @property string $last_name
 * @property string $patronymic
 * @property string $date_of_birth
 * @property int $sex
 *
 * @property Document[] $documents
 */
class Person extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%person}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['first_name', 'last_name', 'date_of_birth', 'sex'], 'required'],
            [['date_of_birth'], 'safe'],
            [['sex'], 'integer'],
            [['first_name', 'last_name', 'patronymic'], 'string', 'max' => 50],
        ];
    }
    
    public function extraFields()
    {
        return [
            'documents'
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'first_name' => 'Имя',
            'last_name' => 'Фамилия',
            'patronymic' => 'Отчество',
            'date_of_birth' => 'Дата рождения',
            'sex' => 'Пол',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDocuments()
    {
        return $this->hasMany(Document::className(), ['person_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return \frontend\models\query\PersonQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \frontend\models\query\PersonQuery(get_called_class());
    }
}
