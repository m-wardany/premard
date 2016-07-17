<?php
namespace backend\models;

use common\models\User;
use yii\base\Model;
use Yii;

class ChangePasswordForm extends Model{
    public $old_password;
    public $new_password;
    public $repeat_new_password;

    private $_user;
    
    public function rules() {
        return [
            [['old_password','new_password'],'required'],
            ['old_password', 'validatePassword'],
            ['new_password', 'string', 'min' => 6],
            ['repeat_new_password', 'compare', 'compareAttribute' => 'new_password'],
            ['repeat_new_password','safe'],
        ];
    }
    
    public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();
            if (!$user || !$user->validatePassword($this->old_password)) 
                $this->addError($attribute, 'Incorrect  password.');
            
        }
    }
    
    public function attributeLabels() {
        parent::attributeLabels();
        return[
            'old_password'=>'Old Password',
            'new_password'=>'New Password',
            'repeat_new_password'=>'Repeat New Password',
        ];
    }
    
    
    /**
     * Finds user by [[username]]
     *
     * @return User|null
     */
    protected function getUser()
    {
        if ($this->_user === null) {
            $this->_user = User::findOne(Yii::$app->user->id);
        }

        return $this->_user;
    }
    
    public function changePassword() {
        if ($this->validate()) {
            $user = $this->getUser();
            $user->setPassword($this->new_password);
            $user->generateAuthKey();
            if ($user->save()) {
                return $user;
            }
        }

        return null;
    }
}