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
 * @property integer $category_id
 * @property string $code
 * @property string $image2
 * @property string $image3
 * @property string $long_description
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
            [['name', 'description', 'category_id', 'code'], 'required'],
            [['image', 'image2', 'image3'], 'string'],
            [['created_by_date', 'last_modified_by_date'], 'safe'],
            [['category_id'], 'integer'],
            [['name'], 'string', 'max' => 100],
            [['description'], 'string', 'max' => 256],
            [['speed', 'capacity', 'registration_mark', 'endurance', 'cruising_level', 'luggage_capacity', 'created_by_id', 'last_modified_by_id', 'code'], 'string', 'max' => 50],
            [['long_description'], 'string', 'max' => 2048]
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
            'category_id' => 'Category ID',
            'code' => 'Code',
            'image2' => 'Image2',
            'image3' => 'Image3',
            'long_description' => 'Long Description',
        ];
    }

    /**
     * @inheritdoc
     * @return CategoryQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new CategoryQuery(get_called_class());
    }
}
