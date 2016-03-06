<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "announcement".
 *
 * @property string $id
 * @property string $title
 * @property string $description
 * @property string $type
 * @property string $duration
 * @property string $created_by_id
 * @property string $created_by_date
 * @property string $last_modified_by_id
 * @property string $last_modified_by_date
 * @property string $code
 * @property string $date
 * @property string $long_description
 */
class Announcement extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'announcement';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'title', 'code', 'date'], 'required'],
            [['id'], 'integer'],
            [['duration', 'created_by_date', 'last_modified_by_date', 'date'], 'safe'],
            [['title', 'created_by_id', 'last_modified_by_id', 'code'], 'string', 'max' => 50],
            [['description'], 'string', 'max' => 512],
            [['type'], 'string', 'max' => 100],
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
            'title' => 'Title',
            'description' => 'Description',
            'type' => 'Type',
            'duration' => 'Duration',
            'created_by_id' => 'Created By ID',
            'created_by_date' => 'Created By Date',
            'last_modified_by_id' => 'Last Modified By ID',
            'last_modified_by_date' => 'Last Modified By Date',
            'code' => 'Code',
            'date' => 'Date',
            'long_description' => 'Long Description',
        ];
    }

    /**
     * @inheritdoc
     * @return AgentQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new AgentQuery(get_called_class());
    }
}
