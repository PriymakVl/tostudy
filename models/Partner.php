<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_partners".
 *
 * @property int $col_id
 * @property string $col_link
 * @property string $col_img
 */
class Partner extends \app\models\ModelApp
{
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
            [['col_link', 'col_img'], 'required'],
            [['col_link', 'col_img'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'col_id' => 'Col ID',
            'col_link' => 'Col Link',
            'col_img' => 'Col Img',
        ];
    }
}
