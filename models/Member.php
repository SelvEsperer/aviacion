<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "member".
 *
 * @property string $id
 * @property string $username
 * @property string $password
 * @property string $first_name
 * @property string $last_name
 * @property string $middle_name
 * @property string $email
 * @property string $phone
 * @property string $mobile
 * @property string $address_line1
 * @property string $address_line2
 * @property string $address_line3
 * @property string $role
 * @property string $created_by_id
 * @property string $created_by_date
 * @property string $last_modified_by_id
 * @property string $last_modified_by_date
 * @property integer $status
 */
class Member extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'member';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'password', 'first_name', 'last_name', 'status'], 'required'],
            [['created_by_date', 'last_modified_by_date'], 'safe'],
            [['status'], 'integer'],
            [['username', 'password', 'role', 'created_by_id', 'last_modified_by_id'], 'string', 'max' => 50],
            [['first_name', 'last_name', 'middle_name', 'phone', 'mobile'], 'string', 'max' => 100],
            [['email'], 'string', 'max' => 250],
            [['address_line1', 'address_line2', 'address_line3'], 'string', 'max' => 512]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'password' => 'Password',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'middle_name' => 'Middle Name',
            'email' => 'Email',
            'phone' => 'Phone',
            'mobile' => 'Mobile',
            'address_line1' => 'Address Line1',
            'address_line2' => 'Address Line2',
            'address_line3' => 'Address Line3',
            'role' => 'Role',
            'created_by_id' => 'Created By ID',
            'created_by_date' => 'Created By Date',
            'last_modified_by_id' => 'Last Modified By ID',
            'last_modified_by_date' => 'Last Modified By Date',
            'status' => 'Status',
        ];
    }

    /**
     * @inheritdoc
     * @return MemberQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new MemberQuery(get_called_class());
    }
}
