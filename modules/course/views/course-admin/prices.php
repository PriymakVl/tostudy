<?php 
use yii\helpers\Html;

$this->title = 'Цены для курса';

// \app\assets\AdminAsset::register($this);
$this->registerJsFile('@web/js/admin/prices_course.js', ['depends' => [\yii\web\JqueryAsset::className()]]);
 ?>

<div class="container" id="js-course-prices">

	<h1><?= $this->title ?>: <span><?= $model->name ?></span></h1>

	<p>
		<button class="btn btn-primary" id="js-add-price">Добавить неделю</button>
        <?= Html::a('Курс', ['view', 'id' => $model->col_id], ['class' => 'btn btn-primary']) ?>
        <button class="btn btn-primary js-save-prices">Сохранить</button>
	</p>

	<table class="table table-bordered ">
		<thead>
			<tr>
				<th>Недели</th>
				<th>Цены</th>
				<th>Действия</th>
			</tr>
			</thead>
			<tbody id="table-content">
			<?php if ($model->prices): ?>
				<?php foreach ($model->prices as $week => $price): ?>
					<tr>
			      		<td>
			      			<input type="text" value="<?= $week ?>" name="week" placeholder="Недель">
			      		</td>
			      		<td>
			      			<input type="text" value="<?= $price ?>" name="price" placeholder="Цена за неделю">
			      		</td>
			      		<td>
			      			<a href="#" class="js-price-del">
								Удалить неделю
							</a>
			      		</td>
			    	</tr>
				<?php endforeach ?>	
			<? else: ?>
				<tr>
					<td colspan="3"><span class="red">Цен еще нет</span></s></td>
				</tr>
			<?php endif ?>
		</tbody>
	</table>

	<p>
		<button class="btn btn-primary js-save-prices">Сохранить</button>
	</p>

</div>
