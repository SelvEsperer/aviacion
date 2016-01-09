<?php

namespace app\controllers;

use Yii;
use app\models\Company;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use app\models\Contact;

/**
 * CompanyController implements the CRUD actions for Company model.
 */
class CompanyController extends Controller
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
     * Lists all Company models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Company::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Company model.
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
     * Creates a new Company model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Company();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Company model.
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
     * Deletes an existing Company model.
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
     * Finds the Company model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Company the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Company::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    /**
     * Shows the inforamtions about Company Model
     */
    public function actionList() {
    	if($this->authenticate()) {
    		$company = Company::find()->where(['code' => 'ARIRANG'])->one();
    		$info = array(
    				"id"  => $company->id,
    				"name"  => $company->name,
    				"description"  => $company->description,
    				"address"  => $company->address,
    				"phone"  => $company->phone,
    				"mobile"  => $company->mobile,
    				"email"  => $company->email,
    				"visit_us"  => $company->visit_us,
    				"facebook"  => $company->facebook,
    				"twitter"  => $company->twitter,
    				"googleplus"  => $company->googleplus,
    				"linkedin"  => $company->linkedin,
    				"title"  => $company->title
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
     * Shows Contact info about company
     */
    public function actionContacts($id) {
    	if($this->authenticate()) {
    		$contacts = Contact::find()->where(['company_id' => $id])->all();
    		$info = array();
    		foreach ($contacts as $key => $value) {
    			$info[] = array(
    					"id"  => $value->id,
    					"title" => $value->title,
    					"subtitle" => $value->subtitle,
    					"email"  => $value->email,
    					"phone"  => $value->phone,
    					"mobile"  => $value->mobile
    		
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
