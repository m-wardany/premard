<?php

namespace common\models;

use Yii;
use yii\helpers\Html ;
/**
 * This is the model class for table "setting".
 *
 * @property integer $id
 * @property string $title
 * @property string $slug
 * @property string $content
 * @property string $field
 * @property integer $encrypt
 */
class Setting extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'setting';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'slug'], 'required'],
            [['content'], 'string'],
            [['encrypt'], 'integer'],
            [['title', 'slug'], 'string', 'max' => 255],
            [['field'], 'string', 'max' => 45],
            [['field'],'in','range'=>['textInput','textarea','checkbox']]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'title' => Yii::t('app', 'Title'),
            'slug' => Yii::t('app', 'Slug'),
            'content' => Yii::t('app', 'Content'),
            'field' => Yii::t('app', 'Field'),
            'encrypt' => Yii::t('app', 'Encrypt'),
        ];
    }
    
    public function get($slug,$getmodel = false)
    {
        $content = null ;
        $set = self::find()->where("slug = '{$slug}'")->one();
        if(!count($set))
        {
            $slug = Yii::$app->language.'_'.$slug ;
            $set = self::find()->where("slug = '{$slug}'")->one();
        }
        if(count($set))
        {
            $content = $set->encrypt?Html::encode($set->content):$set->content;
        }
        return $getmodel?$set:$content;
    }
    
    public function header() {
        $phone1 = Page::getContentByCategory(Page::PAGE_CONTCAT, "first_phone");
        $phone2 = !empty(Page::getContentByCategory(Page::PAGE_CONTCAT, "second_phone"))&&!Page::getContentByCategory(Page::PAGE_CONTCAT, "first_phone")? " ,".Page::getContentByCategory(Page::PAGE_CONTCAT, "second_phone"):"";
        $email = Page::getContentByCategory(Page::PAGE_CONTCAT, "email") ;
        $address = Page::getContentByCategory(Page::PAGE_CONTCAT, "first_office_title")." :<br/>".Page::getContentByCategory(Page::PAGE_CONTCAT, "first_office_address");
        return  Yii::t('app','Phone').": ".$phone1.$phone2."<br/>".
                Yii::t('app','Email').": ".$email."<br/>".
                Yii::t('app','Address').": ".$address."<br/>" ;
    }
    
}
