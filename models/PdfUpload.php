<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\web\UploadedFile;

class PdfUpload extends Model 
{
    
    public $file;
    public $folder;


    public function uploadFile(UploadedFile $file, $folder)
    {
        $this->file = $file;
        $this->setFolder($folder);
        return $this->save();
    }

    public function setFolder($folder)
    {
        $this->folder = Yii::getAlias('@webroot') . '/' . $folder;
    }

    public function save()
    {
        return $this->file->saveAs($this->folder . '/' . $this->file->name);
    }
}