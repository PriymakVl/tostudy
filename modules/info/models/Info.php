<?php

namespace app\modules\info\models;

use Yii;
use app\modules\country\models\Country;
use app\helpers\Inflector;

/**
 * This is the model class for table "tbl_info".
 *
 * @property int $col_id
 * @property int $col_country_id
 * @property string $col_title_en
 * @property string $col_title_es
 * @property string $col_title_ua
 * @property string $col_title_ru
 * @property string $col_title_cn
 * @property string $col_text_en
 * @property string $col_text_es
 * @property string $col_text_ua
 * @property string $col_text_ru
 * @property string $col_text_cn
 * @property int $col_status
 */
class Info extends \app\models\ModelApp
{
    const STATUS_DRAFT = 2;
    const STATUS_PUBLISHED = 3;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_info';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['col_country_id', 'col_title_ru', 'col_text_ru',  'col_status'], 'required'],
            [['col_country_id', 'col_status'], 'integer'],
            [['col_text_ru'], 'string'],
            [['col_meta_title', 'col_meta_keywords', 'col_meta_description'], 'string', 'max' => 255],
            [['col_title_ru', 'col_alias'], 'string', 'max' => 255],
            [['col_title_en', 'col_title_es', 'col_title_ua', 'col_title_cn'], 'default', 'value' => ''],
            [['col_text_en', 'col_text_es', 'col_text_ua', 'col_text_cn',], 'default', 'value' => ''],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'col_id' => 'ID',
            'col_country_id' => 'ID cтраны',
            'country' => 'Страна',
            'col_title_ru' => 'Название статьи',
            'col_text_ru' => 'Текст статьи',
            'col_status' => 'Статус',
            'col_alias' => 'Пвсевдоним для ЧПУ',
            'col_meta_title' => 'Title (тег)',
            'col_meta_keywords' => 'Keywords (метатег)',
            'col_meta_description' => 'Description (метатег)',
        ];
    }

    public function beforeSave($insert)
    {
        $this->col_alias = Inflector::slug($this->col_title_ru, '_');
        return parent::beforeSave($insert);
    }

    public function getCountry()
    {
        return $this->hasOne(Country::className(), ['col_id' => 'col_country_id']);
    }

    public function getStatus()
    {
        if($this->col_status == self::STATUS_PUBLISHED) return 'Опубликована';
        return 'Не опубликована';
    }
}
