<?php
/* @var $this yii\web\View */
/* @var $model app\models\Review */
/* @var $form yii\widgets\ActiveForm */

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Review;
use dosamigos\ckeditor\CKEditor;

$this->registerJs("CKEDITOR.plugins.addExternal('youtube', 'js/vendor/ckeditor/youtube/plugin.js', '');");
?>

<div class="review-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'col_username')->textInput(['maxlength' => true]) ?>

     <?php 
        echo $form->field($model, 'col_comment')->widget(CKEditor::className(), [
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

    <?php 
        $items = [Review::STATUS_PUBLISHED => 'Да', Review::STATUS_DRAFT => 'Нет'];
        echo $form->field($model, 'col_status')->dropDownList($items);
    ?>

    <?php 
        $items = [Review::SHOW_HOME => 'Да', Review::SHOW_HOME_NOT => 'Нет'];
        echo $form->field($model, 'col_home_page')->dropDownList($items);
    ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
