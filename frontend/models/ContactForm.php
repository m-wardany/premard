<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use backend\models\Mailer ;

/**
 * ContactForm is the model behind the contact form.
 */
class ContactForm extends Model
{
    public $name;
    public $email;
    public $subject;
    public $body;
    public $verifyCode;


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            // name, email, subject and body are required
            [['name', 'email', 'subject', 'body'], 'required'],
            // email has to be a valid email address
            ['email', 'email'],
            // verifyCode needs to be entered correctly
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'verifyCode' => 'Verification Code',
            'subject'=>"Phone",
            'name'=>"Your name",
            "email"=>'Email',
            "body"=>'Message',
        ];
    }

    /**
     * Sends an email to the specified email address using the information collected by this model.
     *
     * @param string $email the target email address
     * @return boolean whether the email was sent
     */
    public function sendEmail()
    {
        $mailer = Mailer::mail("contact_mail");
        return $mailer->sendEmail(
            [ $mailer->username => "PremaR&D contact page"], 
            $mailer->username, 
            "PremaR&D contact page", 
            "Name:  {$this->name}\nEmail:{$this->email}\nPhone:{$this->subject} ,\nMessage: {$this->body}"
        );
        
    }
}
