<?php
namespace common\components ;
use yii\web\UrlManager;
use Yii ;
class MultiLangUrl extends UrlManager{
    public function createUrl($params)
    {
        if (!isset($params['language'])) {
            if (Yii::$app->session->has('language'))
                Yii::$app->language = Yii::$app->session->get('language');
            else if(isset(Yii::$app->request->cookies['language']))
                Yii::$app->language = Yii::$app->request->cookies['language']->value;
            else
                Yii::$app->language = "en";
            $params['language']=Yii::$app->language;
        }
        return parent::createUrl($params);
    }


}