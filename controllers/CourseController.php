<?php

namespace app\controllers;

use Yii;
use app\models\Course;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * CourseController implements the CRUD actions for Course model.
 */
class CourseController extends Controller
{
    public function behaviors()
    {
        return [
        		'access' => [
        				'class' => AccessControl::className(),
        				'only' => ['index', 'view', 'create', 'update', 'delete'],
        				'rules' => [
        						[
        								'allow' => true,
        								'roles' => ['@'],
        						],
        				],
        		],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Course models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Course::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Course model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Course model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Course();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Course model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Course model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Course model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Course the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Course::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    /**
     * Finds the detailed informations about courses
     * And returns them
     */
    public function actionList() {
    	if($this->authenticate()) {
    		$course = Course::find()->all();
    		$info = array();
    		foreach ($course as $key => $value) 
    		{
    			$info[] = array(
    					"id" => $value->id,
    					"name"  => $value->name,
    					"description" => $value->description,
    					"ground"  => $value->ground,
    					"flying"  => $value->flying,
    					"pre_requisite"  => $value->pre_requisite,
    					"education" => $value->education,
    					"min_age" =>$value->min_age,
    					"solo" => $value->solo,
    					"instrument_time" => $value->instrument_time,
    					"long_description" => $value->long_description
    			);
    		}
    		echo json_encode($info);
    	} else {
    		$message = array();
    		$message["Success"] = FALSE;
    		$message["Message"] = "Incorrect username or password. Please try again.";
    		echo json_encode($message);
    	}
    	
    }
}
