<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\info\models\Info */

$this->title = 'Новая статья';
$this->params['breadcrumbs'][] = ['label' => 'Infos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="info-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
