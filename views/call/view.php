<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\bootstrap\Alert;

/* @var $this yii\web\View */
/* @var $model app\models\Call */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Calls', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="call-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?php
    foreach(Yii::$app->session->getAllFlashes() as $key => $message) {
        echo Alert::widget(['options' => ['class' => "alert-$key"], 'body' => $message]);
    } ?>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'sender_num',
            'recepient_num',
            'time_init:datetime',
            'time_connected:datetime',
            'time_finished:datetime',
            [
                'attribute' => 'route',
                'value' => ($model->route == 1) ? 'incoming' : 'outgoing'
            ],
            'comment',
        ],
    ]) ?>

</div>
