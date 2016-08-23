<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "call".
 *
 * @property integer $id
 * @property integer $sender_num
 * @property integer $recepient_num
 * @property integer $time_init
 * @property integer $time_connected
 * @property integer $time_finished
 * @property integer $route
 * @property string $comment
 */
class Call extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'call';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sender_num', 'recepient_num', 'time_init', 'time_connected', 'time_finished', 'route'], 'integer'],
            [['comment'], 'string', 'max' => 200],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'sender_num' => 'Sender Num',
            'recepient_num' => 'Recepient Num',
            'time_init' => 'Time Init',
            'time_connected' => 'Time Connected',
            'time_finished' => 'Time Finished',
            'route' => 'Route',
            'comment' => 'Comment',
        ];
    }
}
