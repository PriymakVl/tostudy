<?php

namespace app\modules\course\models;

use Yii;

/**
 * This is the model class for table "tbl_courses".
 *
 * @property int $col_id
 * @property int $col_school_id
 * @property string $col_title_en
 * @property string $col_title_es
 * @property string $col_title_ua
 * @property string $col_title_ru
 * @property string $col_title_cn
 * @property string $col_description_en
 * @property string $col_description_es
 * @property string $col_description_ua
 * @property string $col_description_ru
 * @property string $col_description_cn
 * @property string $col_price
 */
class CourseBase extends \app\models\ModelApp
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_courses';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['col_school_id', 'col_prog_id', 'col_title_ru', 'col_description_ru'], 'required'],
            [['col_school_id', 'col_prog_id'], 'integer'],
            [['col_description_ru', 'col_price'], 'string'],
            [['col_title_ru'], 'string', 'max' => 255],
            [['col_title_en', 'col_title_es', 'col_title_ua', 'col_title_cn', 'col_price'], 'default', 'value' => ''],
            [['col_description_en', 'col_description_es', 'col_description_ua', 'col_description_cn'], 'default', 'value' => ''],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'col_id' => 'ID курса',
            'col_school_id' => 'ID школы',
            'school' => 'Название школы',
            'col_title_en' => 'Col Title En',
            'col_title_es' => 'Col Title Es',
            'col_title_ua' => 'Col Title Ua',
            'col_title_ru' => 'Название курса',
            'col_title_cn' => 'Col Title Cn',
            'col_description_en' => 'Col Description En',
            'col_description_es' => 'Col Description Es',
            'col_description_ua' => 'Col Description Ua',
            'col_description_ru' => 'Описание курса',
            'col_description_cn' => 'Col Description Cn',
            'col_price' => 'Цена',
            'col_prog_id' => 'ID программы',
            'program' => 'Название программа',
        ];
    }
}
