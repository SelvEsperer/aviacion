<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Status */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="status-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'flight_type')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'flight_no')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'availability')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'created_by_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'created_by_date')->textInput() ?>

    <?= $form->field($model, 'last_modified_by_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'last_modified_by_date')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
