<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "member_type".
 *
 * @property string $id
 * @property string $name
 * @property string $description
 * @property string $role
 * @property string $created_by_id
 * @property string $created_by_date
 * @property string $last_modified_by_id
 * @property string $last_modify_ by_date
 */
class MemberType extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'member_type';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['created_by_date', 'last_modify_ by_date'], 'safe'],
            [['name'], 'string', 'max' => 100],
            [['description'], 'string', 'max' => 256],
            [['role', 'created_by_id', 'last_modified_by_id'], 'string', 'max' => 50]
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
            'role' => 'Role',
            'created_by_id' => 'Created By ID',
            'created_by_date' => 'Created By Date',
            'last_modified_by_id' => 'Last Modified By ID',
            'last_modify_ by_date' => 'Last Modify  By Date',
        ];
    }

    /**
     * @inheritdoc
     * @return MemberTypeQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new MemberTypeQuery(get_called_class());
    }
}
