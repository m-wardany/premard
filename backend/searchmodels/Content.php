<?php

namespace backend\searchmodels;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Content as ContentModel;

/**
 * Content represents the model behind the search form about `common\models\Content`.
 */
class Content extends ContentModel
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'category_id', 'content_type', 'order', 'max', 'is_required'], 'integer'],
            [['label', 'content'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = ContentModel::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        $dataProvider->setSort([
            'defaultOrder' => ['category_id'=>SORT_ASC],
            
        ]);
        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'category_id' => $this->category_id,
            'content_type' => $this->content_type,
            'order' => $this->order,
            'max' => $this->max,
            'is_required' => $this->is_required,
        ]);

        $query->andFilterWhere(['like', 'label', $this->label])
            ->andFilterWhere(['like', 'content', $this->content]);

        return $dataProvider;
    }
}
