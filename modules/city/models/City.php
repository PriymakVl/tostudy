<?php

namespace app\modules\city\models;

use Yii;
use app\modules\school\models\School;
use app\modules\country\models\Country;

/**
 * This is the model class for table "tbl_cities".
 *
 * @property int $col_id
 * @property int $col_country_id
 * @property string $col_title_en
 * @property string $col_title_es
 * @property string $col_title_ua
 * @property string $col_title_ru
 * @property string $col_title_cn
 * @property string $col_img
 */
class City extends \app\models\ModelApp
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_cities';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['col_country_id', 'col_title_en', 'col_title_es', 'col_title_ua', 'col_title_ru', 'col_title_cn', 'col_img'], 'required'],
            [['col_country_id'], 'integer'],
            [['col_title_en', 'col_title_es', 'col_title_ua', 'col_title_ru', 'col_title_cn'], 'string', 'max' => 255],
            [['col_img'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'col_id' => 'Col ID',
            'col_country_id' => 'Col Country ID',
            'col_title_en' => 'Col Title En',
            'col_title_es' => 'Col Title Es',
            'col_title_ua' => 'Col Title Ua',
            'col_title_ru' => 'Col Title Ru',
            'col_title_cn' => 'Col Title Cn',
            'col_img' => 'Col Img',
        ];
    }

    public function getSchools()
    {
        return $this->hasMany(School::className(), ['col_city_id' => 'col_id']);
    }

    public function getCountry()
    {
        return $this->hasOne(Country::className(), ['col_id' => 'col_country_id']);
    }
    
}
