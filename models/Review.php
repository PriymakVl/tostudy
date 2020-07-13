<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_reviews".
 *
 * @property int $col_id
 * @property string $col_username
 * @property string $col_comment
 * @property string $col_date
 * @property int $col_status
 * @property int $col_home_page
 */
class Review extends \app\models\ModelApp
{
    const SHOW_HOME = 1;
    const SHOW_HOME_NOT = 0;
    const STATUS_PUBLISHED = 3;
    const STATUS_DRAFT = 2;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_reviews';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['col_username', 'col_comment', 'col_status', 'col_home_page'], 'required'],
            [['col_comment', 'col_date'], 'string'],
            // [['col_date'], 'default', 'value' => date("Y-m-d H:i:s")],
            [['col_status', 'col_home_page'], 'integer'],
            [['col_username'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'col_id' => 'ID отзыва',
            'col_username' => 'Имя',
            'col_comment' => 'Отзыв',
            'col_date' => 'Дата',
            'col_status' => 'Показывать',
            'col_home_page' => 'На главной',
        ];
    }

    public function getAvatar()
    {
        return mb_substr($this->col_username, 0, 1);
    }

    public function getUsername()
    {
        return $this->col_username;
    }

    public function getDate()
    {
        return $this->col_date;
    }

    public function getComment()
    {
        return $this->col_comment;
    }

    public function getStatus()
    {
        switch($this->col_status) {
            case self::STATUS_PUBLISHED: return 'Да';
            case self::STATUS_DRAFT: return 'Нет';
            default: return 'Статус не определен';
        }
    }

    public function getHome()
    {
        switch($this->col_home_page) {
            case self::SHOW_HOME: return 'Да';
            case self::SHOW_HOME_NOT: return 'Нет';
            default: return 'Ошибка';
        }
    }

    public function beforeSave($insert)
    {
        if (!$this->col_date) $this->col_date = date("Y-m-d H:i:s");
        else $this->col_date = date("Y-m-d H:i:s", strtotime($this->col_date));
        return parent::beforeSave($insert);
    }
}
