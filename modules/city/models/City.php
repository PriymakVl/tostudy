<?php

namespace app\modules\city\models;

use Yii;
use app\modules\school\models\School;
use app\modules\country\models\Country;
use app\models\ImageUpload;

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
    public $file_image;

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
            [['col_title_ru', 'file_image', 'col_country_id'], 'required'],
            ['file_image', 'file', 'extensions' => 'jpeg, jpg, png'], 
            [['col_country_id'], 'integer'],
            [['col_title_ru', ], 'string', 'max' => 255],
            [['col_img'], 'string', 'max' => 100],
            [['col_title_en', 'col_title_es', 'col_title_ua', 'col_title_cn'], 'default', 'value' => ''],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'col_id' => 'ID города',
            'col_country_id' => 'Страна',
            'col_title_ru' => 'Название города',
            'col_img' => 'Col Img',
            'image' => 'Изображение',
            'language' => 'Язык',
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

    public function getImage()
    {
        return '@web/img/cities/' . $this->col_img;
    }

    public function beforeSave($insert)
    {
        if ($insert) {
            $img = new ImageUpload();
            $this->col_img = $img->uploadFile($this->file_image, 'cities', $this->col_img);  
        }
        return parent::beforeSave($insert);
    }
    
}
