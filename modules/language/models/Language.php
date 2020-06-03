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

    public $countries;

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

    public function getCountries()
    {
        return $this->hasOne(this::className(), ['col_id' => 'col_lang_id']);
    }

    public static function getSchools($lang_id)
    {
        $schools = [];
        $countries = Country::findAll(['col_lang_id' => $lang_id]);
        if (!$countries) return $schools;
        foreach ($countries as $country) {
            $country_schools = Country::getSchools($country->col_id);
            if (!$country_schools) continue;
            else $schools = array_merge($schools, $country_schools);
        }
        return $schools;
    }


}
