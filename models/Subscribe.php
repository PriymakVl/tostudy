<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_subscribers".
 *
 * @property int $col_id
 * @property string|null $col_name
 * @property string $col_email
 */
class Subscribe extends \app\models\ModelApp
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_subscribers';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['col_email'], 'required'],
            [['col_name', 'col_email'], 'string', 'max' => 255],
            [['col_email'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'col_id' => 'ID',
            'col_name' => 'Имя',
            'col_email' => 'Email',
        ];
    }
}
