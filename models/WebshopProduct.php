<?php

namespace app\models;

use yii\db\ActiveRecord;

/**
 * This is the model class for table "webshop_product".
 *
 * @property int $id
 * @property int $group_id
 * @property string $name
 * @property float $price
 *
 * @property WebshopOrderItem[] $webshopOrderItems
 * @property WebshopProductGroup $group
 */
class WebshopProduct extends ActiveRecord {
    /**
     * @return string
     */
    public static function tableName() {
        return 'webshop_product';
    }

    /**
     * @return array
     */
    public function rules() {
        return [
            [['group_id', 'price'], 'required'],
            [['group_id'], 'integer'],
            [['price'], 'number'],
            [['name'], 'string', 'max' => 128],
            [['name'], 'unique'],
            [['group_id'], 'exist', 'skipOnError' => true, 'targetClass' => WebshopProductGroup::className(), 'targetAttribute' => ['group_id' => 'id']],
        ];
    }

    /**
     * @return array
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'group_id' => 'Group ID',
            'name' => 'Name',
            'price' => 'Price',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWebshopOrderItems() {
        return $this->hasMany(WebshopOrderItem::className(), ['item_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGroup() {
        return $this->hasOne(WebshopProductGroup::className(), ['id' => 'group_id']);
    }
}
