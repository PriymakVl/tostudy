<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\web\UploadedFile;

class PdfUpload extends Model 
{
    
    public $pdf;
    public $folder;


    public function uploadFile(UploadedFile $file, $currentPdf)
    {
        $this->pdf = $file;
        $this->setFolder();
        $this->deleteCurrentPdf($currentPdf);
        return $this->savePdf();
    }

    public function setFolder()
    {
        $this->folder = Yii::getAlias('@webroot') . '/pdf';
    }

    public function generateFilename()
    {
        return time().'_'.rand(0, 1000) . '.' . $this->pdf->extension;
    }

    public function deleteCurrentPdf($currentPdf)
    {
        if($this->fileExists($currenPdf))
        {
            unlink($this->folder . '/' . $currentPdf);
        }
    }

    public function fileExists($currentPdf)
    {
        if(empty($currentPdf)) return false;
        return file_exists($this->folder . '/' . $currentPdf);
    }

    public function savePdf()
    {
        $filename = $this->generateFilename();
        $this->pdf->saveAs($this->folder . '/' . $filename);
        return $filename;
    }
}