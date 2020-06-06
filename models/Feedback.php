<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_feedback".
 *
 * @property int $col_id
 * @property string $col_username
 * @property string $col_email
 * @property string $col_comment
 * @property string $col_date
 * @property int $col_status
 */
class Feedback extends \app\models\ModelApp
{
    const STATUS_NOT = 1;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_feedback';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['col_username', 'required', 'message' => 'Введите имя'],
            ['col_email', 'required', 'message' => 'Введите email'],
            ['col_comment', 'required', 'message' => 'Напишите текст сообщения'],
            ['col_email', 'email', 'message' => 'Неправильный email'],
            [['col_comment'], 'string'],
            [['col_date'], 'default', 'value' => date('Y-m-d h:m:s')],
            [['col_status'], 'default', 'value' => self::STATUS_NOT],
            [['col_username', 'col_email'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'col_id' => 'Col ID',
            'col_username' => 'Col Username',
            'col_email' => 'Col Email',
            'col_comment' => 'Col Comment',
            'col_date' => 'Col Date',
            'col_status' => 'Col Status',
        ];
    }
}
