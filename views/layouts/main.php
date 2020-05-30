<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;

\app\assets\PublicAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body id="page">
<?php $this->beginBody() ?>

<div class="wrapper">

	<?=$this->render('@app/views/templates/header')?>

    <?= $content ?>

    <?=$this->render('@app/views/templates/footer')?>

</div> <!-- /.wrapper -->

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
