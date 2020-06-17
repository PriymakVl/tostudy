<?php

namespace app\modules\offer\models;

use Yii;
use app\models\ImageUpload;
use app\helpers\Inflector;

/**
 * This is the model class for table "tbl_offers".
 *
 * @property int $col_id
 * @property string $col_title_ru
 * @property string|null $col_text_ru
 * @property string|null $col_alias
 * @property string|null $col_img
 * @property string|null $col_img_big
 * @property string|null $col_date
 * @property int|null $col_status
 */
class Offer extends \app\models\ModelApp
{
    const STATUS_ACTIVE = 1;
    const STATUS_INACTIVE = 2;

    public $file_img;
    // public $file_img_big;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_offers';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['col_title_ru'], 'required'],
            [['file_img'], 'file', 'extensions' => 'jpg, jpeg, png'],
            [['col_text_ru'], 'string'],
            [['col_date'], 'default', 'value' => date("Y-m-d")],
            [['col_status'], 'integer'],
            [['col_title_ru', 'col_img', 'col_img_big'], 'string', 'max' => 100],
            [['col_alias', 'col_title_ru'], 'string', 'max' => 255],
            [['col_alias'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'col_id' => 'ID акции',
            'col_title_ru' => 'Название',
            'col_text_ru' => 'Содержание',
            'col_alias' => 'Alias',
            'col_img' => 'Изображение',
            'col_img_big' => 'Большое изображение',
            'col_date' => 'Дата создания',
            'col_status' => 'Статус',
            'file_img' => 'Изображение',
            // 'file_img_big' => 'Большое изображение',
            'img' => 'Изображение',
        ];
    }

    public function getStatus()
    {
        switch($this->col_status) {
            case self::STATUS_ACTIVE: return 'Активна';
            case self::STATUS_INACTIVE: return 'Не активна';
            default: return 'Ошибка';
        }
    }

    public function getImg()
    {
        return Yii::getAlias('@web') . '/img/offers/' .$this->col_img;
    }

    // public function getImgBig()
    // {
    //     return Yii::getAlias('@web') . '/img/offers/big' .$this->col_img_big;
    // }

    public function beforeSave($insert)
    {
        if ($insert) {
            $img = new ImageUpload();
            $this->col_img = $img->uploadFile($this->file_img, 'offers', $this->col_img);  
            // $this->col_img_big = $img->uploadFile($this->file_img_big, 'offers/big', $this->col_img_big);  
            $this->col_alias = Inflector::slug($this->col_title_ru);
        }
        return parent::beforeSave($insert);
    }
}
