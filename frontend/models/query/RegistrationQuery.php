<?php

namespace frontend\models\query;

/**
 * This is the ActiveQuery class for [[\frontend\models\Registration]].
 *
 * @see \frontend\models\Registration
 */
class RegistrationQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return \frontend\models\Registration[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return \frontend\models\Registration|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
