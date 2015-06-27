<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "course".
 *
 * @property string $id
 * @property string $name
 * @property string $duration
 * @property string $fees
 * @property string $details
 * @property string $session
 * @property string $created_by_id
 * @property string $created_by_date
 * @property string $last_modified_by_id
 * @property string $last_modified_by_date
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
            [['name', 'duration'], 'required'],
            [['created_by_date', 'last_modified_by_date'], 'safe'],
            [['name'], 'string', 'max' => 100],
            [['duration', 'fees', 'session', 'created_by_id', 'last_modified_by_id'], 'string', 'max' => 50],
            [['details'], 'string', 'max' => 512]
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
            'duration' => 'Duration',
            'fees' => 'Fees',
            'details' => 'Details',
            'session' => 'Session',
            'created_by_id' => 'Created By ID',
            'created_by_date' => 'Created By Date',
            'last_modified_by_id' => 'Last Modified By ID',
            'last_modified_by_date' => 'Last Modified By Date',
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
