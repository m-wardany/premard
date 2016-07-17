<?php

namespace common\models;

use Yii;
use yii\helpers\Html ;
use dosamigos\ckeditor\CKEditor;
/**
 * This is the model class for table "content".
 *
 * @property integer $id
 * @property integer $category_id
 * @property integer $sub_category_id
 * @property string $label
 * @property string $content
 * @property string $note
 * @property integer $content_type
 * @property integer $order
 * @property integer $max
 * @property integer $is_required
 * @property integer $is_multi_lang
 *
 * @property Image $image
 * @property ContentTranslation[] $translations
 *  */
class Content extends \yii\db\ActiveRecord
{
    const CONTENT_TYPE_TEXTINPUT = 1 ;
    const CONTENT_TYPE_TEXTAREA = 2 ;
    const CONTENT_TYPE_MAP = 3 ;
    const CONTENT_TYPE_INTEGER = 4 ;
    const CONTENT_TYPE_TAG = 5 ;
    const CONTENT_TYPE_CKEDITOR_BASIC = 6 ;
    const CONTENT_TYPE_CKEDITOR_STANDARD = 7 ;
    const CONTENT_TYPE_CKEDITOR_FULL = 8 ;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'content';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['category_id', 'content_type', 'order', 'max', 'is_required', 'is_multi_lang','sub_category_id'], 'integer'],

            ['category_id','in', 'range'=>function($model, $attribute) {return array_keys($model->categories);}],
            [['category_id', 'content_type', 'label'], 'required', 'on'=>'insert'],

            ['content', 'string','when'=>function($model){return $model->content_type == self::CONTENT_TYPE_TEXTINPUT && $model->content_type == self::CONTENT_TYPE_TEXTAREA;},'on'=>['edit']],
            ['content', 'string', 'max' => $this->max, 'when'=>function($model){return !empty($model->max) && $model->max > 0 ;},'on'=>['edit']],
            ['content', 'integer', 'when'=>function($model){return $model->content_type == self::CONTENT_TYPE_INTEGER;},'on'=>['edit']],
            ['content', 'required', 'when'=>function($model){return $model->is_required;}, 'on'=>'edit'],
            ['content', 'url', 'when'=>function($model){return strpos($model->label, "url")!== false ;}, 'on'=>'edit'],
            ['content', 'email', 'when'=>function($model){return strpos($model->label, "_email")!== false ;}, 'on'=>'edit'],
            ['content', 'validateEmails', 'when'=>function($model){return $model->label === "emails" ;}, 'on'=>'edit'],
                    
            ['content_type','in', 'range'=>function($model, $attribute) {return array_keys($model->contentTypes);}],

            [['label','note'], 'string', 'max' => 255],
            ['label', 'match', 'pattern' => '/^[a-zA-Z0-9_-]+$/', 'message' => 'Your username can only contain alphanumeric characters and underscores.'],
        ];
    }

    
    public function validateEmails($attribute, $params)
    {

        $emails = explode(',',$this->$attribute);
        foreach ($emails as $full_email) {
            if(!filter_var($full_email, FILTER_VALIDATE_EMAIL))
            {
                $this->addError($attribute, "Invalid email");
            }

        }
    }
    
    public function scenarios() {
        parent::scenarios();
        return[
            'edit'=>['content'],
            'insert'=>['category_id', 'content_type', 'order', 'max', 'is_required', 'is_multi_lang', 'label','note'],
            'update'=>['category_id', 'content_type', 'order', 'max', 'is_required', 'is_multi_lang', 'label','note'],
        ];
    }



    
    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('page', 'ID'),
            'category_id' => Yii::t('page', 'Category'),
            'label' => Yii::t('page', 'Label'),
            'content' =>  str_replace(["_","-"], " ", ucwords( $this->label)),
            'content_type' => Yii::t('page', 'Content Type'),
            'order' => Yii::t('page', 'Order'),
        ];
    }

    /**
    * @return \yii\db\ActiveQuery
    */
    public function getTranslations()
    {
        return $this->hasMany(ContentTranslation::className(), ['content_id' => 'id']);
    }

    public function getContentTypes($cuurent=false) {
        $types = [
            self::CONTENT_TYPE_TEXTINPUT => "textinput",
            self::CONTENT_TYPE_TEXTAREA => "textarea",
            self::CONTENT_TYPE_MAP => "map",
            self::CONTENT_TYPE_INTEGER => "number",
            self::CONTENT_TYPE_TAG => "tags",
//            "CKEditor"=>[
                self::CONTENT_TYPE_CKEDITOR_BASIC=> "CKEditor basic",
                self::CONTENT_TYPE_CKEDITOR_STANDARD=> "CKEditor standard",
                self::CONTENT_TYPE_CKEDITOR_FULL=> "CKEditor full",
//            ]
        ];
        return $cuurent ? $types[$this->content_type]: $types ;
    }

    public function getCategories($cuurent=false) {
        $categories = [];
        foreach (Yii::$app->params['pages'] as $title => $cat) {
            $categories[$cat['id']]=$cat['title'];
        }
        return $cuurent ?  $categories[$this->category_id]:$categories;
    }
    
    
    public static function getCategoryById($category_id) {
        foreach (Yii::$app->params['pages'] as $title => $cat) {
            if($cat['id'] === $category_id)
                return $cat;
        }
        return [];
    }

    public function getInput($model = null, $attribute=null, $content_type=null) {
              
        if($model===null)
            $model=$this;
        if($attribute===null)
            $attribute = "[{$this->id}]content";
        if($content_type===null)
            $content_type = $this->content_type;
        
        $label = Html::activeLabel($model,$attribute,['class'=>'control-label']) ;
        $input = Html::activeTextInput($model,$attribute, ['class'=>"form-control"]);
        $error = Html::error($model, $attribute,['class'=>"help-block"]);
        if(get_class($model) != self::className()){
            $model->note = $model->parent->note;
        }
        switch ($content_type) {
            case self::CONTENT_TYPE_TEXTINPUT :
                break;
            case self::CONTENT_TYPE_INTEGER :
                if(isset($model->category_id) && array_key_exists($model->label, self::getCategoryById($model->category_id))){
                    $items_model_name = self::getCategoryById($model->category_id)[$model->label] ;
                    $items = \yii\helpers\ArrayHelper::map($items_model_name::find()->all(), 'id', 'title');
                    $input = Html::activeDropDownList($model, $attribute,$items,['prompt'=>"please select",'class'=>"form-control"]);
                }
                break;
            case self::CONTENT_TYPE_TEXTAREA :
                $input = Html::activeTextarea($model, $attribute,['class'=>"form-control"]);
                break;
            case self::CONTENT_TYPE_TAG :
                $input = Html::activeTextarea($model, $attribute,['class'=>"form-control tags"]);
                break;
            case self::CONTENT_TYPE_MAP:
                $input =  Html::activeTextInput($model, $attribute,['class'=>'form-control','id'=>'coordinates']).
                Html::tag("div",'',['id'=>'map',"style"=>"height: 250px;margin-top: 20px; "])  ;
                break;
            case self::CONTENT_TYPE_CKEDITOR_BASIC :
                $input = CKEditor::widget(['model'=>$model, 'attribute'=>$attribute,'options'=>['rows'=>6],'preset' => 'basic']);
                break;
            case self::CONTENT_TYPE_CKEDITOR_STANDARD :
                $input = CKEditor::widget(['model'=>$model, 'attribute'=>$attribute,'options'=>['rows'=>6],'preset' => 'standard']);
                break;
            case self::CONTENT_TYPE_CKEDITOR_FULL :
                $input = CKEditor::widget(['model'=>$model, 'attribute'=>$attribute,'options'=>['rows'=>6],'preset' => 'full']);
                break;
            default:
                break;
        }
        return Html::tag("div","$label \n $input \n $error",['class'=>'form-group']).Html::tag("div",$model->note,['class'=>'text-info']);
    }

    
    public function getContent() {
        $model;
        if(func_num_args()==0)
        {
            $model=  $this;
        }
        elseif(func_num_args()==2 && is_int(func_get_arg(0)) && is_string(func_get_arg(1)))
        {
            $category_id = func_get_arg(0);
            $label = func_get_arg(1);
            $model = self::find()->where("category_id = $category_id AND label = '$label'")->one();
        }
        else
            return null;
        if($model !== null && !$model->isNewRecord){
            if($model->is_multi_lang)
            {
                $current_language = Yii::$app->language ;
                $translated_content = ContentTranslation::find()->where("content_id = {$model->id} AND language_id = :lang")->params([':lang'=>  Language::find()->where("code = '$current_language'")->one()?Language::find()->where("code = '$current_language'")->one()->id:null])->one();
                if($translated_content)
                    return $translated_content->content;
            }            
            else
                return $model->content;
        }
        return ;
    }
    
    public function getFormattedContent() {
        $content = "";
        if(func_num_args()==0)
        {
            $content = $this->getContent(func_get_args()[0]);
        }
        elseif(func_num_args()==2 && is_int(func_get_arg(0)) && is_string(func_get_arg(1)))
        {
            $content = $this->getContent(func_get_args()[0],func_get_args()[1]);
        }
        
        return $this->format(Yii::$app->formatter->asNtext($content));
    }
    
    public function getContentByCategory($category_id,$label) {
        $language = Yii::$app->language ;
        $model ;
        if(self::find()->where("category_id = $category_id AND label = '$label' ")->one())
            $model = self::find()->where("category_id = $category_id AND label = '$label' ")->one();
        elseif(self::find()->where("category_id = $category_id AND label = '{$language}_{$label}' ")->one())
            $model = self::find()->where("category_id = $category_id AND label = '{$language}_{$label}' ")->one();
        else
            $model = null ;
        return $model !== null ? (self::CONTENT_TYPE_TEXTAREA == $model->content_type?nl2br(Html::encode($model->content)):Html::encode($model->content)):"";
    }

    public static function getImageByCategory($category_id,$profile=null) {
        $model = Image::find()->where("category_id = $category_id")->one();
        if($model)
            return $profile === null ? $model->getUploadUrl("image"):$model->getThumbUploadUrl("image", $profile);
    }
        
    public function format($text) {
        $text = preg_replace('/\*\*(.+?)\*\*/s', '<strong>$1</strong>', $text);
        return $text;
    }

}
