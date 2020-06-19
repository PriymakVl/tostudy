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

    const STATUS_WAITING = 1;
    const STATUS_PROCESSING = 2;
    const STATUS_COMPLETED = 3;

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
            [['col_status'], 'default', 'value' => self::STATUS_WAITING],
            [['col_username', 'col_email'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'col_id' => 'ID заявки',
            'col_username' => 'Имя',
            'col_email' => 'Email',
            'col_comment' => 'Текст сообщения',
            'col_date' => 'Дата добавления',
            'col_status' => 'Статус',
        ];
    }

    public function scenarios()
    {
        $scenarios = parent::scenarios();
        $scenarios['status'] = ['col_status'];
        return $scenarios;
    }

    public function getStatus()
    {
        switch($this->col_status) {
            case self::STATUS_WAITING: return 'Ожидание';
            case self::STATUS_PROCESSING: return 'В обработке';
            case self::STATUS_COMPLETED: return 'Завершен';
            default: return 'Ошибка';
        }
    }
}
