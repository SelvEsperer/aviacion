<?php

namespace app\controllers;

use Yii;
use app\models\Member;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use app\models\app\models;

/**
 * MemberController implements the CRUD actions for Member model.
 */
class MemberController extends Controller
{
	public $enableCsrfValidation = false;
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
     * Lists all Member models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Member::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Member model.
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
     * Creates a new Member model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Member();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Member model.
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
     * Deletes an existing Member model.
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
     * Finds the Member model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Member the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Member::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    public function actionLogin() {
    	$headers = Yii::$app->request->headers;
    	$username = null;
    	$password = null;
    	$message = array();
    	if(($headers->get('username') != null) && ($headers->get('password') != null)) {
    		$username = $headers->get('username');
    		$password = $headers->get('password');
    	} else {
    		$message["success"] = FALSE;
    		$message["message"] = "username or password cannot be empty! Please try again.";
    		return json_encode($message);
    	}
    	
    	$record = Member::find()->where(['username' => $username])->one();
    	if ($record != null && $record->password === $password) {
    		$record->status = TRUE;
    		$record->save();
    		$message["success"] = True;
    		$message["role"] = $record->role;
    		$message["first name"] = $record->first_name;
    		$message["last name"] = $record->last_name;
    		$message["message"] = "Login Successful!";
    		return json_encode($message);
    	} else {
    		$message["success"] = FALSE;
    		$message["message"] = "Incorrect username or password! Please try again.";
    		return json_encode($message);
    	}
    	
    }
    public function actionLogout() {
    	$headers = Yii::$app->request->headers;
    	$username = null;
    	$message = array();
    	while (($headers->get('username') != null)) {
    		$username = $headers->get('username');
    		$record = Member::find()->where(['username' => $username])->one();
    		if ($record != null && $record->status != FALSE){
    			$record->status = FALSE;
    			$record->save();
    			$message["success"] = True;    
    			$message["message"] = "Logout Successful!";
    			return json_encode($message);
    		} else {
    			$message["success"] = FALSE;
    			$message["message"] = "Please login to continue.";
    			return json_encode($message);
    		}
    	}
    }
}
