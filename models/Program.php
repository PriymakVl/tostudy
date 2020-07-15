<?php

namespace app\models;

use Yii;
use app\helpers\Inflector;

/**
 * This is the model class for table "tbl_programs".
 *
 * @property int $id
 * @property string $col_name
 * @property string $col_alias
 * @property int|null $col_key
 */
class Program extends \app\models\ModelApp
{
    const STATUS_INACTIVE = 0;
    const STATUS_ACTIVE = 1;
    const DEFAULT_ID = 1;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_programs';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['col_name', 'col_rating', 'col_status'], 'required'],
            [['col_key', 'col_rating', 'col_status'], 'integer'],
            [['col_name', 'col_alias'], 'string', 'max' => 255],
            [['col_text_top', 'col_text_bottom'], 'string'],
            [['col_name'], 'unique'],
            [['col_alias'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'col_id' => 'ID программы',
            'col_name' => 'Назване программы',
            'col_alias' => 'ЧПУ',
            'col_rating' => 'Рейтинг',
            'col_key' => 'Col Key',
            'status' => 'Статус программы',
            'col_status' => 'Статус программы',
            'col_text_top' => 'Текст сверху',
            'col_text_bottom' => 'Текст снизу',
        ];
    }

    public function getId()
    {
        return $this->col_id;
    }

    public function getStatus()
    {
        if ($this->col_status ==  self::STATUS_ACTIVE) return 'Активна';
        else return 'Не активна';
    }

    public function beforeSave($insert)
    { 
        $this->col_alias = Inflector::slug($this->col_name, '_');
        return parent::beforeSave($insert);
    }

    public static function getByAlias($alias)
    {
        $programs = self::find()->select(['col_id'])->asArray()->indexBy('col_alias')->column();
        if (isset($programs[$alias])) return $programs[$alias];
    }
}
