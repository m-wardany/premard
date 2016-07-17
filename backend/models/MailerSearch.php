<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Mailer;

/**
 * MailerSearch represents the model behind the search form about `backend\models\Mailer`.
 */
class MailerSearch extends Mailer
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'type', 'port'], 'integer'],
            [['title', 'slug', 'host', 'username', 'password', 'encryption', 'incoming_server', 'imap_port', 'outgoing_server', 'smtp_port'], 'safe'],
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
        $query = Mailer::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'type' => $this->type,
            'port' => $this->port,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'slug', $this->slug])
            ->andFilterWhere(['like', 'host', $this->host])
            ->andFilterWhere(['like', 'username', $this->username])
            ->andFilterWhere(['like', 'password', $this->password])
            ->andFilterWhere(['like', 'encryption', $this->encryption])
            ->andFilterWhere(['like', 'incoming_server', $this->incoming_server])
            ->andFilterWhere(['like', 'imap_port', $this->imap_port])
            ->andFilterWhere(['like', 'outgoing_server', $this->outgoing_server])
            ->andFilterWhere(['like', 'smtp_port', $this->smtp_port]);

        return $dataProvider;
    }
}
