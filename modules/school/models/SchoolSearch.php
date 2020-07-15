<?php

namespace app\modules\school\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\school\models\School;
use app\modules\city\models\City;

/**
 * SchoolSearch represents the model behind the search form of `app\modules\school\models\School`.
 */
class SchoolSearch extends School
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['col_id', 'col_home_page'], 'integer'],
            [['col_title', 'col_city_id'], 'string'],
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
        $query = School::find();

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
            'col_city_id' => $this->col_city_id ? City::find()->select(['col_id'])->where(['like', 'col_title_ru', $this->col_city_id])->column() : null,
            'col_home_page' => $this->col_home_page,
        ]);

        $query->andFilterWhere(['like', 'col_title', $this->col_title])
            ;

        return $dataProvider;
    }
}
