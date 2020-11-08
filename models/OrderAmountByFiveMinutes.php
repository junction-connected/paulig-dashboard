<?php

namespace app\models;

use yii\db\ActiveRecord;

/**
 * This is the model class for table "order_amount_by_five_minutes".
 *
 * @property int $orderAmount
 * @property string|null $orderTime
 */
class OrderAmountByFiveMinutes extends ActiveRecord {
    /**
     * @return string
     */
    public static function tableName() {
        return 'order_amount_by_five_minutes';
    }

    /**
     * @return array
     */
    public function rules() {
        return [
            [['orderAmount'], 'integer'],
            [['orderTime'], 'string', 'max' => 24],
        ];
    }

    /**
     * @return array
     */
    public function attributeLabels() {
        return [
            'orderAmount' => 'Order Amount',
            'orderTime' => 'Order Time',
        ];
    }
}
