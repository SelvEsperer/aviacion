<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "company".
 *
 * @property string $id
 * @property string $name
 * @property string $description
 * @property string $address
 * @property string $phone
 * @property string $mobile
 * @property string $email
 * @property string $visit_us
 * @property string $facebook
 * @property string $title
 * @property string $created_by_id
 * @property string $created_by_date
 * @property string $last_modified_by_id
 * @property string $last_modified_by_date
 * @property string $code
 * @property string $twitter
 * @property string $googleplus
 * @property string $linkedin
 */
class Company extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'company';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['created_by_date', 'last_modified_by_date'], 'safe'],
            [['name', 'address'], 'string', 'max' => 256],
            [['description'], 'string', 'max' => 512],
            [['phone', 'mobile', 'email', 'visit_us', 'facebook', 'title', 'created_by_id', 'last_modified_by_id', 'code', 'twitter', 'googleplus', 'linkedin'], 'string', 'max' => 50]
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
            'address' => 'Address',
            'phone' => 'Phone',
            'mobile' => 'Mobile',
            'email' => 'Email',
            'visit_us' => 'Visit Us',
            'facebook' => 'Facebook',
            'title' => 'Title',
            'created_by_id' => 'Created By ID',
            'created_by_date' => 'Created By Date',
            'last_modified_by_id' => 'Last Modified By ID',
            'last_modified_by_date' => 'Last Modified By Date',
            'code' => 'Code',
            'twitter' => 'Twitter',
            'googleplus' => 'Googleplus',
            'linkedin' => 'Linkedin',
        ];
    }

    /**
     * @inheritdoc
     * @return CompanyQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new CompanyQuery(get_called_class());
    }
}
