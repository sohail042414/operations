<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\Role;
use common\models\Resource;
use yii\helpers\ArrayHelper

/* @var $this yii\web\View */
/* @var $model common\models\Permission */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="permission-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'resource_id')->dropDownList(ArrayHelper::map(Resource::find()->all(), 'id', 'title')) ?>

    <?= $form->field($model, 'role')->dropDownList(ArrayHelper::map(Role::find()->all(), 'role', 'title')) ?>

    <?= $form->field($model, 'view')->dropDownList(['1' => 'True', '0' => 'False']) ?>

    <?= $form->field($model, 'create')->dropDownList(['1' => 'True', '0' => 'False']) ?>

    <?= $form->field($model, 'update')->dropDownList(['1' => 'True', '0' => 'False']) ?>

    <?= $form->field($model, 'delete')->dropDownList(['1' => 'True', '0' => 'False']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
