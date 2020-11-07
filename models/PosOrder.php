<?php

namespace app\models;

use yii\db\ActiveRecord;

/**
 * This is the model class for table "pos_order".
 *
 * @property int $id
 * @property string $order_time
 * @property int $terminal_id
 * @property int $cashier_id
 * @property float|null $total
 *
 * @property PosOrderItem[] $posOrderItems
 */
class PosOrder extends ActiveRecord {
    /**
     * @return string
     */
    public static function tableName() {
        return 'pos_order';
    }

    /**
     * @return array
     */
    public function rules() {
        return [
            [['order_time', 'terminal_id', 'cashier_id'], 'required'],
            [['order_time'], 'safe'],
            [['terminal_id', 'cashier_id'], 'integer'],
            [['total'], 'number'],
        ];
    }

    /**
     * @return array
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'order_time' => 'Order Time',
            'terminal_id' => 'Terminal ID',
            'cashier_id' => 'Cashier ID',
            'total' => 'Total',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPosOrderItems() {
        return $this->hasMany(PosOrderItem::className(), ['order_id' => 'id']);
    }
}
