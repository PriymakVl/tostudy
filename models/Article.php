<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_articles".
 *
 * @property int $col_id
 * @property string $col_title_en
 * @property string $col_title_es
 * @property string $col_title_ua
 * @property string $col_title_ru
 * @property string $col_title_cn
 * @property string $col_text_en
 * @property string $col_text_es
 * @property string $col_text_ua
 * @property string $col_text_ru
 * @property string $col_text_cn
 * @property string $col_img
 * @property string $col_img_big
 * @property int $col_status
 */
class Article extends \app\models\ModelApp
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_articles';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['col_title_en', 'col_title_es', 'col_title_ua', 'col_title_ru', 'col_title_cn', 'col_text_en', 'col_text_es', 'col_text_ua', 'col_text_ru', 'col_text_cn', 'col_img', 'col_img_big', 'col_status'], 'required'],
            [['col_text_en', 'col_text_es', 'col_text_ua', 'col_text_ru', 'col_text_cn'], 'string'],
            [['col_status'], 'integer'],
            [['col_title_en', 'col_title_es', 'col_title_ua', 'col_title_ru', 'col_title_cn'], 'string', 'max' => 255],
            [['col_img', 'col_img_big'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'col_id' => 'Col ID',
            'col_title_en' => 'Col Title En',
            'col_title_es' => 'Col Title Es',
            'col_title_ua' => 'Col Title Ua',
            'col_title_ru' => 'Col Title Ru',
            'col_title_cn' => 'Col Title Cn',
            'col_text_en' => 'Col Text En',
            'col_text_es' => 'Col Text Es',
            'col_text_ua' => 'Col Text Ua',
            'col_text_ru' => 'Col Text Ru',
            'col_text_cn' => 'Col Text Cn',
            'col_img' => 'Col Img',
            'col_img_big' => 'Col Img Big',
            'col_status' => 'Col Status',
        ];
    }
}
