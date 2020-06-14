<?php

namespace app\models;

use Yii;
use app\modules\school\models\School;
use app\modules\course\models\Course;

/**
 * This is the model class for table "tbl_orders".
 *
 * @property int $col_id
 * @property string $col_username
 * @property string $col_email
 * @property string $col_tel
 * @property string $col_comment
 * @property int $col_school_id
 * @property int $col_course_id
 * @property int $col_weeks
 * @property int $col_accommodation
 * @property string $col_date
 * @property int $col_status
 */
class Order extends \app\models\ModelApp
{
    const STATUS_WAITING = 1;
    const STATUS_PROCESSING = 2;
    const STATUS_COMPLETED = 3;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_orders';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['col_username', 'col_email', 'col_tel', 'col_comment', 'col_school_id', 'col_course_id', 'col_weeks', 'col_accommodation', 'col_date', 'col_status'], 'required'],
            [['col_comment'], 'string'],
            [['col_school_id', 'col_course_id', 'col_weeks', 'col_accommodation', 'col_status'], 'integer'],
            [['col_date'], 'safe'],
            [['col_username', 'col_email'], 'string', 'max' => 100],
            [['col_tel'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'col_id' => 'ID заказа',
            'col_username' => 'Имя',
            'col_email' => 'Email',
            'col_tel' => 'Телефон',
            'col_comment' => 'Комментарий',
            'col_school_id' => 'Школа',
            'col_course_id' => 'Курс',
            'col_weeks' => 'Кол-во недель',
            'col_accommodation' => 'Проживание',
            'col_date' => 'Дата добавления',
            'col_status' => 'Статус',
        ];
    }

    public function scenarios()
    {
        $scenarios = parent::scenarios();
        $scenarios['status'] = ['col_status'];
        // $scenarios[static::SCENARIO_USER] = ['post_title', 'post_body'];
        return $scenarios;
    }

    public function getSchool()
    {
        return $this->hasOne(School::className(), ['col_id' => 'col_school_id']);
    }

    public function getCourse()
    {
        return $this->hasOne(Course::className(), ['col_id' => 'col_course_id']);
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
