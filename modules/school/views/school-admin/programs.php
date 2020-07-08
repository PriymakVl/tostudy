<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\school\models\School */

$this->title = $model->col_title;

\yii\web\YiiAsset::register($this);
?>
<div>

    <h3>Программы</h3>

    <p>Школа: <b><?= $model->name ?></b></p>

    <p>
        <?= Html::a('Добавить курс', ['/course/course-admin/create', 'school_id' => $model->col_id], ['class' => 'btn btn-primary']) ?>
    </p>

    <table class="table table-inverse table-bordered">
        <thead>
            <tr>
                <th>№</th>
                <th>Название программы</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($model->programs): ?>
                <? $num = 1; ?>
                <?php foreach ($model->programs as $program): ?>
                    <tr>
                        <td><?= $num ?></td>
                        <td>
                            <?= Html::a($program->col_name, ['/admin/school/courses', 'id' => $model->col_id, 'prog_id' => $program->col_id]) ?>
                        </td>
                    </tr>
                    <? $num++; ?>
                <?php endforeach ?>
            <? else: ?>
                <tr>
                    <td colspan="2">Программ еще нет</td>
                </tr>
            <?php endif ?>
            
        </tbody>
    </table>

</div>
