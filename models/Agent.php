<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "agent".
 *
 * @property string $id
 * @property string $name
 * @property string $code
 * @property string $description
 * @property string $created_by_id
 * @property string $created_by_date
 * @property string $last_modified_by_id
 * @property string $last_modified_by_date
 * @property string $image
 * @property string $title
 * @property string $contact_address
 * @property string $contact_number
 * @property string $long_description
 */
class Agent extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'agent';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['created_by_date', 'last_modified_by_date'], 'safe'],
            [['image'], 'string'],
            [['name', 'title'], 'string', 'max' => 50],
            [['code', 'created_by_id', 'last_modified_by_id', 'contact_address', 'contact_number'], 'string', 'max' => 100],
            [['description'], 'string', 'max' => 512],
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
            'code' => 'Code',
            'description' => 'Description',
            'created_by_id' => 'Created By ID',
            'created_by_date' => 'Created By Date',
            'last_modified_by_id' => 'Last Modified By ID',
            'last_modified_by_date' => 'Last Modified By Date',
            'image' => 'Image',
            'title' => 'Title',
            'contact_address' => 'Contact Address',
            'contact_number' => 'Contact Number',
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
