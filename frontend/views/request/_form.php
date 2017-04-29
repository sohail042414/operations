<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\City;
use common\models\Location;
use common\models\Problem;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model common\models\Request */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="request-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->errorSummary($model); ?>

    <?php //= $form->field($model, 'status_id')->textInput() ?>

    <?= $form->field($model, 'problem_id')->dropDownList(ArrayHelper::map(Problem::find()->all(), 'id', 'title'), ['prompt' => 'Select Problem']) ?>

    <?= $form->field($model, 'problem_details')->textarea(['rows' => 6]) ?>

    <?php //= $form->field($model, 'customer_id')->textInput() ?>

    <?= $form->field($model, 'contact_person_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>

    <?=
    $form->field($model, 'city_id')->dropDownList(ArrayHelper::map(City::find()->all(), 'id', 'name'), [
        'prompt' => 'Select City',
        'onchange' => '$.post( "' . Yii::$app->urlManager->createUrl('general/locations?city=') . '"+$(this).val(), function( data ) {
                  $("select#request-location" ).html(data);
                });'
    ])
    ?>

    <?=
    $form->field($model, 'location_id')->dropDownList(ArrayHelper::map(Location::find()->all(), 'id', 'name'), [
        'prompt' => 'Select Location',
        'id' => 'request-location',
    ])
    ?>

    <?= $form->field($model, 'address')->textarea(['rows' => 6]) ?>

    <?php //= $form->field($model, 'installed_items_details')->textarea(['rows' => 6])   ?>

    <?php //= $form->field($model, 'installed_items_cost')->textInput()   ?>

    <?php //= $form->field($model, 'labour_cost')->textInput()   ?>

    <?php //= $form->field($model, 'total_cost')->textInput()   ?>

    <?php //= $form->field($model, 'operator_feedback')->textarea(['rows' => 6])   ?>

    <?php //= $form->field($model, 'admin_feedback')->textarea(['rows' => 6])   ?>

    <?php //= $form->field($model, 'created_at')->textInput()   ?>

    <?php //= $form->field($model, 'updated_at')->textInput()    ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
