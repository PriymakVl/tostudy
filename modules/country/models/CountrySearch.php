<?php

namespace app\modules\country\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\country\models\Country;

/**
 * CountrySearch represents the model behind the search form of `app\modules\country\models\Country`.
 */
class CountrySearch extends Country
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['col_id', 'col_language_id'], 'integer'],
            [['col_title_en', 'col_title_es', 'col_title_ua', 'col_title_ru', 'col_title_cn', 'col_img', 'col_flag'], 'safe'],
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
        $query = Country::find();

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
            'col_language_id' => $this->col_language_id,
        ]);

        $query->andFilterWhere(['like', 'col_title_en', $this->col_title_en])
            ->andFilterWhere(['like', 'col_title_es', $this->col_title_es])
            ->andFilterWhere(['like', 'col_title_ua', $this->col_title_ua])
            ->andFilterWhere(['like', 'col_title_ru', $this->col_title_ru])
            ->andFilterWhere(['like', 'col_title_cn', $this->col_title_cn])
            ->andFilterWhere(['like', 'col_img', $this->col_img])
            ->andFilterWhere(['like', 'col_flag', $this->col_flag]);

        return $dataProvider;
    }
}
