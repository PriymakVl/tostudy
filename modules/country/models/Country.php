<?php

namespace app\modules\country\models;

use Yii;
use yii\helpers\Html;
use app\modules\city\models\City;
use app\modules\language\models\Language;
use yii\web\UploadedFile;
use app\models\ImageUpload;

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
    public $file_image;
    public $file_flag;

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
            [['col_language_id',  'col_title_ru', 'file_image', 'file_flag' ], 'required'],
            [['file_image', 'file_flag'], 'file', 'extensions' => 'jpeg, jpg, png'],
            [['col_language_id'], 'integer'],
            [['col_title_ru', 'col_img', 'col_flag'], 'string', 'max' => 100],
            [['col_title_en', 'col_title_es', 'col_title_ua', 'col_title_cn'], 'default', 'value' => '']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'col_id' => 'ID страны',
            'col_language_id' => 'Язык',
            'col_title_en' => 'Col Title En',
            'col_title_es' => 'Col Title Es',
            'col_title_ua' => 'Col Title Ua',
            'col_title_ru' => 'Название страны',
            'col_title_cn' => 'Col Title Cn',
            'col_img' => 'Col Img',
            'col_flag' => 'Col Flag',
            'image' => 'Изображение',
            'flag' => 'Флаг',
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

    public function getSchools()
    {
        return self::findSchools($this->col_id);
    }

    public static function findSchools($country_id)
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

    public function getName()
    {
        return $this->col_title_ru;
    }

    public function getLanguage()
    {
        return $this->hasOne(Language::className(), ['col_id' => 'col_language_id']);
    }

    public function getImage()
    {
        return '@web/img/countries/' . $this->col_img;
    }

    public function getFlag()
    {
        return '@web/img/countries/flags/' . $this->col_flag;
    }

    public function add()
    {
        if ($this->validate()) {
            $img = new ImageUpload();
            $flag = new ImageUpload();
            $this->col_img = $img->uploadFile($this->file_image, 'countries', $this->col_img);
            $this->col_flag = $flag->uploadFile($this->file_flag, 'countries/flags', $this->col_flag);
            return $this->save(false);
        }
    }
}


