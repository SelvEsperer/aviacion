<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "company".
 *
 * @property string $id
 * @property string $company
 * @property string $description
 * @property string $address
 * @property string $phone
 * @property string $mobile
 * @property string $email
 * @property string $visit_us
 * @property string $social_link
 * @property string $title
 * @property string $created_by_id
 * @property string $created_by_date
 * @property string $last_modified_by_id
 * @property string $last_modified_by_date
 * @property string $code
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
            [['company'], 'required'],
            [['created_by_date', 'last_modified_by_date'], 'safe'],
            [['company', 'address'], 'string', 'max' => 256],
            [['description'], 'string', 'max' => 512],
            [['phone', 'mobile', 'email', 'visit_us', 'social_link', 'title', 'created_by_id', 'last_modified_by_id'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'company' => 'Company',
            'description' => 'Description',
            'address' => 'Address',
            'phone' => 'Phone',
            'mobile' => 'Mobile',
            'email' => 'Email',
            'visit_us' => 'Visit Us',
            'social_link' => 'Social Link',
            'title' => 'Title',
            'created_by_id' => 'Created By ID',
            'created_by_date' => 'Created By Date',
            'last_modified_by_id' => 'Last Modified By ID',
            'last_modified_by_date' => 'Last Modified By Date',
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
