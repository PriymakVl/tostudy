<?php

namespace app\models;

use Yii;
use app\models\ImageUpload;

/**
 * This is the model class for table "tbl_partners".
 *
 * @property int $col_id
 * @property string $col_link
 * @property string $col_img
 */
class Partner extends \app\models\ModelApp
{
    public $file_img;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_partners';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['col_link', 'file_img'], 'required'],
            ['file_img', 'file', 'extensions' => 'jpg, jpeg, png'],
            [['col_link', 'col_img'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'col_id' => 'ID партнера',
            'col_link' => 'Ссылка',
            'col_img' => 'Изображение',
        ];
    }

    public function getImage()
    {
        return '@web/img/partners/' . $this->col_img;
    }

    public function beforeSave($insert)
    {
        $image = new ImageUpload();
        $this->col_img = $image->uploadFile($this->file_img, 'partners', $this->col_img);
        return parent::beforeSave($insert);
    }
}
