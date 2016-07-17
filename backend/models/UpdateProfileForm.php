<?php
namespace backend\models;

use common\models\User;
use Yii;
use yii\base\Model;

class UpdateProfileForm extends Model{
    public $admin_username;
    public $admin_email;
    public $admin_password ;
    public $image ;
    
    private $_user;
    
    public function rules() {
        return [
            ['admin_password', 'required'],
            ['admin_password', 'validatePassword'],
            
            ['admin_username', 'filter', 'filter' => 'trim'],
            ['admin_username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This username has already been taken.','targetAttribute'=>'username' ,'when'=>function($model){return $model->admin_username != $model->getUser()->username;}],
            ['admin_username', 'string', 'min' => 2, 'max' => 255],

            ['admin_email', 'filter', 'filter' => 'trim'],
            ['admin_email', 'email'],
            ['admin_email', 'string', 'max' => 255],
            ['admin_email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This email address has already been taken.','targetAttribute'=>'email' ,'when'=>function($model){return $model->admin_email != $model->getUser()->email;}],
            ['image', 'image', 'extensions' => 'jpg, jpeg, gif, png','skipOnEmpty'=>true ,'on' => ['insert','update']],
        ];
    }
    
    public function attributeLabels() {
        return [
            'admin_password'=>'Confirm Password',
            'admin_username'=>'Username',
            'admin_email'=>'Email'
        ];
    }
    
    public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();
            if (!$user || !$user->validatePassword($this->admin_password)) 
                $this->addError($attribute, 'Incorrect  password.');
            
        }
    }
    
    /**
     * Finds user by [[admin_username]]
     *
     * @return User|null
     */
    public function getUser()
    {
        if ($this->_user === null) {
            $this->_user = User::findOne(Yii::$app->user->id);
        }

        return $this->_user;
    }
    
    public function updateProfile() {
        if ($this->validate()) {
            $user = $this->getUser();
            $user->setScenario("update");
            
            if(!empty($this->admin_username) && $user->username !== $this->admin_username)
                $user->username = $this->admin_username ;
            if(!empty($this->admin_email) && $user->email !== $this->admin_email)
                $user->email = $this->admin_email ;
            if(!empty($this->image))
            {
                $user->setAttribute("image", $this->image) ;
            }
            if ($user->save()) {
                return $user;
            }
        }

        return null;
    }
}