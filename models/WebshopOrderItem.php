<?php

namespace app\models;

use yii\db\ActiveRecord;

/**
 * This is the model class for table "webshop_order_item".
 *
 * @property int $id
 * @property int $qty
 * @property int $item_id
 * @property int $order_id
 *
 * @property WebshopOrder $order
 * @property WebshopProduct $item
 */
class WebshopOrderItem extends ActiveRecord {
    /**
     * @return string
     */
    public static function tableName() {
        return 'webshop_order_item';
    }

    /**
     * @return array
     */
    public function rules() {
        return [
            [['qty', 'item_id', 'order_id'], 'required'],
            [['qty', 'item_id', 'order_id'], 'integer'],
            [['order_id'], 'exist', 'skipOnError' => true, 'targetClass' => WebshopOrder::className(), 'targetAttribute' => ['order_id' => 'id']],
            [['item_id'], 'exist', 'skipOnError' => true, 'targetClass' => WebshopProduct::className(), 'targetAttribute' => ['item_id' => 'id']],
        ];
    }

    /**
     * @return array
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'qty' => 'Quantity',
            'item_id' => 'Item ID',
            'order_id' => 'Order ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrder() {
        return $this->hasOne(WebshopOrder::className(), ['id' => 'order_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getItem() {
        return $this->hasOne(WebshopProduct::className(), ['id' => 'item_id']);
    }
}
