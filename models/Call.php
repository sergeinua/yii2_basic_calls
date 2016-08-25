<?php

namespace app\models;

use Yii;
use yii\db\Query;

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

    /**
     * Total quantity of the calls
     * @return int|string
     */
    public static function getQuan()
    {
        return Call::find()->count();
    }

    /**
     * Incoming calls
     * @return int|string
     */
    public static function getIncoming()
    {
        return Call::find()
            ->where(['route' => 0])
            ->count();
    }

    /**
     * Outgoing calls
     * @return int|string
     */
    public static function getOutgoing()
    {
        return Call::find()
            ->where(['route' => 1])
            ->count();
    }

    /**
     * Average call duration
     * @return int|mixed
     */
    public static function getAvgDuration()
    {
        $started =  Call::find()->sum('time_connected');
        $finished = Call::find()->sum('time_finished');
        $result = $finished - $started;
        $result = intval($result / self::getQuan());

        return $result;
    }

    /**
     * Max call duration in seconds
     * @return mixed
     */
    public static function getMaxDuration()
    {
        $models = Call::find()->all();
        foreach ($models as $model) {
            $result[$model->id] = $model->time_finished - $model->time_connected;
        }

        return max($result);
    }

    /**
     * Most recent tel number
     * @return array
     */
    public static function getMaxUsedNumber()
    {
        $query = new Query;

        $query->select('recepient_num, count(recepient_num) as quan')
            ->from('call')
            ->groupBy('recepient_num')
            ->orderBy('quan desc')
            ->limit(1);

        $rows = $query->all();

        return $rows[0]['recepient_num'];
    }
}
