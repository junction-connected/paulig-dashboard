<?php

namespace app\models;

use yii\db\ActiveRecord;

/**
 * This is the model class for table "revenue_by_day".
 *
 * @property float|null $revenue
 * @property string|null $day
 */
class RevenueByDay extends ActiveRecord {
    /**
     * @return string
     */
    public static function tableName() {
        return 'revenue_by_day';
    }

    /**
     * @return array
     */
    public function rules() {
        return [
            [['revenue'], 'number'],
            [['day'], 'string', 'max' => 10],
        ];
    }

    /**
     * @return array
     */
    public function attributeLabels() {
        return [
            'revenue' => 'Revenue',
            'day' => 'Day',
        ];
    }
}
