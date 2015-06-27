<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Flight */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="flight-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'image')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'speed')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'capacity')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'registration_mark')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'endurance')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cruising_level')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'luggage_capacity')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'created_by_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'created_by_date')->textInput() ?>

    <?= $form->field($model, 'last_modified_by_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'last_modified_by_date')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
