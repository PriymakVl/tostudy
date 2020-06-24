<?php

namespace app\models;

use Yii;
use app\modules\school\models\School;

/**
 * This is the model class for table "tbl_accommodation".
 *
 * @property int $col_id
 * @property int $col_school_id
 * @property string $col_title_en
 * @property string $col_title_es
 * @property string $col_title_ua
 * @property string $col_title_ru
 * @property string $col_title_cn
 * @property string $col_price
 */
class Accommodation extends \app\models\ModelApp
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_accommodation';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['col_school_id', 'col_title_ru', 'col_price'], 'required'],
            [['col_school_id'], 'integer'],
            [['col_title_ru'], 'string', 'max' => 255],
            [['col_price'], 'string', 'max' => 10],
            [['col_title_en', 'col_title_es', 'col_title_ua', 'col_title_cn'], 'default', 'value' => ''],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'col_id' => 'ID жилья',
            'col_school_id' => 'Школа',
            'col_title_en' => 'Col Title En',
            'col_title_es' => 'Col Title Es',
            'col_title_ua' => 'Col Title Ua',
            'col_title_ru' => 'Название жилья',
            'col_title_cn' => 'Col Title Cn',
            'col_price' => 'Цена за неделю',
        ];
    }

    public function getSchool()
    {
        return $this->hasOne(School::className(), ['col_id' => 'col_school_id']);
    }

    public function getTitle()
    {
        return $this->col_title_ru;
    }

    public function getPrice()
    {
        return $this->col_price;
    }
}
