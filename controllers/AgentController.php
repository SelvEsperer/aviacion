<?php

namespace app\controllers;

use Yii;
use app\models\Agent;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * AgentController implements the CRUD actions for Agent model.
 */
class AgentController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Agent models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Agent::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Agent model.
     * @param string $id
     * @param string $code
     * @return mixed
     */
    public function actionView($id, $code)
    {
        return $this->render('view', [
            'model' => $this->findModel($id, $code),
        ]);
    }

    /**
     * Creates a new Agent model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Agent();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id, 'code' => $model->code]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Agent model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @param string $code
     * @return mixed
     */
    public function actionUpdate($id, $code)
    {
        $model = $this->findModel($id, $code);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id, 'code' => $model->code]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Agent model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @param string $code
     * @return mixed
     */
    public function actionDelete($id, $code)
    {
        $this->findModel($id, $code)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Agent model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @param string $code
     * @return Agent the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id, $code)
    {
        if (($model = Agent::findOne(['id' => $id, 'code' => $code])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
