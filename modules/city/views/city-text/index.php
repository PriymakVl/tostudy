<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\school\models\CityText */

$this->title = 'Тексты для города: ' . $city->name;

\yii\web\YiiAsset::register($this);
?>
<div>

    <h3><?= $this->title ?></h3>

    <?= Html::a('Город', ['/city/city-admin/view', 'id' => $city->col_id], ['class' => 'btn btn-primary']) ?>

    <br><br>

    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>№</th>
                <th>Программа</th>
                <th>Операции</th>
            </tr>
        </thead>
        <tbody>
            <? $num = 1; ?>
            <?php foreach (Yii::$app->program->all as $key => $name): ?>
                <tr>
                    <td><?= $num ?></td>
                    <td><?= $name ?></td>
                    <td>
                        <?= Html::a('<span class="glyphicon glyphicon-eye-open"></span>', ['view', 'city_id' => $city->col_id, 'prog' => $key]) ?>
                    </td>
                </tr>
                <? $num++; ?>
            <?php endforeach ?>
        </tbody>
    </table>

</div>
