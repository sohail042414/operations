<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Request;

/**
 * SearchRequest represents the model behind the search form about `common\models\Request`.
 */
class SearchRequest extends Request
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'status_id', 'problem_id', 'customer_id', 'city_id', 'location_id', 'installed_items_cost', 'labour_cost', 'total_cost'], 'integer'],
            [['problem_details', 'contact_person_name', 'phone', 'address', 'installed_items_details', 'operator_feedback', 'admin_feedback', 'created_at', 'updated_at'], 'safe'],
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
        $query = Request::find();

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
            'status_id' => $this->status_id,
            'problem_id' => $this->problem_id,
            'customer_id' => $this->customer_id,
            'city_id' => $this->city_id,
            'location_id' => $this->location_id,
            'installed_items_cost' => $this->installed_items_cost,
            'labour_cost' => $this->labour_cost,
            'total_cost' => $this->total_cost,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'problem_details', $this->problem_details])
            ->andFilterWhere(['like', 'contact_person_name', $this->contact_person_name])
            ->andFilterWhere(['like', 'phone', $this->phone])
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'installed_items_details', $this->installed_items_details])
            ->andFilterWhere(['like', 'operator_feedback', $this->operator_feedback])
            ->andFilterWhere(['like', 'admin_feedback', $this->admin_feedback]);

        return $dataProvider;
    }
}
