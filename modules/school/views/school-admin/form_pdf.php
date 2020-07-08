<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\school\models\School */

$this->title = 'Добавление файла pdf';

?>
<div>

    <h1><?= Html::encode($this->title) ?></h1>

    <div >

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    	<?= $form->field($model, 'file_pdf')->fileInput()->label('Файл PDF') ?>

    <div class="form-group">
        <?= Html::submitButton('Добавить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

</div>
