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
 * @property string $country_of_birth
 * @property string $region_of_birth
 * @property string $city_of_birth
 * @property string $district_of_birth
 * @property string $locality_of_birth
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
            [['first_name', 'last_name', 'patronymic', 'country_of_birth', 'region_of_birth', 'city_of_birth', 'district_of_birth', 'locality_of_birth'], 'trim'],
            [['first_name', 'last_name', 'date_of_birth', 'sex'], 'required'],
            [['date_of_birth'], 'safe'],
            ['sex', 'in', 'range' => [0, 1]],
            [['sex'], 'integer'],
            [['first_name', 'last_name', 'patronymic'], 'string', 'max' => 50],
            [['country_of_birth', 'region_of_birth', 'city_of_birth', 'district_of_birth', 'locality_of_birth'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'patronymic' => 'Patronymic',
            'date_of_birth' => 'Date Of Birth',
            'country_of_birth' => 'Country Of Birth',
            'region_of_birth' => 'Region Of Birth',
            'city_of_birth' => 'City Of Birth',
            'district_of_birth' => 'District Of Birth',
            'locality_of_birth' => 'Locality Of Birth',
            'sex' => 'Sex',
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
