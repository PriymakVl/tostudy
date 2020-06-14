<?php

namespace app\modules\language\models;

use Yii;
use yii\helpers\Html;
use app\modules\country\models\Country;
use yii\web\UploadedFile;
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
    public $image;

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
            [['col_title_ru', 'image'], 'required'],
            [['col_title_ru', 'col_img'], 'string', 'max' => 100],
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

    public function createImage($width = '100px')
    {
        return Html::img('@web/img/languages/' . $this->col_img, ['width' => $width]);
    }

    public function add()
    {
        $this->image  = UploadedFile::getInstance($this, 'image');
        if ($this->validate()) {
            $obj = new ImageUpload();
            $this->col_img = $obj->uploadFile($this->image, 'languages', $this->col_img);
            return $this->save();
        }
    }


}
