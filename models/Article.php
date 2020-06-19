<?php

namespace app\models;

use Yii;
use app\models\ImageUpload;
use app\helpers\Inflector;

/**
 * This is the model class for table "tbl_articles".
 *
 * @property int $col_id
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
 * @property string $col_img
 * @property string $col_img_big
 * @property int $col_status
 */
class Article extends \app\models\ModelApp
{

    const STATUS_DRAFT = 2;
    const STATUS_PUBLISHED = 3;

    public $file_img;
    public $file_img_big;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_articles';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['col_title_ru', 'col_text_ru', 'file_img', 'file_img_big', 'col_status'], 'required'],
            [['col_text_ru'], 'string'],
            [['col_status'], 'integer'],
            [['col_title_ru'], 'string', 'max' => 255],
            [['file_img_big', 'file_img'], 'file', 'extensions' => 'jpg, jpeg, png'],
            // ['col_alias', 'save'],
            [['col_img', 'col_img_big'], 'string', 'max' => 100],
            [['col_title_en', 'col_title_es', 'col_title_ua', 'col_title_cn',], 'default', 'value' => ''],
            [['col_text_en', 'col_text_es', 'col_text_ua', 'col_text_cn',], 'default', 'value' => ''],
        ];
    }

    public function scenarios()
    {
        $scenarios = parent::scenarios();
        $scenarios['update'] = ['col_title_ru', 'col_text_ru', 'col_status'];
        return $scenarios;
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'col_id' => 'ID статьи',
            'col_title_en' => 'Col Title En',
            'col_title_es' => 'Col Title Es',
            'col_title_ua' => 'Col Title Ua',
            'col_title_ru' => 'Название статьи',
            'col_title_cn' => 'Col Title Cn',
            'col_text_en' => 'Col Text En',
            'col_text_es' => 'Col Text Es',
            'col_text_ua' => 'Col Text Ua',
            'col_text_ru' => 'Содержание статьи',
            'col_text_cn' => 'Col Text Cn',
            'col_img' => 'Изображение',
            'col_img_big' => 'Col Img Big',
            'col_status' => 'Статус',
            'image' => 'Изображение',
            'imageBig' => 'Большое изображение',
        ];
    }

    public function getImage()
    {
        return Yii::getAlias('@web') . '/img/articles/' . $this->col_img;
    }

    public function getImageBig()
    {
        return Yii::getAlias('@web') . '/img/articles/big/' . $this->col_img_big;
    }

    public function getStatus()
    {
        switch ($this->col_status) {
            case self::STATUS_PUBLISHED: return 'Опубликована';
            case self::STATUS_DRAFT: return 'Черновик';
            default: return 'Статус не определен';
        }
    }

    public function beforeSave($insert)
    {
        $img = new ImageUpload();
        if ($insert) {
             $this->col_img = $img->uploadFile($this->file_img, 'articles', $this->col_img); 
             $this->col_img_big = $img->uploadFile($this->file_img_big, 'articles/big', $this->col_img_big); 
        }
        else {
            if ($this->file_img) $this->col_img = $img->uploadFile($this->file_img, 'articles', $this->col_img);
            if ($this->file_img_big) $this->col_img_big = $img->uploadFile($this->file_img_big, 'articles/big', $this->col_img_big);
        }
        $this->col_alias = Inflector::slug($this->col_title_ru, '_');
        return true;
    }


}
