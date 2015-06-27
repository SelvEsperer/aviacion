<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "flight".
 *
 * @property string $id
 * @property string $name
 * @property string $description
 * @property string $image
 * @property string $speed
 * @property string $capacity
 * @property string $registration_mark
 * @property string $endurance
 * @property string $cruising_level
 * @property string $luggage_capacity
 * @property string $created_by_id
 * @property string $created_by_date
 * @property string $last_modified_by_id
 * @property string $last_modified_by_date
 */
class Flight extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'flight';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'description'], 'required'],
            [['created_by_date', 'last_modified_by_date'], 'safe'],
            [['name'], 'string', 'max' => 100],
            [['description', 'image'], 'string', 'max' => 256],
            [['speed', 'capacity', 'registration_mark', 'endurance', 'cruising_level', 'luggage_capacity', 'created_by_id', 'last_modified_by_id'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'description' => 'Description',
            'image' => 'Image',
            'speed' => 'Speed',
            'capacity' => 'Capacity',
            'registration_mark' => 'Registration Mark',
            'endurance' => 'Endurance',
            'cruising_level' => 'Cruising Level',
            'luggage_capacity' => 'Luggage Capacity',
            'created_by_id' => 'Created By ID',
            'created_by_date' => 'Created By Date',
            'last_modified_by_id' => 'Last Modified By ID',
            'last_modified_by_date' => 'Last Modified By Date',
        ];
    }

    /**
     * @inheritdoc
     * @return FlightQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new FlightQuery(get_called_class());
    }
}
