<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Branch;

/**
 * BranchSearch represents the model behind the search form of `backend\models\Branch`.
 */
class BranchSearch extends Branch
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['code', 'bch_type', 'bch_name', 'bch_address'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = Branch::find();

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
        $query->andFilterWhere(['like', 'code', $this->code])
            ->andFilterWhere(['like', 'bch_type', $this->bch_type])
            ->andFilterWhere(['like', 'bch_name', $this->bch_name])
            ->andFilterWhere(['like', 'bch_address', $this->bch_address]);

        return $dataProvider;
    }
}
