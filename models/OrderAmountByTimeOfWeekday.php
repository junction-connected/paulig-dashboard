<?php

namespace app\models;

use yii\db\ActiveRecord;

/**
 * This is the model class for table "order_amount_by_time_of_weekday".
 *
 * @property int $orderAmount
 * @property string|null $orderWeekDay
 * @property string|null $orderTime
 */
class OrderAmountByTimeOfWeekday extends ActiveRecord {
    /**
     * @return string
     */
    public static function tableName() {
        return 'order_amount_by_time_of_weekday';
    }

    /**
     * @return array
     */
    public function rules() {
        return [
            [['orderAmount'], 'integer'],
            [['orderWeekDay'], 'string', 'max' => 1],
            [['orderTime'], 'string', 'max' => 13],
        ];
    }

    /**
     * @return array
     */
    public function attributeLabels() {
        return [
            'orderAmount' => 'Order Amount',
            'orderWeekDay' => 'Order Week Day',
            'orderTime' => 'Order Time',
        ];
    }
}
