<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\City;
use common\models\Location;
use yii\helpers\ArrayHelper;
use dosamigos\multiselect\MultiSelect;

/* @var $this yii\web\View */
/* @var $model common\models\Location */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="location-form">

    <?php $form = ActiveForm::begin(); ?>
    
    <?= $form->field($model, 'city_id')->dropDownList(ArrayHelper::map(City::find()->all(), 'id', 'name')) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'close_location')->dropDownList(ArrayHelper::map(Location::find()->all(), 'id', 'name'), ['prompt' => 'None']) ?>

    <?php
    /*
      echo MultiSelect::widget([
      'id' => "multiXX",
      "options" => ['multiple' => "multiple"], // for the actual multiselect
      'data' => [ 0 => 'super', 2 => 'natural'], // data as array
      'value' => [ 0, 2], // if preselected
      'model' => $model,
      'attribute' => 'close_location',
      "clientOptions" =>
      [
      "includeSelectAllOption" => true,
      'numberDisplayed' => 2
      ],
      ]);
     * 
     */
    ?>

    <?= $form->field($model, 'details')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
