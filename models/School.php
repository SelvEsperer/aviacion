<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "school".
 *
 * @property string $id
 * @property string $name
 * @property string $description
 * @property string $about
 * @property string $email
 * @property string $address
 * @property string $created_by_id
 * @property string $created_by_date
 * @property string $last_modified_by_id
 * @property string $last_modified_by_date
 * @property string $simulation_info
 * @property string $safety_program
 */
class School extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'school';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['created_by_date', 'last_modified_by_date'], 'safe'],
            [['name'], 'string', 'max' => 100],
            [['description'], 'string', 'max' => 512],
            [['about', 'simulation_info', 'safety_program'], 'string', 'max' => 200],
            [['email', 'address', 'created_by_id', 'last_modified_by_id'], 'string', 'max' => 50]
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
            'about' => 'About',
            'email' => 'Email',
            'address' => 'Address',
            'created_by_id' => 'Created By ID',
            'created_by_date' => 'Created By Date',
            'last_modified_by_id' => 'Last Modified By ID',
            'last_modified_by_date' => 'Last Modified By Date',
            'simulation_info' => 'Simulation Info',
            'safety_program' => 'Safety Program',
        ];
    }

    /**
     * @inheritdoc
     * @return SchoolQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new SchoolQuery(get_called_class());
    }
}
