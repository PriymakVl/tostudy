<?php

namespace app\modules\language\models;

use Yii;
use app\helpers\Inflector;
use yii\helpers\Html;
use app\modules\country\models\Country;
use app\models\ImageUpload;

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
    public $file_image;

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
            [['col_title_ru'], 'required'],
            [['col_title_ru', 'col_img', 'col_alias'], 'string', 'max' => 100],
            ['file_image', 'file', 'extensions' => 'jpeg, jpg, png'],
            [['col_title_en', 'col_title_es', 'col_title_ua', 'col_title_cn'], 'default', 'value' => ''],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'col_id' => 'ID языка',
            'col_title_en' => 'Col Title En',
            'col_title_es' => 'Col Title Es',
            'col_title_ua' => 'Col Title Ua',
            'col_title_ru' => 'Название',
            'col_title_cn' => 'Col Title Cn',
            'col_img' => 'Изображение',
            'image' => 'Изображение',
            'col_alias' => 'Пвсевдоним для ЧПУ',
        ];
    }

    public function getCountries()
    {
        return $this->hasOne(this::className(), ['col_id' => 'col_lang_id']);
    }

    public function getSchools()
    {
        return self::findSchools($this->col_id);
    }

    public static function findSchools($lang_id)
    {
        $schools = [];
        $countries = Country::findAll(['col_language_id' => $lang_id]);
        if (!$countries) return $schools;
        foreach ($countries as $country) {
            if (!$country->schools) continue;
            else $schools = array_merge($schools, $country->schools);
        }
        return $schools;
    }

    public function getName()
    {
        return $this->col_title_ru;
    }

    public function getImage()
    {
        return '@web/img/languages/' . $this->col_img;
    }

    public function beforeSave($insert) 
    {
        $img = new ImageUpload();
        if ($insert) {
            if ($this->file_image) $this->col_img = $img->uploadFile($this->file_image, 'languages', $this->col_img);
            else $this->col_img = '';
        }
        else {
            if ($this->file_image) $this->col_img = $img->uploadFile($this->file_image, 'languages', $this->col_img);
        }
        $this->col_alias = Inflector::slug($this->col_title_ru, '_');
        return parent::beforeSave($insert);
    }


}
