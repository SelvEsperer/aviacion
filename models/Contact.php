<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "contact".
 *
 * @property string $id
 * @property string $company_id
 * @property string $title
 * @property string $subtitle
 * @property string $email
 * @property string $phone
 * @property string $mobile
 * @property string $created_by_id
 * @property string $created_by_date
 * @property string $last_modified_by_id
 * @property string $last_modified_by_date
 */
class Contact extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'contact';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['company_id'], 'required'],
            [['company_id'], 'integer'],
            [['created_by_date', 'last_modified_by_date'], 'safe'],
            [['title'], 'string', 'max' => 152],
            [['subtitle', 'email', 'phone'], 'string', 'max' => 100],
            [['mobile', 'created_by_id', 'last_modified_by_id'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'company_id' => 'Company ID',
            'title' => 'Title',
            'subtitle' => 'Subtitle',
            'email' => 'Email',
            'phone' => 'Phone',
            'mobile' => 'Mobile',
            'created_by_id' => 'Created By ID',
            'created_by_date' => 'Created By Date',
            'last_modified_by_id' => 'Last Modified By ID',
            'last_modified_by_date' => 'Last Modified By Date',
        ];
    }

    /**
     * @inheritdoc
     * @return ContactQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ContactQuery(get_called_class());
    }
}
