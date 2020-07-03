<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\school\models\CityText */

$this->title = 'Тексты для страны: ' . $country->name;

\yii\web\YiiAsset::register($this);
?>
<div>

    <h3><?= $this->title ?></h3>

    <?= Html::a('Страна', ['/country/country-admin/view', 'id' => $country->col_id], ['class' => 'btn btn-primary']) ?>

    <br><br>

    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>№</th>
                <th>Программа</th>
            </tr>
        </thead>
        <tbody>
            <? $num = 1; ?>
            <?php foreach (Yii::$app->program->all as $key => $name): ?>
                <tr>
                    <td><?= $num ?></td>
                    <td>
                        <?= Html::a($name, ['view', 'country_id' => $country->col_id, 'prog' => $key]) ?>       
                    </td>
                </tr>
                <? $num++; ?>
            <?php endforeach ?>
        </tbody>
    </table>

</div>
