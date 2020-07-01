<?php

namespace app\modules\city\models;

use Yii;
use app\modules\city\models\City;

/**
 * This is the model class for table "tbl_city_texts".
 *
 * @property int $col_id
 * @property int $col_city_id
 * @property string|null $col_text_top
 * @property string|null $col_text_bottom
 * @property int $col_prog
 */
class CityText extends \app\models\ModelApp
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_city_texts';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['col_city_id', 'col_prog'], 'integer'],
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
            'col_city_id' => 'Город',
            'col_text_top' => 'Текст сверху',
            'col_text_bottom' => 'Текст снизу',
            'col_prog' => 'Программа',
        ];
    }

    public function getCity()
    {
        return $this->hasOne(City::className(), ['col_id' => 'col_city_id']);
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
