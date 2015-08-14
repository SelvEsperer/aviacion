<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * LoginForm is the model behind the login form.
 */
class LoginForm extends Model
{
    public $username;
    public $password;
    public $rememberMe = true;

    private $_user = false;


    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // username and password are both required
            [['username', 'password'], 'required'],
            // rememberMe must be a boolean value
            ['rememberMe', 'boolean'],
            // password is validated by validatePassword()
            ['password', 'validatePassword'],
        ];
    }

    /**
     * Validates the password.
     * This method serves as the inline validation for password.
     *
     * @param string $attribute the attribute currently being validated
     * @param array $params the additional name-value pairs given in the rule
     */
    public function validatePassword($attribute, $params)
    {
    	if (!$this->hasErrors()) {
            $user = $this->getUser();
            //$this->addError($attribute, $this->password. ' Incorrect username or password.'.$user->password);
            if($this->password != $user->password){
            	$this->addError($attribute, 'Incorrect username or password.');
            } else {
            	return true;
            }        
        }
    }

    /**
     * Logs in a user using the provided username and password.
     * @return boolean whether the user is logged in successfully
     */
    public function login()
    {	//return $this->validate();
    	if ($this->validate()) {
            return Yii::$app->user->login($this->getSysUser(), $this->rememberMe ? 3600*24*30 : 0);
            
       } else {
           return false;
       }
    }
	
    public function getSysUser()
    {
    	if ($this->_user === false) {
    		$this->_user = User::findByUsername("admin");
    	}    
    	return $this->_user;
    }
    
    /**
     * Finds user by [[username]]
     *
     * @return User|null
     */
    public function getUser()
    {
        if ($this->_user === false) {
            $this->_user = Member::find()->where(['username' => $this->username])->one();
        }

        return $this->_user;
    }
}
