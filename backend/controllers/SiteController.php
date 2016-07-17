<?php
namespace backend\controllers;

use backend\models\ChangePasswordForm;
use backend\models\UpdateProfileForm;
use common\models\LoginForm;
use backend\models\PasswordResetRequestForm;
use backend\models\ResetPasswordForm;
use Yii;
use yii\bootstrap\Alert;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\helpers\Html;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\web\UploadedFile;
use yii\helpers\FileHelper ;


/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login', 'error','lock','request-password-reset','reset-password'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index','lock','change-password', 'update-profile', 'profile','url'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                    'url' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'backend\components\MetronicError',
            ],
        ];
    }

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionLogin()
    {
        $this->layout ='guest';
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }
    
    public function actionLock()
    {
        $this->layout = "lock";
        
        if(isset(Yii::$app->user->identity->username))
        {
            Yii::$app->session->set('lock.username',Yii::$app->user->identity->username);
            Yii::$app->session->set('lock.avatar',Yii::$app->user->identity->getThumbUploadUrl('image'));
        }
        if(Yii::$app->session->get('lock.username') !== null && Yii::$app->session->get('lock.avatar') !== null){
            $avatar = Yii::$app->session->get('lock.avatar');
            $username = Yii::$app->session->get('lock.username');
            
            Yii::$app->user->logout();
            
            Yii::$app->session->set('lock.username',$username);
            Yii::$app->session->set('lock.avatar',$avatar);
            
            $model = new LoginForm(); 
            
            $model->scenario = "login";
            
            $model->username = $username;    
            if ($model->load(Yii::$app->request->post()) && $model->validate()) 
            {
                if($model->login())
                {    
                    return $this->goBack();
                }
            }
            return $this->render('lockScreen', [
                'model' => $model,
                'avatar'=> $avatar,
            ]);
        }
        else{
            return $this->redirect(['login']);
        }
    }
    
    public function actionChangePassword()
    {
        $model = new ChangePasswordForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->changePassword()) {
                if (Yii::$app->getUser()->logout()) {
                    return $this->goHome();
                }
            }
        }

        return $this->render('changePassword', [
            'model' => $model,
        ]);
    }
    
    public function actionUpdateProfile()
    {
        $model = new UpdateProfileForm();
        $model->setScenario("update");
        if ($model->load(Yii::$app->request->post())) {
            $model->image = UploadedFile::getInstance($model, 'image');
            if ($model->updateProfile()) {
                $this->goHome();
            }
        }

        return $this->render('updateProfile', [
            'model' => $model,'user'=>$model->getUser()
        ]);
    }
    
    public function actionProfile()
    {
        return $this->render('profile');
    }
    
    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset()
    {
        $this->layout = "guest";
        $model = new PasswordResetRequestForm();
        if (Yii::$app->request->isAjax) {
            if($model->load(Yii::$app->request->post()) && $model->validate())
            {
                if ($model->sendEmail()) 
                    echo Alert::widget(['body' => "Check your email for further instructions.","options"=>["class"=>"alert-success"]]);
                else 
                    echo Alert::widget(['body' => "Sorry, we are unable to reset password for email provided.","options"=>["class"=>"alert-danger"]]);
            }else {
                    echo Alert::widget(['body' => Html::errorSummary($model) ,"options"=>["class"=>"alert-danger"]]);
                }
        }
        else
            return $this->render('requestPasswordResetToken', [
                'model' => $model,
            ]);
    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token)
    {
        $this->layout = "guest";
        
        $model = new ResetPasswordForm($token);
        if(!$model->valid)
        {
            Yii::$app->session->setFlash('error', 'Sorry, Reset Link was used or expired.');
            return $this->redirect("login");
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password was saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }
    
    public function actionUrl()
    {         
        $uploadedFile = UploadedFile::getInstanceByName('upload'); 
        $mime = FileHelper::getMimeType($uploadedFile->tempName);
        $file = time()."_".$uploadedFile->name;
        
        $baseurl = isset(Yii::$app->components['urlManagerFrontEnd']) ? Yii::$app->urlManagerFrontEnd->baseUrl : Yii::$app->urlManager->baseUrl ;
        $uploadPath = Yii::getAlias('@frontend/web/pages-media/'.$file);
        $url = "$baseurl/pages-media/$file";
        //extensive suitability check before doing anything with the file…
        if ($uploadedFile==null)
        {
           $message = "No file uploaded.";
        }
        else if ($uploadedFile->size == 0)
        {
           $message = "The file is of zero length.";
        }
        else if ($mime!="image/jpeg" && $mime!="image/png")
        {
           $message = "The image must be in either JPG or PNG format. Please upload a JPG or PNG instead.";
        }
        else if ($uploadedFile->tempName==null)
        {
           $message = "You may be attempting to hack our server. We're on to you; expect a knock on the door sometime soon.";
        }
        else {
            $message = "";
            if (is_string($uploadPath) && FileHelper::createDirectory(dirname($uploadPath))) {
                $move = $uploadedFile->saveAs($uploadPath);
                if(!$move)
                {
                   $message = "Error moving uploaded file. Check the script is granted Read/Write/Modify permissions.";
                } 
            }
        }
        $funcNum = $_GET['CKEditorFuncNum'] ;
        echo "<script type='text/javascript'>window.parent.CKEDITOR.tools.callFunction($funcNum, '$url', '$message');</script>";        
    } 
}
