<?php
namespace backend\models;

use common\models\User;
use himiklab\yii2\recaptcha\ReCaptchaValidator;
use Yii;
use yii\base\Model;

/**
 * Password reset request form
 */
class PasswordResetRequestForm extends Model
{
    public $email;
    public $reCaptcha;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['email', 'filter', 'filter' => 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'exist',
                'targetClass' => '\common\models\User',
                'filter' => ['status' => User::STATUS_ACTIVE],
                'message' => 'There is no user with such email.'
            ],            
            [['reCaptcha'], \himiklab\yii2\recaptcha\ReCaptchaValidator::className()]
        ];
    }

    /**
     * Sends an email with a link, for resetting the password.
     *
     * @return boolean whether the email was send
     */
    public function sendEmail()
    {
        /* @var $user User */
        $user = User::findOne([
            'status' => User::STATUS_ACTIVE,
            'email' => $this->email,
        ]);

        if ($user) {
            if (!User::isPasswordResetTokenValid($user->password_reset_token)) {
                $user->generatePasswordResetToken();
            }

            if ($user->save()) {
                $mailer = Mailer::mail("support_mail");
                return $mailer->sendEmail([$mailer->username => "PremaIt robot"], $this->email, "Password reset for Premait account", "","",['html' => 'passwordResetToken-html', 'text' => 'passwordResetToken-text'], ['user' => $user]);
            }
        }

        return false;
    }
}
