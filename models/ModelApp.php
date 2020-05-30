<?php

namespace app\models;

use Yii;
use yii\web\UploadedFile;
use app\models\{Sound, State};
use yii\web\NotFoundHttpException;
use app\modules\string\models\{FullString, SubString};
use app\modules\word\models\{Word, WordText};

class ModelApp extends \yii\db\ActiveRecord
{

    public function remove()
    {
        $this->status = STATUS_INACTIVE;
        if (!$this->save(false)) throw new NotFoundHttpException('error remove item class ModelBase.php');
        return $this;
    }

    public function getClassName()
    {
        $path = get_called_class();
        $pos_end_delimeter = strrpos($path, '\\');
        return substr($path, $pos_end_delimeter + 1);
    }

    public function getNextItemId($text_id = false)
    {
        $query = $this->getQueryObject();
        if ($text_id) $ids = $query->select('id')->where(['text_id' => $text_id, 'status' => STATUS_ACTIVE])->asArray()->column();
        else $ids = $query->select('id')->where(['status' => STATUS_ACTIVE])->asArray()->column();
        $index = array_search($this->id, $ids);
        if ($index == array_key_last($ids)) return $ids[0];
        return $ids[$index + 1];
    }

    public function getPrevItemId($text_id = false)
    {
        $query = $this->getQueryObject();
        if ($text_id) $ids = $query->select('id')->where(['text_id' => $text_id, 'status' => STATUS_ACTIVE])->asArray()->column();
        else $ids = $query->select('id')->where(['status' => STATUS_ACTIVE])->asArray()->column();
        $index = array_search($this->id, $ids);
        if ($index == 0) return $ids[array_key_last($ids)];
        return $ids[$index - 1];
    }

    protected function getQueryObject()
    {
        $classname = $this->getClassName();
        switch ($classname) {
            case 'FullString': return FullString::find();
            case 'SubString': return SubString::find();
            case 'Word': return Word::find();
            case 'WordText': return WordText::find();
            default: return null;
        }
    }

    public function getName()
    {
        return $this->col_title_ru;
    }

}
