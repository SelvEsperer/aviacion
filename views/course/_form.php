<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Course */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="course-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ground')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'flying')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pre_requisite')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'education')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'created_by_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'created_by_date')->textInput() ?>

    <?= $form->field($model, 'last_modified_by_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'last_modified_by_date')->textInput() ?>

    <?= $form->field($model, 'min_age')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'details')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
