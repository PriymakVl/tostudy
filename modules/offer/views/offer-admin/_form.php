<?php
/* @var $this yii\web\View */
/* @var $model app\modules\offer\models\Offer */
/* @var $form yii\widgets\ActiveForm */

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\modules\offer\models\Offer;
use dosamigos\ckeditor\CKEditor;

$this->registerJs("CKEDITOR.plugins.addExternal('youtube', '/ckeditor/plugins/youtube/plugin.js', '');");
?>

<div class="offer-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'col_title_ru')->textInput(['maxlength' => true]) ?>

    <?php 
        $items = [Offer::STATUS_ACTIVE => 'Активна', Offer::STATUS_INACTIVE => 'Не активна'];
        echo $form->field($model, 'col_status')->dropDownList($items);
    ?>

    <?= $form->field($model, 'col_meta_title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'col_meta_description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'col_meta_keywords')->textInput(['maxlength' => true]) ?>

    <?php 
        echo $form->field($model, 'col_text_ru')->widget(CKEditor::className(), [
        'preset' => 'custom',
        'clientOptions' => [
            'extraPlugins' => 'youtube',
            'allowedContent' => true,
            'toolbarGroups' => [
                ['name' => 'mode'],
                ['name' => 'undo'],
                ['name' => 'basicstyles', 'groups' => ['basicstyles', 'cleanup']],
                ['name' => 'links', 'groups' => ['links', 'insert']],
                ['name' => 'paragraph', 'groups' => [ 'list', 'indent', 'blocks', 'align', 'bidi' ]],
                ['name' => 'youtube'], 
                ['name' => 'styles'],
            ]
        ],
        'kcfinder' => true,
        'kcfOptions' => [
            'uploadURL' => '@web/img/offers',
            'uploadDir' => '@webroot/img/offers',
            'access' => [  // @link http://kcfinder.sunhater.com/install#_access
                        'files' => [
                            'upload' => true,
                            'delete' => true,
                            'rename' => true,
                        ],
                    ],
            ],
        ]);
    ?>

    <?= $form->field($model, 'file_img')->fileInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
