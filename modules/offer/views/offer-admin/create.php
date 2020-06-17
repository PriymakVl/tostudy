<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\offer\models\Offer */

$this->title = 'Новая акция';
$this->params['breadcrumbs'][] = ['label' => 'Offers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="offer-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
