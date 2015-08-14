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
            [['school_id'], 'integer'],
            [['image1', 'image2', 'image3'], 'string'],
            [['name'], 'string', 'max' => 50],
            [['description'], 'string', 'max' => 512]
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
        ];
    }

    /**
     * @inheritdoc
     * @return ActivityQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ActivityQuery(get_called_class());
    }
}
