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
            [['col_username', 'col_comment', 'col_date', 'col_status', 'col_home_page'], 'required'],
            [['col_comment'], 'string'],
            [['col_date'], 'safe'],
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
            'col_id' => 'Col ID',
            'col_username' => 'Col Username',
            'col_comment' => 'Col Comment',
            'col_date' => 'Col Date',
            'col_status' => 'Col Status',
            'col_home_page' => 'Col Home Page',
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
}
