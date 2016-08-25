<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Call */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="call-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php if ($model->isNewRecord) : ?>

        <?= $form->field($model, 'sender_num')->textInput(['readonly' => $model->isNewRecord ? false : true]) ?>

        <?= $form->field($model, 'recepient_num')->textInput(['readonly' => $model->isNewRecord ? false : true]) ?>

        <?= $form->field($model, 'time_init')->textInput(['readonly' => $model->isNewRecord ? false : true]) ?>

        <?= $form->field($model, 'time_connected')->textInput(['readonly' => $model->isNewRecord ? false : true]) ?>

        <?= $form->field($model, 'time_finished')->textInput(['readonly' => $model->isNewRecord ? false : true]) ?>

        <?= $form->field($model, 'route')->textInput(['readonly' => $model->isNewRecord ? false : true]) ?>

    <?php endif; ?>

    <?= $form->field($model, 'comment')->textArea(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
