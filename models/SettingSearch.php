<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Setting;

/**
 * SettingSearch represents the model behind the search form of `app\models\Setting`.
 */
class SettingSearch extends Setting
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['col_id'], 'integer'],
            [['col_meta_title', 'col_meta_description', 'col_meta_keywords', 'col_tel', 'col_email', 'col_facebook', 'col_instagram', 'col_vk', 'col_ok', 'col_telegram', 'col_address_en', 'col_address_es', 'col_address_ua', 'col_address_ru', 'col_address_cn', 'col_schedule_en', 'col_schedule_es', 'col_schedule_ua', 'col_schedule_ru', 'col_schedule_cn'], 'safe'],
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
        $query = Setting::find();

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
        ]);

        $query->andFilterWhere(['like', 'col_meta_title', $this->col_meta_title])
            ->andFilterWhere(['like', 'col_meta_description', $this->col_meta_description])
            ->andFilterWhere(['like', 'col_meta_keywords', $this->col_meta_keywords])
            ->andFilterWhere(['like', 'col_tel', $this->col_tel])
            ->andFilterWhere(['like', 'col_email', $this->col_email])
            ->andFilterWhere(['like', 'col_facebook', $this->col_facebook])
            ->andFilterWhere(['like', 'col_instagram', $this->col_instagram])
            ->andFilterWhere(['like', 'col_vk', $this->col_vk])
            ->andFilterWhere(['like', 'col_ok', $this->col_ok])
            ->andFilterWhere(['like', 'col_telegram', $this->col_telegram])
            ->andFilterWhere(['like', 'col_address_en', $this->col_address_en])
            ->andFilterWhere(['like', 'col_address_es', $this->col_address_es])
            ->andFilterWhere(['like', 'col_address_ua', $this->col_address_ua])
            ->andFilterWhere(['like', 'col_address_ru', $this->col_address_ru])
            ->andFilterWhere(['like', 'col_address_cn', $this->col_address_cn])
            ->andFilterWhere(['like', 'col_schedule_en', $this->col_schedule_en])
            ->andFilterWhere(['like', 'col_schedule_es', $this->col_schedule_es])
            ->andFilterWhere(['like', 'col_schedule_ua', $this->col_schedule_ua])
            ->andFilterWhere(['like', 'col_schedule_ru', $this->col_schedule_ru])
            ->andFilterWhere(['like', 'col_schedule_cn', $this->col_schedule_cn]);

        return $dataProvider;
    }
}
