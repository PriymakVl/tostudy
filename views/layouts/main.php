<?php

/* @var $this \yii\web\View */
/* @var $content string */
use yii\helpers\Html;
use app\widgets\modal\ModalAlert;

\app\assets\PublicAsset::register($this);

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;700&display=swap" rel="stylesheet"> 
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body id="page">
<?php $this->beginBody() ?>

<div class="wrapper">

	<?php if (Yii::$app->controller->id == 'site' && Yii::$app->controller->action->id == 'index'): ?>
			<?=$this->render('@app/views/templates/header_home')?>
		<?php else: ?>
			<?=$this->render('@app/views/templates/header')?>
	<?php endif ?>

    <?= ModalAlert::widget() ?>

    <?= $content ?>

    <?=$this->render('@app/views/templates/footer')?>

</div> <!-- /.wrapper -->

<?php $this->endBody() ?>
<script src="//code.jivosite.com/widget/3gTQRLtjez" async></script>
</body>
</html>
<?php $this->endPage() ?>
