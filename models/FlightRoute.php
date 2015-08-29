<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "flight_route".
 *
 * @property string $id
 * @property integer $flight_id
 * @property integer $category_id
 * @property string $destination
 * @property string $distance
 * @property string $round_trip
 * @property string $city
 */
class FlightRoute extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'flight_route';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['flight_id', 'category_id'], 'integer'],
            [['destination', 'distance', 'round_trip', 'city'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'flight_id' => 'Flight ID',
            'category_id' => 'Category ID',
            'destination' => 'Destination',
            'distance' => 'Distance',
            'round_trip' => 'Round Trip',
            'city' => 'City',
        ];
    }

    /**
     * @inheritdoc
     * @return FlightRouteQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new FlightRouteQuery(get_called_class());
    }
}
