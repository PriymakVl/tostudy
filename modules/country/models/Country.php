<?php

namespace app\modules\country\models;

use Yii;
use app\modules\city\models\City;

/**
 * This is the model class for table "tbl_countries".
 *
 * @property int $col_id
 * @property int $col_language_id
 * @property string $col_title_en
 * @property string $col_title_es
 * @property string $col_title_ua
 * @property string $col_title_ru
 * @property string $col_title_cn
 * @property string $col_img
 * @property string $col_flag
 */
class Country extends \app\models\ModelApp
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_countries';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['col_language_id', 'col_title_en', 'col_title_es', 'col_title_ua', 'col_title_ru', 'col_title_cn', 'col_img', 'col_flag'], 'required'],
            [['col_language_id'], 'integer'],
            [['col_title_en', 'col_title_es', 'col_title_ua', 'col_title_ru', 'col_title_cn', 'col_img', 'col_flag'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'col_id' => 'Col ID',
            'col_language_id' => 'Col Language ID',
            'col_title_en' => 'Col Title En',
            'col_title_es' => 'Col Title Es',
            'col_title_ua' => 'Col Title Ua',
            'col_title_ru' => 'Col Title Ru',
            'col_title_cn' => 'Col Title Cn',
            'col_img' => 'Col Img',
            'col_flag' => 'Col Flag',
        ];
    }

    public function getCities()
    {
        return $this->hasMany(City::className(), ['col_country_id' => 'col_id']);
    }

    public static function countSchools($country_id)
    {
        $count = 0;
        $schools = self::getSchools($country_id);
        if ($schools) $count = count($schools);
        return $count;
    }

    public static function getSchools($country_id)
    {
        $schools = [];
        $cities = City::findAll(['col_country_id' => $country_id]);
        if (!$cities) return $schools;
        foreach ($cities as $city) {
            if (!$city->schools) continue;
            else $schools = array_merge($schools, $city->schools);
        }
        return $schools;
    }
}
