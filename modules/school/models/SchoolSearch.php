<?php

namespace app\modules\school\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\school\models\School;

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
            [['col_id', 'col_city_id', 'col_home_page', 'col_currency'], 'integer'],
            [['col_meta_title', 'col_meta_description', 'col_meta_keywords', 'col_title', 'col_url', 'col_img_mini', 'col_img', 'col_description_en', 'col_description_es', 'col_description_ua', 'col_description_ru', 'col_description_cn', 'col_about_us_en', 'col_about_us_es', 'col_about_us_ua', 'col_about_us_ru', 'col_about_us_cn', 'col_residence_en', 'col_residence_es', 'col_residence_ua', 'col_residence_ru', 'col_residence_cn', 'col_registration_fee'], 'safe'],
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
            'col_city_id' => $this->col_city_id,
            'col_home_page' => $this->col_home_page,
        ]);

        $query->andFilterWhere(['like', 'col_title', $this->col_title])
            ;

        return $dataProvider;
    }
}
