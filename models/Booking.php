<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "booking".
 *
 * @property string $id
 * @property string $flight_type
 * @property string $name
 * @property string $from_location
 * @property string $to_location
 * @property string $departure_date
 * @property string $arrival_date
 * @property string $person
 * @property string $age
 * @property string $last_name
 * @property string $first_name
 * @property string $middle_name
 * @property string $passport_number
 * @property string $date_of_birth
 * @property string $company_name
 * @property string $agent_name
 * @property string $contact_number
 * @property string $email_address
 * @property string $country
 * @property string $street_address
 * @property string $state
 * @property string $city
 * @property string $zipcode
 * @property string $created_by_id
 * @property string $created_by_date
 * @property string $last_modified_by_id
 * @property string $last_modified_by_date
 */
class Booking extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'booking';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['departure_date', 'arrival_date', 'person', 'date_of_birth', 'created_by_date', 'last_modified_by_date'], 'safe'],
            [['age'], 'integer'],
            [['flight_type', 'last_name', 'first_name', 'middle_name', 'contact_number', 'email_address', 'country', 'street_address', 'state', 'city', 'zipcode', 'created_by_id', 'last_modified_by_id'], 'string', 'max' => 50],
            [['name', 'from_location', 'to_location', 'passport_number', 'company_name', 'agent_name'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'flight_type' => 'Flight Type',
            'name' => 'Name',
            'from_location' => 'From Location',
            'to_location' => 'To Location',
            'departure_date' => 'Departure Date',
            'arrival_date' => 'Arrival Date',
            'person' => 'Person',
            'age' => 'Age',
            'last_name' => 'Last Name',
            'first_name' => 'First Name',
            'middle_name' => 'Middle Name',
            'passport_number' => 'Passport Number',
            'date_of_birth' => 'Date Of Birth',
            'company_name' => 'Company Name',
            'agent_name' => 'Agent Name',
            'contact_number' => 'Contact Number',
            'email_address' => 'Email Address',
            'country' => 'Country',
            'street_address' => 'Street Address',
            'state' => 'State',
            'city' => 'City',
            'zipcode' => 'Zipcode',
            'created_by_id' => 'Created By ID',
            'created_by_date' => 'Created By Date',
            'last_modified_by_id' => 'Last Modified By ID',
            'last_modified_by_date' => 'Last Modified By Date',
        ];
    }

    /**
     * @inheritdoc
     * @return BookingQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new BookingQuery(get_called_class());
    }
}
