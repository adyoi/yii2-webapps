<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\UserMenu;

/**
 * UserMenuSearch represents the model behind the search form of `backend\models\UserMenu`.
 */
class UserMenuSearch extends UserMenu
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'id_sub', 'id_sub2', 'seq'], 'integer'],
            [['level', 'module', 'class', 'url_controller', 'url_view', 'url_parameter', 'icon', 'name'], 'safe'],
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
        $query = UserMenu::find();

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
            'id_sub' => $this->id_sub,
            'id_sub2' => $this->id_sub2,
            'seq' => $this->seq,
        ]);

        $query->andFilterWhere(['like', 'level', $this->level])
            ->andFilterWhere(['like', 'module', $this->module])
            ->andFilterWhere(['like', 'class', $this->class])
            ->andFilterWhere(['like', 'url_controller', $this->url_controller])
            ->andFilterWhere(['like', 'url_view', $this->url_view])
            ->andFilterWhere(['like', 'url_parameter', $this->url_parameter])
            ->andFilterWhere(['like', 'icon', $this->icon])
            ->andFilterWhere(['like', 'name', $this->name]);

        return $dataProvider;
    }
}
