<?php

namespace backend\controllers;

use backend\searchmodels\Content as ContentSearch;
use common\models\Content;
use common\models\ContentTranslation;
use common\models\Image;
use common\models\Language;
use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\helpers\BaseInflector;
use yii\helpers\Html;
use yii\helpers\StringHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile ;
/**
 * ContentsController implements the CRUD actions for Content model.
 */
class ContentsController extends Controller
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
                        'actions' => ['create', 'update','delete','view','index','edit','view-page'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Content models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ContentSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Content model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Content model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Content();
        $model->setScenario("insert");
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Content model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $model->setScenario("update");
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    public function actionEdit($id)
    {
        $errors = 0 ;
        $models = $this->findPage($id);
        $translation_models = $this->findTrans($id) ;
        $related_model = $this->getRelatedModel($id);        
        
        if(!count($models) && !count($translation_models))
            throw new NotFoundHttpException('The requested page does not exist.');
        
        $image = Image::find()->where("category_id = $id")->one();
        if($image)
          $image->scenario = "update";
        
        if (Yii::$app->request->post() !== null && count(Yii::$app->request->post()))
        {
            foreach ($models as $model) {
                if(isset(Yii::$app->request->post()["Content"][$model->id]))
                {
                    $model->scenario = "edit";
                    $model->setAttributes(Yii::$app->request->post()["Content"][$model->id]) ;
                    if(!$model->save())
                        $errors++;
                }                
            }
            
            foreach ($translation_models as $model) {
                if(isset(Yii::$app->request->post()["ContentTranslation"][$model->id]))
                {
                    $model->scenario = "edit";
                    $model->setAttributes(Yii::$app->request->post()["ContentTranslation"][$model->id]) ;
                    if(!$model->save())
                        $errors++;
                }                
            }
            
            if($errors==0 && $image && $image->load(Yii::$app->request->post()))
            {
                if(!$image->save())
                    $errors++;
            }

            if($errors==0)
                return $this->redirect(['view-page', 'id' => $id]);
        }
        
        return $this->render('_edit', [
                'models' => $models, 'translation_models'=>$translation_models, 'related_model'=>$related_model,'image'=>$image, 'errors'=>$errors, 'category_id'=>$id
            ]);

    }

    /**
     * Displays a single Page model.
     * @param integer $id
     * @return mixed
     */
    public function actionViewPage($id)
    {
        $image = Image::find()->where("category_id = $id")->one();
        
        return $this->render('_view_page', [
            'models' => $this->findPage($id), 'related_model'=>$this->getRelatedModel($id),'translation_models'=>  $this->findTrans($id), 'image'=>$image
        ]);
    }

    /**
     * Deletes an existing Content model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }
    
    protected function getRelatedModel($category_id) {
        foreach (Yii::$app->params['pages'] as $title => $category) {
            if(array_key_exists('class', $category) && $category['id']==$category_id)
            {
                $category_model = $category['class'];
                $category_controller = $category['controller'];
                $searchModel = new $category_model;
                return [ 
                    'dataProvider'  => $searchModel->search(Yii::$app->request->queryParams),
                    'view'=> $category_controller,
                    'create_link'    => Html::a('Add new '.BaseInflector::camel2words(StringHelper::basename(get_class($searchModel))), Yii::$app->urlManager->createUrl(["/$category_controller/create"]), ['class' => 'btn btn-success']),
                ];
            }
        }
        return;
    }

    /**
     * Finds the Content model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Content the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Content::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    /**
     * Finds the Page model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Page the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findPage($id)
    {
        $models = Content::find()->where("category_id = $id AND is_multi_lang != 1")->all()  ;
        return $models;
    }
    
    protected function findTrans($category_id)
    {
        $translation_models = [];
        $models = Content::find()->where("category_id = $category_id AND is_multi_lang = 1")->orderBy("order")->all();
        foreach ($models as $model) {
            foreach (Language::find()->all() as $language) {
                $translation_models[] = $this->getTranslationModel($model, $language);
            }
        }
        return $translation_models;
    }
    
    protected function getTranslationModel($model,$language)
    {
        $translation_model = new ContentTranslation;
        if(ContentTranslation::find()->where("content_id = {$model->id} AND language_id = {$language->id}")->one())
            $translation_model = ContentTranslation::find()->where("content_id = {$model->id} AND language_id = {$language->id}")->one();
        
        $translation_model->content_id      = $model->id;
        $translation_model->language_id     = $language->id;
        $translation_model->is_required     = $model->is_required ;
        $translation_model->max             = $model->max ;
        $translation_model->content_type    = $model->content_type;
        $translation_model->label           = BaseInflector::camel2words(BaseInflector::id2camel($model->label,"-"));
        $translation_model->scenario        = "init";
        $translation_model->save();
        
        return $translation_model;
        
    }
}
