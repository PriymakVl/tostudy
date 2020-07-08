<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Program */

$this->title = 'Новая программа';

?>
<div class="program-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
