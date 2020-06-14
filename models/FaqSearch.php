<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Faq;

/**
 * FaqSearch represents the model behind the search form of `app\models\Faq`.
 */
class FaqSearch extends Faq
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['col_id'], 'integer'],
            [['col_question_en', 'col_question_es', 'col_question_ua', 'col_question_ru', 'col_question_cn', 'col_answer_en', 'col_answer_es', 'col_answer_ua', 'col_answer_ru', 'col_answer_cn'], 'safe'],
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
        $query = Faq::find();

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

        $query->andFilterWhere(['like', 'col_question_en', $this->col_question_en])
            ->andFilterWhere(['like', 'col_question_es', $this->col_question_es])
            ->andFilterWhere(['like', 'col_question_ua', $this->col_question_ua])
            ->andFilterWhere(['like', 'col_question_ru', $this->col_question_ru])
            ->andFilterWhere(['like', 'col_question_cn', $this->col_question_cn])
            ->andFilterWhere(['like', 'col_answer_en', $this->col_answer_en])
            ->andFilterWhere(['like', 'col_answer_es', $this->col_answer_es])
            ->andFilterWhere(['like', 'col_answer_ua', $this->col_answer_ua])
            ->andFilterWhere(['like', 'col_answer_ru', $this->col_answer_ru])
            ->andFilterWhere(['like', 'col_answer_cn', $this->col_answer_cn]);

        return $dataProvider;
    }
}
