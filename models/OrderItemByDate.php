<?php

namespace app\models;

use yii\db\ActiveRecord;

/**
 * This is the model class for table "order_item_by_date".
 *
 * @property string $order_time
 * @property int $id
 * @property string|null $name
 * @property float $price
 */
class OrderItemByDate extends ActiveRecord {
    /**
     * @return string
     */
    public static function tableName() {
        return 'order_item_by_date';
    }

    /**
     * @return array
     */
    public function rules() {
        return [
            [['order_time', 'price'], 'required'],
            [['order_time'], 'safe'],
            [['id'], 'integer'],
            [['price'], 'number'],
            [['name'], 'string', 'max' => 128],
        ];
    }

    /**
     * @return array
     */
    public function attributeLabels() {
        return [
            'order_time' => 'Order Time',
            'id' => 'ID',
            'name' => 'Name',
            'price' => 'Price',
        ];
    }
}
