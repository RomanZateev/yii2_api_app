<?php

namespace frontend\controllers;

use yii\rest\ActiveController;

use frontend\models\Registration;

class RegistrationController extends ActiveController
{
    public $modelClass = Registration::class;
}