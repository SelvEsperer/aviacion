<?php

namespace app\controllers;

use Yii;
use app\models\School;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use app\models\Activity;
use app\models\Course;

/**
 * SchoolController implements the CRUD actions for School model.
 */
class SchoolController extends Controller
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
     * Lists all School models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => School::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single School model.
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
     * Creates a new School model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new School();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing School model.
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
     * Deletes an existing School model.
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
     * Finds the School model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return School the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = School::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    /**
     * Shows the inforamtions about School Model
     */
    public function actionList() {
    	if($this->authenticate()) {
    		$school = School::find()->one();
    		$info = array(
    				"name"  => $school->name,
    				"description"  => $school->description,
    				"about"  => $school->about,
    				"address"  => $school->address,
    				"email"  => $school->email,
    				"simulation_info" =>$school->simulation_info,
    				"safety_program" =>$school->safety_program
    		);
    		echo json_encode($info);
    	} else {
    		$message = array();
    		$message["Success"] = FALSE;
    		$message["Message"] = "Incorrect username or password. Please try again.";
    		echo json_encode($message);
    	}
    	
    }
    /**
     * Shows info about School Activities by id
     */
    public function actionActivities($id){
    	if($this->authenticate()) {
    		$activity = Activity::find()->where(['code' => $id])->all();
    		$info = array();
    		foreach ($activity as $key =>$value) {
    			$info[] = array(
    					"id" => $value->id,
    					"name" => $value->name,
    					"description" => $value->description,
    					"image1" => $value->image1,
    					"image2" => $value->image2,
    					"image3" => $value->image3
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
    
    /**
     * Finds info of course by id
     */
    public function actionCourses($id) {
    	if($this->authenticate()) {
    		$contacts = Course::find()->where(['school_id' => $id])->all();
    		$info = array();
    		foreach ($contacts as $key => $value) {
    			$info[] = array(
    					"id"  => $value->id,
    					"name"  => $value->name,
    					"description" => $value->description,
    					"ground"  => $value->ground,
    					"flying"  => $value->flying,
    					"pre_requisite"  => $value->pre_requisite,
    					"education" => $value->education,
    					"instrument_time" => $value->instrument_time,
    					"solo" => $value->solo,
    					"min_age" =>$value->min_age
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
