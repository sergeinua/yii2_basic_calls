<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use kartik\daterange\DateRangePicker;
use yii\bootstrap\Alert;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CallSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Calls';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="call-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Call', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?php
    foreach(Yii::$app->session->getAllFlashes() as $key => $message) {
        echo Alert::widget(['options' => ['class' => "alert-$key"], 'body' => $message]);
    } ?>
    <?php Pjax::begin(); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'sender_num',
            'recepient_num',
//            'time_init:datetime',
            [
                'attribute' => 'time_init',
                'value' => function($model) {
                    return date('d-m-Y H:i:s', $model->time_finished);
                },
                'filter' => DateRangePicker::widget([
                    'model' => $searchModel,
                    'attribute' => 'dateRange',
                    'convertFormat'=>true,
                    'pluginOptions'=>[
                        'timePicker'=>true,
                        'timePickerIncrement'=>10,
                        'locale'=>[
                            'format'=>'Y-m-d h:i A'
                        ]
                    ]
                ]),
            ],
            'time_connected:datetime',
            'time_finished:datetime',
            [
                'attribute' => 'route',
                'value' => function ($model) {
                    return ($model->route == 1) ? 'incoming' : 'outgoing';
                }
            ],
            'comment',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
