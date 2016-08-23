<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Call */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="call-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'sender_num')->textInput() ?>

    <?= $form->field($model, 'recepient_num')->textInput() ?>

    <?= $form->field($model, 'time_init')->textInput() ?>

    <?= $form->field($model, 'time_connected')->textInput() ?>

    <?= $form->field($model, 'time_finished')->textInput() ?>

    <?= $form->field($model, 'route')->textInput() ?>

    <?= $form->field($model, 'comment')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
