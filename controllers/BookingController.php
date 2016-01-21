<?php

namespace app\controllers;

use Yii;
use app\models\Booking;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;


/**
 * BookingController implements the CRUD actions for Booking model.
 */
class BookingController extends Controller
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
	                	'flightbook' => ['post'],	
	                ],
	            ],
	        ];
	    }

    /**
     * Lists all Booking models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Booking::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Booking model.
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
     * Creates a new Booking model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Booking();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Booking model.
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
     * Deletes an existing Booking model.
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
     * Finds the Booking model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Booking the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Booking::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    /**
     * Books Flight from a POST request
     * Sends email if booking info saved on database
     * 
     */
    public function actionFlightbook() {    
    	if($this->authenticate()) {
    	$post = file_get_contents("php://input");
    	$data = json_decode($post, true);
    	$message = array();    	
    	$book = new Booking();
    	$flag = TRUE;
    	
    	if (is_null($data['from_location'])) {
    		$message["success"] = false;
    		$message["message"] = "Booking is unsuccessful.The field 'from_location' cannot be empty. " ;
    		echo json_encode($message);
    		$flag = false;
    	} else if (is_null($data['to_location'])) {
    		$message["success"] = false;
    		$message["message"] = "Booking is unsuccessful.The field 'to_location' cannot be empty. " ;
    		echo json_encode($message);
    		$flag = false;
    	} else if (is_null($data['departure_date'])) {
    		$message["success"] = false;
    		$message["message"] = "Booking is unsuccessful.The field 'departure_date' cannot be empty. " ;
    		echo json_encode($message);
    		$flag = false;
    	} else if (is_null($data['arrival_date'])) {
    		$message["success"] = false;
    		$message["message"] = "Booking is unsuccessful.The field 'arrival_date' cannot be empty. " ;
    		echo json_encode($message);
    		$flag = false;
    	} else if (is_null($data['first_name'])) {
    		$message["success"] = false;
    		$message["message"] = "Booking is unsuccessful.The field 'first_name' cannot be empty. " ;
    		echo json_encode($message);
    		$flag = false;
    	} else if (is_null($data['last_name'])) {
    		$message["success"] = false;
    		$message["message"] = "Booking is unsuccessful.The field 'last_name' cannot be empty. " ;
    		echo json_encode($message);
    		$flag = false;
    	} else if (is_null($data['contact_number'])) {
    		$message["success"] = false;
    		$message["message"] = "Booking is unsuccessful.The field 'contact_number' cannot be empty. " ;
    		echo json_encode($message);
    		$flag = false;
    	} else if (is_null($data['email_address'])) {
    		$message["success"] = false;
    		$message["message"] = "Booking is unsuccessful.The field 'email_address' cannot be empty. " ;
    		echo json_encode($message);
    		$flag = false;
    	} 
    	
    	/*foreach ($data as $key=>$value) {
    		if (is_null($data[$key])) {
    		$message["success"] = false;
    		$message["message"] = "Booking is unsuccessful.The field '". $key . "' cannot be empty. " ;
    		echo json_encode($message);
    		$flag = false;
    		break;
    		}	
       	}*/
       	switch ($flag) {
       		case true:
       			$book->flight_type = $data['flight_type'];
       			$book->name = $data['name'];
       			$book->from_location = $data['from_location'];
       			$book->to_location = $data['to_location'];
       			$book->departure_date = $data['departure_date'];
       			$book->arrival_date = $data['arrival_date'];
       			$book->person = $data['person'];
       			$book->age = $data['age'];
       			$book->first_name = $data['first_name'];
       			$book->last_name = $data['last_name'];
       			$book->middle_name = $data['middle_name'];
       			$book->passport_number = $data['passport_number'];
       			$book->date_of_birth = $data['date_of_birth'];
       			$book->company_name = $data['company_name'];
       			$book->agent_name = $data['agent_name'];
       			$book->contact_number = $data['contact_number'];
       			$book->email_address = $data['email_address'];
       			$book->country = $data['country'];
       			$book->state = $data['state'];
       			$book->city = $data['city'];
       			$book->street_address = $data['street_address'];
       			$book->zipcode = $data['zipcode'];
       			
       			if($book->save() === true){
       				$message["success"] = TRUE;
       				$message["message"] = "Booking is successfully done! Check your email for confirmation.";
       				echo json_encode($message);
       				/*Yii::$app->mailer->compose()
       				 ->setFrom('')
       				 ->setTo('')
       				 ->setSubject('')
       				 ->setTextBody(' ')
       				 ->setHtmlBody('')
       				 ->send();
       				*/
       			}
       			break;
       		
       		}
    	}
    }
}
