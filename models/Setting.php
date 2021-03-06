<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_settings".
 *
 * @property string $col_meta_title
 * @property string $col_meta_description
 * @property string $col_meta_keywords
 * @property string $col_tel
 * @property string $col_email
 * @property string $col_facebook
 * @property string $col_instagram
 * @property string $col_vk
 * @property string $col_ok
 * @property string $col_telegram
 * @property string $col_address_en
 * @property string $col_address_es
 * @property string $col_address_ua
 * @property string $col_address_ru
 * @property string $col_address_cn
 * @property string $col_schedule_en
 * @property string $col_schedule_es
 * @property string $col_schedule_ua
 * @property string $col_schedule_ru
 * @property string $col_schedule_cn
 */
class Setting extends \app\models\ModelApp
{

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_settings';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['col_meta_title', 'col_meta_description', 'col_meta_keywords', 'col_tel', 'col_email', 'col_facebook', 'col_instagram', 'col_vk', 'col_ok', 'col_telegram', 'col_address_ru', 'col_schedule_ru'], 'required'],
            [['col_address_en', 'col_address_es', 'col_address_ua', 'col_address_ru', 'col_address_cn'], 'string'],
            [['col_meta_title', 'col_meta_description', 'col_meta_keywords', 'col_schedule_en', 'col_schedule_es', 'col_schedule_ua', 'col_schedule_ru', 'col_schedule_cn'], 'string', 'max' => 255],
            [['col_tel', 'col_email', 'col_facebook', 'col_instagram', 'col_vk', 'col_ok', 'col_telegram'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'col_meta_title' => 'Title(тег)',
            'col_meta_description' => 'Description(метатег)',
            'col_meta_keywords' => 'Keywords(метатег)',
            'col_tel' => 'Телефон',
            'col_email' => 'Email',
            'col_facebook' => 'Facebook',
            'col_instagram' => 'Instagram',
            'col_vk' => 'ВКонтакте',
            'col_ok' => 'Однокласники',
            'col_telegram' => 'Telegram',
            'col_address_en' => 'Col Address En',
            'col_address_es' => 'Col Address Es',
            'col_address_ua' => 'Col Address Ua',
            'col_address_ru' => 'Адрес',
            'col_address_cn' => 'Col Address Cn',
            'col_schedule_en' => 'Col Schedule En',
            'col_schedule_es' => 'Col Schedule Es',
            'col_schedule_ua' => 'Col Schedule Ua',
            'col_schedule_ru' => 'График работы',
            'col_schedule_cn' => 'Col Schedule Cn',
        ];
    }
}
