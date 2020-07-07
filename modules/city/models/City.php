<?php

namespace app\modules\city\models;

use Yii;
use app\helpers\Inflector;
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
            [['col_title_ru', 'col_country_id'], 'required'],
            ['file_image', 'file', 'extensions' => 'jpeg, jpg, png'], 
            [['col_country_id'], 'integer'],
            [['col_title_ru', ], 'string', 'max' => 255],
            [['col_img'], 'string', 'max' => 100],
            // ['col_alias', 'unique'],
            [['col_meta_title', 'col_meta_keywords', 'col_meta_description'], 'string', 'max' => 255],
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
            'col_img' => 'Изображение',
            'image' => 'Изображение',
            'language' => 'Язык',
            'col_alias' => 'Псевдоним для ЧПУ',
            'col_meta_title' => 'Title (тег)',
            'col_meta_keywords' => 'Keywords (метатег)',
            'col_meta_description' => 'Description (метатег)',
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
        $img = new ImageUpload();
        if ($insert) {
            if ($this->file_image) $this->col_img = $img->uploadFile($this->file_image, 'cities', $this->col_img); 
            else $this->col_img = ''; 
        }
        else {
             if ($this->file_image) $this->col_img = $img->uploadFile($this->file_image, 'cities', $this->col_img); 
        }
        $this->col_alias = Inflector::slug($this->col_title_ru, '_');
        return parent::beforeSave($insert);
    }
    
}
