<?php

namespace app\models;

use yii\db\ActiveRecord;

/**
 * This is the model class for table "basket_analysis".
 *
 * @property float|null $avg_amount
 * @property float|null $avg_revenue
 * @property string|null $orderWeekDay
 * @property string|null $orderTime
 */
class BasketAnalysis extends ActiveRecord {
    /**
     * @return string
     */
    public static function tableName() {
        return 'basket_analysis';
    }

    /**
     * @return array
     */
    public function rules() {
        return [
            [['avg_amount', 'avg_revenue'], 'number'],
            [['orderWeekDay'], 'string', 'max' => 1],
            [['orderTime'], 'string', 'max' => 13],
        ];
    }

    /**
     * @return array
     */
    public function attributeLabels() {
        return [
            'avg_amount' => 'Avg Amount',
            'avg_revenue' => 'Avg Revenue',
            'orderWeekDay' => 'Order Week Day',
            'orderTime' => 'Order Time',
        ];
    }
}
