<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\school\models\School */

$this->title = 'Создание школы';
$this->params['breadcrumbs'][] = ['label' => 'Schools', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="school-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
