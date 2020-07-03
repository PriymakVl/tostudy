<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\modules\city\models\City;
use dosamigos\ckeditor\CKEditor;

/* @var $this yii\web\View */
/* @var $model app\modules\school\models\School */
/* @var $form yii\widgets\ActiveForm */

$this->registerJs("CKEDITOR.plugins.addExternal('youtube', 'js/vendor/ckeditor/youtube/plugin.js', '');");
?>

<div class="school-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'col_meta_title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'col_meta_description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'col_meta_keywords')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'col_title')->textInput(['maxlength' => true]) ?>

    <?php 

        $items = City::find()->select('col_title_ru')->asArray()->indexBy('col_id')->column();
 
        $params = ['prompt' => 'Не выбран'];
 
        echo $form->field($model, 'col_city_id')->dropDownList($items, $params)->label('Город');

     ?>

    <?= $form->field($model, 'file_img_mini')->fileInput()->label('Изображение мини') ?>

    <?= $form->field($model, 'file_img')->fileInput()->label('Изображение') ?>

    <?= $form->field($model, 'file_pdf')->fileInput() ?>

    <?php 
        echo $form->field($model, 'col_about_us_ru')->widget(CKEditor::className(), [
        'preset' => 'custom',
        'clientOptions' => [
            'extraPlugins' => 'youtube',
            'allowedContent' => true,
            'height' => 500,
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
            'uploadURL' => '@web/img/schools/description',
            'uploadDir' => '@webroot/img/schools/description',
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
        echo $form->field($model, 'col_residence_ru')->widget(CKEditor::className(), [
        'preset' => 'custom',
        'clientOptions' => [
            'extraPlugins' => 'youtube',
            'allowedContent' => true,
            'height' => 500,
            'toolbarGroups' => [
                ['name' => 'mode'],
                ['name' => 'undo'],
                ['name' => 'basicstyles', 'groups' => ['basicstyles', 'cleanup']],
                ['name' => 'links', 'groups' => ['links', 'insert']],
                ['name' => 'paragraph', 'groups' => [ 'list', 'indent', 'blocks', 'align', 'bidi' ]],
                ['name' => 'styles'],
                ['name' => 'youtube'], 
            ]
        ],
        'kcfinder' => true,
        'kcfOptions' => [
            'uploadURL' => '@web/img/schools/description',
            'uploadDir' => '@webroot/img/schools/description',
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

    <?= $form->field($model, 'col_registration_fee')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'col_home_page')->dropDownList(['0' => 'Нет', '1' => 'Да']); ?>

    <?= $form->field($model, 'col_currency')->dropDownList(Yii::$app->params['currencies']); ?>

    <?= $form->field($model, 'col_subcategory')->dropDownList(Yii::$app->program->all); ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
