<?php

namespace app\modules\country\models;

use Yii;
use app\modules\country\models\Country;

/**
 * This is the model class for table "tbl_country_texts".
 *
 * @property int $col_id
 * @property int $col_country_id
 * @property string|null $col_text_top
 * @property string|null $col_text_bottom
 * @property int $col_prog
 */
class CountryText extends \app\models\ModelApp
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_country_texts';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['col_country_id', 'col_prog'], 'integer'],
            [['col_text_top', 'col_text_bottom'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'col_id' => 'Col ID',
            'col_country_id' => 'Страна',
            'col_text_top' => 'Текст сверху',
            'col_text_bottom' => 'Текст снизу',
            'col_prog' => 'Программа',
        ];
    }

    public function getCountry()
    {
        return $this->hasOne(Country::className(), ['col_id' => 'col_country_id']);
    }

    public function getProgram()
    {
        return Yii::$app->program->getName($this->col_prog);
    }

    public function getTop()
    {
        return $this->col_text_top;
    }

    public function getBottom()
    {
        return $this->col_text_bottom;
    }
}
