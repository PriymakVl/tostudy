<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_pages".
 *
 * @property int $col_id
 * @property string $col_meta_title
 * @property string $col_meta_description
 * @property string $col_meta_keywords
 * @property string $col_title_ru
 * @property string $col_text_ru
 * @property string $col_title_en
 * @property string $col_title_es
 * @property string $col_title_ua
 * @property string $col_title_cn
 * @property string $col_text_en
 * @property string $col_text_es
 * @property string $col_text_ua
 * @property string $col_text_cn
 */
class Page extends \app\models\ModelApp
{
    const ABOUT_PAGE_ID = 2;
    const INSURANCE_PAGE_ID = 4;
    const ORDER_PAGE_ID = 5;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_pages';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['col_meta_title', 'col_meta_description', 'col_meta_keywords', 'col_title_ru', 'col_text_ru', 'col_title_en', 'col_title_es', 'col_title_ua', 'col_title_cn', 'col_text_en', 'col_text_es', 'col_text_ua', 'col_text_cn'], 'required'],
            [['col_text_ru', 'col_text_en', 'col_text_es', 'col_text_ua', 'col_text_cn'], 'string'],
            [['col_meta_title', 'col_meta_description', 'col_meta_keywords'], 'string', 'max' => 255],
            [['col_title_ru', 'col_title_en', 'col_title_es', 'col_title_ua', 'col_title_cn'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'col_id' => 'Col ID',
            'col_meta_title' => 'Col Meta Title',
            'col_meta_description' => 'Col Meta Description',
            'col_meta_keywords' => 'Col Meta Keywords',
            'col_title_ru' => 'Col Title Ru',
            'col_text_ru' => 'Col Text Ru',
            'col_title_en' => 'Col Title En',
            'col_title_es' => 'Col Title Es',
            'col_title_ua' => 'Col Title Ua',
            'col_title_cn' => 'Col Title Cn',
            'col_text_en' => 'Col Text En',
            'col_text_es' => 'Col Text Es',
            'col_text_ua' => 'Col Text Ua',
            'col_text_cn' => 'Col Text Cn',
        ];
    }

    public static function about()
    {
        return self::findOne(['col_id' => self::ABOUT_PAGE_ID]);
    }

    public static function insurance()
    {
        return self::findOne(['col_id' => self::INSURANCE_PAGE_ID]);
    }

    public static function order()
    {
        return self::findOne(['col_id' => self::ORDER_PAGE_ID]);
    }
}
