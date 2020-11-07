<?php

namespace app\models;

use yii\db\ActiveRecord;

/**
 * This is the model class for table "revenue_by_weekday".
 *
 * @property float|null $avg_revenue
 * @property string|null $weekday
 */
class RevenueByWeekday extends ActiveRecord {
    /**
     * @return string
     */
    public static function tableName() {
        return 'revenue_by_weekday';
    }

    /**
     * @return array
     */
    public function rules() {
        return [
            [['avg_revenue'], 'number'],
            [['weekday'], 'string', 'max' => 1],
        ];
    }

    /**
     * @return array
     */
    public function attributeLabels() {
        return [
            'avg_revenue' => 'Avg Revenue',
            'weekday' => 'Weekday',
        ];
    }
}
