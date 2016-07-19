<?php
namespace common\models;

use Yii;
use yii\base\Model;

/**
 * Login form
 */
class LoginForm extends Model
{
    public $username;
    public $password;
    public $rememberMe = true;
    public $reCaptcha;

    private $_user;
    
    public $attempts =  3; 
    public $days =      10;

    /**
     * @inheritdoc
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
                    
            [['reCaptcha'], \himiklab\yii2\recaptcha\ReCaptchaValidator::className(),"on"=>"login"]
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
            if (!$user || !$user->validatePassword($this->password)) {
                $this->addError($attribute, 'Incorrect username or password.');
            }
        }
    }

    /**
     * Logs in a user using the provided username and password.
     *
     * @return boolean whether the user is logged in successfully
     */
    public function login()
    {
        if ($this->validate()) {
            $user_ip = Yii::$app->request->userIP ;
            return Yii::$app->user->login($this->getUser(), $this->rememberMe ? 3600 * 24 * 30 : 0);
        } else {
            return false;
        }
    }

    /**
     * Finds user by [[username]]
     *
     * @return User|null
     */
    protected function getUser()
    {
        if ($this->_user === null) {
            $this->_user = User::findByUsername($this->username);
        }

        return $this->_user;
    }
    
    

    public function captchaRequired()
    {    
        $user_ip = Yii::$app->request->userIP ;
        $log = ActionLog::find()->where("ip = '{$user_ip}'")->orderBy("date_time DESC")->all();
        $laslog = count($log)?$log[0]->date_time:date("Y-m-d H:i:s");
        
        $datetime1 = date_create($laslog);
        $datetime2 = date_create(date("Y-m-d H:i:s"));
        $laslogdate = date_diff($datetime1, $datetime2)->d;

        return count($log) > $this->attempts && $laslogdate < $this->days;
            
    }
    
    private function addLog()
    {
        $log = new ActionLog ;
        $log->ip = Yii::$app->request->userIP ;
        $log->date_time = date("Y-m-d H:i:s");
        $log->save();
    }
    
    public function removeLog()
    {
        $logs = ActionLog::find()->where(["ip"=>Yii::$app->request->userIP])->all() ;
        foreach ($logs as $log) {
            $log->delete();
        }
    }
}
