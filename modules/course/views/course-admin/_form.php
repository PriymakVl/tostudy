<?php
/* @var $this yii\web\View */
/* @var $model app\modules\course\models\Course */
/* @var $form yii\widgets\ActiveForm */

use yii\helpers\{Html, ArrayHelper};
use yii\widgets\ActiveForm;
use app\modules\school\models\School;
use app\models\Program;
use app\modules\country\models\Country;
use app\modules\city\models\City;
use dosamigos\ckeditor\CKEditor;

$this->registerJs("CKEDITOR.plugins.addExternal('youtube', '/ckeditor/plugins/youtube/plugin.js', '');");

if ($school_id) $model->col_school_id = $school_id;

if ($city_id) {
    $city = City::findOne($city_id);
    $country_id = $city->country->col_id;
}

?>

<script>

function selectCountry(elem) {
    if (elem.value) location.href = '/course/course-admin/create/?country_id=' + elem.value;
    else location.href = '/course/course-admin/' + action;
}

function selectCity(elem) {
    location.href = '/course/course-admin/create/?city_id=' + elem.value;
}

</script>

<div class="course-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php 
        $items = Program::find()->select('col_name')->asArray()->indexBy('col_id')->orderBy('col_rating')->column();
        $params = ['prompt' => 'Выберите программу'];
        echo $form->field($model, 'col_prog_id')->dropDownList($items, $params)->label('Программа');
     ?>

    <?php if (!$model->col_id): ?>
        <div class="form-group">
            <label for="country_id" class="control-label">Страна</label>
            <?php 
                $countries = Country::find()->select(['col_title_ru'])->asArray()->indexBy('col_id')->column();
                $options = ['onchange' => 'selectCountry(this);', 'prompt' => 'Не выбрана', 'class' => 'form-control'];
                echo Html::dropDownList('country_id', $country_id, $countries, $options);
            ?>
        </div>
        
        <? if ($country_id): ?>
            <div class="form-group">
                <label for="city_id" class="control-label">Город</label>
                <?php 
                    $cities = City::find()->select(['col_title_ru'])->where(['col_country_id' => $country_id])->asArray()->indexBy('col_id')->column();
                    $options = ['onchange' => 'selectCity(this);','prompt' => 'Не выбран', 'class' => 'form-control'];
                    echo Html::dropDownList('city_id', $city_id, $cities, $options);
                 ?>
             </div>
         <? endif; ?>

        <?php 
            if ($city_id) $items = City::findOne($city_id)->schools;
            else if ($country_id) $items = Country::findOne($country_id)->schools;
            else $items = School::find()->all();
            $schools = ArrayHelper::map($items, 'col_id', 'col_title');
            $params = ['prompt' => 'Выберите школу'];
            echo $form->field($model, 'col_school_id')->dropDownList($schools, $params)->label('Школа');
         ?>
    <?php else: ?>
        <?php 
            $items = School::find()->all();
            $schools = ArrayHelper::map($items, 'col_id', 'col_title');
            $params = ['prompt' => 'Выберите школу'];
            echo $form->field($model, 'col_school_id')->dropDownList($schools, $params)->label('Школа');
        ?>
    <?php endif; ?>

    <?= $form->field($model, 'col_title_ru')->textInput(['maxlength' => true]) ?>

    <?php 
        echo $form->field($model, 'col_description_ru')->widget(CKEditor::className(), [
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
            'uploadURL' => '@web/img/courses',
            'uploadDir' => '@webroot/img/courses',
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


