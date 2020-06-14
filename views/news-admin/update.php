<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Article */

$this->title = 'Редактировать статью';

$this->params['breadcrumbs'][] = ['label' => 'Articles', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->col_id, 'url' => ['view', 'id' => $model->col_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="article-update">

    <h1>Редактировать статью: <?= Html::a($model->col_title_ru, ['/news-admin/view', 'id' => $model->col_id])?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
