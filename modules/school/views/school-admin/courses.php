<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\school\models\School */

$this->title = 'Курсы';

\yii\web\YiiAsset::register($this);
?>
<div>
    <h3><?= $this->title ?></h3>

    <p>Школа: <b><?= $school->name ?></b></p>

    <p>Программа: <b><?= $program->col_name ?></b></p>

    <p>
        <?= Html::a('Школа', ['view', 'id' => $school->col_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Программы', ['programs', 'id' => $school->col_id], ['class' => 'btn btn-primary']) ?>
    </p>

    <table class="table table-inverse table-bordered">
        <thead>
            <tr>
                <th>№</th>
                <th>Название курса</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($courses): ?>
                <? $num = 1; ?>
                <?php foreach ($courses as $course): ?>
                    <tr>
                        <td><?= $num ?></td>
                        <td>
                            <?= $course->name ?>
                        </td>
                    </tr>
                    <? $num++; ?>
                <?php endforeach ?>
            <? else: ?>
                <tr>
                    <td colspan="2">Курсов для этой программы еще нет</td>
                </tr>
            <?php endif ?>
            
        </tbody>
    </table>

</div>
