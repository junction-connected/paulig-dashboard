<?php

namespace app\models;

use yii\db\ActiveRecord;

/**
 * This is the model class for table "order_number_of_a_product".
 *
 * @property string $country
 * @property string $city
 * @property string|null $orderDay
 * @property string $product_group_name
 * @property string $product_name
 * @property int $count
 */
class OrderNumberOfAProduct extends ActiveRecord {
    /**
     * @return string
     */
    public static function tableName() {
        return 'order_number_of_a_product';
    }

    /**
     * @return array
     */
    public function rules() {
        return [
            [['count'], 'integer'],
            [['country'], 'string', 'max' => 32],
            [['city', 'product_group_name'], 'string', 'max' => 64],
            [['orderDay'], 'string', 'max' => 10],
            [['product_name'], 'string', 'max' => 128],
        ];
    }

    /**
     * @return array
     */
    public function attributeLabels() {
        return [
            'country' => 'Country',
            'city' => 'City',
            'orderDay' => 'Order Day',
            'product_group_name' => 'Product Group Name',
            'product_name' => 'Product Name',
            'count' => 'Count',
        ];
    }
}
