<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "activity".
 *
 * @property string $id
 * @property string $school_id
 * @property string $name
 * @property string $description
 * @property string $image1
 * @property string $image2
 * @property string $image3
 * @property string $code
 * @property string $long_description
 */
class Activity extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'activity';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['school_id', 'name', 'description', 'code'], 'required'],
            [['school_id'], 'integer'],
            [['image1', 'image2', 'image3'], 'string'],
            [['name', 'code'], 'string', 'max' => 50],
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
            'school_id' => 'School ID',
            'name' => 'Name',
            'description' => 'Description',
            'image1' => 'Image1',
            'image2' => 'Image2',
            'image3' => 'Image3',
            'code' => 'Code',
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
