<?php

namespace app\models;

use yii\db\ActiveRecord;

/**
 * This is the model class for table "pos_item".
 *
 * @property int $id
 * @property string|null $description
 * @property float $price
 * @property string|null $unit
 * @property string|null $item_code
 *
 * @property PosOrderItem[] $posOrderItems
 */
class PosItem extends ActiveRecord {
    /**
     * @return string
     */
    public static function tableName() {
        return 'pos_item';
    }

    /**
     * @return array
     */
    public function rules() {
        return [
            [['description'], 'string'],
            [['price'], 'required'],
            [['price'], 'number'],
            [['unit'], 'string', 'max' => 10],
            [['item_code'], 'string', 'max' => 32],
        ];
    }

    /**
     * @return array
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'description' => 'Description',
            'price' => 'Price',
            'unit' => 'Unit',
            'item_code' => 'Item Code',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPosOrderItems() {
        return $this->hasMany(PosOrderItem::className(), ['item_id' => 'id']);
    }
}
