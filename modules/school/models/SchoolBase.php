<?php

namespace app\modules\school\models;

use Yii;
use app\models\ImageUpload;
use app\models\PdfUpload;
use yii\helpers\Inflector;

/**
 * This is the model class for table "tbl_schools".
 *
 * @property int $col_id
 * @property int $col_city_id
 * @property string $col_meta_title
 * @property string $col_meta_description
 * @property string $col_meta_keywords
 * @property string $col_title
 * @property string $col_url
 * @property string $col_img_mini
 * @property string $col_img
 * @property string $col_description_en
 * @property string $col_description_es
 * @property string $col_description_ua
 * @property string $col_description_ru
 * @property string $col_description_cn
 * @property string $col_about_us_en
 * @property string $col_about_us_es
 * @property string $col_about_us_ua
 * @property string $col_about_us_ru
 * @property string $col_about_us_cn
 * @property string $col_residence_en
 * @property string $col_residence_es
 * @property string $col_residence_ua
 * @property string $col_residence_ru
 * @property string $col_residence_cn
 * @property string $col_registration_fee
 * @property int $col_home_page
 * @property int $col_currency
 * @property int $col_subcategory
 */
class SchoolBase extends \app\models\ModelApp
{

    public $file_img;
    public $file_img_mini;
    public $file_pdf;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_schools';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['col_city_id', 'col_meta_title', 'col_meta_description', 'col_meta_keywords', 'col_title', 'col_about_us_ru', 'col_residence_ru', 'col_registration_fee', 'col_home_page', 'col_currency', 'col_subcategory', 'file_img_mini', 'file_img'], 'required'],

            [['col_city_id', 'col_home_page', 'col_currency', 'col_subcategory'], 'integer'],
            [['col_description_ru', 'col_about_us_ru', 'col_residence_ru'], 'string'],
            [['col_meta_title', 'col_meta_description', 'col_meta_keywords', 'col_title', 'col_alias'], 'string', 'max' => 255],

            [['col_registration_fee', 'col_img_mini', 'col_img', 'col_pdf'], 'string', 'max' => 10],
            [['col_description_ru'], 'default', 'value' => ''],

            [['file_img', 'file_img_mini'], 'file', 'extensions' => 'png, jpg, jpeg'],

            ['file_pdf', 'file', 'extensions' => 'pdf'],

            [['col_url', ], 'default', 'value' => ''], //todo delete from table

            [['col_description_en', 'col_description_es', 'col_description_ua', 'col_description_cn'], 'default', 'value' => ''],
            [['col_about_us_en', 'col_about_us_es', 'col_about_us_ua', 'col_about_us_cn'], 'default', 'value' => ''],
            [['col_residence_en', 'col_residence_es', 'col_residence_ua', 'col_residence_cn'], 'default', 'value' => ''],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'col_id' => 'ID',
            'col_city_id' => 'Город',
            'col_meta_title' => 'Meta Title',
            'col_meta_description' => 'Meta Description',
            'col_meta_keywords' => 'Meta Keywords',
            'col_title' => 'Название школы',
            'col_url' => 'Col Url',
            'col_img_mini' => 'Изображение  Mini',
            'col_img' => 'Изображение',
            'img' => 'Изображеие',
            'col_description_ru' => 'Краткое описание',
            'col_about_us_ru' => 'О школе',
            'col_residence_ru' => 'Проживание',
            'col_registration_fee' => 'Регистрационный сбор',
            'col_home_page' => 'На главной',
            'col_currency' => 'Валюта',
            'col_subcategory' => 'Программа',
            'file_pdf' => 'Файл PDF',
            'col_pdf' => 'Файл PDF',
        ];
    }

    public function scenarios()
    {
        $scenarios = parent::scenarios();
        $scenarios['update'] = ['col_city_id', 'col_meta_title', 'col_meta_description', 'col_meta_keywords', 'col_title', 'col_about_us_ru', 'col_residence_ru', 'col_registration_fee', 'col_home_page', 'col_currency', 'col_subcategory'];
        return $scenarios;
    }

    public function beforeSave($insert)
    {
        $img = new ImageUpload();
        $pdf = new PdfUpload();
        if ($insert) {
            $this->col_img = $img->uploadFile($this->file_img, 'schools/big', $this->col_img); 
            $this->col_img_mini = $img->uploadFile($this->file_img_mini, 'schools', $this->col_img_mini); 
             
        }
        else {
            if ($this->file_img) $this->col_img = $img->uploadFile($this->file_img, 'schools/big', $this->col_img);
            if ($this->file_img_mini) $this->col_img_mini = $img->uploadFile($this->file_img_mini, 'schools', $this->col_img_mini);
        }
        if ($this->file_pdf) $this->col_pdf = $pdf->uploadFile($this->file_pdf, $this->col_pdf);
        $this->col_alias = Inflector::slug($this->col_title, '_');
        return true;
    }
}
