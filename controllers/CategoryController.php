<?php

namespace app\controllers;

use Yii;
use app\models\Category;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Flight;
use yii\filters\AccessControl;
/**
 * CategoryController implements the CRUD actions for Category model.
 */
class CategoryController extends Controller
{
    public function behaviors()
    {
        return [
        		'access' => [
        				'class' => AccessControl::className(),
        				'only' => ['index', 'view', 'create', 'update', 'delete'],
        				'rules' => [
        						[
        								//'actions' => ['admin'],
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
     * Lists all Category models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Category::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Category model.
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
     * Creates a new Category model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Category();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Category model.
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
     * Deletes an existing Category model.
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
     * Finds the Category model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Category the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Category::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    /**
     * Shows the inforamtions about Category Model
     */
    public function actionList() {
    	if($this->authenticate()) {
    		$info = array();
    		$category = Category::find()->all();
    		foreach ($category as $key => $value) {
    			$info []=  array(
    					"id" => $value->id,
    					"name" =>$value->name,
    					"description" =>$value->description
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
     * Show info about Category model filtered by id
     */
    public function actionDetails($id) {
   		if($this->authenticate()) {
   			$category = Category::find()->where(['id'=> $id])->one();
   			$info = array(
   					"name" => $category->name,
   					"description" => $category->description
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
     * Shows list of flight filtered by code
     */
    public function actionFlights($id){
    	if($this->authenticate()) {
    	$flight = Flight::find()->where(['like', 'code', $id])->all();
    	$info = array();
   		foreach ($flight as $key=>$value) {
   			$info[] = array (
   					"name" => $value->name,
   					"description" => $value->description,
   					"image" => $value->image
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
