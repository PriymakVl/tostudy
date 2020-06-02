<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_faq".
 *
 * @property int $col_id
 * @property string $col_question_en
 * @property string $col_question_es
 * @property string $col_question_ua
 * @property string $col_question_ru
 * @property string $col_question_cn
 * @property string $col_answer_en
 * @property string $col_answer_es
 * @property string $col_answer_ua
 * @property string $col_answer_ru
 * @property string $col_answer_cn
 */
class Faq extends \app\models\ModelApp
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_faq';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['col_question_en', 'col_question_es', 'col_question_ua', 'col_question_ru', 'col_question_cn', 'col_answer_en', 'col_answer_es', 'col_answer_ua', 'col_answer_ru', 'col_answer_cn'], 'required'],
            [['col_answer_en', 'col_answer_es', 'col_answer_ua', 'col_answer_ru', 'col_answer_cn'], 'string'],
            [['col_question_en', 'col_question_es', 'col_question_ua', 'col_question_ru', 'col_question_cn'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'col_id' => 'Col ID',
            'col_question_en' => 'Col Question En',
            'col_question_es' => 'Col Question Es',
            'col_question_ua' => 'Col Question Ua',
            'col_question_ru' => 'Col Question Ru',
            'col_question_cn' => 'Col Question Cn',
            'col_answer_en' => 'Col Answer En',
            'col_answer_es' => 'Col Answer Es',
            'col_answer_ua' => 'Col Answer Ua',
            'col_answer_ru' => 'Col Answer Ru',
            'col_answer_cn' => 'Col Answer Cn',
        ];
    }
}
