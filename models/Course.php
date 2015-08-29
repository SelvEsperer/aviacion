<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "course".
 *
 * @property string $id
 * @property string $name
 * @property string $ground
 * @property string $flying
 * @property string $pre_requisite
 * @property string $education
 * @property string $created_by_id
 * @property string $created_by_date
 * @property string $last_modified_by_id
 * @property string $last_modified_by_date
 * @property string $min_age
 * @property string $description
 * @property string $school_id
 * @property string $solo
 * @property string $instrument_time
 */
class Course extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'course';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'ground', 'min_age'], 'required'],
            [['created_by_date', 'last_modified_by_date'], 'safe'],
            [['school_id'], 'integer'],
            [['name', 'solo', 'instrument_time'], 'string', 'max' => 100],
            [['ground', 'flying', 'created_by_id', 'last_modified_by_id', 'min_age'], 'string', 'max' => 50],
            [['pre_requisite', 'education'], 'string', 'max' => 512],
            [['description'], 'string', 'max' => 1000]
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
            'ground' => 'Ground',
            'flying' => 'Flying',
            'pre_requisite' => 'Pre Requisite',
            'education' => 'Education',
            'created_by_id' => 'Created By ID',
            'created_by_date' => 'Created By Date',
            'last_modified_by_id' => 'Last Modified By ID',
            'last_modified_by_date' => 'Last Modified By Date',
            'min_age' => 'Min Age',
            'description' => 'Description',
            'school_id' => 'School ID',
            'solo' => 'Solo',
            'instrument_time' => 'Instrument Time',
        ];
    }

    /**
     * @inheritdoc
     * @return CourseQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new CourseQuery(get_called_class());
    }
}
