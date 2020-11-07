<?php

namespace app\models;

use yii\db\ActiveRecord;

/**
 * This is the model class for table "webshop_order".
 *
 * @property int $id
 * @property string $customer_name
 * @property string $country
 * @property string $city
 * @property string $address
 * @property string $zip
 * @property string $order_time
 *
 * @property WebshopOrderItem[] $webshopOrderItems
 */
class WebshopOrder extends ActiveRecord {
    /**
     * @return string
     */
    public static function tableName() {
        return 'webshop_order';
    }

    /**
     * @return array
     */
    public function rules() {
        return [
            [['order_time'], 'required'],
            [['order_time'], 'safe'],
            [['customer_name', 'city'], 'string', 'max' => 64],
            [['country'], 'string', 'max' => 32],
            [['address'], 'string', 'max' => 128],
            [['zip'], 'string', 'max' => 6],
        ];
    }

    /**
     * @return array
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'customer_name' => 'Customer Name',
            'country' => 'Country',
            'city' => 'City',
            'address' => 'Address',
            'zip' => 'Zip',
            'order_time' => 'Order Time',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWebshopOrderItems() {
        return $this->hasMany(WebshopOrderItem::className(), ['order_id' => 'id']);
    }
}
