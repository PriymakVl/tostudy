<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\ckeditor\CKEditor;
use app\modules\info\models\Info;
use app\modules\country\models\Country;

/* @var $this yii\web\View */
/* @var $model app\modules\info\models\Info */
/* @var $form yii\widgets\ActiveForm */

$this->registerJs("CKEDITOR.plugins.addExternal('youtube', 'js/vendor/ckeditor/youtube/plugin.js', '');");
?>

<div class="info-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php 
        $items = [Info::STATUS_PUBLISHED => 'Опубликована', Info::STATUS_DRAFT => 'Не опубликована'];
        echo $form->field($model, 'col_status')->dropDownList($items);
    ?>

    <?php 
        $items = Country::find()->select('col_title_ru')->asArray()->indexBy('col_id')->column();
        $params = ['prompt' => 'Выберите страну'];
        echo $form->field($model, 'col_country_id')->dropDownList($items, $params)->label('Страна');
    ?>

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
            ]
        ],
        'kcfinder' => true,
        'kcfOptions' => [
            'uploadURL' => '@web/img/info',
            'uploadDir' => '@webroot/img/info',
            'access' => [  // @link http://kcfinder.sunhater.com/install#_access
                        'files' => [
                            'upload' => true,
                            'delete' => true,
                            'rename' => true,
                        ],
                    ],
                    'thumbsDir' => false,
            ],
        ]);
    ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
