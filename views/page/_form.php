<?php
/* @var $this yii\web\View */
/* @var $model app\models\Page */
/* @var $form yii\widgets\ActiveForm */

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\ckeditor\CKEditor;

$this->registerJs("CKEDITOR.plugins.addExternal('youtube', 'js/vendor/ckeditor/youtube/plugin.js', '');");
?>

<div class="page-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'col_meta_title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'col_meta_description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'col_meta_keywords')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'col_title_ru')->textInput(['maxlength' => true]) ?>

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
            'uploadURL' => '@web/img/articles/text',
            'uploadDir' => '@webroot/img/articles/text',
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


    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
