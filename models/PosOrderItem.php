<?php

namespace app\models;

use yii\db\ActiveRecord;

/**
 * This is the model class for table "pos_order_item".
 *
 * @property int $id
 * @property int $order_id
 * @property int $item_id
 * @property float|null $amt
 * @property int|null $qty
 *
 * @property PosOrder $order
 * @property PosItem $item
 */
class PosOrderItem extends ActiveRecord {
    /**
     * @return string
     */
    public static function tableName() {
        return 'pos_order_item';
    }

    /**
     * @return array
     */
    public function rules() {
        return [
            [['order_id', 'item_id'], 'required'],
            [['order_id', 'item_id', 'qty'], 'integer'],
            [['amt'], 'number'],
            [['order_id'], 'exist', 'skipOnError' => true, 'targetClass' => PosOrder::className(), 'targetAttribute' => ['order_id' => 'id']],
            [['item_id'], 'exist', 'skipOnError' => true, 'targetClass' => PosItem::className(), 'targetAttribute' => ['item_id' => 'id']],
        ];
    }

    /**
     * @return array
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'order_id' => 'Order ID',
            'item_id' => 'Item ID',
            'amt' => 'Amt',
            'qty' => 'Quantity',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrder() {
        return $this->hasOne(PosOrder::className(), ['id' => 'order_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getItem() {
        return $this->hasOne(PosItem::className(), ['id' => 'item_id']);
    }
}
