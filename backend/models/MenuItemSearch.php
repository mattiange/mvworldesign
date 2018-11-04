<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\MenuItem;

/**
 * MenuItemSearch represents the model behind the search form of `backend\models\MenuItem`.
 */
class MenuItemSearch extends MenuItem
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'position', 'parent', 'menu_id'], 'integer'],
            [['menu_item', 'controller', 'view'], 'safe'],
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
        $query = MenuItem::find();

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
            'position' => $this->position,
            'parent' => $this->parent,
            'menu_id' => $this->menu_id,
        ]);

        $query->andFilterWhere(['like', 'menu_item', $this->menu_item])
            ->andFilterWhere(['like', 'controller', $this->controller])
            ->andFilterWhere(['like', 'view', $this->view]);

        return $dataProvider;
    }
}
