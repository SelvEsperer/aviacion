<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "booking".
 *
 * @property string $id
 * @property string $flight_category
 * @property string $destination
 * @property string $from_location
 * @property string $to_location
 * @property string $departure_date
 * @property string $arrival_date
 * @property string $passengers
 * @property string $flight_type
 * @property string $name
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
 * @property string $house_address
 * @property string $message
 * @property string $origin
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
            [['flight_category', 'destination', 'from_location', 'to_location', 'departure_date', 'arrival_date', 'passengers', 'flight_type', 'name', 'contact_number', 'email_address', 'origin'], 'required'],
            [['departure_date', 'arrival_date', 'created_by_date', 'last_modified_by_date'], 'safe'],
            [['message'], 'string'],
            [['flight_category', 'flight_type', 'country', 'state', 'city', 'zipcode', 'created_by_id', 'last_modified_by_id'], 'string', 'max' => 50],
            [['destination', 'from_location', 'to_location', 'contact_number', 'email_address', 'street_address', 'house_address', 'origin'], 'string', 'max' => 100],
            [['passengers'], 'string', 'max' => 10],
            [['name'], 'string', 'max' => 200]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'flight_category' => 'Flight Category',
            'destination' => 'Destination',
            'from_location' => 'From Location',
            'to_location' => 'To Location',
            'departure_date' => 'Departure Date',
            'arrival_date' => 'Arrival Date',
            'passengers' => 'Passengers',
            'flight_type' => 'Flight Type',
            'name' => 'Name',
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
            'house_address' => 'House Address',
            'message' => 'Message',
            'origin' => 'Origin',
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
