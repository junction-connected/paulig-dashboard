<?php

namespace app\models;

use yii\base\Model;

/**
 * Class DatePickForm
 * @package app\models
 */
class DatePickForm extends Model {
    /**
     * @var
     */
    public $date;

    /**
     * @return array
     */
    public function rules() {
        return [
            [['date'], 'required'],
            ['date', 'string'],
        ];
    }
}