<?php
namespace backend\components;

/**
 * Description of TranslatableModel
 *
 * @author muhammad Wardany
 * 
 * @property name // title
 * @property attribute // en_title
 * 
 */

use common\models\Language;
use Yii;
use yii\base\Behavior;
use yii\base\InvalidConfigException;
use yii\base\UnknownPropertyException;
use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;
use yii\validators\SafeValidator;
use yii\validators\Validator;

class MultipleLanguage extends Behavior
{ 
    public $relation = "translations" ;
    public $scenarios = ["update","insert","default"];


    public $translatedAttributes = []; //title, text, description, ...
    private $attributes = []; //en_title, ar_text, de_description, ...
    private $attributes_values = []; //title=>["en"=>"english title","ar"=>"arabic title"],...
   

    public function init() {
        parent::init();
        if (empty($this->relation)) {
            throw new InvalidConfigException('The "relation" property must be set.');
        }
    }
       
    public function attach($owner)
    {
        parent::attach($owner);
        // set $this->translated attributes
//        if(!count($this->translatedAttributes)){
//            $relation = $this->owner->getRelation($this->relation);
//            $model_name = $relation->modelClass ;
//            $model = new $model_name ;
//            $this->translatedAttributes = $model->attributes ;
//            $link = array_keys($relation->link)[0];
//            
//            unset($this->translatedAttributes["id"]);
//            unset($this->translatedAttributes[$link]);
//            unset($this->translatedAttributes["language_code"]);
//            
//        }
        
        // set attributes
        foreach (Language::find()->all() as $language) {
            foreach ($this->translatedAttributes as $name){
                $this->attributes[]="{$language->code}_{$name}";
            }
        }
        
        
        $this->addValidations($owner);
    }
    
    public function events() {
        return [
            ActiveRecord::EVENT_AFTER_INSERT => 'afterSave',
            ActiveRecord::EVENT_AFTER_UPDATE => 'afterSave',
        ];
    }
       
    public function afterSave() {
        $relation = $this->owner->getRelation($this->relation);
        $model_name = $relation->modelClass ;
        
        $this->owner->unlinkAll($this->relation,true);
        
        foreach (Language::find()->all() as $language) {
            $model = new $model_name ;
            $model->setAttribute("language_code", $language->code);
            
            foreach ($this->attributes_values as $name=>$value) {
                $attribute = substr(strstr($name,"_"),1);
                $language_code = strstr($name,"_",true);  
                if($language_code === $language->code){
                    $model->setAttribute($attribute,$value);
                }                
            }
            $this->owner->link($this->relation, $model);
        }
    }
    
    
    public function addValidations($owner) {
        $model_name = $this->owner->getRelation($this->relation)->modelClass ;
        $model = new $model_name ;
        foreach ($this->attributes as $name) {     
            $attribute = substr(strstr($name,"_"),1);
            foreach ($model->validators as $validator) {  
                if(in_array($attribute, $validator->attributes)){
                    $parame = ArrayHelper::toArray($validator) ;
                    unset($parame["attributes"]);
                    $newValidator = Validator::createValidator(get_class($validator), $owner, $name,$parame);
                    $owner->validators[] = $newValidator;
                }
            }  
        }
        $safeValidator = Validator::createValidator(SafeValidator::className(), $owner, $this->translatedAttributes,['on'=>$this->scenarios]);
        $owner->validators[] = $safeValidator;
    }
    
    
    public function canGetProperty($name, $checkVars = true) {
        parent::canGetProperty($name);
        $model_name = $this->owner->getRelation($this->relation)->modelClass ;
        $translation_model = new $model_name ;
        return $translation_model->hasAttribute($name)||$translation_model->hasAttribute( substr(strstr($name,"_"),1));
    }
    
    public function canSetProperty($name, $checkVars = true) {
        parent::canSetProperty($name);
        $model_name = $this->owner->getRelation($this->relation)->modelClass ;
        $translation_model = new $model_name ;
        return $translation_model->hasAttribute($name)||$translation_model->hasAttribute( substr(strstr($name,"_"),1));
    }
    
    public function __get($name)
    {
        $relation = $this->owner->getRelation($this->relation);
        $model_name = $relation->modelClass ;
        $link = array_keys($relation->link)[0];
        if(array_key_exists($name, $this->attributes_values)){
            return $this->attributes_values[$name];
        }
        
        elseif (in_array($name, $this->attributes)) {
            if(!$this->owner->isNewRecord){
                $attribute = substr(strstr($name,"_"),1);
                $language_code = strstr($name,"_",true);  
                $model = $model_name::find()->where("language_code = '{$language_code}' and {$link} = {$this->owner->id}")->one();
                return $model ?  $model->getAttribute($attribute) :null;
            }
            return null;
        }
        elseif (in_array($name, $this->translatedAttributes)) {
            if(!$this->owner->isNewRecord){
                $current_language = Yii::$app->language ;
                $model = $model_name::find()->where("language_code = '{$current_language}' and {$link} = {$this->owner->id}")->one();
                return $model ? $model->getAttribute($name) :null;
            }
            else
                return null;
        }
        throw new UnknownPropertyException('Getting unknown property: ' . $model_name . '::' . $name);
    }
    
    public function __set($name, $value)
    {
        if (in_array($name, $this->attributes)) {
            $this->attributes_values[$name]=$value;
        } else {
            parent::__set($name, $value);
        }
    }
    
}