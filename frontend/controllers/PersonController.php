<?php

namespace frontend\controllers;

use yii\rest\ActiveController;

use frontend\models\Person;

class PersonController extends ActiveController
{
    public $modelClass = Person::class;
}
