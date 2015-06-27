<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "status".
 *
 * @property string $id
 * @property string $flight_type
 * @property string $name
 * @property string $flight_no
 * @property string $availability
 * @property string $created_by_id
 * @property string $created_by_date
 * @property string $last_modified_by_id
 * @property string $last_modified_by_date
 */
class Status extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'status';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['created_by_date', 'last_modified_by_date'], 'safe'],
            [['flight_type', 'availability', 'created_by_id', 'last_modified_by_id'], 'string', 'max' => 50],
            [['name', 'flight_no'], 'string', 'max' => 100]
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
            'flight_no' => 'Flight No',
            'availability' => 'Availability',
            'created_by_id' => 'Created By ID',
            'created_by_date' => 'Created By Date',
            'last_modified_by_id' => 'Last Modified By ID',
            'last_modified_by_date' => 'Last Modified By Date',
        ];
    }

    /**
     * @inheritdoc
     * @return StatusQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new StatusQuery(get_called_class());
    }
}
