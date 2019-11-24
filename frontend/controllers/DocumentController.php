<?php

namespace frontend\controllers;

use yii\rest\ActiveController;

use yii\data\ActiveDataProvider;

use frontend\models\Document;

class DocumentController extends ActiveController
{
    public $modelClass = Document::class;

    public function actions()
    {
        $actions = parent::actions();

        $actions['index']['prepareDataProvider'] = [$this, 'actionIndex'];

        $actions['view']['findModel'] = [$this, 'actionView'];

        $actions['delete']['findModel'] = [$this, 'actionDelete'];

        //$actions['create']['findModel'] = [$this, 'actionCreate'];

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
        ->one();

        $deleted->delete();

        return 'Document successfully deleted';
    }

    // public function actionCreate()
    // {
    //     $model = new $this->modelClass();

    //     if ($model->load(Yii::$app->request->post()) && $model->save()) {
    //         return 'Document successfully added';
    //     } else {
    //         return 'Please, try add ducument again';
    //     }

    //     $model->load(Yii::$app->getRequest()->getBodyParams(), '');
    //     if ($model->save()) {
    //         $response = Yii::$app->getResponse();
    //         $response->setStatusCode(201);
    //         $id = implode(',', array_values($model->getPrimaryKey(true)));
    //         $response->getHeaders()->set('Location', Url::toRoute([$this->viewAction, 'id' => $id], true));
    //     } elseif (!$model->hasErrors()) {
    //         throw new ServerErrorHttpException('Failed to create the object for unknown reason.');
    //     }
    // }
}
