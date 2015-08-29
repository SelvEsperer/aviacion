<?php

namespace app\models;

use Yii;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "admin_group".
 *
 * @property integer $id
 * @property string $username
 * @property string $password
 * @property string $name
 */
class AdminGroup extends \yii\db\ActiveRecord implements IdentityInterface
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'admin_group';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'password'], 'required'],
            [['username', 'password', 'name'], 'string', 'max' => 50]
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
            'name' => 'Name',
        ];
    }

    /**
     * @inheritdoc
     * @return AdminGroupQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new AdminGroupQuery(get_called_class());
    }
    /**
     * Login from db table
     */
    public static function findIdentity($id)
    {
    	$dbUser = self::find()->where(["id" => $id])->one();
    	if (!count($dbUser)) {
    		return null;
    	}
    	return new static($dbUser);
    }
    
    public static function findIdentityByAccessToken($token, $userType = null)
    {
    	throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    }
    
    
    public static function findByUsername($username)
    {
    	$dbUser = self::find()
    	->where(["username" => $username])
    	->one();
    	if (!count($dbUser)) {
    		return null;
    	}
    	return $dbUser;
    }
    
    public function getId()
    {
    	return $this->id;
    }
    
    public function getAuthKey()
    {
    	return $this->authKey;
    }
    
    public function validateAuthKey($authKey)
    {
    	return $this->authKey === $authKey;
    }
    
    /**
     * Validates password
     *
     * @param  string  $password password to validate
     * @return boolean if password provided is valid for current user
     */
    public function validatePassword($password)
    {
    	return $this->password === $password;
    }
}
