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


    public function getName()
    {
        return $this->col_title_ru;
    }

    public function sortSchoolsByProgram($prog_id)
    {
        $schools_program = [];
        if (!$this->schools) return $schools_program;
        foreach ($this->schools as $school) {
            if (in_array(intval($prog_id), $school->idsPrograms)) $schools_program[] = $school;
        }
        return $schools_program;
    }

    public function countSchoolsByProgram($prog_id)
    {
        $schools = $this->sortSchoolsByProgram($prog_id);
        return $schools ? count($schools) : 0;
    }

}
