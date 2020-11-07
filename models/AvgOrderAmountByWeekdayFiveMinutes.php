<?php

namespace app\models;

use yii\db\ActiveRecord;

/**
 * This is the model class for table "avg_order_amount_by_weekday_five_minutes".
 *
 * @property float|null $avgOrderAmount
 * @property float|null $avgOrderRevenue
 * @property string|null $orderWeekDay
 * @property string|null $orderTime
 */
class AvgOrderAmountByWeekdayFiveMinutes extends ActiveRecord {
    /**
     * @return string
     */
    public static function tableName() {
        return 'avg_order_amount_by_weekday_five_minutes';
    }

    /**
     * @return array
     */
    public function rules() {
        return [
            [['avgOrderAmount', 'avgOrderRevenue'], 'number'],
            [['orderWeekDay'], 'string', 'max' => 1],
            [['orderTime'], 'string', 'max' => 13],
        ];
    }

    /**
     * @return array
     */
    public function attributeLabels() {
        return [
            'avgOrderAmount' => 'Avg Order Amount',
            'avgOrderRevenue' => 'Avg Order Revenue',
            'orderWeekDay' => 'Order Week Day',
            'orderTime' => 'Order Time',
        ];
    }
}
