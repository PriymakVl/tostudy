<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\web\UploadedFile;
use app\models\ImageUpload;

class ImageUpload extends Model{
    
    public $image;
    public $folder;
    public $size;

    public function rules()
    {
        return [
            [['image'], 'required'],
            [['image'], 'file', 'extensions' => 'jpg, jpeg, png']
        ];
    }


    public function uploadFile(UploadedFile $file, $inner_folder, $currentImage)
    {
        $this->image = $file;
        $this->setFolder($inner_folder);

       if($this->validate())
       {
           $this->deleteCurrentImage($currentImage);
           return $this->saveImage();
       }

    }

    public function setFolder($inner_folder)
    {
        $this->folder = Yii::getAlias('@webroot') . '/img/' . $inner_folder;
    }

    public function generateFilename()
    {
        return time().'_'.rand(0,1000) . '.' . $this->image->extension;
        
    }

    public function deleteCurrentImage($currentImage)
    {
        if($this->fileExists($currentImage))
        {
            unlink($this->folder . '' . $currentImage);
        }
    }

    public function fileExists($currentImage)
    {
        if(!empty($currentImage) && $currentImage != null)
        {
            return file_exists($this->folder . '/' . $currentImage);
        }
    }

    public function saveImage()
    {
        $filename = $this->generateFilename();
        $this->image->saveAs($this->folder . '/' . $filename);

        return $filename;
    }
}