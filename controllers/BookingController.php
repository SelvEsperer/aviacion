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
     * Receive an enquery request using POST
     * sends email to the 
     */
    
     
    public function actionEnquery(){
    	if($this->authenticate()){
    		$post = file_get_contents("php://input");
    		$data = json_decode($post,true);
    		$message = array();
    		$flag = TRUE;
	    		  		
    		if(is_null($data['name'])){
    			$message["success"] = false;
    			$message["message"] = "Enquery is unsuccessful.The field 'name' cannot be empty. ";
    			echo json_encode($message);
    			$flag = false;
    		}
    		
    		else if(is_null($data['email'])){
    			$message["success"] = false;
    			$message["message"] = "Enquery is unsuccessful.The field 'email' cannot be empty. ";
    			echo json_encode($message);
    			$flag = false;
    		}
    		else if(is_null($data['subject'])){
    			$message["success"] = false;
    			$message["message"] = "Enquery is unsuccessful.The field 'subject' cannot be empty. ";
    			echo json_encode($message);
    			$flag = false;
    		}
    		else if(is_null($data['message'])){
    			$message["success"] = false;
    			$message["message"] = "Enquery is unsuccessful.The field 'message' cannot be empty. ";
    			echo json_encode($message);
    			$flag = false;
    		}   		
    		switch ($flag){
    			case true:
    				$message["success"] = TRUE;
    				$message["message"] = "Enquery is successfully done!";
    				echo json_encode($message);
    				
    				
    				Yii::$app->mailer->compose()
    				->setFrom($data['email'])
    				->setTo('school@arirangaviation.com')
    				->setSubject($data['subject'])
    				->setHtmlBody(
    						'<br><b>Information</b><br><hr>'.
    						'<br><b>Name : </b>'.$data['name'].
    						'<br><b>Mesage : </b>'.$data['message'])
    				->send();
    		}
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
    	} else if (is_null($data['passengers'])) {
    		$message["success"] = false;
    		$message["message"] = "Booking is unsuccessful.The field 'passengers' cannot be empty. " ;
    		echo json_encode($message);
    		$flag = false;
    	} else if (is_null($data['flight_type'])) {
    		$message["success"] = false;
    		$message["message"] = "Booking is unsuccessful.The field 'flight_type' cannot be empty. " ;
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
    	} else if (is_null($data['flight_category'])) {
    		$message["success"] = false;
    		$message["message"] = "Booking is unsuccessful.The field 'flight_ category' cannot be empty. " ;
    		echo json_encode($message);
    		$flag = false;
    	} else if (is_null($data['destination'])) {
    		$message["success"] = false;
    		$message["message"] = "Booking is unsuccessful.The field 'destination' cannot be empty. " ;
    		echo json_encode($message);
    		$flag = false;
    	}
    	else if (is_null($data['origin'])) {
    		$message["success"] = false;
    		$message["message"] = "Booking is unsuccessful.The field 'origin' cannot be empty. " ;
    		echo json_encode($message);
    		$flag = false;
    	}
    	else if (is_null($data['contact_number'])) {
    		$message["success"] = false;
    		$message["message"] = "Booking is unsuccessful.The field 'contact_number' cannot be empty. " ;
    		echo json_encode($message);
    		$flag = false;
    	} else if (is_null($data['email_address'])) {
    		$message["success"] = false;
    		$message["message"] = "Booking is unsuccessful.The field 'email_address' cannot be empty. " ;
    		echo json_encode($message);
    		$flag = false;
    	} else if (is_null($data['name'])) {
    		$message["success"] = false;
    		$message["message"] = "Booking is unsuccessful.The field 'name' cannot be empty. " ;
    		echo json_encode($message);
    		$flag = false;
    	}
    	
    	foreach ($data as $key=>$value) {
    		if (is_null($data[$key])) {
    		$message["success"] = false;
    		$message["message"] = "Booking is unsuccessful.The field '". $key . "' cannot be empty. " ;
    		echo json_encode($message);
    		$flag = false;
    		break;
    		}	
       	}
       	       	
       	switch ($flag) {
       		case true:
       			$book->flight_category = $data['flight_category'];
       			$book->destination = $data['destination'];
       			$book->origin = $data['origin'];
       			$book->from_location = $data['from_location'];
       			$book->to_location = $data['to_location'];
       			$book->departure_date = $data['departure_date'];
       			$book->arrival_date = $data['arrival_date'];
       			$book->passengers = $data['passengers'];
       			$book->flight_type = $data['flight_type'];
       			$book->name = $data['name'];
       			
       			$book->contact_number = $data['contact_number'];
       			$book->email_address = $data['email_address'];
       			$book->country = $data['country'];
       			$book->state = $data['state'];
       			$book->city = $data['city'];
       			$book->street_address = $data['street_address'];
       			$book->zipcode = $data['zipcode'];
       			$book->house_address = $data['house_address'];
       			$book->message = $data['message'];
     			
       			if($book->save() === true){
       				$visit = false;
       				$message["success"] = TRUE;
       				$message["message"] = "Booking is successfully done! Check your email for confirmation.";
       				echo json_encode($message);
       				
       				if($visit==false)
       				{
	       				  Yii::$app->mailer->compose()
	       				 ->setFrom('arirang@selvesperer.com')
	       				 ->setTo(array('sales@arirangaviation.com','flightops@arirangaviation.com'))
	       				 //->setCc('junaid_fahad@rocketmail.com')
	       				 //->setTextBody($data['name'])
	       				 ->setSubject('Booking details for '.$data['name'])

	       				 ->setHtmlBody('<br><b>Flight Information</b><br><hr>'.
	       				 		'<br><b>Flight Category : </b>'.$data['flight_category'].
	       				 		'<br><b>Flight Destination : </b>'.$data['destination'].
	       				 		'<br><b>Flight Origin : </b>'.$data['origin'].
	       				 		'<br><b>Arrival From : </b>'.$data['from_location'].
	       				 		'<br><b>Arrived To : </b>'.$data['to_location'].
	       				 		'<br><b>Departure Date : </b>'.$data['departure_date'].
	       				 		'<br><b>Arrival Date : </b>'.$data['arrival_date'].
	       				 		'<br><b>Number of Passenger : </b>'.$data['passengers'].
	       				 		'<br><b>Type of Flight : </b>'.$data['flight_type'].
	       				 		'<br><br><br><b>Personal Information</b><br><hr>'.
	       				 		'<br><b>Name : </b>'.$data['name'].
	       				 		'<br><b>Contact Information : </b>'.$data['contact_number'].
	       				 		'<br><b>Email Address : </b>'.$data['email_address'].
	       				 		'<br><b>Country : </b>'.$data['country'].
	       				 		'<br><b>State : </b>'.$data['state'].
	       				 		'<br><b>City : </b>'.$data['city'].
	       				 		'<br><b>Street Address : </b>'.$data['street_address'].
	       				 		'<br><b>Zipcode : </b>'.$data['zipcode'].
	       				 		'<br><b>House Address : </b>'.$data['house_address'].
	       				 		'<br><b>Message : </b>'.$data['message'])
	       				 ->send();
	       				  $visit = true;
       				}
       				if($visit==true)
       				{
       					Yii::$app->mailer->compose()
       					->setFrom('arirang@selvesperer.com')
       					->setTo($data['email_address'])
       					->setSubject('Booking is successfully done.')
       					//->setTextBody($data['name'])
       					->setHtmlBody('<br>Congratulations! '.$data['name'].'<br>
							Your booking has been successfully completed. Our sales team will contact with you soon.<br><br>
       						Thanks,<br> 
							Arirang, Sales Team<br>
       						sales@arirangaviation.com')
       					->send();
       				}
       			}
       			break;
       		}
    	}
    }
}
