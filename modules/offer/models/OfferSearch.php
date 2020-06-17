<?php

namespace app\modules\offer\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\offer\models\Offer;

/**
 * OfferSearch represents the model behind the search form of `app\modules\offer\models\Offer`.
 */
class OfferSearch extends Offer
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['col_id', 'col_status'], 'integer'],
            [['col_title_ru', 'col_text_ru', 'col_alias', 'col_img', 'col_img_big', 'col_date'], 'safe'],
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
        $query = Offer::find();

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
            'col_date' => $this->col_date,
            'col_status' => $this->col_status,
        ]);

        $query->andFilterWhere(['like', 'col_title_ru', $this->col_title_ru])
            ->andFilterWhere(['like', 'col_text_ru', $this->col_text_ru])
            ->andFilterWhere(['like', 'col_alias', $this->col_alias])
            ->andFilterWhere(['like', 'col_img', $this->col_img])
            ->andFilterWhere(['like', 'col_img_big', $this->col_img_big]);

        return $dataProvider;
    }
}
