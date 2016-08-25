<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Call;

/**
 * CallSearch represents the model behind the search form about `app\models\Call`.
 */
class CallSearch extends Call
{
    public $dateRange;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'sender_num', 'recepient_num', 'time_init', 'time_connected', 'time_finished', 'route'], 'integer'],
            [['comment'], 'safe'],
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
        $query = Call::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
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
            'sender_num' => $this->sender_num,
            'recepient_num' => $this->recepient_num,
            'time_init' => $this->time_init,
            'time_connected' => $this->time_connected,
            'time_finished' => $this->time_finished,
            'route' => $this->route,
        ]);

        $query->andFilterWhere(['like', 'comment', $this->comment]);

        if ($params && $params['CallSearch'] && $params['CallSearch']['dateRange']) {
            $timestampRange = [];
            $timestampRange[] = strtotime(substr($params['CallSearch']['dateRange'], 0, 19));
            $timestampRange[] = strtotime(substr($params['CallSearch']['dateRange'], 22, 19));

            $query->andFilterWhere(['between', 'time_init', $timestampRange[0], $timestampRange[1]]);
        }

        return $dataProvider;
    }
}
