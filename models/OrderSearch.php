<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Order;

/**
 * OrderSearch represents the model behind the search form of `app\models\Order`.
 */
class OrderSearch extends Order
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['col_id', 'col_school_id', 'col_course_id', 'col_weeks', 'col_accommodation', 'col_status'], 'integer'],
            [['col_username', 'col_email', 'col_tel', 'col_comment', 'col_date'], 'safe'],
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
        $query = Order::find();

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
            'col_id' => $this->col_id,
            'col_school_id' => $this->col_school_id,
            'col_course_id' => $this->col_course_id,
            'col_weeks' => $this->col_weeks,
            'col_accommodation' => $this->col_accommodation,
            'col_date' => $this->col_date,
            'col_status' => $this->col_status,
        ]);

        $query->andFilterWhere(['like', 'col_username', $this->col_username])
            ->andFilterWhere(['like', 'col_email', $this->col_email])
            ->andFilterWhere(['like', 'col_tel', $this->col_tel])
            ->andFilterWhere(['like', 'col_comment', $this->col_comment]);

        return $dataProvider;
    }
}
