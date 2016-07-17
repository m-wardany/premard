<?php

namespace backend\models;

use Yii;
use yii\db\ActiveRecord;
use yii\db\Exception;
/**
 * This is the model class for table "mailer".
 *
 * @property integer $id
 * @property integer $type
 * @property string $title
 * @property string $slug
 * @property string $host
 * @property string $username
 * @property string $password
 * @property integer $port
 * @property string $encryption
 * @property string $incoming_server
 * @property string $imap_port
 * @property string $outgoing_server
 * @property string $smtp_port
 */
class Mailer extends ActiveRecord
{
    const TYPE_SSL = 1 ;
    const TYPE_NON_SSL = 2 ;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'mailer';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['type', 'title', 'slug', 'username', 'password'], 'required'],
            [['type', 'port'], 'integer'],
            [['title', 'slug', 'host', 'username', 'password', 'encryption', 'incoming_server', 'imap_port', 'outgoing_server', 'smtp_port'], 'string', 'max' => 255],
            [['title'], 'unique'],
            [['slug'], 'unique'],
            ['username',"validateEmail"],
            
            ['type','in', 'range'=>[self::TYPE_SSL,  self::TYPE_NON_SSL]],
        ];
    }

    public function validateEmail($attribute,$params){;       
        if(!$this->sendEmail([$this->username => "Testing page"], $this->username, "test email", "from : testing robot:{$this->username} "))
            $this->addError($attribute,"Error");
    }
    
    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'type' => Yii::t('app', 'Type'),
            'title' => Yii::t('app', 'Title'),
            'slug' => Yii::t('app', 'Slug'),
            'host' => Yii::t('app', 'Host'),
            'username' => Yii::t('app', 'Username'),
            'password' => Yii::t('app', 'Password'),
            'port' => Yii::t('app', 'Port'),
            'encryption' => Yii::t('app', 'Encryption'),
            'incoming_server' => Yii::t('app', 'Incoming Server'),
            'imap_port' => Yii::t('app', 'Imap Port'),
            'outgoing_server' => Yii::t('app', 'Outgoing Server'),
            'smtp_port' => Yii::t('app', 'Smtp Port'),
        ];
    }
    
    public static function mail($slug){
        if (($model = self::find()->where("slug = '$slug'")->one()) !== null) {
            return $model;
        } else {
            return false;
        }
    }
    
    public function sendEmail($from, $to, $subject=null, $body_text=null, $body_html=null,$view=null,$params=[]){
        $transport = [
                'class' => 'Swift_SmtpTransport',
                'username' => $this->username,
                'password' => $this->password,                
            ];
        
        $transport['host']= $this->host;
        $transport['port']= $this->port;
        $transport['encryption']= $this->encryption;
        
        
        $swift = Yii::$app->mailer ;
        $swift->setTransport($transport);
        try 
        {
            $sent = $swift->compose($view,$params)
            ->setFrom($from)
            ->setTo($to)
            ->setSubject($subject)
            ->setTextBody($body_text)
//            ->setHtmlBody($body_html)
            ->send();
            return $sent;            
        }
        catch(Exception $exception)
        {
            return 0;
        }
        return false;
    }
    
}
