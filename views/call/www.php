<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Call */

$this->title = 'Page www - statistics'; ?>
<div class="statistics">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-2">
                <h2>Кількість дзвінків</h2>
                <p><?= $quantity; ?></p>
            </div>
            <div class="col-lg-2">
                <h2>Кількість вхідних дзвінків</h2>
                <p><?= $incoming; ?></p>
            </div>
            <div class="col-lg-2">
                <h2>Кількість вихідних дзвінків</h2>
                <p><?= $outgoing; ?></p>
            </div>
            <div class="col-lg-2">
                <h2>Середня тривалість дзвінка</h2>
                <p><?= $avg_duration; ?></p>
            </div>
            <div class="col-lg-2">
                <h2>Максимальна тривалість дзвінка</h2>
                <p><?= $max_duration; ?></p>
            </div>
            <div class="col-lg-2">
                <h2>Найбільш часто вживаний Номер Б</h2>
                <p><?= $max_used_num; ?></p>
            </div>
        </div>
    </div>
</div>
