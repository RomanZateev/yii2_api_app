<?php

namespace frontend\controllers;

use yii\rest\ActiveController;

use yii\data\ActiveDataProvider;

use frontend\models\Document;

use Yii;

class DocumentController extends ActiveController
{
    public $modelClass = Document::class;

    public function actions()
    {
        $actions = parent::actions();

        $actions['index']['prepareDataProvider'] = [$this, 'actionIndex'];

        $actions['view']['findModel'] = [$this, 'actionView'];

        $actions['delete']['findModel'] = [$this, 'actionDelete'];

        return $actions;
    }

    public function actionIndex()
    {
        return new ActiveDataProvider([
            'query' => $this->modelClass::find()
            ->where( ['person_id' => \Yii::$app->request->get('personId') ] )
        ]);
    }

    public function actionView($id)
    {
        return new ActiveDataProvider([
            'query' => $this->modelClass::find()
            ->where( ['person_id' => \Yii::$app->request->get('personId') ] )
            ->andWhere( ['id' => $id ] )
        ]);
    }

    public function actionDelete($id)
    {
        $deleted =  $this->modelClass::find()
        ->where( ['person_id' => \Yii::$app->request->get('personId') ] )
        ->andWhere( ['id' => $id ] )
        ->one()
        ->delete();

        Yii::$app->getResponse()->setStatusCode(204);
    }
}
