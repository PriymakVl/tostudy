<?php

namespace app\modules\info\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\info\models\Info;
use app\modules\country\models\Country;

/**
 * InfoSearch represents the model behind the search form of `app\modules\info\models\Info`.
 */
class InfoSearch extends Info
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['col_id', 'col_country_id', 'col_status'], 'integer'],
            [['col_title_en', 'col_title_es', 'col_title_ua', 'col_title_ru', 'col_title_cn', 'col_text_en', 'col_text_es', 'col_text_ua', 'col_text_ru', 'col_text_cn'], 'safe'],
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
        $query = Info::find();

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
            'col_country_id' => $this->col_country_id,
            'col_status' => $this->col_status,
        ]);

        $query->andFilterWhere(['like', 'col_title_ru', $this->col_title_ru]);

        return $dataProvider;
    }
}
