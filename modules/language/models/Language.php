<?php

namespace app\modules\language\models;

use Yii;

/**
 * This is the model class for table "tbl_languages".
 *
 * @property int $col_id
 * @property string $col_title_en
 * @property string $col_title_es
 * @property string $col_title_ua
 * @property string $col_title_ru
 * @property string $col_title_cn
 * @property string $col_img
 */
class Language extends \app\models\ModelApp
{

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_languages';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['col_title_en', 'col_title_es', 'col_title_ua', 'col_title_ru', 'col_title_cn', 'col_img'], 'required'],
            [['col_title_en', 'col_title_es', 'col_title_ua', 'col_title_ru', 'col_title_cn', 'col_img'], 'string', 'max' => 100],
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
            'col_img' => 'Col Img',
        ];
    }


}
