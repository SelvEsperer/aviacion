<?php

namespace app\controllers;

use Yii;
use app\models\Flight;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use app\models\FlightRoute;

/**
 * FlightController implements the CRUD actions for Flight model.
 */
class FlightController extends Controller
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
     * Lists all Flight models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Flight::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Flight model.
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
     * Creates a new Flight model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Flight();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Flight model.
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
     * Deletes an existing Flight model.
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
     * Finds the Flight model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Flight the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Flight::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    /**
     * Shows flight list by category
     * @param string $id
     */
    public function actionCategory($id) {
    	if($this->authenticate()) {
    		$flights = Flight::find()->where(['category_id' => $id])->all();
    		$info = array();
    		foreach ($flights as $key => $value) {
    			$info[] = array(
    					"id"  => $value->id,
    					"category_id" => $value->category_id,
    					"name"  => $value->name,
    					"description"  => $value->description
    		
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
     * Show info about Flight Route 
     */
    public function actionRoute($id){
   		if($this->authenticate()) {
   			$route = FlightRoute::find()->where(['category_id' => $id])->all();
   			$info = array();
   			foreach ($route as $key => $value) {
   				$info[] = array(
   						"id" => $value->id,
   						"destination" => $value->destination,
   						"distance" => $value->distance,
   						"roundtrip" => $value->round_trip,
   						"city" => $value->city,
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
     * Shows the inforamtions about Flight Model
     * Filtered by ID
     * 
     */
    public function actionDetails($id) {
   		if($this->authenticate()) {
   			$flight = Flight::find()->where(['id' => $id])->one();
   			$info = array(
   					"name"  => $flight->name,
   					"image" =>$flight->image,
   					"description"  => $flight->description,
   					"speed"  => $flight->speed,
   					"capacity"  => $flight->capacity,
   					"resgistration_mark" => $flight->registration_mark,
   					"endurance" => $flight->endurance,
   					"cruising_level" => $flight->cruising_level,
   					"luggage_capacity" => $flight->luggage_capacity
   			);
   			 
   			echo json_encode($info);
   		} else {
    		$message = array();
    		$message["Success"] = FALSE;
    		$message["Message"] = "Incorrect username or password. Please try again.";
    		echo json_encode($message);
    	}
    	
    }
    
}
