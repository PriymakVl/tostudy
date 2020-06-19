<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\web\UploadedFile;

class ImageUpload extends Model 
{
    
    public $image;
    public $folder;


    public function uploadFile(UploadedFile $file, $inner_folder, $currentImage)
    {
        $this->image = $file;
        $this->setFolder($inner_folder);
        $this->deleteCurrentImage($currentImage);
        return $this->saveImage();
    }

    public function setFolder($inner_folder)
    {
        $this->folder = Yii::getAlias('@webroot') . '/img/' . $inner_folder;
    }

    public function generateFilename()
    {
        return time().'_'.rand(0, 1000) . '.' . $this->image->extension;
    }

    public function deleteCurrentImage($currentImage)
    {
        if($this->fileExists($currentImage))
        {
            unlink($this->folder . '/' . $currentImage);
        }
    }

    public function fileExists($currentImage)
    {
        if(empty($currentImage)) return false;
        return file_exists($this->folder . '/' . $currentImage);
    }

    public function saveImage()
    {
        $filename = $this->generateFilename();
        $this->image->saveAs($this->folder . '/' . $filename);
        return $filename;
    }
}