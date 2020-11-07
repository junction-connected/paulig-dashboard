<?php

namespace app\models;

use yii\db\ActiveRecord;

/**
 * This is the model class for table "webshop_product_group".
 *
 * @property int $id
 * @property string $name
 *
 * @property WebshopProduct[] $webshopProducts
 */
class WebshopProductGroup extends ActiveRecord {
    /**
     * @return string
     */
    public static function tableName() {
        return 'webshop_product_group';
    }

    /**
     * @return array
     */
    public function rules() {
        return [
            [['name'], 'string', 'max' => 64],
            [['name'], 'unique'],
        ];
    }

    /**
     * @return array
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'name' => 'Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWebshopProducts() {
        return $this->hasMany(WebshopProduct::className(), ['group_id' => 'id']);
    }
}
